<?php

namespace App\Http\Controllers\Admin;

use App\Http\Enums\news\Status;
use App\Http\Requests\Admin\News\Create;
use App\Http\Requests\Admin\News\Edit;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Enum;
use PHPUnit\Util\Exception;

class NewsController
{

    public function index(Request $request) {

//        dump($request->has('f'));

        if($request->has('f')) {
            $news =  News::query()
                ->where('status', '=', $request->query('f'))
                ->orderByDesc('id')
                ->paginate(10);
        } else {
            $news =  News::query()
//                ->status()
                ->orderByDesc('id')
                ->with('category')
                ->paginate(10);
        }

//        $news = DB::table('news')->get();

        return view('admin.news.index', ['news' => $news, 'request' => $request]);
    }

    public function create(Request $request) {

        $statuses = Status::getEnums();
        $categories = Category::all();
//        $categories = DB::table('categories')->get();

        return view('admin.news.create')
            ->with([
                'request' => $request,
                'statuses' => $statuses,
                'categories' => $categories]);
    }

    public function store(Create $request) {
        dump($request);
        dump($request->file('image'));

//        $tableNameCategory = (new Category())->getTable();
//        $categories = Category::all();
//        $request->validate([
//            'title' => ['required', 'string', 'min:3', 'max:150'],
////            'categories_id' => ['required', 'integer', "exist:{$categories}, id"],
//            'author' => ['required', 'min:2', 'max:100'],
//            'status' => ['required', new Enum(Status::class)],
//            'image'  => ['nullable', 'image'],
//            'description' => ['nullable', 'string', 'min:3']

//        ]);
        $request->flash();
//
        $data = $request->only(['category_id','title', 'author', 'created_at', 'description', 'status']);
//
        if($request->file('image')) {
            $path = $request->file('image')->store('uploads', 'public');
        } else {
            $path = null;
        }

        $data['image'] = $path;

        $news = new News($data);

        if($news->save()) {
            return redirect()->route('admin.news.index')->with('success', 'Запись успешно сохранена');
        }

        return back()->with('error', 'Не удалось добавить запись');

    }

    public function show(Request $request, $newsId) {

//        $oneNews = DB::table('news')->find($newsId);
        $news = News::find($newsId);

        return view('admin.news.show')->with(['oneNews' => $news, 'request' => $request]);

    }

    public function edit(Request $request, $newsId) {

        $categories = Category::all();
        $oneNews = News::find($newsId);
//        $newsOne = DB::table('news')->find($newsId);
        return view('admin.news.edit')
            ->with([
                'oneNews' => $oneNews,
                'categories' => $categories,
                'request' => $request
            ]);

    }

    public function update(Edit $request, News $news) {

//        $request->flash();
//        $newsOne = News::find($newsId);
//        $categories = Category::all();
//
//
//        return view('admin.news.edit')
//            ->with([
//                'oneNews' => $newsOne,
//                'categories' => $categories,
//                'request' => $request
//            ]);
        $data = $request->only(['category_id', 'title', 'author', 'created_at', 'description', 'status']);

        if($request->file('image')) {
            $path = $request->file('image')->store('uploads', 'public');
        } else {
            $path = null;
        }

        $data['image'] = $path;
        $news->fill($data);
        dump($news);

        if($news->save()) {
            return redirect()->route('admin.news.index')->with('success', 'Запись успешно сохранена');
        }

        return back()->with('error', 'Не удалось добавить запись');

    }

    public function destroy(News $news) {
        try{
            $news->delete();
            return response()->json('ok');

        }catch(\Exception $e){
            Log::error($e->getMessage(), $e->getTrace());
            return response()->json('error', 400);
        }
    }
}

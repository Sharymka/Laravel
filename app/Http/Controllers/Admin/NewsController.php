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
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Enum;
use PHPUnit\Util\Exception;

class NewsController
{

    public function index(Request $request) {
        $request->flash();
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

        $request->flash();

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

        $request->flash();
//
        $data = $request->only(['category_id','title', 'author', 'created_at', 'description', 'status']);
//
        if($request->file('image')) {
            $path = $request->file('image')->store('news', 'public');
        } else {
            $path = null;
        }

        $data['image'] = Storage::url($path);

        $news = new News($data);

        if($news->save()) {
            Session::flash('success', 'Запись успешно сохранена');
            return redirect()->route('admin.news.index');
        }
        Session::flash('danger', 'Не удалось добавить запись');
        return back();

    }

    public function show(Request $request, $newsId) {

        $news = News::find($newsId);

        return view('admin.news.show')->with(['oneNews' => $news, 'request' => $request]);

    }

    public function edit(Request $request, $newsId) {
        $request->flash();
        $categories = Category::all();
        $oneNews = News::find($newsId);
        return view('admin.news.edit')
            ->with([
                'oneNews' => $oneNews,
                'categories' => $categories,
                'request' => $request
            ]);

    }

    public function update(Edit $request, $newsId) {

        $news = News::find($newsId);

        $previousImagePath = $news->image;

        $newPreviousImagePath = str_replace('storage', 'public', $previousImagePath );

        if ($request->hasFile('image')) {
            dump('yes');
                Storage::delete($newPreviousImagePath);
        }

        $data = $request->only(['category_id', 'title', 'author', 'created_at', 'description', 'status']);

        if($request->file('image')) {
            $path = $request->file('image')->store('news', 'public');
            $data['image'] = Storage::url($path);
        }

        $news->fill($data);

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

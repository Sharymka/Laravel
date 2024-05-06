<?php

namespace App\Http\Controllers\Admin;

use App\Http\Enums\news\Status;
use App\Http\Requests\Admin\News\Create;
use App\Http\Requests\Admin\News\Edit;
use App\Models\Category;
use App\Models\News;
use App\Services\Interfaces\SaverFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class NewsController
{

    public function index(Request $request)
    {
        $request->flash();

        if ($request->has('f')) {
            $news = News::query()
                        ->where('status', '=', $request->query('f'))
                        ->orderByDesc('id')
                        ->paginate(10);
        } else {
            $news = News::query()
                        ->orderByDesc('id')
                        ->with('category')
                        ->paginate(10);
        }

        return view('admin.news.index', ['news' => $news, 'request' => $request]);
    }

    public function create(Request $request)
    {
        $request->flash();

        $statuses = Status::getEnums();
        $categories = Category::all();

        return view('admin.news.create')
            ->with([
                'request' => $request,
                'statuses' => $statuses,
                'categories' => $categories]);
    }

    public function store(Create $request, News $news, SaverFiles $saverFiles)
    {
        $request->flash();
        $data = $request->only(['category_id', 'title', 'author', 'created_at', 'description', 'status']);

        if ($request->file('image')) {
            $file = $request->file('image');
            $path = 'public/news/';
            $response = $saverFiles->saveInStorage($file, $path);
            $data['image'] = $response['url'];
        }

        $news->fill($data);

        if ($news->save()) {
            Session::flash('success', 'Запись успешно сохранена');

            return redirect()->route('admin.news.index');
        }
        Session::flash('danger', 'Не удалось добавить запись');

        return back();
    }

    public function show(Request $request, $newsId)
    {
        $news = News::find($newsId);

        return view('admin.news.show')->with(['oneNews' => $news, 'request' => $request]);
    }

    public function edit(Request $request, $newsId)
    {
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

    public function update(Edit $request, $newsId, SaverFiles $saverFiles)
    {
        $news = News::find($newsId);

        $previousImagePath = $news->image;

        $newPreviousImagePath = str_replace('storage', 'public', $previousImagePath);

        if ($request->hasFile('image')) {
            Storage::delete($newPreviousImagePath);
        }

        $data = $request->only(['category_id', 'title', 'author', 'created_at', 'description', 'status']);

        if ($request->file('image')) {
            $file = $request->file('image');
            $path = 'public/news/';
            $response = $saverFiles->saveInStorage($file, $path);
            $data['image'] = $response['url'];
        }

        $news->fill($data);

        if ($news->save()) {
            return redirect()->route('admin.news.index')->with('success', 'Запись успешно сохранена');
        }

        return back()->with('error', 'Не удалось добавить запись');
    }

    public function destroy(News $news)
    {
        try {
            $news->delete();

            return response()->json('ok');
        } catch (\Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());

            return response()->json('error', 400);
        }
    }

    public function storeImage(Request $request, SaverFiles $saverFiles)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $path = 'public/news/description/';
            $response = $saverFiles->saveInStorage($file, $path);

            return response()->json(['fileName' => $response['fileName'], 'uploaded' => 1, 'url' => $response['url']]);
        }
    }
}

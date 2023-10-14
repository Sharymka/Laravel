<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Resources\Create;
use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class AdminResourcesController extends Controller
{
    public function index(Request $request)
    {
        $urls = Url::query()
                   ->orderByDesc('id')
                   ->get();

        return view('admin.resources.index')->with(['urls' => $urls, 'request' => $request]);
    }

    public function create(Request $request)
    {
        return view('admin.resources.create', ['request' => $request]);
    }

    public function store(Create $request, Url $resource)
    {
        $request->flash();

        $data = $request->only(['url', 'created_at']);
        $resource->fill($data);

        if ($resource->save()) {
            Session::flash('success', 'адрес источника новостей успешно добавлен');

            return redirect()->route('admin.resources.index');
        }

        Session::flash('danger', 'Не удалось добавить запись');

        return redirect()->back();
    }

    public function destroy(Url $url)
    {
        try {
            $url->delete();

            return response()->json('ok');
        } catch (\Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());

            return response()->json('error', 400);
        }
    }

    public function update()
    {
    }

    public function edit()
    {
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\NewsTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Route;

class IndexController extends Controller
{
    use NewsTrait;
    public function index(Response $response){
        $content = view('admin.index')->render();
        dump($response);
     return response($content);
    }

}

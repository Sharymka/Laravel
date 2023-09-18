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
    public function index(Response $response, Request $request){
//        view('admin.index', ['request'=> $request ]);

     return view('admin.index', ['request'=> $request]);
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParserJob;
use App\Models\Url;
use App\Services\Interfaces\Parser;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function __invoke(Request $request, Parser $parser)
    {
        $urls = Url::get()->pluck('url')->toArray();

        foreach ($urls as $url) {
            dispatch(new NewsParserJob($url));
        }

        return redirect()->route('admin.news.index');
    }

}

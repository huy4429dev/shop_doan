<?php

namespace App\Http\Controllers\Admin\news;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class newsController extends Controller
{
    public function index(){
        $news = DB::table('bai_viet')->get();     
        return view('admin.news.index', compact('news'));
    }
    public function add(){
        echo('^^ !');
    }
    public function edit(){
        echo('^^ !');
    }
    public function delete(){
        echo('^^ !');
    }
}

<?php

namespace App\Http\Controllers\Admin\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB; 

class usersController extends Controller
{
    public function index(){
        $users = DB::table('users')->get();
        // dd($users);
        return view('admin.users.index', ['users' => $users]);
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

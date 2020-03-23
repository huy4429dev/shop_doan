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
        return view('admin.users.index', compact('users'));
    }
    public function goadd(){
        return view('admin.users.add');
    }
    public function add(Request $request){        
        // return $request;
        DB::table('users')->insert(
            ['tai_khoan' => $request->username, 'mat_khau' => $request->password]
        );
        return redirect()->back()->with('message', 'Thêm mới thành công');
    }
    public function goedit($id){
        $users = DB::table('users')->select('*')->where('id',$id)->get();
        return view('admin.users.edit',compact('users'));
    }
    public function edit(Request $request,$id){
        DB::table('users')->where('id',$id)->update(
            ['tai_khoan' => $request->username, 'mat_khau' => $request->password]
        );
        return redirect()->back()->with('message', 'Cập nhật thành công');
    }
    public function delete($id){
        // dd($id);
        DB::table('users')->where('id',$id)->delete();
        return redirect()->back()->with('message', 'Xóa thành công');
    }
}

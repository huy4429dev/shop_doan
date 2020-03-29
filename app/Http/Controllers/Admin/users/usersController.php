<?php

namespace App\Http\Controllers\Admin\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB; 

class usersController extends Controller
{
    // public $timestamps = true;
    public function index(){
        $users = DB::table('users')->get();
        // dd($users);
        return view('admin.users.index', compact('users'));
    }
    public function goadd(){
        return view('admin.users.add');
    }
    public function add(Request $request){        
        $file = $request->avatar;
        $file->move('img', $file->getClientOriginalName());
        DB::table('users')->insert(
            [
                'tai_khoan' => $request->username,
                'mat_khau' => $request->password,
                'anh_dai_dien' => $file->getClientOriginalName(),
                'so_dien_thoai' => $request->Phone,
                'mo_ta'=> $request->mota,
                'role'=>0,
            ]
        );
        return redirect()->back()->with('message', 'Thêm mới thành công');
    }
    public function goedit($id){
        $users = DB::table('users')->select('*')->where('id',$id)->get();
        return view('admin.users.edit',compact('users'));
    }
    public function edit(Request $request,$id){
        $file = $request->avatar;
        $file->move('img', $file->getClientOriginalName());
        DB::table('users')->where('id',$id)->update(
            [
                'tai_khoan' => $request->username,
                 'mat_khau' => $request->password,
                 'anh_dai_dien' => $file->getClientOriginalName(),
                'so_dien_thoai' => $request->Phone,
                'mo_ta'=> $request->mota,
                'role'=>0,
            ]
        );
        return redirect()->back()->with('message', 'Cập nhật thành công');
    }
    public function delete($id){
        // dd($id);
        DB::table('users')->where('id',$id)->delete();
        return redirect()->back()->with('message', 'Xóa thành công');
    }
}

<?php

namespace App\Http\Controllers\Admin\news;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB; 

class newsController extends Controller
{
    public function index(){

        $news = DB::table('bai_viet')
        ->select('bai_viet.id as id_baiviet','bai_viet.hinh_anh as hinhanh','bai_viet.doan_trich as doantrich','bai_viet.noi_dung as noidung',
        'danh_muc_bai_viet.ten_loai as danhmucbaivietid',DB::raw('COUNT(like_bai_viet.bai_viet_id) as soluotthich'),DB::raw('COUNT(binh_luan_bai_viet.bai_viet_id) as sobinhluan'))
        ->leftJoin('like_bai_viet','like_bai_viet.bai_viet_id','=','bai_viet.id')
        ->leftJoin('binh_luan_bai_viet','binh_luan_bai_viet.bai_viet_id','=','bai_viet.id')
        ->join('danh_muc_bai_viet', 'danh_muc_bai_viet.id', '=', 'bai_viet.danh_muc_bai_viet_id')       
        ->groupBy('bai_viet.id','bai_viet.hinh_anh','bai_viet.doan_trich','bai_viet.noi_dung','danh_muc_bai_viet.ten_loai')
        ->get();     
        // dd($news);
        return view('admin.news.index', compact('news'));
    }
    public function goadd(){
        $danhmuc = DB::table('danh_muc_bai_viet')->select('*')->get();
        return view('admin.news.add',compact('danhmuc'));
    }
    public function add(Request $request){    
        // dd($request);
        $file = $request->hinhanh;
        $file->move('img', $file->getClientOriginalName());
        DB::table('bai_viet')->insert(
            [
                'hinh_anh' => $file->getClientOriginalName(),
                'doan_trich' => $request->doantrich,
                'noi_dung' => $request->noidung,
                'danh_muc_bai_viet_id' => $request->danhmucbaiviet,                                
            ]
        );
        return redirect()->back()->with('message', 'Thêm mới thành công');
    }
    public function goedit($id){
        // return $id;
        $danhmuc = DB::table('danh_muc_bai_viet')->select('*')->get();
        $news = DB::table('bai_viet')->select('*')->where('id',$id)->get();
        return view('admin.news.edit',compact('news','danhmuc'));
    }
    public function edit(Request $request,$id){        
        $file = $request->hinhanh;
        // dd($file);
        if($request->hasFile('hinhanh')){
        $file->move('img', $file->getClientOriginalName());
        DB::table('bai_viet')->where('id',$id)->update(
            [
                'hinh_anh' => $file->getClientOriginalName(),
                'doan_trich' => $request->doantrich,
                'noi_dung' => $request->noidung,
                'danh_muc_bai_viet_id' => $request->danhmucbaiviet,                                
            ]
        );}else{
            DB::table('bai_viet')->where('id',$id)->update(
                [                    
                    'doan_trich' => $request->doantrich,
                    'noi_dung' => $request->noidung,
                    'danh_muc_bai_viet_id' => $request->danhmucbaiviet,                                
                ]
            );
        }
        return redirect()->back()->with('message', 'Cập nhật thành công');
    }
    public function delete($id){
        // dd($id);
        DB::table('bai_viet')->where('id',$id)->delete();
        return redirect()->back()->with('message', 'Xóa thành công');
    }
    public function comment(){
        $cmts = DB::table('binh_luan_bai_viet')
        ->select('binh_luan_bai_viet.id as idd','tai_khoan','doan_trich','binh_luan_bai_viet.noi_dung as noidung','trang_thai')
        ->join('users', 'binh_luan_bai_viet.user_id', '=', 'users.id')      
        ->join('bai_viet', 'binh_luan_bai_viet.bai_viet_id', '=', 'bai_viet.id')   
        ->get();  
        return view('admin.comment.index',compact('cmts'));
    }
    public function comment_delete($id){
        DB::table('binh_luan_bai_viet')->where('id',$id)->delete();
        return redirect()->back()->with('message', 'Xóa thành công');
    }
    public function comment_status(Request $request){
        $status = $request->trangthaithai;
        $id = $request->idid;
        if($status == 0){
            DB::table('binh_luan_bai_viet')->where('id',$id)->update(
                [
                    'trang_thai' => 1,                                                    
                ]
            );
        }else{
            DB::table('binh_luan_bai_viet')->where('id',$id)->update(
                [
                    'trang_thai' => 0,                                                    
                ]
            );
        }
        return redirect()->back()->with('message', 'Thay đổi trạng thái thành công');
    }
}

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
        'users.tai_khoan as userid','danh_muc_bai_viet.ten_loai as danhmucbaivietid',DB::raw('COUNT(like_bai_viet.bai_viet_id) as soluotthich'),DB::raw('COUNT(binh_luan_bai_viet.bai_viet_id) as sobinhluan'))
        ->leftJoin('like_bai_viet','like_bai_viet.bai_viet_id','=','bai_viet.id')
        ->leftJoin('binh_luan_bai_viet','binh_luan_bai_viet.bai_viet_id','=','bai_viet.id')
        ->join('danh_muc_bai_viet', 'danh_muc_bai_viet.id', '=', 'bai_viet.danh_muc_bai_viet_id')
        ->join('users', 'users.id', '=', 'bai_viet.user_id')
        ->groupBy('bai_viet.id','bai_viet.hinh_anh','bai_viet.doan_trich','bai_viet.noi_dung','users.tai_khoan','danh_muc_bai_viet.ten_loai')
        ->get();     
        // dd($news);
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

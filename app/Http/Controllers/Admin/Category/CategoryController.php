<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\loai_san_pham;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = loai_san_pham::all();
        return view('admin.cat.index', compact('data'));
    }

    public function create()
    {
        return view('admin.cat.add');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'ten_danh_muc' => 'required|unique:loai_san_pham'
            ],
            [
                'ten_danh_muc.required' => 'Tên danh mục không được để trống!',
                'ten_danh_muc.unique' => 'Tên danh mục đã tồn tại?',
            ]
        );
        loai_san_pham::create($request->all());
        return redirect('admin/cat')->with('message', 'Thêm sản phẩm thành công!');
    }

    public function edit($id)
    {
        $data = loai_san_pham::find($id);
        return view('admin.cat.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $cat = loai_san_pham::find($id);
        if ($cat->ten_danh_muc == $request->ten_danh_muc) {
            return redirect('admin/cat')->with('message', 'Cập nhât sản phẩm thành công!');
        } else {
            $request->validate(
                [
                    'ten_danh_muc' => 'required|unique:loai_san_pham'
                ],
                [
                    'ten_danh_muc.required' => 'Tên danh mục không được để trống!',
                    'ten_danh_muc.unique' => 'Tên danh mục đã tồn tại?',
                ]
            );
            loai_san_pham::find($id)->update($request->all());
            return redirect('admin/cat')->with('message', 'Cập nhât sản phẩm thành công!');
        }
    }

    public function delete($id)
    {
        $cat = loai_san_pham::find($id);
        if (isset($cat)) {
            loai_san_pham::find($id)->delete();
            return redirect('admin/cat')->with('message', 'Xóa sản phẩm thành công!');
        } else {
            return redirect('admin/cat')->with('error', 'Sản phẩm không tồn tại!');
        }
    }
}
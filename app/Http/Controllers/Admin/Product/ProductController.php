<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\san_pham;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.index');
    }

    public function add(Request $request)
    {
        san_pham::create($request->all());
        return view('admin.product.index', ['message' => "Thêm sản phẩm thành công !"]);
    }

    public function edit($id)
    {
        $data = san_pham::find($id);
        return view('admin.product.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        san_pham::find($id)->update($request->all());
        return view('admin.product.index', ['message' => "Cập nhật sản phẩm thành công !"]);
    }

    public function delete($id)
    {
        san_pham::find($id)->delete();
        return view('admin.product.index', ['message' => "Xóa sản phẩm thành công !"]);
    }
}

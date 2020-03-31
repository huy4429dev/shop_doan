<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\loai_san_pham;
use App\san_pham;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index($id)
    {
        $data = loai_san_pham::with('product')->where('id', $id)->first();
        return view('admin.product.index', compact('data'));
    }

    public function create($id)
    {
        $data = loai_san_pham::find($id);
        return view('admin.product.add', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'ten_san_pham' => 'required',
                'gia_ban' => 'required|numeric',
                'so_luong' => 'required|numeric',
                'giam_gia' => 'required|numeric'
            ],
            [
                'ten_san_pham.required' => 'Tên sản phẩm không được để trống',
                'gia_ban.required' => 'Giá không được bỏ trống',
                'gia_ban.numeric' => 'Giá phải là số',
                'so_luong.required' => 'Số lượng không được bỏ trống',
                'so_luong.numeric' => 'Số lượng phải là số',
                'giam_gia.required' => 'Giảm giá không được bỏ trông',
                'giam_gia.numeric' => 'Giảm giá phải là số'
            ]
        );
        if ($request->hasFile('hinh_anh')) {
            $image = Str::random() . '.' . $request->hinh_anh->getClientOriginalExtension();
            $request->hinh_anh->move("uploads/product/", $image);
        }
        $data = collect($request->all())->merge([
            'hinh_anh' => $request->hasFile('hinh_anh') ? $image : null,
            'gia_ban' => $request->gia_ban < 0 ? 0 : $request->gia_ban,
            'so_luong' => $request->so_luong < 0 ? 0 : $request->so_luong,
            'giam_gia' => $request->giam_gia < 0 ? 0 : $request->giam_gia,
        ])->toArray();
        san_pham::create($data);
        return redirect('admin/product/' . $request->loai_san_pham_id . '/cat')->with("message", "Thêm sản phẩm thành công !");
    }

    public function edit($id)
    {
        $data = san_pham::find($id);
        $cat = loai_san_pham::find($data->loai_san_pham_id);
        return view('admin.product.edit', compact('data', 'cat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'ten_san_pham' => 'required',
                'gia_ban' => 'required|numeric',
                'so_luong' => 'required|numeric',
                'giam_gia' => 'required|numeric'
            ],
            [
                'ten_san_pham.required' => 'Tên sản phẩm không được để trống',
                'gia_ban.required' => 'Giá không được bỏ trống',
                'gia_ban.numeric' => 'Giá phải là số',
                'so_luong.required' => 'Số lượng không được bỏ trống',
                'so_luong.numeric' => 'Số lượng phải là số',
                'giam_gia.required' => 'Giảm giá không được bỏ trông',
                'giam_gia.numeric' => 'Giảm giá phải là số'
            ]
        );
        $db = san_pham::find($id);
        if ($request->hasFile('hinh_anh')) {
            $image = Str::random() . '.' . $request->hinh_anh->getClientOriginalExtension();
            $request->hinh_anh->move("uploads/product/", $image);
        }
        $data = collect($request->all())->merge([
            'hinh_anh' => $request->hasFile('hinh_anh') ? $image : $db->hinh_anh,
            'gia_ban' => $request->gia_ban < 0 ? 0 : $request->gia_ban,
            'so_luong' => $request->so_luong < 0 ? 0 : $request->so_luong,
            'giam_gia' => $request->giam_gia < 0 ? 0 : $request->giam_gia,
        ])->toArray();
        $db->update($data);
        return redirect('admin/product/' . $request->loai_san_pham_id . '/cat')->with('message', "Cập nhật sản phẩm thành công !");
    }

    public function delete($id)
    {
        $data = san_pham::find($id);
        if (isset($data)) {
            $data->delete();
        }
        return redirect('admin/product/' . $data->loai_san_pham_id . '/cat')->with('message', "Xóa sản phẩm thành công !");
    }
}

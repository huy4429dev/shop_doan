<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class san_pham extends Model
{
    protected $table = "san_pham";
    protected $fillable = ['ten_san_pham', 'hinh_anh', 'mo_ta', 'gia_ban', 'so_luong', 'giam_gia', 'rate', 'luot_mua', 'loai_san_pham_id'];
    public $timestamps = true;
}

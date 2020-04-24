<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chi_tiet_don_hang extends Model
{
    protected $table = "chi_tiet_don_hang";
    protected $fillable = ['san_pham_id', 'don_hang_id', 'so_luong_mua', 'don_gia', 'giam_gia'];

    public function san_pham()
    {
        return $this->belongsTo('App\san_pham','san_pham_id', 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class don_hang extends Model
{
    protected $table = "don_hang";
    protected $fillable = ['tong_don_hang', 'user_id', 'trang_thai'];

    public function chi_tiet()
    {
        return $this->hasMany('App\chi_tiet_don_hang', 'don_hang_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

}

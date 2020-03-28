<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loai_san_pham extends Model
{
    protected $table = "loai_san_pham";
    protected $fillable = ['ten_danh_muc'];
    public $timestamps = true;

    public function product()
    {
        return $this->hasMany('App\san_pham', 'loai_san_pham_id', 'id');
    }
}

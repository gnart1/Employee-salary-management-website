<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HoatDongModel extends Model
{
    use HasFactory;
    public static function getAll()
    {
        // return DB::select('SELECT ma_nv, ho_ten, ngay, thoi_gian, ngay, gio_vao, gio_ra, ten_loai_kl, tien_phat FROM bang_cong
        // -- INNER JOIN users ON users.id = bang_cong.ma_nv
        // -- INNER JOIN loai_kl ON bang_cong.ma_loai_kl = loai_kl.ma_loai_kl
        // ');
    }
}
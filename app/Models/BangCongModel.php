<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BangCongModel extends Model
{
    use HasFactory;
    public static function getAll()
    {
        return DB::select('SELECT ma_nv, ho_ten, ngay, thoi_gian, ngay, gio_vao, gio_ra, ten_loai_kl,tien_thuong, tien_phat FROM bang_cong
        INNER JOIN users ON users.id = bang_cong.ma_nv
        INNER JOIN loai_kl ON bang_cong.ma_loai_kl = loai_kl.ma_loai_kl
        INNER JOIN khen_thuong ON bang_cong.ma_kt = khen_thuong.ma_kt')
        ;
    }

    public static function getById($ma_nv)
    {
        return DB::select('SELECT ma_nv, ho_ten, ngay, thoi_gian, ngay, gio_vao, gio_ra, ten_loai_kl,tien_thuong, tien_phat FROM bang_cong
        INNER JOIN users ON users.id = bang_cong.ma_nv
        INNER JOIN loai_kl ON bang_cong.ma_loai_kl = loai_kl.ma_loai_kl
        INNER JOIN khen_thuong ON bang_cong.ma_kt = khen_thuong.ma_kt
        WHERE ma_nv = ?
        ', [$ma_nv]);
    }

    public static function filterBangCongCaNhan($month, $year, $ma_nv) {
        return DB::select('SELECT ma_nv, ho_ten, ngay, thoi_gian, ngay, gio_vao, gio_ra, ten_loai_kl,tien_thuong, tien_phat FROM bang_cong
        INNER JOIN users ON users.id = bang_cong.ma_nv
        INNER JOIN loai_kl ON bang_cong.ma_loai_kl = loai_kl.ma_loai_kl
        INNER JOIN khen_thuong ON bang_cong.ma_kt = khen_thuong.ma_kt
        WHERE YEAR(ngay) = ? AND MONTH(ngay) = ? AND ma_nv = ?', [$year, $month, $ma_nv]);
    }

    public static function filterBangCong($month, $year) {
        return DB::select('SELECT ma_nv, ho_ten, ngay, thoi_gian, ngay, gio_vao, gio_ra, ten_loai_kl,tien_thuong, tien_phat FROM bang_cong
        INNER JOIN users ON users.id = bang_cong.ma_nv
        INNER JOIN loai_kl ON bang_cong.ma_loai_kl = loai_kl.ma_loai_kl
        INNER JOIN khen_thuong ON bang_cong.ma_kt = khen_thuong.ma_kt
        WHERE YEAR(ngay) = ? AND MONTH(ngay) = ?', [$year, $month]);
    }
}

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
        return DB::table('hoat_dong')
            ->join('phong_ban','phong_ban.ma_pb','=','hoat_dong.ma_pb')
            ->select(
                'hoat_dong.ma_hd', 'hoat_dong.ten_hd','hoat_dong.thoi_gian','hoat_dong.dia_diem','hoat_dong.so_tien','phong_ban.ten_pb')
            ->get();
    }
    public static function getById($id)
    {
        return DB::table('hoat_dong')
            ->select('*')
            ->where('ma_hd', $id)
            ->get()[0];
    }

    public static function getAllPhongBan() {
        return DB::table('phong_ban')
            ->select('*')
            ->get();
    }
    public static function store($data) {
        return DB::table('hoat_dong')->insert($data);
    }
    public static function edit($id, $data) {
        return DB::table('hoat_dong')
            ->where('ma_hd', $id)
            ->update($data);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HopDongModel extends Model
{
    use HasFactory;
    public static function getAll() {
        return DB::table('hop_dong')
            ->join('users','users.id','=','hop_dong.ma_nv')
            ->select('ma_hd', 'ngay_bat_dau','ngay_ket_thuc', 'ngay_ky', 'noi_dung', 'thoi_han', 'ma_nv', 'ho_ten', 'luong_mot_gio')
            ->get();
    }
    public static function getById($id) {
        return DB::table('hop_dong')
            ->select('*')
            ->where('ma_hd', $id)
            ->get()[0];
    }

    public static function store($data) {
        return DB::table('hop_dong')->insert($data);
    }
    public static function edit($id, $data) {
        return DB::table('hop_dong')
            ->where('ma_hd', $id)
            ->update($data);
    }

    public static function remove($id) {
        return DB::table('hop_dong')
            ->where('ma_hd', $id)
            ->delete();
    }
}

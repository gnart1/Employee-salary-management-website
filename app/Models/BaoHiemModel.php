<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BaoHiemModel extends Model
{
    use HasFactory;
    public static function getAll() {
        return DB::table('bao_hiem')
            ->join('loai_bao_hiem','loai_bao_hiem.ma_loai_bh','=','bao_hiem.ma_loai_bh')
            ->join('hop_dong','hop_dong.ma_hd','=','bao_hiem.ma_hd')
            ->join('users', 'users.id','=', 'hop_dong.ma_nv')
            ->select('ma_bh', 'so_bh','ngay_cap', 'noi_cap', 'noi_kham_benh', 'ho_ten', 'ngay_sinh', 'ten_loai_bh')
            ->get();
    }
    public static function getById($id) {
        return DB::table('bao_hiem')
            ->select('*')
            ->where('ma_bh', $id)
            ->get()[0];
    }

    public static function getAllLoaiBh() {
        return DB::table('loai_bao_hiem')
            ->select('*')
            ->get();
    }

    public static function store($data) {
        return DB::table('bao_hiem')->insert($data);
    }
    public static function edit($id, $data) {
        return DB::table('bao_hiem')
            ->where('ma_bh', $id)
            ->update($data);
    }

    public static function remove($id) {
        return DB::table('bao_hiem')
            ->where('ma_bh', $id)
            ->delete();
    }
}

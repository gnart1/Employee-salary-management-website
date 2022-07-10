<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ChamCongModel extends Model
{
    use HasFactory;
    public static function chamCongDen($data)
    {
        return DB::table('bang_cong')->insert($data);
    }
    public static function getCurrentItem($data)
    {
        return DB::table('bang_cong')
            ->select('ma_bc')
            ->where($data)
            ->first();
    }
    public static function chamCongVe($user_id, $gio_ra_str, $thoi_gian, $today_str)
    {
        return DB::table('bang_cong')
            ->where([
                'ma_nv' => $user_id,
                'ngay' => $today_str
                ])
            ->update([
                'gio_ra' => $gio_ra_str,
                'thoi_gian' => $thoi_gian
            ]);
    }
    public static function getGioVao($id, $today)
    {
        return DB::table('bang_cong')
            ->where([
                ['ma_nv', $id],
                ['ngay', $today]
            ])
            ->select('gio_vao', 'ma_loai_kl')->first();
    }

    public static function getHopDongNhanVien($id) {
        return DB::table('hop_dong')
            ->where([
                ['ma_nv', $id]
            ])
            ->orderBy('ma_hd', 'DESC')
            ->first();
    }
}

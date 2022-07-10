<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LuongModel extends Model
{
    use HasFactory;
    public static function getAll()
    {
        return DB::table('users')
            ->select(
                'bang_cong.ma_nv as id',
                'bang_cong.ngay',
                'bang_cong.phat',
                'hop_dong.luong_mot_gio',
                'users.ho_ten',
                'chuc_vu.ten_cv',
                'chuc_vu.luong_trach_nhiem',
                DB::raw('SUM(HOUR(TIMEDIFF(gio_ra, gio_vao)) - 1) AS thoi_gian')
            )
            ->join('bang_cong', 'bang_cong.ma_nv', '=', 'users.id')
            ->join('chuc_vu', 'chuc_vu.ma_cv', '=', 'users.ma_cv')
            ->join('hop_dong', 'hop_dong.ma_nv', '=', 'users.id')
            ->groupBy([
                'bang_cong.ma_nv', "hop_dong.luong_mot_gio", 'users.ho_ten', 'chuc_vu.ten_cv',
                'chuc_vu.luong_trach_nhiem', 'bang_cong.ngay', 'bang_cong.phat'
            ])
            ->get();
    }

    public static function filterLuong($month, $year)
    {
        return DB::select('call getSalaryByMonthYear(?,?)',array($month,$year));
    }

    public static function getTienNoThangTruoc($ma_nv, $month, $year)
    {
        if ($month !== 1) {
            return DB::table('tien_no')
            ->where([
                ['ma_nv', '=' , $ma_nv],
                ['thang', '=' , $month - 1],
                ['nam', '=' , $year],
            ])
            ->select('*')
            ->first();
        }
        return DB::table('tien_no')
        ->where([
            ['ma_nv', '=' , $ma_nv],
            ['thang', '=' , 12],
            ['nam', '=' , $year - 1 ],
        ])
        ->select('*')
        ->first();
    }

    public static function storeTienNo($ma_nv, $month, $year, $so_tien)
    {
        return DB::table('tien_no')
        ->insert([
            'thang' => $month,
            'nam' => $year,
            'ma_nv' => $ma_nv,
            'so_tien' => $so_tien,
            'status' => 0
        ]);
    }

    public static function resolveNo($ma_nv, $month, $year)
    {
        return DB::table('tien_no')
        ->where([
            'thang' => $month,
            'nam' => $year,
            'ma_nv' => $ma_nv,
        ])
        ->update([
            'status' => 1
        ]);
    }

    public static function getTienNoThangNay($ma_nv ,$month, $year)
    {
        return DB::table('tien_no')
        ->where([
            'thang' => $month,
            'nam' => $year,
            'ma_nv' => $ma_nv,
        ])
        ->select('*')
        ->first();
    }
}

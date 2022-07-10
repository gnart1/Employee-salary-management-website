<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NoModel extends Model
{
    use HasFactory;
    public static function filterNo($month, $year) {
        return DB::table('tien_no')
        ->join('users', 'users.id', '=', 'tien_no.ma_nv')
        ->where([
            ['thang', '=', $month],
            ['nam', '=', $year],
        ])
        ->select('ho_ten', 'thang', 'nam', 'so_tien', 'tien_no.status')
        ->get();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HomeModel extends Model
{
    use HasFactory;
    public static function getWorkStatusOfEmployee($ngay, $ma_loai_kl)
    {
        return DB::select('call getWorkStatusOfEmployee(?, ?)',array($ngay ,$ma_loai_kl));
    }
}
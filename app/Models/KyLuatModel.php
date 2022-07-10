<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KyLuatModel extends Model
{
    use HasFactory;
    public static function getAll()
    {
        return DB::table('loai_kl')
            ->select('*')
            ->get();
    }

    public static function store($ten_loai_kl, $tien_phat, $ma_loai_kl)
    {
        return DB::table('loai_kl')->insert([
            'ma_loai_kl' => $ma_loai_kl,
            'ten_loai_kl' => $ten_loai_kl,
            'tien_phat' => $tien_phat
        ]);
    }

    public static function getById($id)
    {
        return DB::table('loai_kl')
            ->select('ma_loai_kl', 'ten_loai_kl', 'tien_phat')
            ->where('ma_loai_kl', $id)
            ->get()[0];
    }

    public static function edit($ma_loai_kl, $ten_loai_kl, $tien_phat)
    {
        return DB::table('loai_kl')
            ->where('ma_loai_kl', $ma_loai_kl)
            ->update([
                'ten_loai_kl' => $ten_loai_kl,
                'tien_phat' => $tien_phat
            ]);
    }
}

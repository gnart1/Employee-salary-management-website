<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KhenThuongModel extends Model

{
    public $table = "khen_thuong";
    use HasFactory;
    public static function getAll()
    {
        return DB::table('khen_thuong')
            ->select('*')
            ->get();
    }

    public static function store($loai_kt, $tien_thuong, $ma_kt)
    {
        return DB::table('khen_thuong')->insert([
            'ma_kt' => $ma_kt,
            'loai_kt' => $loai_kt,
            'tien_thuong' => $tien_thuong
        ]);
    }

    public static function getById($id)
    {
        return DB::table('khen_thuong')
            ->select('ma_kt', 'loai_kt', 'tien_thuong')
            ->where('ma_kt', $id)
            ->get()[0];
    }

    public static function edit($ma_kt, $loai_kt, $tien_thuong)
    {
        return DB::table('khen_thuong')
            ->where('ma_kt', $ma_kt)
            ->update([
                'loai_kt' => $loai_kt,
                'tien_thuong' => $tien_thuong
            ]);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PhongBanModel extends Model
{
    use HasFactory;
    public static function getAll()
    {
        return DB::table('phong_ban')
            ->select('*')
            ->get();
    }
    public static function getById($id)
    {
        return DB::table('phong_ban')
            ->select('ma_pb', 'ten_pb')
            ->where('ma_pb', $id)
            ->get()[0];
    }

    public static function store($ten_phong_ban)
    {
        return DB::table('phong_ban')->insert([
            'ten_pb ' => $ten_phong_ban
        ]);
    }
    public static function edit($ma_pb, $ten_phong_ban)
    {
        return DB::table('phong_ban')
            ->where('ma_pb', $ma_pb)
            ->update([
                'ten_pb' => $ten_phong_ban,
            ]);
    }

    public static function remove($ma_pb)
    {
        return DB::table('phong_ban')
            ->where('ma_pb', $ma_pb)
            ->delete();
    }
}

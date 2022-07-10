<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ChucVuModel extends Model
{
    use HasFactory;
    public static function getAll()
    {
        return DB::table('chuc_vu')
            ->select('*')
            ->get();
    }
    public static function getById($id)
    {
        return DB::table('chuc_vu')
            ->select('ma_cv', 'ten_cv', 'luong_trach_nhiem')
            ->where('ma_cv', $id)
            ->get()[0];
    }

    public static function store($ten_chuc_vu, $luong_trach_nhiem)
    {
        return DB::table('chuc_vu')->insert([
            'ten_cv' => $ten_chuc_vu,
            'luong_trach_nhiem' => $luong_trach_nhiem
        ]);
    }
    public static function edit($ma_cv, $ten_chuc_vu, $luong_trach_nhiem)
    {
        return DB::table('chuc_vu')
            ->where('ma_cv', $ma_cv)
            ->update([
                'ten_cv' => $ten_chuc_vu,
                'luong_trach_nhiem' => $luong_trach_nhiem
            ]);
    }

    public static function remove($ma_cv)
    {
        return DB::table('chuc_vu')
            ->where('ma_cv', $ma_cv)
            ->delete();
    }

    public static function getMsg()
    {
        $msg = "Chúc Cường học AJAX vui vẻ nha ^^";
        return response()->json(array('msg' => $msg), 200);
    }
}

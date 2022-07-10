<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LoaiBaoHiemModel extends Model
{
    use HasFactory;
    public static function getAll() {
        return DB::table('loai_bao_hiem')
            ->select('*')
            ->get();
    }
    public static function getById($id) {
        return DB::table('loai_bao_hiem')
            ->select('ma_loai_bh', 'ten_loai_bh')
            ->where('ma_loai_bh', $id)
            ->get()[0];
    }

    public static function store($ten_loai_bh) {
        return DB::table('loai_bao_hiem')->insert([
            'ten_loai_bh' => $ten_loai_bh
        ]);
    }
    public static function edit($ma_loai_bh, $ten_loai_bh) {
        return DB::table('loai_bao_hiem')
            ->where('ma_loai_bh', $ma_loai_bh)
            ->update([
                'ten_loai_bh'=> $ten_loai_bh,
            ]);
    }

    public static function remove($ma_loai_bh) {
        return DB::table('loai_bao_hiem')
            ->where('ma_loai_bh', $ma_loai_bh)
            ->delete();
    }
}

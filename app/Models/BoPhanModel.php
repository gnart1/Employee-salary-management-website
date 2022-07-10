<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BoPhanModel extends Model
{
    use HasFactory;
    public static function getAll()
    {
        return DB::table('bo_phan')
            ->select('*')
            ->get();
    }
    public static function getById($id)
    {
        return DB::table('bo_phan')
            ->select('ma_bp', 'ten_bp')
            ->where('ma_bp', $id)
            ->get()[0];
    }

    public static function store($ten_bo_phan)
    {
        return DB::table('bo_phan')->insert([
            'ten_bp' => $ten_bo_phan
        ]);
    }
    public static function edit($ma_bp, $ten_bo_phan)
    {
        return DB::table('bo_phan')
            ->where('ma_bp', $ma_bp)
            ->update([
                'ten_bp' => $ten_bo_phan,
            ]);
    }

    public static function remove($ma_bp)
    {
        return DB::table('bo_phan')
            ->where('ma_bp', $ma_bp)
            ->delete();
    }
}

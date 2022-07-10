<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TrinhDoModel extends Model
{
    use HasFactory;
    public static function getAll() {
        return DB::table('trinh_do')
            ->select('*')
            ->get();
    }
    public static function getById($id) {
        return DB::table('trinh_do')
            ->select('ma_td', 'ten_td')
            ->where('ma_td', $id)
            ->get()[0];
    }

    public static function store($ten_trinh_do) {
        return DB::table('trinh_do')->insert([
            'ten_td' => $ten_trinh_do
        ]);
    }
    public static function edit($ma_td, $ten_trinh_do) {
        return DB::table('trinh_do')
            ->where('ma_td', $ma_td)
            ->update([
                'ten_td'=> $ten_trinh_do,
            ]);
    }

    public static function remove($ma_td) {
        return DB::table('trinh_do')
            ->where('ma_td', $ma_td)
            ->delete();
    }
}

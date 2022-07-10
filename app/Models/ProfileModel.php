<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProfileModel extends Model
{
    use HasFactory;
    public static function edit($id, $data) {
        // dd($id, $data);
        return DB::table('users')
            ->where('id', $id)
            ->update($data);
    }

    public static function checkCurrentPassword ($id, $password) {
        $rs = DB::table('users')
        ->where(['id' => $id, 'password' => $password])
        ->count();
        if ($rs > 0) {
            return true;
        }
        return false;
    }

    public static function changePassword ($id, $password) {
        return DB::table('users')
            ->where('id', $id)
            ->update(['password' => $password]);
    }
}

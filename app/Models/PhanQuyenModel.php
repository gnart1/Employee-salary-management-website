<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PhanQuyenModel extends Model
{
    use HasFactory;
    public static function getAllRoles() {
        return DB::table('roles')
            ->select('id', 'name')
            ->get();
    }

    public static function getRoleByUserId($id) {
        $roles = DB::table('model_has_roles')
            ->select('role_id', 'model_id')
            ->where('model_id', $id)
            ->get();

        if($roles->count() > 0) {
            return $roles[0];
        }else {
            return null;
        }

    }
}

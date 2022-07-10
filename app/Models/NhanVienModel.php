<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NhanVienModel extends Model
{
    use HasFactory;
    public static function getAll() {
        return DB::table('users')
            ->join('phong_ban','phong_ban.ma_pb','=','users.ma_pb')
            ->join('bo_phan','bo_phan.ma_bp','=','users.ma_bp')
            ->join('chuc_vu','chuc_vu.ma_cv','=','users.ma_cv')
            ->join('trinh_do','trinh_do.ma_td','=','users.ma_td')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->select(
                'users.id', 'users.ho_ten', 'users.email', 'users.status', 'users.gioi_tinh', 'users.ngay_sinh', 'users.dien_thoai', 'users.dia_chi',
                'phong_ban.ten_pb', 'bo_phan.ten_bp', 'chuc_vu.ten_cv',  'trinh_do.ten_td', 'roles.name as vai_tro'
            )
            ->get();
    }
    public static function getById($id) {
        return DB::table('users')
            ->select('*')
            ->where('id', $id)
            ->first();
    }

    public static function getByEmail($email) {
        return DB::table('users')
            ->select('id')
            ->where('email', $email)
            ->first();
    }

    public static function store($data) {
        // dd(DB::table('users')
        // ->insert($data));
        return DB::table('users')
            ->insert($data);

    }
    public static function edit($id, $data) {
        return DB::table('users')
            ->where('id', $id)
            ->update($data);
    }

    public static function searchNhanVien($keyword) {
        return DB::table('users')
            ->where('ho_ten','LIKE','%'.$keyword."%")
            ->orWhere('dien_thoai','LIKE','%'.$keyword."%")
            ->get();
    }


    public static function assignDefaultRole ($id) {

    }

    public static function remove($id) {
        return DB::table('users')
            ->where('id', $id)
            ->delete();
    }

    public static function getAllPhongBan() {
        return DB::table('phong_ban')
            ->select('*')
            ->get();
    }

    public static function getAllBoPhan() {
        return DB::table('bo_phan')
            ->select('*')
            ->get();
    }

    public static function getAllChucVu() {
        return DB::table('chuc_vu')
            ->select('*')
            ->get();
    }

    public static function getAllTrinhDo() {
        return DB::table('trinh_do')
            ->select('*')
            ->get();
    }

    public static function getAllVaiTro() {
        return DB::table('roles')
            ->select('*')
            ->get();
    }
}

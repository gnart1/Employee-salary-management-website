<?php

namespace App\Http\Controllers;

use App\Models\BangCongModel;
use App\Models\HoatDongModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HoatDongController extends Controller
{
    public function index()
    {
        $all_hoat_dong = HoatDongModel::getAll();
        return view(
            'pages.hoat_dong.hoat_dong',
            ['all_hoat_dong' => $all_hoat_dong],
        );
    }

    public function create()
    {
        $all_phong_ban = HoatDongModel::getAllPhongBan();

        return view('pages.hoat_dong.them_hoat_dong', [
            'all_phong_ban' => $all_phong_ban,
        ]);
    }
    public function store(Request $req){
        $data = [
            'ten_hd' => $req->input('ten_hd'),
            'thoi_gian' => $req->input('thoi_gian'),
            'dia_diem' => $req->input('dia_diem'),
            'so_tien' => $req->input('so_tien'),
            'ma_pb' => $req->input('ma_pb'),
        ];

         //dd($data);

        $rs = HoatDongModel::store($data);

        if($rs) {
            Session::put('notify_success', 'Tạo mới thành công');
            return redirect()->route('hoat_dong');
        }
        else{
            echo "loi";
            die;
        }
    }
    public function edit($id)
    {
        $all_phong_ban = HoatDongModel::getAllPhongBan();

        // dd($nhan_vien);
        $hoat_dong = HoatDongModel::getByID($id);
        return view('pages.hoat_dong.sua_hoat_dong', [
            'all_phong_ban' => $all_phong_ban,'hoat_dong' => $hoat_dong
        ]);
    }

    public function update($id, Request $req)
    {
        $data = [
            'ten_hd' => $req->input('ten_hd'),
            'thoi_gian' => $req->input('thoi_gian'),
            'dia_diem' => $req->input('dia_diem'),
            'so_tien' => $req->input('so_tien'),
            'ma_pb' => $req->input('ma_pb'),
        ];
        $rs = HoatDongModel::edit($id, $data);

        if($rs) {
            Session::put('notify_success', 'Sửa thành công');
            return redirect()->route('hoat_dong');
        }
        else{
            Session::put('notify_success', 'Sửa ko thành công');
            return redirect()->route('hoat_dong');
        }
    }

}
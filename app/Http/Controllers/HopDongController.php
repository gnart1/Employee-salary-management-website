<?php

namespace App\Http\Controllers;

use App\Models\HopDongModel;
use App\Models\NhanVienModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class HopDongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_hop_dong = HopDongModel::getAll();
        return view("pages.quan_li_hop_dong.quan_li_hop_dong", ['all_hop_dong' => $all_hop_dong]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_nhan_vien = NhanVienModel::getAll();
        return view("pages.quan_li_hop_dong.them_hop_dong", ['all_nhan_vien' => $all_nhan_vien]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $ngay_bat_dau = Carbon::parse($req->input('ngay_bat_dau'));
        $ngay_ket_thuc = Carbon::parse($req->input('ngay_ket_thuc'));
        $thoi_han = $ngay_ket_thuc->diffInMonths($ngay_bat_dau);

        $data = [
            "ngay_bat_dau" => $ngay_bat_dau,
            "ngay_ket_thuc" => $ngay_ket_thuc,
            "ngay_ky" => $req->input('ngay_ky'),
            "noi_dung" => $req->input('noi_dung'),
            "thoi_han" => $thoi_han,
            "ma_nv" => $req->input('ma_nv'),
            "luong_mot_ngay" => $req->input('luong_mot_ngay'),
        ];

        $this->validate($req, [
            'ngay_bat_dau' => 'required',
            'ngay_ket_thuc' => 'required',
            'ngay_ky' => 'required',
            'noi_dung' => 'required',
            'luong_mot_ngay' => 'required',
            'ma_nv' => 'required'
        ], [
            'ngay_bat_dau.required' => '*Chưa nhập ngày bắt đầu',
            'ngay_ket_thuc.required' => '*Chưa nhập ngày kết thúc',
            'ngay_ky.required' => '*Chưa nhập ngày ký',
            'noi_dung.required' => '*Chưa nhập nội dung',
            'luong_mot_ngay.required' => '*Chưa nhập lương một ngày',
            'ma_nv.required' => '*Chưa chọn nhân viên'
        ]);

        $rs = HopDongModel::store($data);

        if ($rs) {
            Session::put('notify_success', 'Thêm mới thành công');
            return redirect()->route('quan_li_hop_dong');
        } else {
            echo "Loi";
            return false;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $all_nhan_vien = NhanVienModel::getAll();
        $hop_dong = HopDongModel::getById($id);
        return view("pages.quan_li_hop_dong.sua_hop_dong", ['all_nhan_vien' => $all_nhan_vien, 'hop_dong' => $hop_dong]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $data = [
            "ngay_bat_dau" => $req->input('ngay_bat_dau'),
            "ngay_ket_thuc" => $req->input('ngay_ket_thuc'),
            "ngay_ky" => $req->input('ngay_ky'),
            "noi_dung" => $req->input('noi_dung'),
            "ma_nv" => $req->input('ma_nv'),
            "luong_mot_ngay" => $req->input('luong_mot_ngay'),
        ];

        $this->validate($req, [
            'ngay_bat_dau' => 'required',
            'ngay_ket_thuc' => 'required',
            'ngay_ky' => 'required',
            'noi_dung' => 'required',
            'luong_mot_ngay' => 'required',
            'ma_nv' => 'required'
        ], [
            'ngay_bat_dau.required' => '*Chưa nhập ngày bắt đầu',
            'ngay_ket_thuc.required' => '*Chưa nhập ngày kết thúc',
            'ngay_ky.required' => '*Chưa nhập ngày ký',
            'noi_dung.required' => '*Chưa nhập nội dung',
            'luong_mot_ngay.required' => '*Chưa nhập lương một ngày',
            'ma_nv.required' => '*Chưa chọn nhân viên'
        ]);

        $rs = HopDongModel::edit($id, $data);

        if ($rs) {
            Session::put('notify_success', 'Sửa thành công');
            return redirect()->route('quan_li_hop_dong');
        } else {
            echo "<h1 style:text-align:center; color:red >LỖI KHÔNG SỬA ĐƯỢC</h1>";
            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}

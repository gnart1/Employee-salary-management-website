<?php

namespace App\Http\Controllers;

use App\Models\BaoHiemModel;
use App\Models\NhanVienModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BaoHiemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_bao_hiem = BaoHiemModel::getAll();
        return view('pages.quan_li_bao_hiem.quan_li_bao_hiem', ['all_bao_hiem' => $all_bao_hiem]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $all_loai_bh = BaoHiemModel::getAllLoaiBh();
        $all_nhan_vien = NhanVienModel::getAll();
        return view('pages.quan_li_bao_hiem.them_bao_hiem', ['all_loai_bh' => $all_loai_bh, 'all_nhan_vien' => $all_nhan_vien]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $data = [
            "so_bh" => $req->input('so_bh'),
            "ngay_cap" => $req->input('ngay_cap'),
            "noi_cap" => $req->input('noi_cap'),
            "noi_kham_benh" => $req->input('noi_kham_benh'),
            "ma_nv" => $req->input('ma_nv'),
            "ma_loai_bh" => $req->input('ma_loai_bh'),
        ];

        $this->validate($req, [
            'so_bh' => 'required|unique:bao_hiem',
            'ngay_cap' => 'required',
            'noi_cap' => 'required',
            'noi_kham_benh' => 'required'
        ], [
            'so_bh.required' => '*Chưa nhập số bảo hiểm',
            'so_bh.unique' => '*Số bảo hiểm đã tồn tại',
            'noi_cap.required' => '*Chưa nhập nơi cấp',
            'noi_kham_benh.required' => '*Chưa nhập nơi khám bệnh',
            'ngay_cap.required' => '*Chưa nhập ngày cấp'
        ]);

        $rs = BaoHiemModel::store($data);

        if ($rs) {
            Session::put('notify_success', 'Thêm mới thành công');
            return redirect()->route('quan_li_bao_hiem');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $all_loai_bh = BaoHiemModel::getAllLoaiBh();
        $all_nhan_vien = NhanVienModel::getAll();
        $bao_hiem = BaoHiemModel::getById($id);
        return view('pages.quan_li_bao_hiem.sua_bao_hiem', ['all_loai_bh' => $all_loai_bh, 'bao_hiem' => $bao_hiem, 'all_nhan_vien' =>  $all_nhan_vien]);
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
            "so_bh" => $req->input('so_bh'),
            "ngay_cap" => $req->input('ngay_cap'),
            "noi_cap" => $req->input('noi_cap'),
            "noi_kham_benh" => $req->input('noi_kham_benh'),
            "ma_nv" => $req->input('ma_nv'),
            "ma_loai_bh" => $req->input('ma_loai_bh'),
        ];

        $this->validate($req, [
            'so_bh' => 'required',
            'ngay_cap' => 'required',
            'noi_cap' => 'required',
            'noi_kham_benh' => 'required'
        ], [
            'so_bh.required' => '*Chưa nhập số bảo hiểm',
            'noi_cap.required' => '*Chưa nhập nơi cấp',
            'noi_kham_benh.required' => '*Chưa nhập nơi khám bệnh',
            'ngay_cap.required' => '*Chưa nhập ngày cấp'
        ]);

        $rs = BaoHiemModel::edit($id, $data);

        if ($rs) {
            Session::put('notify_success', 'Sửa thành công');
            return redirect()->route('quan_li_bao_hiem');
        } else {
            echo "Loi";
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
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\KyLuatModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class KyLuatController extends Controller
{
    //
    public function index()
    {
        $all_ky_luat = KyLuatModel::getAll();
        return view('pages.ky_luat.quan_li_ky_luat', ['all_ky_luat' => $all_ky_luat]);
    }

    public function create()
    {
        return view('pages.ky_luat.them_ky_luat');
    }

    public function store(Request $req)
    {
        $ma_loai_kl = $req->input('ma_loai_kl');
        $ten_loai_kl = $req->input('ten_loai_kl');
        $tien_phat = $req->input('tien_phat');

        $this->validate($req, [
            'ma_loai_kl' => 'required|unique:loai_kl',
            'ten_loai_kl' => 'required|unique:loai_kl',
            'tien_phat' => 'required'
        ], [
            'ma_loai_kl.required' => '*Chưa nhập mã kỷ luât',
            'ma_loai_kl.unique' => '*Mã kỷ luật đã tồn tại',
            'ten_loai_kl.required' => '*Chưa nhập tên loại kỷ luật',
            'ten_loai_kl.unique' => 'Loại kỷ luật đã tồn tại',
            'tien_phat.required' => 'Chưa nhập tiền phạt'
        ]);

        $rs = KyLuatModel::store($ten_loai_kl, $tien_phat, $ma_loai_kl);

        if ($rs) {
            Session::put('notify_success', 'Thêm mới thành công');
            return redirect()->route('quan_li_ky_luat');
        } else {
            echo "loi";
            die;
        }
    }

    public function edit($id)
    {
        $ky_luat = KyLuatModel::getByID($id);
        return view('pages.ky_luat.sua_ky_luat', ['ky_luat' => $ky_luat]);
    }

    public function update($id, Request $req)
    {
        $ten_loai_kl = $req->input('ten_loai_kl');
        $tien_phat = $req->input('tien_phat');

        $this->validate($req, [
            'ten_loai_kl' => 'required|unique:loai_kl',
            'tien_phat' => 'required'
        ], [
            'ten_loai_kl.required' => '*Chưa nhập tên loại kỷ luật',
            'ten_loai_kl.unique' => 'Loại kỷ luật đã tồn tại',
            'tien_phat.required' => 'Chưa nhập tiền phạt'
        ]);

        $rs = KyLuatModel::edit($id, $ten_loai_kl, $tien_phat);

        if ($rs) {
            Session::put('notify_success', 'Sửa thành công');
            return redirect()->route('quan_li_ky_luat');
        } else {
            echo "loi";
            die;
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\KhenThuongModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KhenThuongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_khen_thuong = KhenThuongModel::getAll();
        return view('pages.khen_thuong.quan_li_khen_thuong', ['all_khen_thuong' => $all_khen_thuong]);
    }

    public function create()
    {
        return view('pages.khen_thuong.them_khen_thuong');
    }

    public function store(Request $req)
    {
        $ma_kt = $req->input('ma_kt');
        $loai_kt = $req->input('loai_kt');
        $tien_thuong = $req->input('tien_thuong');

        $this->validate($req, [
            'ma_kt' => 'required|unique:khen_thuong',
            'loai_kt' => 'required|unique:khen_thuong',
            'tien_thuong' => 'required'
        ], [
            'ma_kt.required' => '*Chưa nhập mã khen thưởng',
            'ma_kt.unique' => '*Mã khen thưởng đã tồn tại',
            'loai_kt.required' => '*Chưa nhập tên loại khen thưởng',
            'loai_kt.unique' => 'Loại khen thưởng đã tồn tại',
            'tien_thuong.required' => 'Chưa nhập tiền thưởng'
        ]);

        $rs = KhenThuongModel::store($loai_kt, $tien_thuong, $ma_kt);

        if ($rs) {
            Session::put('notify_success', 'Thêm mới thành công');
            return redirect()->route('quan_li_khen_thuong');
        } else {
            echo "loi";
            die;
        }
    }

    public function edit($id)
    {
        $khen_thuong = KhenThuongModel::getByID($id);
        return view('pages.khen_thuong.sua_khen_thuong', ['khen_thuong' => $khen_thuong]);
    }

    public function update($id, Request $req)
    {
        $loai_kt = $req->input('loai_kt');
        $tien_thuong = $req->input('tien_thuong');

        $this->validate($req, [
            'loai_kt' => 'required|unique:khen_thuong',
            'tien_thuong' => 'required'
        ], [
            'loai_kt.required' => '*Chưa nhập tên loại khen thưởng',
            'loai_kt.unique' => 'Loại khen thưởng đã tồn tại',
            'tien_thuong.required' => 'Chưa nhập tiền thưởng'
        ]);

        $rs = KhenThuongModel::edit($id, $loai_kt, $tien_thuong);

        if ($rs) {
            Session::put('notify_success', 'Sửa thành công');
            return redirect()->route('quan_li_khen_thuong');
        } else {
            echo "loi";
            die;
        }
    }
}

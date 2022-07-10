<?php

namespace App\Http\Controllers;

use App\Models\ChucVuModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ChucVuController extends Controller
{
    public function index()
    {
        $all_chuc_vu = ChucVuModel::getAll();
        return view('pages.quan_li_chuc_vu.quan_li_chuc_vu', ['all_chuc_vu' => $all_chuc_vu]);
    }
    public function create()
    {
        return view('pages.quan_li_chuc_vu.them_chuc_vu');
    }
    public function store(Request $request)
    {
        $ten_chuc_vu = $request->input('ten_cv');
        $luong_trach_nhiem = $request->input('luong_trach_nhiem');

        $this->validate($request, [
            'ten_cv' => 'required|unique:chuc_vu',
            'luong_trach_nhiem' => 'required'
        ], [
            'ten_cv.required' => '*Chưa nhập tên chức vụ',
            'ten_cv.unique' => '*Chức vụ đã tồn tại',
            'luong_trach_nhiem.required' => '*Chưa nhập lương trách nhiệm'
        ]);

        $rs = ChucVuModel::store($ten_chuc_vu, $luong_trach_nhiem);

        if ($rs) {
            Session::put('notify_success', 'Thêm mới thành công');
            return redirect()->route('quan_li_chuc_vu');
        } else {
            echo "loi";
            die;
        }
    }
    public function edit($id)
    {
        $chuc_vu = ChucVuModel::getByID($id);
        return view('pages.quan_li_chuc_vu.sua_chuc_vu', ['chuc_vu' => $chuc_vu]);
    }

    public function update($id, Request $req)
    {
        $ten_chuc_vu = $req->input('ten_cv');
        $luong_trach_nhiem = $req->input('luong_trach_nhiem');

        $this->validate($req, [
            'ten_cv' => 'required|unique:chuc_vu',
            'luong_trach_nhiem' => 'required'
        ], [
            'ten_cv.required' => '*Chưa nhập tên chức vụ',
            'ten_cv.unique' => '*Chức vụ đã tồn tại',
            'luong_trach_nhiem.required' => '*Chưa nhập lương trách nhiệm'
        ]);

        $rs = ChucVuModel::edit($id, $ten_chuc_vu, $luong_trach_nhiem);

        if ($rs) {
            Session::put('notify_success', 'Sửa thành công');
            return redirect()->route('quan_li_chuc_vu');
        } else {
            echo "loi";
            die;
        }
    }
}

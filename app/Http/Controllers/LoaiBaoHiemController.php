<?php

namespace App\Http\Controllers;

use App\Models\LoaiBaoHiemModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoaiBaoHiemController extends Controller
{
    public function index()
    {
        $all_loai_bh = LoaiBaoHiemModel::getAll();
        // dd($all_loai_bh);
        return view('pages.quan_li_loai_bh.quan_li_loai_bh', ['all_loai_bh' => $all_loai_bh]);
    }
    public function create()
    {
        return view('pages.quan_li_loai_bh.them_loai_bh');
    }
    public function store(Request $req)
    {
        $ten_loai_bh = $req->input('ten_loai_bh');

        $this->validate($req, [
            'ten_loai_bh' => 'required|unique:loai_bao_hiem'
        ], [
            'ten_loai_bh.required' => '*Chưa nhập tên loại bảo hiểm',
            'ten_loai_bh.unique' => '*Loại bảo hiểm đã tồn tại'
        ]);

        $rs = LoaiBaoHiemModel::store($ten_loai_bh);

        if ($rs) {
            Session::put('notify_success', 'Thêm mới thành công');
            return redirect()->route('quan_li_loai_bh');
        } else {
            echo "loi";
            die;
        }
    }
    public function edit($id)
    {
        $loai_bh = LoaiBaoHiemModel::getByID($id);
        return view('pages.quan_li_loai_bh.sua_loai_bh', ['loai_bh' => $loai_bh]);
    }

    public function update($id, Request $req)
    {
        $ten_loai_bh = $req->input('ten_loai_bh');

        $this->validate($req, [
            'ten_loai_bh' => 'required|unique:loai_bao_hiem'
        ], [
            'ten_loai_bh.unique' => '*Loại bảo hiểm đã tồn tại',
            'ten_loai_bh.required' => '*Chưa nhập tên loại bảo hiểm'

        ]);

        $rs = LoaiBaoHiemModel::edit($id, $ten_loai_bh);

        if ($rs) {
            Session::put('notify_success', 'Sửa thành công');
            return redirect()->route('quan_li_loai_bh');
        } else {
            echo "loi";
            die;
        }
    }
}

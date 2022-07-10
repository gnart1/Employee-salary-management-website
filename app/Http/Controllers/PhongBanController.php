<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhongBanModel;
use Illuminate\Support\Facades\Session;

class PhongBanController extends Controller
{
    public function index()
    {
        $all_phong_ban = PhongBanModel::getAll();
        return view('pages.quan_li_phong_ban.quan_li_phong_ban', ['all_phong_ban' => $all_phong_ban]);
    }
    public function create()
    {
        return view('pages.quan_li_phong_ban.them_phong_ban');
    }
    public function store(Request $req)
    {
        $ten_phong_ban = $req->input('ten_pb');

        $this->validate($req, [
            'ten_pb' => 'required|unique:phong_ban'
        ], [
            'ten_pb.required' => '*Chưa nhập tên phòng ban',
            'ten_pb.unique' => '*Phòng ban đã tồn tại'
        ]);

        $rs = PhongBanModel::store($ten_phong_ban);

        if ($rs) {
            Session::put('notify_success', 'Thêm mới thành công');
            return redirect()->route('quan_li_phong_ban');
        } else {
            echo "loi";
            die;
        }
    }
    public function edit($id)
    {
        $phong_ban = PhongBanModel::getByID($id);
        return view('pages.quan_li_phong_ban.sua_phong_ban', ['phong_ban' => $phong_ban]);
    }

    public function update($id, Request $req)
    {
        $ten_phong_ban = $req->input('ten_pb');

        $this->validate($req, [
            'ten_pb' => 'required|unique:phong_ban'
        ], [
            'ten_pb.required' => '*Chưa nhập phòng ban',
            'ten_pb.unique' => '*Phòng ban đã tồn tại'
        ]);

        $rs = PhongBanModel::edit($id, $ten_phong_ban);

        if ($rs) {
            Session::put('notify_success', 'Sửa thành công');
            return redirect()->route('quan_li_phong_ban');
        } else {
            echo "loi";
            die;
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\TrinhDoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TrinhDoController extends Controller
{
    public function index()
    {
        $all_trinh_do = TrinhDoModel::getAll();
        return view('pages.quan_li_trinh_do.quan_li_trinh_do', ['all_trinh_do' => $all_trinh_do]);
    }
    public function create()
    {
        return view('pages.quan_li_trinh_do.them_trinh_do');
    }
    public function store(Request $req)
    {
        $ten_trinh_do = $req->input('ten_td');

        $this->validate($req, [
            'ten_td' => 'required|unique:trinh_do'
        ], [
            'ten_td.required' => '*Chưa nhập tên trình độ',
            'ten_td.unique' => '*Trùng tên trình độ'
        ]);

        $rs = TrinhDoModel::store($ten_trinh_do);

        if ($rs) {
            Session::put('notify_success', 'Thêm mới thành công');
            return redirect()->route('quan_li_trinh_do');
        } else {
            echo "loi";
            die;
        }
    }
    public function edit($id)
    {
        $trinh_do = TrinhDoModel::getByID($id);
        return view('pages.quan_li_trinh_do.sua_trinh_do', ['trinh_do' => $trinh_do]);
    }

    public function update($id, Request $req)
    {
        $ten_trinh_do = $req->input('ten_td');

        $this->validate($req, [
            'ten_td' => 'required|unique:trinh_do'
        ], [
            'ten_td.required' => '*Chưa nhập tên trình độ',
            'ten_td.unique' => '*Trùng tên trình độ'
        ]);

        $rs = TrinhDoModel::edit($id, $ten_trinh_do);

        if ($rs) {
            Session::put('notify_success', 'Sửa thành công');
            return redirect()->route('quan_li_trinh_do');
        } else {
            echo "loi";
            die;
        }
    }
}

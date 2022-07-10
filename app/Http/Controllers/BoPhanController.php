<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BoPhanModel;
use Illuminate\Support\Facades\Session;

class BoPhanController extends Controller
{
    public function index()
    {
        $all_bo_phan = BoPhanModel::getAll();
        return view('pages.quan_li_bo_phan.quan_li_bo_phan', ['all_bo_phan' => $all_bo_phan]);
    }
    public function create()
    {
        return view('pages.quan_li_bo_phan.them_bo_phan');
    }
    public function store(Request $req)
    {
        $ten_bo_phan = $req->input('ten_bp');

        $this->validate($req, [
            'ten_bp' => 'required|unique:bo_phan',
        ], [
            'ten_bp.required' => '*Chưa nhập tên bộ phận',
            'ten_bp.unique' => '*Bộ phận đã tồn tại',
        ]);

        $rs = BoPhanModel::store($ten_bo_phan);

        if ($rs) {
            Session::put('notify_success', 'Thêm mới thành công');
            return redirect()->route('quan_li_bo_phan');
        } else {
            echo "loi";
            die;
        }
    }
    public function edit($id)
    {
        $bo_phan = BoPhanModel::getByID($id);
        return view('pages.quan_li_bo_phan.sua_bo_phan', ['bo_phan' => $bo_phan]);
    }

    public function update($id, Request $req)
    {
        $ten_bo_phan = $req->input('ten_bp');
        $this->validate($req, [
            'ten_bp' => 'required|unique:bo_phan',
        ], [
            'ten_bp.required' => '*Chưa nhập tên bộ phận',
            'ten_bp.unique' => '*Bộ phận đã tồn tại',
        ]);

        $rs = BoPhanModel::edit($id, $ten_bo_phan);

        if ($rs) {
            Session::put('notify_success', 'Sửa thành công');
            return redirect()->route('quan_li_bo_phan');
        } else {
            echo "loi";
            die;
        }
    }
}

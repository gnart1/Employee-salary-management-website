<?php

namespace App\Http\Controllers;

use App\Models\NhanVienModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NhanVienController extends Controller
{
    public function index()
    {
        $all_nhan_vien = NhanVienModel::getAll();
        return view('pages.quan_li_nhan_vien.quan_li_nhan_vien', ['all_nhan_vien' => $all_nhan_vien]);
    }
    public function create()
    {
        $all_bo_phan = NhanVienModel::getAllBoPhan();
        $all_phong_ban = NhanVienModel::getAllPhongBan();
        $all_chuc_vu = NhanVienModel::getAllChucVu();
        $all_trinh_do = NhanVienModel::getAllTrinhDo();
        $all_vai_tro = NhanVienModel::getAllVaiTro();
        return view('pages.quan_li_nhan_vien.them_nhan_vien', [
            'all_bo_phan' => $all_bo_phan,
            'all_phong_ban' => $all_phong_ban,
            'all_chuc_vu' => $all_chuc_vu,
            'all_trinh_do' => $all_trinh_do,
            'all_vai_tro' => $all_vai_tro
        ]);
    }
    public function store(Request $req){
        $req->validate([
            'dien_thoai' => ['regex:/^0{1}\d{9}$/g'],
            'cccd' => 'digits:12',
        ]);
        $data = [
            'ho_ten' => $req->input('name'),
            'email' => $req->input('email'),
            'password' => bcrypt($req->input('password')),
            'gioi_tinh' => $req->input('gender'),
            'status' => 1,
            'dia_chi' => $req->input('address'),
            'ngay_sinh' => $req->input('dob'),
            'dien_thoai' => $req->input('phone'),
            'cccd' => $req->input('cccd'),
            'ma_pb' => $req->input('ma_pb'),
            'ma_bp' => $req->input('ma_bp'),
            'ma_cv' => $req->input('ma_cv'),
            'ma_td' => $req->input('ma_td'),
        ];

        // dd($data);

        $rs = NhanVienModel::store($data);

        if($rs) {
            $email = $data['email'];
            $nhan_vien = User::where('email',$email )->firstOrFail();
            $nhan_vien->syncRoles('user');
            Session::put('notify_success', 'Tạo mới thành công');
            return redirect()->route('quan_li_nhan_vien');
        }
        else{
            echo "loi";
            die;
        }
    }
    public function edit($id)
    {
        $nhan_vien = NhanVienModel::getByID($id);
        $all_bo_phan = NhanVienModel::getAllBoPhan();
        $all_phong_ban = NhanVienModel::getAllPhongBan();
        $all_chuc_vu = NhanVienModel::getAllChucVu();
        $all_trinh_do = NhanVienModel::getAllTrinhDo();
        $all_vai_tro = NhanVienModel::getAllVaiTro();

        // dd($nhan_vien);

        return view('pages.quan_li_nhan_vien.sua_nhan_vien', [
            'nhan_vien' => $nhan_vien,
            'all_bo_phan' => $all_bo_phan,
            'all_phong_ban' => $all_phong_ban,
            'all_chuc_vu' => $all_chuc_vu,
            'all_trinh_do' => $all_trinh_do,
            'all_vai_tro' => $all_vai_tro
        ]);
    }

    public function update($id, Request $req)
    {
        $data = [
            'ho_ten' => $req->input('name'),
            'email' => $req->input('email'),
            'gioi_tinh' => $req->input('gender'),
            'status' => $req->input('status'),
            'dia_chi' => $req->input('address'),
            'ngay_sinh' => $req->input('dob'),
            'dien_thoai' => $req->input('phone'),
            'cccd' => $req->input('cccd'),
            'ma_pb' => $req->input('ma_pb'),
            'ma_bp' => $req->input('ma_bp'),
            'ma_cv' => $req->input('ma_cv'),
            'ma_td' => $req->input('ma_td'),
        ];
        $rs = NhanVienModel::edit($id, $data);

        if($rs) {
            Session::put('notify_success', 'Sửa thành công');
            return redirect()->route('quan_li_nhan_vien');
        }
        else{
            Session::put('notify_success', 'Sửa thành công');
            return redirect()->route('quan_li_nhan_vien');
        }
    }

    public function searchNhanVien(Request $request)
    {
    if($request->ajax())
        {
            $keyword = $request->keyword;
            $output="";
            $nhan_viens= NhanVienModel::searchNhanVien($keyword);
            if($nhan_viens)
            {
                foreach ($nhan_viens as $nhan_vien) {
                $output.= '<option value='.$nhan_vien->id.'>'.$nhan_vien->ho_ten.'</option>';
                }
            }

            return response()->json(['nhan_viens'=> $output], 200);
        }
    }
}

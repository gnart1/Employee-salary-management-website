<?php

namespace App\Http\Controllers;

use App\Models\ChamCongModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ChamCongController extends Controller
{
    public function index()
    {
        return view('pages.cham_cong.cham_cong');
    }

    public function chamCongDen(Request $request)
    {
        if(!auth()->user()->status) {
            Session::put('notify_danger', "Tài khoản của bạn chưa đượck kích hoạt");
            return redirect()->back();
        }

        $user_id = Auth::id();
        $today_str = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $cham_cong = ChamCongModel::getGioVao($user_id, $today_str);
        $work_time = Carbon::parse("09:00:00");
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $now_str = $now->toTimeString();

        $hop_dong =  ChamCongModel::getHopDongNhanVien($user_id);
        $ngay_het_han = Carbon::parse($hop_dong->ngay_ket_thuc)->setTimeZone('Asia/Ho_Chi_Minh');

        if($now >= $ngay_het_han) {
            Session::put('notify_danger', "Hợp đồng của bạn đã hết hạn");
            return redirect()->back();
        }

        if($cham_cong) {
            Session::put('notify_danger', "Bạn đã chấm công hôm nay rồi");
            return redirect()->back();
        }

        if ($now > $work_time) {
            $late_minutes = $work_time->diffInMinutes($now);
            if ($late_minutes <= 30) {
                $ma_loai_kl = 1;
            }
            if ($late_minutes > 30) {
                $ma_loai_kl = 2;
            }
        } else {
            $now_str = $work_time->toTimeString();
            $ma_loai_kl = 3;
        }
        $data = [
            'ma_nv'=> Auth::id(),
            'ngay' => $today_str,
            'gio_vao' => $now_str,
            'ma_loai_kl' => $ma_loai_kl
        ];
        $rs = ChamCongModel::chamCongDen($data);
        if ($rs) {
            $ma_bc = ChamCongModel::getCurrentItem($data)->ma_bc;
            Session::put('ma_bc', $ma_bc);
            Session::put('notify_success', "Chấm công đến thành công");
            return redirect()->route('cham_cong');
        } else {
            echo "Lỗi";
            die;
        }
    }
    public function chamCongVe()
    {
        $user_id = Auth::id();
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $today_str = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $gio_ra = Carbon::parse("18:00:00");
        $gio_ra_str = $gio_ra->toTimeString();
        $bang_cong = ChamCongModel::getGioVao($user_id, $today_str);
        $gio_vao = Carbon::parse($bang_cong->gio_vao);
        $thoi_gian = $gio_vao->diffInMinutes($gio_ra) / 60.0;

        if ($bang_cong->ma_loai_kl === 2) {
            $thoi_gian = 0;
        }

        if ($now <  $gio_ra) {
            Session::put('notify_danger', 'Bạn phải đợi đến 18h');
            return redirect()->back();
        }

        $rs = ChamCongModel::chamCongVe($user_id, $gio_ra_str, $thoi_gian, $today_str);
        if ($rs) {
            Session::put('notify_success', "Chấm công về thành công");
            Session::put('ma_bc', null);
            return redirect()->route('cham_cong', ['checkout' => true]);
        } else {
            echo "Lỗi";
            die;
        }
    }
}

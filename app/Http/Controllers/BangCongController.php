<?php

namespace App\Http\Controllers;

use App\Models\BangCongModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BangCongController extends Controller
{
    public function index()
    {
        $all_bang_cong = BangCongModel::getAll();
        return view(
            'pages.quan_li_bang_cong.quan_li_bang_cong',
            ['all_bang_cong' => $all_bang_cong],
        );
    }

    public function bangCongCaNhan()
    {
        $all_bang_cong = BangCongModel::getById(Auth::id());
        return view(
            'pages.quan_li_bang_cong.bang_cong_ca_nhan',
            ['all_bang_cong' => $all_bang_cong],
        );
    }

    public function filterBangCong(Request $request)
    {
        if ($request->ajax()) {
            $month_year = $request->month_year;
            list($year, $month) = explode("-", $month_year);
            $output = "";
            $bang_congs = BangCongModel::filterBangCong($month, $year);
            
            foreach ($bang_congs as $bang_cong) {
                $output .= '<tr>
                            <td>' . $bang_cong->ma_nv . '</td>
                            <td>' . $bang_cong->ho_ten . '</td>
                            <td>' . $bang_cong->ngay . '</td>
                            <td>' . $bang_cong->gio_vao . '</td>
                            <td>' . $bang_cong->gio_ra . '</td>
                            <td>' . $bang_cong->thoi_gian . '</td>
                            <td>' . $bang_cong->ten_loai_kl . '</td>
                            <td>' . $bang_cong->tien_thuong . '</td>
                            <td>' . $bang_cong->tien_phat . '</td>
                        </tr>';
                }
                return response()->json(['bang_congs' => $output], 200);
            }
        }

    public function filterBangCongCaNhan(Request $request)
    {
        if ($request->ajax()) {
            $month_year = $request->month_year;
            list($year, $month) = explode("-", $month_year);
            $output = "";
            $bang_congs = BangCongModel::filterBangCongCaNhan($month, $year, Auth::id());
            
            foreach ($bang_congs as $bang_cong) {
                $output .= '<tr>
                                <td>' . $bang_cong->ngay . '</td>
                                <td>' . $bang_cong->gio_vao . '</td>
                                <td>' . $bang_cong->gio_ra . '</td>
                                <td>' . $bang_cong->thoi_gian . '</td>
                                <td>' . $bang_cong->ten_loai_kl . '</td>
                                <td>' . $bang_cong->tien_phat . '</td>
                            </tr>';
                }
                return response()->json(['bang_congs' => $output], 200);
            }
        }
}

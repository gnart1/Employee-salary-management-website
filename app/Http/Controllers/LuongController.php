<?php

namespace App\Http\Controllers;

use App\Models\LuongModel;
use Illuminate\Http\Request;

class LuongController extends Controller
{
    public function index()
    {
        return view(
            'pages.luong.quan_li_luong',
        );
    }

    public function filterLuong(Request $request)
    {
        if ($request->ajax()) {
            $month_year = $request->month_year;
            list($year, $month) = explode("-", $month_year);
            // dd($year,$month);
            $output = "";
            $luongs = LuongModel::filterLuong($month, $year);
            if ($luongs) {
                //dd($luongs);
                foreach ($luongs as $luong) {
                    $ma_nv = $luong->id;
                    $luong_thang_nay = $luong->luong;
                    $luong->luong_thang_nay = $luong_thang_nay;
                    //$no_thang_truoc = LuongModel::getTienNoThangTruoc($ma_nv ,$month, $year);
                    //$tien_no_thang_truoc = 0;
                    // $tien_no_thang_nay = 0;
                    // if ($no_thang_truoc) {
                    //     $tien_no_thang_truoc = $no_thang_truoc->so_tien;
                    //     if ($luong_thang_nay - $no_thang_truoc->so_tien < 0) {
                    //         $luong->luong = 0;
                    //         $total = abs($luong_thang_nay - $no_thang_truoc->so_tien);
                    //         $luong->tien_no_thang_nay = $total;
                    //         $tien_no_thang_nay = $total;
                    //         $no_thang_nay = LuongModel::getTienNoThangNay($ma_nv ,$month, $year);
                    //         if (!$no_thang_nay) {
                    //             LuongModel::storeTienNo($ma_nv ,$month, $year, $total);
                    //         } else {
                    //             $tien_no_thang_nay = $no_thang_nay->so_tien;
                    //         }
                    //         LuongModel::resolveNo($ma_nv ,$no_thang_truoc->thang, $no_thang_truoc->nam);
                    //         $luong->tien_no_thang_truoc = $tien_no_thang_truoc;
                    //         $luong->tien_no_thang_nay = $tien_no_thang_nay;
                    //     } else {
                    //         $luong->luong = $luong->luong - $no_thang_truoc->so_tien;
                    //         LuongModel::resolveNo($ma_nv ,$no_thang_truoc->thang, $no_thang_truoc->nam);
                    //         $luong->tien_no_thang_truoc = $tien_no_thang_truoc;
                    //         $luong->tien_no_thang_nay = 0;
                    //     }<td>' . $luong->tien_no_thang_truoc . '</td><td>' . $luong->tien_no_thang_nay . '</td><td>' . $luong->luong_thang_nay . '</td>  
                    // }
                    $output .=   '<tr>
                                <td>' . $luong->ho_ten . '</td>
                                <td>' . $luong->ten_cv . '</td>
                                <td>' . $luong->tong_tien_phat . '</td>
                                <td>' . $luong->luong_trach_nhiem . '</td>
                                <td>' . $luong->tong_so_ngay . '</td>
                                <td>' . $luong->luong_mot_ngay . '</td>                                             
                                <td>' . $luong->luong . '</td>
                                
                            </tr>';
                            //dd($output);
                    }

                }
            return response()->json(['luongs' => $output], 200);
        }
    }
}

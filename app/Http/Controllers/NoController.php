<?php

namespace App\Http\Controllers;

use App\Models\NoModel;
use Illuminate\Http\Request;

class NoController extends Controller
{
    public function index()
    {
        return view(
            'pages.no.quan_li_no',
        );
    }

    public function filterNo(Request $request)
    {
        if ($request->ajax()) {
            $month_year = $request->month_year;
            list($year, $month) = explode("-", $month_year);
            $output = "";
            $nos = NoModel::filterNo($month, $year);
            
            foreach ($nos as $no) {
                $status = '';
                if ($no->status == 0) {
                    $status = 'Còn nợ';
                } else {
                    $status = 'Đã trả';
                }
                $output .=   '<tr>
                            <td>' . $no->ho_ten . '</td>
                            <td>' . $no->thang . '</td>
                            <td>' . $no->nam . '</td>
                            <td>' . $no->so_tien . '</td>
                            <td>' . $status . '</td>
                        </tr>';
                }
                return response()->json(['nos' => $output], 200);
            }
        }
}


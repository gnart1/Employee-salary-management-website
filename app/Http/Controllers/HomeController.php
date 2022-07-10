<?php

namespace App\Http\Controllers;

use App\Models\BoPhanModel;
use App\Models\ChucVuModel;
use App\Models\HomeModel;
use App\Models\NhanVienModel;
use App\Models\PhongBanModel;
use App\Models\TrinhDoModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $total_nhan_vien = NhanVienModel::getAll()->count();
        $total_bo_phan = BoPhanModel::getAll()->count();
        $total_trinh_do = TrinhDoModel::getAll()->count();
        $total_phong_ban = PhongBanModel::getAll()->count();
        
        $all_chuc_vu = ChucVuModel::getAll();
        $all_trinh_do = TrinhDoModel::getAll();

        $sundayLastMonth = Carbon::parse('last sunday')->format('Y-m-d');
        $late_count = HomeModel::getWorkStatusOfEmployee($sundayLastMonth, 1);
        $off_count = HomeModel::getWorkStatusOfEmployee($sundayLastMonth, 2);

        $late_arr = array();
        foreach ($late_count as $late) {
            $date = Carbon::parse($late->ngay);
            switch ($date) {
                case $date->isMonday(): $late_arr[0] = $late->total;
                break;
                case $date->isTuesday(): $late_arr[1] = $late->total;
                break;
                case $date->isWednesday(): $late_arr[2] = $late->total;
                break;
                case $date->isThursday(): $late_arr[3] = $late->total;
                break;
                case $date->isFriday(): $late_arr[4] = $late->total;
                break;
                // default: dd(1);
            }
        }
        for ($i=0; $i < 5; $i++) { 
            $late_arr[$i] ?? array_splice($late_arr, $i, 0, 0);
        }

        $off_arr = array();
        foreach ($off_count as $off) {
            $date = Carbon::parse($off->ngay);
            switch ($date) {
                case $date->isMonday(): $off_arr[0] = $off->total;
                break;
                case $date->isTuesday(): $off_arr[1] = $off->total;
                break;
                case $date->isWednesday(): $off_arr[2] = $off->total;
                break;
                case $date->isThursday(): $off_arr[3] = $off->total;
                break;
                case $date->isFriday(): $off_arr[4] = $off->total;
                break;
                // default: dd(1);
            }
        }
        for ($i=0; $i < 5; $i++) { 
            $off_arr[$i] ?? array_splice($off_arr, $i, 0, 0);
        }
      
        return view('dashboard', [
            'total_nhan_vien' => $total_nhan_vien,
            'total_bo_phan' => $total_bo_phan,
            'total_phong_ban' => $total_phong_ban,
            'total_trinh_do' => $total_trinh_do,
            'all_chuc_vu' => $all_chuc_vu,
            'all_trinh_do' => $all_trinh_do,
            'late_arr' => $late_arr,
            'off_arr' => $off_arr
        ]);
    }
}

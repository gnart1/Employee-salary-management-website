<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
    // Chấm công
    Route::get('/cham_cong', 'App\Http\Controllers\ChamCongController@index')->name('cham_cong');
    Route::post('/luu_cham_cong_den', 'App\Http\Controllers\ChamCongController@chamCongDen')->name('luu_cham_cong_den');
    Route::post('/luu_cham_cong_ve', 'App\Http\Controllers\ChamCongController@chamCongVe')->name('luu_cham_cong_ve');

    //Profile
    Route::get('/sua_profile', 'App\Http\Controllers\ProfileController@edit')->name('sua_profile');
    Route::post('/update_profile', 'App\Http\Controllers\ProfileController@update')->name('update_profile');
    Route::post('/change_password', 'App\Http\Controllers\ProfileController@password')->name('change_password');

    Route::group(['middleware' => 'role:super_admin|admin'], function () {
        // Hoat dong
        Route::get('/hoat_dong', 'App\Http\Controllers\HoatDongController@index')->name('hoat_dong');
        Route::get('/them_hoat_dong', 'App\Http\Controllers\HoatDongController@create')->name('them_hoat_dong');
        Route::post('/luu_them_hoat_dong', 'App\Http\Controllers\HoatDongController@store')->name('luu_them_hoat_dong');
        Route::post('/update_hoat_dong/{id}', 'App\Http\Controllers\HoatDongController@update')->name('update_hoat_dong');
        Route::get('/sua_hoat_dong/{id}', 'App\Http\Controllers\HoatDongController@edit')->name('sua_hoat_dong');

        // Chuc vu
        Route::get('/quan_li_chuc_vu', 'App\Http\Controllers\ChucVuController@index')->name('quan_li_chuc_vu');
        Route::get('/them_chuc_vu', 'App\Http\Controllers\ChucVuController@create')->name('them_chuc_vu');
        Route::post('/luu_them_chuc_vu', 'App\Http\Controllers\ChucVuController@store')->name('luu_them_chuc_vu');
        Route::post('/update_chuc_vu/{id}', 'App\Http\Controllers\ChucVuController@update')->name('update_chuc_vu');
        Route::get('/sua_chuc_vu/{id}', 'App\Http\Controllers\ChucVuController@edit')->name('sua_chuc_vu');

        // Trinh do
        Route::get('/quan_li_trinh_do', 'App\Http\Controllers\TrinhDoController@index')->name('quan_li_trinh_do');
        Route::get('/them_trinh_do', 'App\Http\Controllers\TrinhDoController@create')->name('them_trinh_do');
        Route::post('/luu_them_trinh_do', 'App\Http\Controllers\TrinhDoController@store')->name('luu_them_trinh_do');
        Route::get('/sua_trinh_do/{id}', 'App\Http\Controllers\TrinhDoController@edit')->name('sua_trinh_do');
        Route::post('/update_trinh_do/{id}', 'App\Http\Controllers\TrinhDoController@update')->name('update_trinh_do');

        // Tạo user
        Route::get('/quan_li_nhan_vien', 'App\Http\Controllers\NhanVienController@index')->name('quan_li_nhan_vien');
        Route::post('/luu_nhan_vien', 'App\Http\Controllers\NhanVienController@store')->name('luu_nhan_vien');
        Route::get('/tao_nhan_vien', 'App\Http\Controllers\NhanVienController@create')->name('tao_nhan_vien');
        Route::get('/sua_nhan_vien/{id}', 'App\Http\Controllers\NhanVienController@edit')->name('sua_nhan_vien');
        Route::post('/update_nhan_vien/{id}', 'App\Http\Controllers\NhanVienController@update')->name('update_nhan_vien');
        Route::get('/search_nhan_vien', 'App\Http\Controllers\NhanVienController@searchNhanVien');


        //Phòng ban
        Route::get('/quan_li_phong_ban', 'App\Http\Controllers\PhongBanController@index')->name('quan_li_phong_ban');
        Route::get('/them_phong_ban', 'App\Http\Controllers\PhongBanController@create')->name('them_phong_ban');
        Route::post('/luu_them_phong_ban', 'App\Http\Controllers\PhongBanController@store')->name('luu_them_phong_ban');
        Route::get('/sua_phong_ban/{id}', 'App\Http\Controllers\PhongBanController@edit')->name('sua_phong_ban');
        Route::post('/update_phong_ban/{id}', 'App\Http\Controllers\PhongBanController@update')->name('update_phong_ban');

        //Loại kỷ luật
        Route::get('/quan_li_ky_luat', 'App\Http\Controllers\KyLuatController@index')->name('quan_li_ky_luat');
        Route::get('/them_ky_luat', 'App\Http\Controllers\KyLuatController@create')->name('them_ky_luat');
        Route::post('/luu_them_ky_luat', 'App\Http\Controllers\KyLuatController@store')->name('luu_them_ky_luat');
        Route::get('/sua_ky_luat/{id}', 'App\Http\Controllers\KyLuatController@edit')->name('sua_ky_luat');
        Route::post('/update_ky_luat/{id}', 'App\Http\Controllers\KyLuatController@update')->name('update_ky_luat');

        //Loại khen thưởng
        Route::get('/quan_li_khen_thuong', 'App\Http\Controllers\KhenThuongController@index')->name('quan_li_khen_thuong');
        Route::get('/them_khen_thuong', 'App\Http\Controllers\KhenThuongController@create')->name('them_khen_thuong');
        Route::post('/luu_them_khen_thuong', 'App\Http\Controllers\KhenThuongController@store')->name('luu_them_khen_thuong');
        Route::get('/sua_khen_thuong/{id}', 'App\Http\Controllers\KhenThuongController@edit')->name('sua_khen_thuong');
        Route::post('/update_khen_thuong/{id}', 'App\Http\Controllers\KhenThuongController@update')->name('update_khen_thuong');

        //Bộ phận
        Route::get('/quan_li_bo_phan', 'App\Http\Controllers\BoPhanController@index')->name('quan_li_bo_phan');
        Route::get('/them_bo_phan', 'App\Http\Controllers\BoPhanController@create')->name('them_bo_phan');
        Route::post('/luu_them_bo_phan', 'App\Http\Controllers\BoPhanController@store')->name('luu_them_bo_phan');
        Route::get('/sua_bo_phan/{id}', 'App\Http\Controllers\BoPhanController@edit')->name('sua_bo_phan');
        Route::post('/update_bo_phan/{id}', 'App\Http\Controllers\BoPhanController@update')->name('update_bo_phan');

        //Bảo hiểm
        Route::get('/quan_li_bao_hiem', 'App\Http\Controllers\BaoHiemController@index')->name('quan_li_bao_hiem');
        Route::get('/them_bao_hiem', 'App\Http\Controllers\BaoHiemController@create')->name('them_bao_hiem');
        Route::post('/luu_bao_hiem', 'App\Http\Controllers\BaoHiemController@store')->name('luu_bao_hiem');
        Route::get('/sua_bao_hiem/{id}', 'App\Http\Controllers\BaoHiemController@edit')->name('sua_bao_hiem');
        Route::post('/update_bao_hiem/{id}', 'App\Http\Controllers\BaoHiemController@update')->name('update_bao_hiem');

        //Loại bảo hiểm
        Route::get('/quan_li_loai_bh', 'App\Http\Controllers\LoaiBaoHiemController@index')->name('quan_li_loai_bh');
        Route::get('/them_loai_bh', 'App\Http\Controllers\LoaiBaoHiemController@create')->name('them_loai_bh');
        Route::post('/luu_loai_bh', 'App\Http\Controllers\LoaiBaoHiemController@store')->name('luu_loai_bh');
        Route::get('/sua_loai_bh/{id}', 'App\Http\Controllers\LoaiBaoHiemController@edit')->name('sua_loai_bh');
        Route::post('/update_loai_bh/{id}', 'App\Http\Controllers\LoaiBaoHiemController@update')->name('update_loai_bh');

        //Hợp đồng
        Route::get('/quan_li_hop_dong', 'App\Http\Controllers\HopDongController@index')->name('quan_li_hop_dong');
        Route::get('/them_hop_dong', 'App\Http\Controllers\HopDongController@create')->name('them_hop_dong');
        Route::post('/luu_hop_dong', 'App\Http\Controllers\HopDongController@store')->name('luu_hop_dong');
        Route::get('/sua_hop_dong/{id}', 'App\Http\Controllers\HopDongController@edit')->name('sua_hop_dong');
        Route::post('/update_hop_dong/{id}', 'App\Http\Controllers\HopDongController@update')->name('update_hop_dong');

        //Bảng công
        Route::get('/quan_li_bang_cong', 'App\Http\Controllers\BangCongController@index')->name('quan_li_bang_cong');
        Route::get('/filter_bang_cong', 'App\Http\Controllers\BangCongController@filterBangCong');
        // Route::get('/cham_cong', 'App\Http\Controllers\ChamCongController@index')->name('cham_cong');
        // Route::post('/luu_cham_cong_den', 'App\Http\Controllers\ChamCongController@chamCongDen')->name('luu_cham_cong_den');
        // Route::post('/luu_cham_cong_ve', 'App\Http\Controllers\ChamCongController@chamCongVe')->name('luu_cham_cong_ve');
        //Lương
        Route::get('/quan_li_luong', 'App\Http\Controllers\LuongController@index')->name('quan_li_luong');
        Route::get('/filter_luong', 'App\Http\Controllers\LuongController@filterLuong');
        Route::get('/quan_li_no', 'App\Http\Controllers\NoController@index')->name('quan_li_no');
        Route::get('/filter_no', 'App\Http\Controllers\NoController@filterNo');
    
        Route::group(['middleware' => 'role:super_admin'], function () {
            //Phân quyền
            Route::get('/them_quyen/{id}', 'App\Http\Controllers\PhanQuyenController@edit')->name('them_quyen');
            Route::post('/luu_quyen/{id}', 'App\Http\Controllers\PhanQuyenController@update')->name('luu_quyen');
        });

    });
    Route::group(['middleware' => 'role:user'], function () {
        //Bảng công
        Route::get('/bang_cong_ca_nhan', 'App\Http\Controllers\BangCongController@bangCongCaNhan')->name('bang_cong_ca_nhan');
        Route::get('/filter_bang_cong_ca_nhan', 'App\Http\Controllers\BangCongController@filterBangCongCaNhan');
    });

});

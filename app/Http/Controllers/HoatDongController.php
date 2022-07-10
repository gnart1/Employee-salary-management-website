<?php

namespace App\Http\Controllers;

use App\Models\BangCongModel;
use App\Models\HoatDongModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HoatDongController extends Controller
{
    public function index()
    {
        $all_hoat_dong = HoatDongModel::getAll();
        return view(
            'pages.hoat_dong.hoat_dong',
            ['all_hoat_dong' => $all_hoat_dong],
        );
    }

    public function create()
    {
        
    }

}
@extends('layouts.app', ['activePage' => 'cham_cong', 'titlePage' => __('Chấm công')])
@section('content')
    <br>
    <br><br><br>
    <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
            <div class="card card btn btn-info" style="color: white; text-align:center;">
                {{-- <div class="card-header card-header-rose"> --}}
                <div class="ct" style="margin-top:10%">
                    <h2><strong> Thông tin</strong></h2>
                    <br>
                    <p>Emall: <span>{{ auth()->user()->email }}</span></p>
                    <p>Họ tên: <span>{{ auth()->user()->ho_ten }}</span></p>
                    <p>Giới tính: <span>
                            @if (auth()->user()->ho_ten == 0)
                                Nữ
                            @else
                                Nam
                            @endif
                        </span></p>
                    <p>Ngày sinh: <span>{{ auth()->user()->ngay_sinh }}</span></p>
                    <p>Điện thoại: <span>{{ auth()->user()->dien_thoai }}</span></p>
                    <p>Căn cước công dân: <span>{{ auth()->user()->cccd }}</span></p>
                    <p>Địa chỉ: <span>{{ auth()->user()->dia_chi }}</span></p>
                    <br>
                </div>
                {{-- </div> --}}
                <div class="card-body">
                </div>
            </div>
            @if (!Session::get('ma_bc'))
                <form action="{{ route('luu_cham_cong_den') }}" method="post">
                    @csrf
                    <button style="margin-left:35%" class="btn btn-primary btn-round" href="">Chấm công đến</button>
                </form>
            @else
                <form action="{{ route('luu_cham_cong_ve') }}" method="post">
                    @csrf
                    <button class="btn btn-primary btn-round" href="">Chấm công về</button>
                </form>
            @endif

        </div>
    </div>
    </div>
@endsection

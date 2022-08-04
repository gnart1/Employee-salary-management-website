@extends('layouts.app', ['activePage' => 'them_hop_dong', 'titlePage' => __('Thêm hợp đồng')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('luu_hop_dong') }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('post')
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Thêm hợp đồng') }}</h4>
                            </div>
                            <div class="card-body ">
                                @if (session('status'))
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <i class="material-icons">close</i>
                                                </button>
                                                <span>{{ session('status') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Ngày bắt đầu') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('ngay_bat_dau') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('ngay_bat_dau') ? ' is-invalid' : '' }}"
                                                name="ngay_bat_dau" id="input-ngay_bat_dau" type="date"
                                                placeholder="{{ __('Ngày bắt đầu') }}" />
                                            @if ($errors->has('ngay_bat_dau'))
                                                <span id="ngay_bat_dau-error" class="error text-danger"
                                                    for="input-ngay_bat_dau">{{ $errors->first('ngay_bat_dau') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Ngày kết thúc') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('ngay_ket_thuc') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('ngay_ket_thuc') ? ' is-invalid' : '' }}"
                                                name="ngay_ket_thuc" id="input-ngay_ket_thuc" type="date"
                                                placeholder="{{ __('Ngày kết thúc') }}" />
                                            @if ($errors->has('ngay_ket_thuc'))
                                                <span id="ngay_ket_thuc-error" class="error text-danger"
                                                    for="input-ngay_ket_thuc">{{ $errors->first('ngay_ket_thuc') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Ngày ký') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('ngay_ky') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('ngay_ky') ? ' is-invalid' : '' }}"
                                                name="ngay_ky" id="input-ngay_ky" type="date"
                                                placeholder="{{ __('Ngày ký') }}" />
                                            @if ($errors->has('ngay_ky'))
                                                <span id="ngay_ky-error" class="error text-danger"
                                                    for="input-ngay_ky">{{ $errors->first('ngay_ky') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Nội dung') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('noi_dung') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('noi_dung') ? ' is-invalid' : '' }}"
                                                name="noi_dung" id="input-noi_dung" type="text"
                                                placeholder="{{ __('Nội dung') }}" />
                                            @if ($errors->has('noi_dung'))
                                                <span id="noi_dung-error" class="error text-danger"
                                                    for="input-noi_dung">{{ $errors->first('noi_dung') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Mã nhân viên') }}</label>
                                    <div class="col-sm-7">
                                        <input id="search-nhan-vien"
                                            class="form-control{{ $errors->has('ma_nv') ? ' is-invalid' : '' }}"
                                            name="ma_nv" list="datalistOptions" placeholder="Chọn nhân viên">
                                        <datalist id="datalistOptions"></datalist>
                                        @if ($errors->has('ma_nv'))
                                            <span id="ma_nv-error" class="error text-danger"
                                                for="input-ma_nv">{{ $errors->first('ma_nv') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Lương theo ngày') }}</label>
                                    <div class="col-sm-7">
                                        <input
                                            class="form-control{{ $errors->has('luong_mot_ngay') ? ' is-invalid' : '' }}"
                                            name="luong_mot_ngay" id="input-luong_mot_ngay" type="text"
                                            placeholder="{{ __('Lương một ngày') }}" />
                                        @if ($errors->has('luong_mot_ngay'))
                                            <span id="luong_mot_ngay-error" class="error text-danger"
                                                for="input-luong_mot_ngay">{{ $errors->first('luong_mot_ngay') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Gửi') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#search-nhan-vien').on('keyup', function() {
            $keyword = $(this).val();
            $.ajax({
                type: 'get',
                url: '/search_nhan_vien/',
                data: {
                    'keyword': $keyword
                },
                success: function(data) {
                    $('#datalistOptions').html(data.nhan_viens);
                }
            });
        })
    </script>
@endsection

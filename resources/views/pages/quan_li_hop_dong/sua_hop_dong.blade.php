@extends('layouts.app', ['activePage' => 'quan_li_hop_dong', 'titlePage' => __('Quản lí hợp đồng')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('update_hop_dong', ['id' => $hop_dong->ma_hd]) }}"
                        autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('post')
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Sửa hợp đồng') }}</h4>
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
                                                name="ngay_bat_dau" value="{{ $hop_dong->ngay_bat_dau }}"
                                                id="input-ngay_bat_dau" type="date"
                                                placeholder="{{ __('Sửa ngày bắt đầu') }}" />
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
                                                name="ngay_ket_thuc" value="{{ $hop_dong->ngay_ket_thuc }}"
                                                id="input-ngay_ket_thuc" type="date"
                                                placeholder="{{ __('Sửa ngày kết thúc') }}" />
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
                                                name="ngay_ky" value="{{ $hop_dong->ngay_ky }}" id="input-ngay_ky"
                                                type="date" placeholder="{{ __('Sửa ngày ký') }}" />
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
                                                name="noi_dung" value="{{ $hop_dong->noi_dung }}" id="input-noi_dung"
                                                type="text" placeholder="{{ __('Sửa nội dung') }}" />
                                            @if ($errors->has('noi_dung'))
                                                <span id="noi_dung-error" class="error text-danger"
                                                    for="input-noi_dung">{{ $errors->first('noi_dung') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Nhân viên') }}</label>
                                    <div class="col-sm-7">
                                        <select name="ma_nv" class="form-select" aria-label="Default select example">
                                            @foreach ($all_nhan_vien as $nhan_vien)
                                                <option value="{{ $nhan_vien->id }}"
                                                    {{ $nhan_vien->id === $hop_dong->ma_nv ? 'selected' : '' }}>
                                                    {{ $nhan_vien->ho_ten }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Lương theo ngày') }}</label>
                                    <div class="col-sm-7">
                                        <input
                                            class="form-control{{ $errors->has('luong_mot_ngay') ? ' is-invalid' : '' }}"
                                            name="luong_mot_ngay" value="{{ $hop_dong->luong_mot_ngay }}"
                                            id="input-luong_mot_ngay" type="text"
                                            placeholder="{{ __('Sửa lương theo ngày') }}" />
                                        @if ($errors->has('lương_mot_ngay'))
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
@endsection

@extends('layouts.app', ['activePage' => 'them_bao_hiem', 'titlePage' => __('Thêm bảo hiểm')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('luu_bao_hiem') }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('post')
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Thêm bảo hiểm') }}</h4>
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
                                    <label class="col-sm-2 col-form-label">{{ __('Số bảo hiểm') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('so_bh') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('so_bh') ? ' is-invalid' : '' }}"
                                                name="so_bh" id="input-so_bh" type="text"
                                                placeholder="{{ __('Số bảo hiểm') }}" />
                                            @if ($errors->has('so_bh'))
                                                <span id="so_bh-error" class="error text-danger"
                                                    for="input-so_bh">{{ $errors->first('so_bh') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Ngày cấp') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('ngay_cap') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('ngay_cap') ? ' is-invalid' : '' }}"
                                                name="ngay_cap" id="input-ngay_cap" type="date"
                                                placeholder="{{ __('Ngày cấp') }}" />
                                            @if ($errors->has('ngay_cap'))
                                                <span id="ngay_cap-error" class="error text-danger"
                                                    for="input-ngay_cap">{{ $errors->first('ngay_cap') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Nơi cấp') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('noi_cap') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('noi_cap') ? ' is-invalid' : '' }}"
                                                name="noi_cap" id="input-noi_cap" type="text"
                                                placeholder="{{ __('Nơi cấp') }}" />
                                            @if ($errors->has('noi_cap'))
                                                <span id="noi_cap-error" class="error text-danger"
                                                    for="input-noi_cap">{{ $errors->first('noi_cap') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Nơi khám bệnh') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('noi_kham_benh') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('noi_kham_benh') ? ' is-invalid' : '' }}"
                                                name="noi_kham_benh" id="input-noi_kham_benh" type="text"
                                                placeholder="{{ __('Nơi khám bệnh') }}" />
                                            @if ($errors->has('noi_kham_benh'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-noi_kham_benh">{{ $errors->first('noi_kham_benh') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Nhân viên') }}</label>
                                    <div class="col-sm-7">
                                        <select name="ma_nv" class="form-select" aria-label="Default select example"
                                            required>
                                            @foreach ($all_nhan_vien as $nhan_vien)
                                                <option value={{ $nhan_vien->id }}>{{ $nhan_vien->ho_ten }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Loại bảo hiểm') }}</label>
                                    <div class="col-sm-7">
                                        <select name="ma_loai_bh" class="form-select" aria-label="Default select example"
                                            required>
                                            @foreach ($all_loai_bh as $loai_bh)
                                                <option value={{ $loai_bh->ma_loai_bh }}>{{ $loai_bh->ten_loai_bh }}
                                                </option>
                                            @endforeach
                                        </select>
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

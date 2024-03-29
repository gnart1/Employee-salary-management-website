@extends('layouts.app', ['activePage' => 'them_hoat_dong', 'titlePage' => __('Thêm hoạt động')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('luu_them_hoat_dong') }}" autocomplete="off"
                        class="form-horizontal">
                        @csrf
                        @method('post')
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Thêm hoạt động') }}</h4>
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
                                    <label class="col-sm-2 col-form-label">{{ __('Tên hoạt động') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('ten_hd') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('ten_hd') ? ' is-invalid' : '' }}"
                                                name="ten_hd" id="input-ten_hd" type="text"
                                                placeholder="{{ __('Nhập tên...') }}" />
                                            @if ($errors->has('ten_hd'))
                                                <span id="ten_hd-error" class="error text-danger"
                                                    for="input-ten_hd">{{ $errors->first('ten_hd') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label text-right">{{ __('Phòng ban') }}</label>
                                    <div class="col-sm-3">
                                        <select name="ma_pb" class="form-select" aria-label="Default select example">
                                            @foreach($all_phong_ban as $phong_ban)
                                                <option value={{ $phong_ban->ma_pb }}  value="{{ old('ma_bp') }}" >{{ $phong_ban->ten_pb }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    
                                    <label class="col-sm-2 col-form-label text-right">{{ __('Thời gian') }}</label>
                                    <div class="col-sm-3">
                                    <div class="form-group{{ $errors->has('thoi_gian') ? ' has-danger' : '' }}">
                                        <input class="form-input{{ $errors->has('thoi_gian') ? ' is-invalid' : '' }}" name="thoi_gian" id="input-name" type="date" required="true" value="{{ old('thoi_gian') }}" aria-required="true"/>
                                        @if ($errors->has('thoi_gian'))
                                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('thoi_gian') }}</span>
                                        @endif
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Địa điểm') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('dia_diem') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('dia_diem') ? ' is-invalid' : '' }}"
                                                name="dia_diem" id="input-dia_diem" type="text"
                                                placeholder="{{ __('Nhập tên địa điểm...') }}" />
                                            @if ($errors->has('dia_diem'))
                                                <span id="dia_diem-error" class="error text-danger"
                                                    for="input-dia_diem">{{ $errors->first('dia_diem') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Tiền đóng') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('so_tien') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('so_tien') ? ' is-invalid' : '' }}"
                                                name="so_tien" id="input-so_tien" type="text"
                                                placeholder="{{ __('Nhập số tiền...') }}" />
                                            @if ($errors->has('so_tien'))
                                                <span id="so_tien-error" class="error text-danger"
                                                    for="input-so_tien">{{ $errors->first('so_tien') }}</span>
                                            @endif
                                        </div>
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

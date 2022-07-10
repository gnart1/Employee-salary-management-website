@extends('layouts.app', ['activePage' => 'quan_li_nhan_vien', 'titlePage' => __('Tạo tài khoản nhân viên')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('update_nhan_vien', ['id' => $nhan_vien->id]) }}" autocomplete="on" class="form-horizontal">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Sửa thông tin nhân viên') }}</h4>
              </div>
              <div class="card-body ">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <label class="col-sm-3 col-form-label text-right">{{ __('Tên nhân viên') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $nhan_vien->ho_ten }}" id="input-name" type="text" placeholder="{{ __('Nhập Họ Tên...') }}" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                    <label class="col-sm-3 col-form-label text-right">{{ __('Email') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="email" value="{{ $nhan_vien->email }}" id="input-name" type="text" placeholder="{{ __('Nhập Email...') }}" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true"/>
                        @if ($errors->has('name'))
                          <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-3 col-form-label text-right">{{ __('CCCD') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="cccd" value="{{ $nhan_vien->cccd }}" id="input-name" type="text" placeholder="{{ __('Nhập CCCD...') }}" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true"/>
                        @if ($errors->has('name'))
                          <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-3 col-form-label text-right">{{ __('Địa chỉ') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="address" value="{{ $nhan_vien->dia_chi }}" id="input-name" type="text" placeholder="{{ __('Nhập Địa Chỉ...') }}" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true"/>
                        @if ($errors->has('name'))
                          <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-3 col-form-label text-right">{{ __('Trạng thái') }}</label>
                    <div class="col-sm-2">
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                          <div class="form-check form-check-inline">
                              <input  type="radio" name="status" id="status1" value="1" {{ $nhan_vien->status === 1 ? 'checked' : ''}}>
                              <label class="form-check-label" for="status1">Active</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input  type="radio" name="status" id="status2" value="0" {{ $nhan_vien->status === 0 ? 'checked' : ''}}>
                            <label class="form-check-label" for="status2">Inactive</label>
                          </div>
                        </div>
                    </div>
                      <label class="col-sm-2 col-form-label text-right">{{ __('Số điện thoại') }}</label>
                        <div class="col-sm-3">
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="phone" value="{{ $nhan_vien->dien_thoai }}" id="input-name" type="text" placeholder="{{ __('Nhập SĐT...') }}" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true"/>
                                @if ($errors->has('name'))
                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                  <div class="row">
                    <label class="col-sm-3 col-form-label text-right">{{ __('Giới tính') }}</label>
                    <div class="col-sm-2">
                      <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <div class="form-check form-check-inline">
                            <input  type="radio" name="gender" id="gender" value="1" {{ $nhan_vien->gioi_tinh === 1 ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineRadio1">Nam</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input  type="radio" name="gender" id="gender" value="0" {{ $nhan_vien->gioi_tinh === 0 ? 'checked' : ''}}>
                            <label class="form-check-label" for="inlineRadio1">Nữ</label>
                        </div>
                      </div>
                    </div>

                    <label class="col-sm-2 col-form-label text-right">{{ __('Ngày sinh') }}</label>
                    <div class="col-sm-3">
                      <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <input class="form-input{{ $errors->has('name') ? ' is-invalid' : '' }}" name="dob" value="{{ $nhan_vien->ngay_sinh }}" id="input-name" type="date" required="true" aria-required="true"/>
                        @if ($errors->has('name'))
                          <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <label class="col-sm-3 col-form-label text-right">{{ __('Bộ phận') }}</label>
                    <div class="col-sm-2">
                        <select name="ma_bp" class="form-select" aria-label="Default select example">
                            @foreach($all_bo_phan as $bo_phan)
                                <option value="{{ $bo_phan->ma_bp }}" {{ $nhan_vien->ma_bp === $bo_phan->ma_bp ? 'selected' : ''}}>{{ $bo_phan->ten_bp }}</option>
                            @endforeach
                        </select>
                    </div>

                    <label class="col-sm-2 col-form-label text-right">{{ __('Phòng ban') }}</label>
                    <div class="col-sm-3">
                        <select name="ma_pb" class="form-select" aria-label="Default select example">
                            @foreach($all_phong_ban as $phong_ban)
                                <option value="{{ $phong_ban->ma_pb }}" {{ $nhan_vien->ma_pb === $phong_ban->ma_pb ? 'selected' : ''}}>{{ $phong_ban->ten_pb }}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>

                  <div class="row">
                    <label class="col-sm-3 col-form-label text-right">{{ __('Chức vụ') }}</label>
                    <div class="col-sm-2">
                        <select name="ma_cv" class="form-select" aria-label="Default select example">
                            @foreach($all_chuc_vu as $chuc_vu)
                                <option value="{{ $chuc_vu->ma_cv }}" {{ $nhan_vien->ma_cv ===  $chuc_vu->ma_cv ? 'selected' : ''}}>{{ $chuc_vu->ten_cv }}</option>
                            @endforeach
                        </select>
                    </div>

                    <label class="col-sm-2 col-form-label text-right">{{ __('Trình độ') }}</label>
                    <div class="col-sm-3">
                        <select name="ma_td" class="form-select" aria-label="Default select example">
                            @foreach($all_trinh_do as $trinh_do)
                                <option value="{{ $trinh_do->ma_td }}" {{ $nhan_vien->ma_td === $trinh_do->ma_td ? 'selected' : ''}}>{{ $trinh_do->ten_td }}</option>
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

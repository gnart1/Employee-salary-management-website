@extends('layouts.app', ['activePage' => 'tao_nhan_vien', 'titlePage' => __('Tạo tài khoản nhân viên')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('luu_nhan_vien') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Tạo tài khoản nhân viên') }}</h4>
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
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Nhập Họ Tên...') }}" value="{{ old('name') }}"  required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                    <label class="col-sm-3 col-form-label text-right">{{ __('Email') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-name" type="text" placeholder="{{ __('Nhập Email...') }}"  value="{{ old('email') }}" required="true" aria-required="true"/>
                        @if ($errors->has('email'))
                          <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('email') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-3 col-form-label text-right">{{ __('Password') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="password" id="input-name" type="password" placeholder="{{ __('Nhập Mật Khẩu...') }}" value="{{ old('password') }}"   required="true" aria-required="true"/>
                        @if ($errors->has('password'))
                          <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('password') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-3 col-form-label text-right">{{ __('Reset Password') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('repassword') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('repassword') ? ' is-invalid' : '' }}" name="repassword" id="input-name" type="password" placeholder="{{ __('Nhập Lại Mật Khẩu...') }}" value="{{ old('repassword') }}"   required="true" aria-required="true"/>
                        @if ($errors->has('repassword'))
                          <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('repassword') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-3 col-form-label text-right">{{ __('CCCD') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('cccd') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('cccd') ? ' is-invalid' : '' }}" name="cccd" id="input-name" type="text" placeholder="{{ __('Nhập CCCD...') }}" value="{{ old('cccd') }}" required="true" aria-required="true"/>
                        @if ($errors->has('cccd'))
                          <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('cccd') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-sm-3 col-form-label text-right">{{ __('Địa chỉ') }}</label>
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" id="input-name" type="text" placeholder="{{ __('Nhập Địa Chỉ...') }}" value="{{ old('address') }}" required="true" aria-required="true"/>
                        @if ($errors->has('address'))
                          <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('address') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                      <label class="col-sm-3 col-form-label text-right">{{ __('Số điện thoại') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" id="input-name" type="text" placeholder="{{ __('Nhập SĐT...') }}" value="{{ old('phone') }}" required="true" aria-required="true"/>
                                @if ($errors->has('phone'))
                                <span id="naphoneme-error" class="error text-danger" for="input-name">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                  <div class="row">
                    <label class="col-sm-3 col-form-label text-right">{{ __('Giới tính') }}</label>
                    <div class="col-sm-2">
                        <div>
                            <input type="radio" name="gender" id="gender1" value="1" value="{{ old('gender') }}" checked>
                            <label class="form-check-label mr-2" for="gender1">Nam</label>
                            <input type="radio" name="gender" id="gender0" value="0" value="{{ old('gender') }}">
                            <label class="form-check-label" for="gender0">Nữ</label>
                        </div>
                    </div>

                    <label class="col-sm-2 col-form-label text-right">{{ __('Ngày sinh') }}</label>
                    <div class="col-sm-3">
                      <div class="form-group{{ $errors->has('dob') ? ' has-danger' : '' }}">
                        <input class="form-input{{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" id="input-name" type="date" required="true" value="{{ old('dob') }}" aria-required="true"/>
                        @if ($errors->has('dob'))
                          <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('dob') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <label class="col-sm-3 col-form-label text-right">{{ __('Bộ phận') }}</label>
                    <div class="col-sm-2">
                        <select name="ma_bp" class="form-select" aria-label="Default select example">
                            @foreach($all_bo_phan as $bo_phan)
                                <option  value={{ $bo_phan->ma_bp }} value="{{ old('ma_bp') }}">{{ $bo_phan->ten_bp }}</option>
                            @endforeach
                        </select>
                    </div>

                    <label class="col-sm-2 col-form-label text-right">{{ __('Phòng ban') }}</label>
                    <div class="col-sm-3">
                        <select name="ma_pb" class="form-select" aria-label="Default select example">
                            @foreach($all_phong_ban as $phong_ban)
                                <option value={{ $phong_ban->ma_pb }}  value="{{ old('ma_bp') }}" >{{ $phong_ban->ten_pb }}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>

                  <div class="row">
                    <label class="col-sm-3 col-form-label text-right">{{ __('Chức vụ') }}</label>
                    <div class="col-sm-2">
                        <select name="ma_cv" class="form-select" aria-label="Default select example">
                            @foreach($all_chuc_vu as $chuc_vu)
                                <option value={{ $chuc_vu->ma_cv }}  value="{{ old('ma_bp') }}">{{ $chuc_vu->ten_cv }}</option>
                            @endforeach
                        </select>
                    </div>

                    <label class="col-sm-2 col-form-label text-right">{{ __('Trình độ') }}</label>
                    <div class="col-sm-3">
                        <select name="ma_td" class="form-select" aria-label="Default select example">
                            @foreach($all_trinh_do as $trinh_do)
                                <option value={{ $trinh_do->ma_td }}  value="{{ old('ma_bp') }}">{{ $trinh_do->ten_td }}</option>
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

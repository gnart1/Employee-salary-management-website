@extends('layouts.app', ['activePage' => 'them_ky_luat', 'titlePage' => __('Thêm loại kỷ luật')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('luu_them_ky_luat') }}" autocomplete="off"
                        class="form-horizontal">
                        @csrf
                        @method('post')
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Thêm loại kỷ luật') }}</h4>
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
                                    <label class="col-sm-2 col-form-label">{{ __('Mã loại kỷ luật') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('ma_loai_kl') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('ma_loai_kl') ? ' is-invalid' : '' }}"
                                                name="ma_loai_kl" id="input-ten_loai_kl" type="text"
                                                placeholder="{{ __('Mã loại kỷ luật') }}" />
                                            @if ($errors->has('ma_loai_kl'))
                                                <span id="ma_loai_kl-error" class="error text-danger"
                                                    for="input-ma_loai_kl">{{ $errors->first('ma_loai_kl') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Tên loại kỷ luật') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('ten_loai_kl') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('ten_loai_kl') ? ' is-invalid' : '' }}"
                                                name="ten_loai_kl" id="input-ten_loai_kl" type="text"
                                                placeholder="{{ __('Tên loại kỷ luật') }}" />
                                            @if ($errors->has('ten_loai_kl'))
                                                <span id="ten_loai_kl-error" class="error text-danger"
                                                    for="input-ten_loai_kl">{{ $errors->first('ten_loai_kl') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Tiền phạt') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('teien_phat') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('tien_phat') ? ' is-invalid' : '' }}"
                                                name="tien_phat" id="input-teien_phat" type="text"
                                                placeholder="{{ __('Tiền phạt') }}" />
                                            @if ($errors->has('tien_phat'))
                                                <span id="tien_phat-error" class="error text-danger"
                                                    for="input-tien_phat">{{ $errors->first('tien_phat') }}</span>
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

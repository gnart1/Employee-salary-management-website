@extends('layouts.app', ['activePage' => 'them_chuc_vu', 'titlePage' => __('Thêm chức vụ')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('luu_them_chuc_vu') }}" autocomplete="off"
                        class="form-horizontal">
                        @csrf
                        @method('post')
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Thêm chức vụ') }}</h4>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Tên chức vụ') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('ten_cv') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('ten_cv') ? ' is-invalid' : '' }}"
                                                name="ten_cv" id="input-ten_cv" type="text"
                                                placeholder="{{ __('Nhập tên chức vụ') }}" />
                                            @if ($errors->has('ten_cv'))
                                                <span id="ten_cv-error" class="error text-danger"
                                                    for="input-ten_cv">{{ $errors->first('ten_cv') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Lương trách nhiệm') }}</label>
                                    <div class="col-sm-7">
                                        <div
                                            class="form-group{{ $errors->has('luong_trach_nhiem') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('luong_trach_nhiem') ? ' is-invalid' : '' }}"
                                                name="luong_trach_nhiem" id="input-luong_trach_nhiem" type="text"
                                                placeholder="{{ __('nhập số lương') }}" />
                                            @if ($errors->has('ten_cv'))
                                                <span id="luong_trach_nhiem-error" class="error text-danger"
                                                    for="input-luong_trach_nhiem">{{ $errors->first('luong_trach_nhiem') }}</span>
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

@extends('layouts.app', ['activePage' => 'quan_li_chuc_vu', 'titlePage' => __('Sửa chức vụ')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('update_chuc_vu', ['id' => $chuc_vu->ma_cv]) }}"
                        autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('post')
                        <div class="card ">
                            @if (session('status'))
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="alert alert-success">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                                <i class="material-icons">close</i>
                                            </button>
                                            <span>{{ session('status') }}</span>
                                            {{ session()->forget('status') }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Sửa chức vụ') }}</h4>
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
                                    <label class="col-sm-2 col-form-label">{{ __('Tên chức vụ') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('ten_cv') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('ten_cv') ? ' is-invalid' : '' }}"
                                                name="ten_cv" value="{{ $chuc_vu->ten_cv }}" id="input-ten_cv" type="text"
                                                placeholder="{{ __('Tên chức vụ') }}" />
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
                                                name="luong_trach_nhiem" value="{{ $chuc_vu->luong_trach_nhiem }}"
                                                id="input-luong_trach_nhiem" type="text"
                                                placeholder="{{ __('Lương trách nhiệm') }}" />
                                            @if ($errors->has('luong_trach_nhiem'))
                                                <span id="luong_trach_nhiem-error" class="error text-danger"
                                                    for="input-luong_trach_nhiem">{{ $errors->first('luong_trach_nhiem') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Gửi') }}</button>
              </div>
        </div>
    </div>
@endsection

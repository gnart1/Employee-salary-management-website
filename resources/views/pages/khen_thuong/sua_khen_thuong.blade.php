@extends('layouts.app', ['activePage' => 'quan_li_khen_thuong', 'titlePage' => __('Sửa khen thưởng')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('update_khen_thuong', ['id' => $khen_thuong->ma_kt]) }}"
                        autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('post')
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Sửa khen thưởng') }}</h4>
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
                                    <label class="col-sm-2 col-form-label">{{ __('Tên loại khen thưởng') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('loai_kt') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('loai_kt') ? ' is-invalid' : '' }}"
                                                name="loai_kt" value="{{ $khen_thuong->loai_kt }}"
                                                id="input-loai_kt" type="text" />
                                            @if ($errors->has('loai_kt'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-loai_kt">{{ $errors->first('loai_kt') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Tiền thưởng') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('tien_thuong') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('tien_thuong') ? ' is-invalid' : '' }}"
                                                name="tien_thuong" value="{{ $khen_thuong->tien_thuong }}" id="input-loai_kt"
                                                type="text" />
                                            @if ($errors->has('tien_thuong'))
                                                <span id="tien_thuong-error" class="error text-danger"
                                                    for="input-tien_thuong">{{ $errors->first('tien_thuong') }}</span>
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

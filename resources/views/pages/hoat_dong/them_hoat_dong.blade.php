@extends('layouts.app', ['activePage' => 'them_hoat_dong', 'titlePage' => __('Thêm hoạt động')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('luu_them_bo_phan') }}" autocomplete="off"
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
                                    <label class="col-sm-2 col-form-label">{{ __('Tên bộ phận') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('ten_bp') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('ten_bp') ? ' is-invalid' : '' }}"
                                                name="ten_bp" id="input-ten_bp" type="text"
                                                placeholder="{{ __('Nhập tên...') }}" />
                                            @if ($errors->has('ten_bp'))
                                                <span id="ten_bp-error" class="error text-danger"
                                                    for="input-ten_bp">{{ $errors->first('ten_bp') }}</span>
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

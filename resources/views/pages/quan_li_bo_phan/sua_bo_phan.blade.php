@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('Sửa bộ phận')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('update_bo_phan', ['id' => $bo_phan->ma_bp]) }}"
                        autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('post')
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Sửa bộ phận') }}</h4>
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
                                            <input class="form-control{{ $errors->has('ten-bp') ? ' is-invalid' : '' }}"
                                                name="ten_bp" value="{{ $bo_phan->ten_bp }}" id="input-ten_bp" type="text"
                                                placeholder="{{ __('Tên bộ phận') }}" />
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

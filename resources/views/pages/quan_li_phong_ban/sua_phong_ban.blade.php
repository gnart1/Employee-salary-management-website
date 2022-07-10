@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('Sửa phòng ban')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('update_phong_ban', ['id' => $phong_ban->ma_pb]) }}"
                        autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('post')
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Sửa phòng ban') }}</h4>
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
                                    <label class="col-sm-2 col-form-label">{{ __('Tên phòng bàn') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('ten_pb') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('ten_pb') ? ' is-invalid' : '' }}"
                                                name="ten_pb" value="{{ $phong_ban->ten_pb }}" id="input-ten_pb"
                                                type="text" placeholder="{{ __('Sửa tên') }}" />
                                            @if ($errors->has('ten_pb'))
                                                <span id="ten_pb-error" class="error text-danger"
                                                    for="input-ten_pb">{{ $errors->first('ten_pb') }}</span>
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

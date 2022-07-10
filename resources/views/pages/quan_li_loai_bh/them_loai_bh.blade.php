@extends('layouts.app', ['activePage' => 'them_loai_bh', 'titlePage' => __('Thêm loại bảo hiểm')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('luu_loai_bh') }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('post')
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Thêm loại bảo hiểm') }}</h4>
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
                                    <label class="col-sm-2 col-form-label">{{ __('Tên loại bảo hiểm') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('ten_loai_bh') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('ten_loai_bh') ? ' is-invalid' : '' }}"
                                                name="ten_loai_bh" id="input-ten_loai_bh" type="text"
                                                placeholder="{{ __('Tên loại bảo hiểm') }}" />
                                            @if ($errors->has('ten_loai_bh'))
                                                <span id="ten_loai_bh-error" class="error text-danger"
                                                    for="input-ten_loai_bh">{{ $errors->first('ten_loai_bh') }}</span>
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

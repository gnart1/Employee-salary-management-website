@extends('layouts.app', ['activePage' => 'them_trinh_do', 'titlePage' => __('Thêm trình độ')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('luu_them_trinh_do') }}" autocomplete="off"
                        class="form-horizontal">
                        @csrf
                        @method('post')

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Thêm trình độ') }}</h4>
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
                                    <label class="col-sm-2 col-form-label">{{ __('Tên trình độ') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('ten_td') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('ten_td') ? ' is-invalid' : '' }}"
                                                name="ten_td" id="input-ten_td" type="text"
                                                placeholder="{{ __('Tên trình độ') }}" />
                                            @if ($errors->has('ten_td'))
                                                <span id="ten_td-error" class="error text-danger"
                                                    for="input-ten_td">{{ $errors->first('ten_td') }}</span>
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

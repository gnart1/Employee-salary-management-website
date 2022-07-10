@extends('layouts.app', ['activePage' => 'quan_li_nhan_vien', 'titlePage' => __('Thêm quyền')])
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('luu_quyen', ['id' => $user_id]) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Thêm chức vụ') }}</h4>
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
                  <label class="col-sm-2 col-form-label">{{ __('Vai trò') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                       @foreach($all_vai_tro as $vai_tro)
                            @if($vai_tro->name !== "super_admin")
                                <input name="vai_tro" style="margin-left: 10px" type="radio" value={{$vai_tro->name}} {{$vai_tro_user->role_id === $vai_tro->id ? "checked" : ""}} >
                                <span >{{$vai_tro->name}}</span>
                            @endif
                       @endforeach
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

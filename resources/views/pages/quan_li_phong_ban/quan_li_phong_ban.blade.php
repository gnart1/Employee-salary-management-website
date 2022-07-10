@extends('layouts.app', ['activePage' => 'quan_li_phong_ban', 'titlePage' => __('Quản lí phòng ban ')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Quản lí phòng ban</h4>
                            <p class="card-category"></p>
                            <button type="button" class="btn btn-info">
                                <a href={{ route('them_phong_ban') }} class="text-white">Thêm phòng bàn</a>
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data-table" class="table table-striped compact" style="text-align: center">
                                    <thead class=" text-primary">
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Tên phòng ban
                                        </th>
                                        <th class="text-center">Action</th>
                                    </thead>
                                    <tbody>
                                        @forelse ($all_phong_ban as $phong_ban)
                                            <tr>
                                                <td>{{ $phong_ban->ma_pb }}</td>
                                                <td>{{ $phong_ban->ten_pb }}</td>
                                                <td class="">
                                                    <button type="button" class="btn btn-primary">
                                                        <a href={{ route('sua_phong_ban', ['id' => $phong_ban->ma_pb]) }}
                                                            class="text-white">Sửa</a>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <p>Không tìm thấy bản ghi nào</p>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

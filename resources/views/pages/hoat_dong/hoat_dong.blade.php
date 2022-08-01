@extends('layouts.app', ['activePage' => 'hoat_dong', 'titlePage' => __('Hoạt động')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Hoạt động</h4>
                            <p class="card-category"></p>
                            <button type="button" class="btn btn-info">
                                <a href={{ route('them_hoat_dong') }} class="text-white">Thêm hoạt động</a>
                            </button>
                        </div>
                        <div class="card-body">
                            {{-- <span>Chọn thời gian: </span>
                            <input type="month" id="datepicker1" name="datepicker1" /> --}}
                            <div class="table-responsive">
                                <table id="data-table" class="table">
                                    <thead class=" text-primary">
                                        <th>
                                            Tên hoạt động
                                        </th>
                                        <th>
                                            Tên phòng ban
                                        </th>
                                        <th>
                                            Thời gian
                                        </th>
                                        <th>
                                            Địa điểm
                                        </th>
                                        <th>
                                            Tiền đóng
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </thead>
                                    <tbody>
                                        @forelse ($all_hoat_dong as $hoat_dong)
                                        <tr>
                                            <td>{{ $hoat_dong->ten_hd }}</td>
                                            <td>{{ $hoat_dong->ten_pb }}</td>
                                            <td>{{ $hoat_dong->thoi_gian }}</td>
                                            <td>{{ $hoat_dong->dia_diem }}</td>
                                            <td>{{ $hoat_dong->so_tien }}</td>
                                            <td class="">
                                                <button type="button" class="btn btn-primary">
                                                    <a href={{ route('sua_hoat_dong', ['id' => $hoat_dong->ma_hd]) }}
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

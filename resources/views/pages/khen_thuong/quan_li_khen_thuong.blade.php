@extends('layouts.app', ['activePage' => 'quan_li_khen_thuong', 'titlePage' => __('Quản lí khen thưởng')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Quản lí khen thưởng</h4>
                            <p class="card-category"></p>
                            <button type="button" class="btn btn-info">
                                <a href={{ route('them_khen_thuong') }} class="text-white">Thêm khen thưởng</a>
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
                                            Loại khen thưởng
                                        </th>
                                        <th>
                                            Tiền thưởng
                                        </th>
                                        <th class="text-center">Action</th>
                                    </thead>
                                    <tbody>
                                        @forelse ($all_khen_thuong as $khen_thuong)
                                            <tr>
                                                <td>{{ $khen_thuong->ma_kt }}</td>
                                                <td>{{ $khen_thuong->loai_kt }}</td>
                                                <td>{{ $khen_thuong->tien_thuong }}</td>
                                                <td class="">
                                                    <button type="button" class="btn btn-primary">
                                                        <a href={{ route('sua_khen_thuong', ['id' => $khen_thuong->ma_kt]) }}
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

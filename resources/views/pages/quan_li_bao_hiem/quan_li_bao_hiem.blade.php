@extends('layouts.app', ['activePage' => 'quan_li_bao_hiem', 'titlePage' => __('Quản lí bảo hiểm')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Quản lí bảo hiểm</h4>
                            <p class="card-category"></p>
                            <button type="button" class="btn btn-info">
                                <a href={{ route('them_bao_hiem') }} class="text-white">Thêm bảo hiểm</a>
                            </button>
                        </div>
                        <div class="card-body">
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
                            <div class="table-responsive">
                                <table id="data-table" class="table table-striped compact" style="text-align: center">
                                    <thead class=" text-primary">
                                        <th>
                                            Số BH
                                        </th>
                                        <th>
                                            Loại BH
                                        </th>
                                        <th>
                                            Họ tên
                                        </th>
                                        <th>
                                            Ngày sinh
                                        </th>
                                        <th>
                                            Ngày cấp
                                        </th>
                                        <th>
                                            Nơi cấp
                                        </th>
                                        <th>
                                            Nơi khám
                                        </th>
                                        <th class="text-center">Action</th>
                                    </thead>
                                    <tbody>
                                        @forelse ($all_bao_hiem as $bao_hiem)
                                            <tr>
                                                <td>{{ $bao_hiem->so_bh }}</td>
                                                <td>{{ $bao_hiem->ten_loai_bh }}</td>
                                                <td>{{ $bao_hiem->ho_ten }}</td>
                                                <td>{{ $bao_hiem->ngay_sinh }}</td>
                                                <td>{{ $bao_hiem->ngay_cap }}</td>
                                                <td>{{ $bao_hiem->noi_cap }}</td>
                                                <td>{{ $bao_hiem->noi_kham_benh }}</td>
                                                <td class="">
                                                    <button type="button" class="btn btn-primary">
                                                        <a href={{ route('sua_bao_hiem', ['id' => $bao_hiem->ma_bh]) }}
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

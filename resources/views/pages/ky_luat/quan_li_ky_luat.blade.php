@extends('layouts.app', ['activePage' => 'quan_li_loai_kl', 'titlePage' => __('Quản lí loại kỷ luật')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Quản lí loại kỷ luật</h4>
                            <p class="card-category"></p>
                            <button type="button" class="btn btn-info">
                                <a href={{ route('them_ky_luat') }} class="text-white">Thêm loại kỷ luật</a>
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
                                            Loại kỷ luật
                                        </th>
                                        <th>
                                            Tiền phạt
                                        </th>
                                        <th class="text-center">Action</th>
                                    </thead>
                                    <tbody>
                                        @forelse ($all_ky_luat as $ky_luat)
                                            <tr>
                                                <td>{{ $ky_luat->ma_loai_kl }}</td>
                                                <td>{{ $ky_luat->ten_loai_kl }}</td>
                                                <td>{{ $ky_luat->tien_phat }}</td>
                                                <td class="">
                                                    <button type="button" class="btn btn-primary">
                                                        <a href={{ route('sua_ky_luat', ['id' => $ky_luat->ma_loai_kl]) }}
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

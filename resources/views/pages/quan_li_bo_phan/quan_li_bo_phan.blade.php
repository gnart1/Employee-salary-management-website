@extends('layouts.app', ['activePage' => 'quan_li_bo_phan', 'titlePage' => __('Quản lí bộ phận')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Quản lí bộ phận</h4>
                            <p class="card-category"></p>
                            <button type="button" class="btn btn-info">
                                <a href={{ route('them_bo_phan') }} class="text-white">Thêm bộ phận</a>
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
                                            Tên bộ phận
                                        </th>
                                        <th class="text-center">Action</th>
                                    </thead>
                                    <tbody>
                                        @forelse ($all_bo_phan as $bo_phan)
                                            <tr>
                                                <td>{{ $bo_phan->ma_bp }}</td>
                                                <td>{{ $bo_phan->ten_bp }}</td>
                                                <td class="">
                                                    <button type="button" class="btn btn-primary">
                                                        <a href={{ route('sua_bo_phan', ['id' => $bo_phan->ma_bp]) }}
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

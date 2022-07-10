@extends('layouts.app', ['activePage' => 'quan_li_chuc_vu', 'titlePage' => __('Quản lí chức vụ')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Quản lí chức vụ</h4>
                            <p class="card-category"></p>
                            <button type="button" class="btn btn-info">
                                <a href={{ route('them_chuc_vu') }} class="text-white">Thêm chức vụ</a>
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
                                            Tên chức vụ
                                        </th>
                                        <th>Lương trach nhiem</th>
                                        <th class="text-center">Action</th>
                                    </thead>
                                    <tbody>
                                        @forelse ($all_chuc_vu as $chuc_vu)
                                            <tr>
                                                <td>{{ $chuc_vu->ma_cv }}</td>
                                                <td>{{ $chuc_vu->ten_cv }}</td>
                                                <td>{{ $chuc_vu->luong_trach_nhiem }}</td>
                                                <td class="">
                                                    <button type="button" class="btn btn-primary">
                                                        <a href={{ route('sua_chuc_vu', ['id' => $chuc_vu->ma_cv]) }}
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

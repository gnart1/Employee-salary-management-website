@extends('layouts.app', ['activePage' => 'quan_li_trinh_do', 'titlePage' => __('Quản lí trình độ')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Quản lí trình độ</h4>
                            <p class="card-category"></p>
                            <button type="button" class="btn btn-info">
                                <a href={{ route('them_trinh_do') }} class="text-white">Thêm trình độ</a>
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
                                            Tên trình độ
                                        </th>
                                        <th class="text-center">Action</th>
                                    </thead>
                                    <tbody>
                                        @forelse ($all_trinh_do as $trinh_do)
                                            <tr>
                                                <td>{{ $trinh_do->ma_td }}</td>
                                                <td>{{ $trinh_do->ten_td }}</td>
                                                <td class="">
                                                    <button type="button" class="btn btn-primary">
                                                        <a href={{ route('sua_trinh_do', ['id' => $trinh_do->ma_td]) }}
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

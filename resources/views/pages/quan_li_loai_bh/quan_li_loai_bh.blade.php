@extends('layouts.app', ['activePage' => 'quan_li_loai_bh', 'titlePage' => __('Quản lí loại bảo hiểm')])

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Quản lí loại bảo hiểm</h4>
              <p class="card-category"></p>
              <button type="button" class="btn btn-info">
                  <a href={{ route('them_loai_bh') }} class="text-white">Thêm loại bảo hiểm</a>
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
                      Tên loại bảo hiểm
                    </th>
                    <th class="text-center">Action</th>
                  </thead>
                  <tbody>
                    @forelse ($all_loai_bh as $loai_bh)
                        <tr>
                            <td>{{ $loai_bh->ma_loai_bh }}</td>
                            <td>{{ $loai_bh->ten_loai_bh }}</td>
                            <td class="">
                                <button type="button" class="btn btn-primary">
                                    <a href={{ route('sua_loai_bh', ['id' => $loai_bh->ma_loai_bh]) }} class="text-white">Sửa</a>
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

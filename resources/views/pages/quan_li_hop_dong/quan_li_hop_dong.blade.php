@extends('layouts.app', ['activePage' => 'quan_li_hop_dong', 'titlePage' => __('Quản lí hợp đồng')])

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Quản lí hợp đồng</h4>
              <p class="card-category"></p>
              <button type="button" class="btn btn-info">
                  <a href={{ route('them_hop_dong') }} class="text-white">Thêm hợp đồng</a>
              </button>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="data-table" class="table table-striped compact" style="text-align: center">
                  <thead class=" text-primary">
                    <th>
                      Ngày bắt đầu
                    </th>
                    <th>
                      Ngày kết thúc
                    </th>
                    <th>
                      Ngày ký
                    </th>
                    <th>
                      nội dung
                    </th>
                    <th>
                      Thời hạn
                    </th>
                    <th>
                      Tên nhân viên
                    </th>
                    <th>
                      Lương theo ngày
                    </th>
                    <th  class="text-center">Action</th>
                  </thead>
                  <tbody>
                    @forelse ($all_hop_dong as $hop_dong)
                        <tr>
                            <td>{{ $hop_dong->ngay_bat_dau }}</td>
                            <td>{{ $hop_dong->ngay_ket_thuc }}</td>
                            <td>{{ $hop_dong->ngay_ky }}</td>
                            <td>{{ $hop_dong->noi_dung }}</td>
                            <td>{{ $hop_dong->thoi_han }} tháng</td>
                            <td>{{ $hop_dong->ho_ten }}</td>
                            <td>{{ $hop_dong->luong_mot_ngay }}</td>
                            <td class="">
                                <button type="button" class="btn btn-primary">
                                    <a href={{ route('sua_hop_dong', ['id' => $hop_dong->ma_hd]) }} class="text-white">Sửa</a>
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

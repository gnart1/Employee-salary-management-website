@extends('layouts.app', ['activePage' => 'quan_li_nhan_vien', 'titlePage' => __('Quản lí nhân viên')])

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Quản lí nhân viên</h4>
              <p class="card-category"></p>
              <button type="button" class="btn btn-info">
                  <a href={{ route('tao_nhan_vien') }} class="text-white">Tạo tài khoản nhân viên</a>
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
                      Tên
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Giới tính
                    </th>
                    <th>
                        Ngày sinh
                    </th>
                    <th>
                        SĐT
                    </th>
                    <th>
                        Phòng
                    </th>
                    <th>
                        Bộ phận
                    </th>
                    <th>
                        Chúc vụ
                    </th>
                    <th>
                        Vai trò
                    </th>
                    <th  class="text-center">Action</th>
                  </thead>
                  <tbody>
                    @forelse ($all_nhan_vien as $nhan_vien)
                        <tr style="text-align: center">
                            <td>{{ $nhan_vien->id }}</td>
                            <td>{{ $nhan_vien->ho_ten }}</td>
                            <td>{{ $nhan_vien->status === 1 ? "Active" : "Inactive" }}</td>
                            <td>{{ $nhan_vien->gioi_tinh === 1 ? "Nam" : "Nữ"}}</td>
                            <td>{{ $nhan_vien->ngay_sinh }}</td>
                            <td>{{ $nhan_vien->dien_thoai }}</td>
                            <td>{{ $nhan_vien->ten_pb }}</td>
                            <td>{{ $nhan_vien->ten_bp }}</td>
                            <td>{{ $nhan_vien->ten_cv }}</td>
                            <td>{{ $nhan_vien->vai_tro }}</td>
                            <td class="">
                                <button type="button" class="btn btn-primary">
                                    <a href={{ route('sua_nhan_vien', ['id' => $nhan_vien->id]) }} class="text-white">Sửa</a>
                                </button>

                            @role('super_admin')

                                @if($nhan_vien->vai_tro !== "super_admin")
                                    <button type="button" class="btn btn-info">
                                        <a href={{ route('them_quyen', ['id' => $nhan_vien->id]) }} class="text-white">Phân quyền</a>
                                    </button>
                                @endif
                            </td>
                            @endrole
                            {{-- <td>
                                <button type="button" class="btn btn-danger">
                                    <a href="" class="text-white">Xóa</a>
                                </button>
                            </td> --}}
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

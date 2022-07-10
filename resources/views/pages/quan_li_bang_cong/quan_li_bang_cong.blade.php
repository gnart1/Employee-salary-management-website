@extends('layouts.app', ['activePage' => 'quan_li_bang_cong', 'titlePage' => __('Quản lí bảng công')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Quản lí bảng công</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <span>Chọn thời gian: </span>
                            <input type="month" id="datepicker1" name="datepicker1" />
                            <div class="table-responsive">
                                <table id="data-table" class="table table-striped compact" style="text-align: center">
                                    <thead class=" text-primary">
                                        <th>
                                            Mã nhân viên
                                        </th>
                                        <th>
                                            Tên nhân viên
                                        </th>
                                        <th>
                                            Ngày
                                        </th>
                                        <th>
                                            Giờ vào
                                        </th>
                                        <th>
                                            Giờ ra
                                        </th>
                                        <th>
                                            Thời gian làm việc
                                        </th>
                                        <th>
                                            Trạng thái
                                        </th>
                                        <th>Phạt</th>
                                    </thead>
                                    <tbody>
                                        @forelse ($all_bang_cong as $bang_cong)
                                            <tr>
                                                <td>{{ $bang_cong->ma_nv }}</td>
                                                <td>{{ $bang_cong->ho_ten }}</td>
                                                <td>{{ $bang_cong->ngay }}</td>
                                                <td>{{ $bang_cong->gio_vao }}</td>
                                                <td>{{ $bang_cong->gio_ra }}</td>
                                                <td>{{ $bang_cong->thoi_gian }}</td>
                                                <td>{{ $bang_cong->ten_loai_kl }}</td>
                                                <td>{{ $bang_cong->tien_phat }}</td>
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
    <script type="text/javascript">
        $('#datepicker1').on('change',function(e){
            $value= e.currentTarget.value;
            $.ajax({
                type : 'get',
                url : '/filter_bang_cong/',
                data:{'month_year':$value},
                success:function(data){
                    if (data.bang_congs.length) {
                        data_table.destroy();
                        $('tbody').html(data.bang_congs);

                        data_table = $('#data-table').DataTable({
                            "dom": '<"toolbar">frtip'
                        });
                        $("#data-table_filter").css("margin-right", "10px");
                        $("#data-table_length").css("margin-left", "10px");
                    } else {
                        $('tbody').html("");
                    }
                    
                }
            });
        })
    </script>
@endsection

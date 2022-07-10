@extends('layouts.app', ['activePage' => 'quan_li_luong', 'titlePage' => __('Quản lí lương')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Quản lí lương</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <span>Chọn thời gian: </span>
                            <input type="month" id="datepicker1" name="datepicker1" />
                            <div class="table-responsive">
                                <table id="data-table" class="table">
                                    <thead class=" text-primary">
                                        <th>
                                            Tên nhân viên
                                        </th>
                                        <th>
                                            Tên chức vụ
                                        </th>
                                        <th>
                                            Tiền phạt
                                        </th>
                                        <th>Lương trách nhiệm</th>
                                        <th>
                                            Số ngày làm
                                        </th>
                                        {{-- <th>Lương 1 giờ</th> --}}
                                        <th>Lương tháng này</th>
                                        <th>Nợ tháng trước</th>
                                        <th>Thực nhận</th>
                                        <th>Nợ tháng này</th>
                                    </thead>
                                    <tbody>

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
                url : '/filter_luong/',
                data:{'month_year':$value},
                success:function(data){
                    if (data.luongs.length) {
                        data_table.destroy();
                        $('tbody').html(data.luongs);

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

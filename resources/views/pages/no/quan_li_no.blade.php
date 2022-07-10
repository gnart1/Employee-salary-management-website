@extends('layouts.app', ['activePage' => 'quan_li_no', 'titlePage' => __('Quản lí nợ')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Quản lí nợ</h4>
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
                                            Tháng
                                        </th>
                                        <th>
                                            Năm
                                        </th>
                                        <th>
                                            Số tiền
                                        </th>
                                        <th>
                                            Tình trạng
                                        </th>
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
                url : '/filter_no/',
                data:{'month_year':$value},
                success:function(data){
                    if (data.nos.length) {
                        data_table.destroy();
                        $('tbody').html(data.nos);
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

        <style>

        </style>
@endsection

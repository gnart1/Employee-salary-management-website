@extends('layouts.app', ['activePage' => 'hoat_dong', 'titlePage' => __('Hoạt động')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Hoạt động</h4>
                            <p class="card-category"></p>
                            <button type="button" class="btn btn-info">
                                <a href={{ route('them_hoat_dong') }} class="text-white">Thêm hoạt động</a>
                            </button>
                        </div>
                        <div class="card-body">
                            {{-- <span>Chọn thời gian: </span>
                            <input type="month" id="datepicker1" name="datepicker1" /> --}}
                            <div class="table-responsive">
                                <table id="data-table" class="table">
                                    <thead class=" text-primary">
                                        <th>
                                            Tên hoạt động
                                        </th>
                                        <th>
                                            Tên phòng ban
                                        </th>
                                        <th>
                                            Thời gian
                                        </th>
                                        <th>
                                            Địa điểm
                                        </th>
                                        <th>
                                            Tiền đóng
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

    {{-- <script type="text/javascript">
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
    </script> --}}
@endsection

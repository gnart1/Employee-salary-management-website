@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])
@section('content')
  <div class="content">
    <div class="container-fluid">
    @hasanyrole('super_admin|admin')
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">content_copy</i>
              </div>
              <p class="card-category">Nhân viên</p>
              <h3 class="card-title">{{ $total_nhan_vien }}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-danger">warning</i>
                <a href="#pablo">Get More Space...</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">store</i>
              </div>
              <p class="card-category">Bộ phận</p>
              <h3 class="card-title">{{ $total_bo_phan }}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i> Last 24 Hours
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">info_outline</i>
              </div>
              <p class="card-category">Phòng ban</p>
              <h3 class="card-title">{{ $total_phong_ban }}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">local_offer</i> Tracked from Github
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="fa fa-twitter"></i>
              </div>
              <p class="card-category">Trình độ</p>
              <h3 class="card-title">{{ $total_trinh_do }}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">update</i> Just Updated
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="card card-chart">
            <div class="card-header card-header-warning"> 
              <h4 class="card-title">Số nhân viên đi muộn trong tuần</h4>
            </div>
            <div class="card-body">
              <canvas id="late-chart" style="width:100%;max-width:700px"></canvas>
            </div>
           
          </div>
        </div>
        <div class="col-md-6">
          <div class="card card-chart">
            <div class="card-header card-header-danger"> 
              <h4 class="card-title">Số nhân viên nghỉ làm trong tuần</h4>
            </div>
            <div class="card-body">
              <canvas id="off-chart" style="width:100%;max-width:700px"></canvas>
            </div>
           
          </div>
        </div>
        <!-- <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-danger"> 
              <h4 class="card-title">Số nhân viên nghỉ làm trong tuần</h4>
            </div>
          <div class="card-body">
            <canvas id="late-chart" style="width:100%;max-width:700px"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-success">
              <div class="ct-chart" id="completedTasksChart"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Completed Tasks</h4>
              <p class="card-category">Last Campaign Performance</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> campaign sent 2 days ago
              </div>
            </div>
          </div>
        </div> -->
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card">
              <div class="card-header card-header-success">
                <h4 class="card-title">Chức vụ</h4>
                <p class="card-category">Hiện có trong công ty</p>
              </div>
              <div class="card-body table-responsive">
                <table id="data-table" class="table table-hover">
                  <thead class=" text-primary">
                      <th>
                        ID
                      </th>
                      <th>
                        Tên chức vụ
                      </th>
                    </thead>
                    <tbody>
                      @forelse ($all_chuc_vu as $chuc_vu)
                          <tr>
                              <td>{{ $chuc_vu->ma_cv }}</td>
                              <td>{{ $chuc_vu->ten_cv }}</td>
                          </tr>
                      @empty
                          <p>Không tìm thấy bản ghi nào</p>
                      @endforelse
                    </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12">
            <div class="card">
              <div class="card-header card-header-success">
                <h4 class="card-title">Trình độ</h4>
                <p class="card-category">Hiện có trong công ty</p>
              </div>
              <div class="card-body table-responsive">
                <table id="data-table" class="table table-hover">
                  <thead class=" text-primary">
                      <th>
                        ID
                      </th>
                      <th>
                        Tên trình độ
                      </th>
                    </thead>
                    <tbody>
                      @forelse ($all_trinh_do as $trinh_do)
                          <tr>
                              <td>{{ $trinh_do->ma_td }}</td>
                              <td>{{ $trinh_do->ten_td }}</td>
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
        @endhasanyrole
      
        @role('user')
          <h1>Xin chào {{ auth()->user()->ho_ten }}</h1>
        @endrole
    </div>

  </div>

  <script>
    new Chart("late-chart", {
      type: "bar",  
      data: {
        labels: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6"],
        datasets: [{
          backgroundColor: ["red", "green","blue","orange","brown"],
          data: [<?php 
            foreach ($late_arr as $late) {
              echo $late.",";
            }
          ?>]
        }]
      },
      options: {
        plugins: {
            title: {
                display: true,
                text: 'Custom Chart Title'
            }
        }
    }
    });

    new Chart("off-chart", {
      type: "bar",
      data: {
        labels: ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6"],
        datasets: [{
          backgroundColor: ["red", "green","blue","orange","brown"],
          data: [<?php 
            foreach ($off_arr as $off) {
              echo $off.",";
            }
          ?>]
        }]
      },
    });
  </script>

@endsection

<!-- @push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush --> 

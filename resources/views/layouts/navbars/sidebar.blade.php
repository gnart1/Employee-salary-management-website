<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
    
    Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
      <a href="#" class="simple-text logo-normal">
          {{ __('Quản lý nhân sự') }}
      </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>

      <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('sua_profile') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Thông tin cá nhân') }}</p>
        </a>
      </li>

      <li class="nav-item{{ $activePage == 'cham_cong' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('cham_cong') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Chấm công') }}</p>
        </a>
      </li>

        @role('user')

        {{-- Bảng Công Cá Nhân --}}
          <li class="nav-item {{ ($activePage == 'bang_cong_ca_nhan' ) ? ' active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#bang_cong_ca_nhan"  aria-expanded="true">
              <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
              <p>{{ __('Bảng công cá nhân') }}
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse hide" id="bang_cong_ca_nhan">
              <ul class="nav">
                <li class="nav-item{{ $activePage == 'bang_cong_ca_nhan' ? ' active' : '' }}">
                  <a class="nav-link" href="{{ route('bang_cong_ca_nhan') }}">
                    <span class="sidebar-mini"> UP </span>
                    <span class="sidebar-normal">{{ __('Xem danh sách') }} </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>

          @endrole

      {{-- Quản lý nhân viên --}}
      @hasanyrole('super_admin|admin')
          <li
              class="nav-item {{ $activePage == 'quan_li_nhan_vien' || $activePage == 'quan_li_nhan_vien' ? ' active' : '' }}">
              {{-- Expand Bar --}}
              <a class="nav-link" data-toggle="collapse" href="#quan_li_nhan_vien" aria-expanded="true">
                  <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
                  <p>{{ __('Nhân viên') }}
                      <b class="caret"></b>
                  </p>
              </a>
              <div class="collapse hide" id="quan_li_nhan_vien">
                  <ul class="nav">
                      <li class="nav-item{{ $activePage == 'quan_li_nhan_vien' ? ' active' : '' }}">
                          <a class="nav-link" href="{{ route('quan_li_nhan_vien') }}">
                              <span class="sidebar-mini"> UP </span>
                              <span class="sidebar-normal">{{ __('Danh sách nhân viên') }} </span>
                          </a>
                      </li>
                      @role('super_admin')
                          <li class="nav-item{{ $activePage == 'tao_nhan_vien' ? ' active' : '' }}">
                              <a class="nav-link" href="{{ route('tao_nhan_vien') }}">
                                  <span class="sidebar-mini"> UP </span>
                                  <span class="sidebar-normal">{{ __('Tạo nhân viên') }} </span>
                              </a>
                          </li>
                      @endrole
                  </ul>
              </div>
          </li>

          {{-- Quản lý chấm công --}}
          <li class="nav-item {{ ($activePage == 'quan_li_cham_cong' ) ? ' active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#quan_li_cham_cong"  aria-expanded="true">
              <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
              <p>{{ __('Bảng chấm công') }}
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse hide" id="quan_li_cham_cong">
              <ul class="nav">
                <li class="nav-item{{ $activePage == 'quan_li_cham_cong' ? ' active' : '' }}">
                  <a class="nav-link" href="{{ route('quan_li_bang_cong') }}">
                    <span class="sidebar-mini"> UP </span>
                    <span class="sidebar-normal">{{ __('Xem bảng công') }} </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>

          {{-- Quản lý lương --}}
          <li class="nav-item {{ ($activePage == 'quan_li_luong' ) ? ' active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#quan_li_luong"  aria-expanded="true">
              <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
              <p>{{ __('Bảng lương nhân viên') }}
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse hide" id="quan_li_luong">
              <ul class="nav">
                <li class="nav-item{{ $activePage == 'quan_li_luong' ? ' active' : '' }}">
                  <a class="nav-link" href="{{ route('quan_li_luong') }}">
                    <span class="sidebar-mini"> UP </span>
                    <span class="sidebar-normal">{{ __('Xem bảng lương') }} </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>

          {{-- Quản lý nợ --}}
          <li class="nav-item {{ ($activePage == 'quan_li_no' ) ? ' active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#quan_li_no"  aria-expanded="true">
              <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
              <p>{{ __('Bảng nợ') }}
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse hide" id="quan_li_no">
              <ul class="nav">
                <li class="nav-item{{ $activePage == 'quan_li_no' ? ' active' : '' }}">
                  <a class="nav-link" href="{{ route('quan_li_no') }}">
                    <span class="sidebar-mini"> UP </span>
                    <span class="sidebar-normal">{{ __('Xem bảng lương') }} </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item {{ $activePage == 'quan_li_bao_hiem' ? ' active' : '' }}">
              <a class="nav-link" data-toggle="collapse" href="#quan_li_bao_hiem" aria-expanded="true">
                  <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
                  <p>{{ __('Bảo hiểm') }}
                      <b class="caret"></b>
                  </p>
              </a>
              <div class="collapse hide" id="quan_li_bao_hiem">
                  <ul class="nav">
                      <li class="nav-item{{ $activePage == 'quan_li_bao_hiem' ? ' active' : '' }}">
                          <a class="nav-link" href="{{ route('quan_li_bao_hiem') }}">
                              <span class="sidebar-mini"> UP </span>
                              <span class="sidebar-normal">{{ __('Danh sách bảo hiểm') }} </span>
                          </a>
                      </li>
                      <li class="nav-item{{ $activePage == 'them_bao_hiem' ? ' active' : '' }}">
                          <a class="nav-link" href="{{ route('them_bao_hiem') }}">
                              <span class="sidebar-mini"> UM </span>
                              <span class="sidebar-normal"> {{ __('Thêm bảo hiểm') }} </span>
                          </a>
                      </li>
                  </ul>
              </div>
          </li>

          <li class="nav-item {{ $activePage == 'quan_li_loai_bh' ? ' active' : '' }}">
              <a class="nav-link" data-toggle="collapse" href="#quan_li_loai_bh" aria-expanded="true">
                  <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
                  <p>{{ __('Loại bảo hiểm') }}
                      <b class="caret"></b>
                  </p>
              </a>
              <div class="collapse hide" id="quan_li_loai_bh">
                  <ul class="nav">
                      <li class="nav-item{{ $activePage == 'quan_li_loai_bh' ? ' active' : '' }}">
                          <a class="nav-link" href="{{ route('quan_li_loai_bh') }}">
                              <span class="sidebar-mini"> UP </span>
                              <span class="sidebar-normal">{{ __('Danh sách loại bảo hiểm') }} </span>
                          </a>
                      </li>
                      <li class="nav-item{{ $activePage == 'them_loai_bh' ? ' active' : '' }}">
                          <a class="nav-link" href="{{ route('them_loai_bh') }}">
                              <span class="sidebar-mini"> UM </span>
                              <span class="sidebar-normal"> {{ __('Thêm loại bảo hiểm') }} </span>
                          </a>
                      </li>
                  </ul>
              </div>
          </li>

          {{-- Quản lý chức vụ --}}
          <li class="nav-item {{ $activePage == 'quan_li_chuc_vu' ? ' active' : '' }}">
              <a class="nav-link" data-toggle="collapse" href="#quan_li_chuc_vu" aria-expanded="true">
                  <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
                  <p>{{ __('Chức vụ') }}
                      <b class="caret"></b>
                  </p>
              </a>
              <div class="collapse hide" id="quan_li_chuc_vu">
                  <ul class="nav">
                      <li class="nav-item{{ $activePage == 'quan_li_chuc_vu' ? ' active' : '' }}">
                          <a class="nav-link" href="{{ route('quan_li_chuc_vu') }}">
                              <span class="sidebar-mini"> UP </span>
                              <span class="sidebar-normal">{{ __('Danh sách chức vụ') }} </span>
                          </a>
                      </li>
                      <li class="nav-item{{ $activePage == 'them_chuc_vu' ? ' active' : '' }}">
                          <a class="nav-link" href="{{ route('them_chuc_vu') }}">
                              <span class="sidebar-mini"> UP </span>
                              <span class="sidebar-normal">{{ __('Thêm chức vụ') }} </span>
                          </a>
                      </li>

                  </ul>
              </div>
          </li>

          {{-- Quản lý trình độ --}}
          <li
              class="nav-item {{ $activePage == 'quan_li_trinh_do' || $activePage == 'quan_li_trinh_do' ? ' active' : '' }}">
              <a class="nav-link" data-toggle="collapse" href="#quan_li_trinh_do" aria-expanded="true">
                  <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
                  <p>{{ __('Trình độ') }}
                      <b class="caret"></b>
                  </p>
              </a>
              <div class="collapse hide" id="quan_li_trinh_do">
                  <ul class="nav">
                      <li class="nav-item{{ $activePage == 'quan_li_trinh_do' ? ' active' : '' }}">
                          <a class="nav-link" href="{{ route('quan_li_trinh_do') }}">
                              <span class="sidebar-mini"> UP </span>
                              <span class="sidebar-normal">{{ __('Danh sách trình độ') }} </span>
                          </a>
                      </li>
                      <li class="nav-item{{ $activePage == 'them_trinh_do' ? ' active' : '' }}">
                          <a class="nav-link" href="{{ route('them_trinh_do') }}">
                              <span class="sidebar-mini"> UP </span>
                              <span class="sidebar-normal">{{ __('Thêm trình độ') }} </span>
                          </a>
                      </li>
                  </ul>
              </div>
          </li>

          {{-- Quản lý hợp đồng --}}
          <li class="nav-item {{ $activePage == 'quan_li_hop_dong' ? ' active' : '' }}">
              <a class="nav-link" data-toggle="collapse" href="#quan_li_hop_dong" aria-expanded="true">
                  <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
                  <p>{{ __('Hợp đồng') }}
                      <b class="caret"></b>
                  </p>
              </a>
              <div class="collapse hide" id="quan_li_hop_dong">
                  <ul class="nav">
                      <li class="nav-item{{ $activePage == 'quan_li_hop_dong' ? ' active' : '' }}">
                          <a class="nav-link" href={{ route('quan_li_hop_dong') }}>
                              <span class="sidebar-mini"> UP </span>
                              <span class="sidebar-normal">{{ __('Danh sách hợp đồng') }} </span>
                          </a>
                      </li>
                      <li class="nav-item{{ $activePage == 'them_hop_dong' ? ' active' : '' }}">
                          <a class="nav-link" href={{ route('them_hop_dong') }}>
                              <span class="sidebar-mini"> UP </span>
                              <span class="sidebar-normal">{{ __('Thêm hợp đồng') }} </span>
                          </a>
                      </li>
                  </ul>
              </div>
          </li>

          {{-- Quản lý kỳ luật --}}
          <li class="nav-item {{ $activePage == 'quan_li_loai_kl' ? ' active' : '' }}">
              <a class="nav-link" data-toggle="collapse" href="#quan_li_ky_luat" aria-expanded="true">
                  <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
                  <p>{{ __('Loại kỉ luật') }}
                      <b class="caret"></b>
                  </p>
              </a>
              <div class="collapse hide" id="quan_li_ky_luat">
                  <ul class="nav">
                      <li class="nav-item{{ $activePage == 'quan_li_ky_luat' ? ' active' : '' }}">
                          <a class="nav-link" href="{{ route('quan_li_ky_luat') }}">
                              <span class="sidebar-mini"> UP </span>
                              <span class="sidebar-normal">{{ __('Danh sách loại kỷ luật') }} </span>
                          </a>
                      </li>
                      <li class="nav-item{{ $activePage == 'them_ky_luat' ? ' active' : '' }}">
                          <a class="nav-link" href="{{ route('them_ky_luat') }}">
                              <span class="sidebar-mini"> UM </span>
                              <span class="sidebar-normal"> {{ __('Thêm loại kỷ luật') }} </span>
                          </a>
                      </li>
                  </ul>
              </div>
          </li>
           {{-- Quản lý khen thưởng --}}
           <li class="nav-item {{ $activePage == 'quan_li_khen_thuong' ? ' active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#quan_li_khen_thuong" aria-expanded="true">
                <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
                <p>{{ __('Loại khen thưởng') }}
                    <b class="caret"></b>
                </p>
            </a>
            <div class="collapse hide" id="quan_li_khen_thuong">
                <ul class="nav">
                    <li class="nav-item{{ $activePage == 'quan_li_khen_thuong' ? ' active' : '' }}">
                        <a class="nav-link" href="{{ route('quan_li_khen_thuong') }}">
                            <span class="sidebar-mini"> UP </span>
                            <span class="sidebar-normal">{{ __('Danh sách loại khen thưởng') }} </span>
                        </a>
                    </li>
                    <li class="nav-item{{ $activePage == 'them_khen_thuong' ? ' active' : '' }}">
                        <a class="nav-link" href="{{ route('them_khen_thuong') }}">
                            <span class="sidebar-mini"> UM </span>
                            <span class="sidebar-normal"> {{ __('Thêm loại khen thưởng') }} </span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
          {{-- Quản lý phòng ban --}}
          <li class="nav-item {{ $activePage == 'quan_li_phong_ban' ? ' active' : '' }}">
              <a class="nav-link" data-toggle="collapse" href="#quan_li_phong_ban" aria-expanded="true">
                  <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
                  <p>{{ __('Phòng ban') }}
                      <b class="caret"></b>
                  </p>
              </a>
              <div class="collapse hide" id="quan_li_phong_ban">
                  <ul class="nav">
                      <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
                          <a class="nav-link" href="{{ route('quan_li_phong_ban') }}">
                              <span class="sidebar-mini"> UP </span>
                              <span class="sidebar-normal">{{ __('Danh sách phòng ban') }} </span>
                          </a>
                      </li>
                      <li class="nav-item{{ $activePage == 'them_phong_ban' ? ' active' : '' }}">
                          <a class="nav-link" href="{{ route('them_phong_ban') }}">
                              <span class="sidebar-mini"> UM </span>
                              <span class="sidebar-normal"> {{ __('Thêm phòng ban') }} </span>
                          </a>
                      </li>
                  </ul>
              </div>
          </li>

          {{-- Quản lý bộ phận --}}
          <li class="nav-item {{ $activePage == 'quan_li_bo_phan' ? ' active' : '' }}">
              <a class="nav-link" data-toggle="collapse" href="#quan_li_bo_phan" aria-expanded="true">
                  <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
                  <p>{{ __('Bộ phận') }}
                      <b class="caret"></b>
                  </p>
              </a>
              <div class="collapse hide" id="quan_li_bo_phan">
                  <ul class="nav">
                      <li class="nav-item{{ $activePage == 'quan_li_bo_phan' ? ' active' : '' }}">
                          <a class="nav-link" href="{{ route('quan_li_bo_phan') }}">
                              <span class="sidebar-mini"> UP </span>
                              <span class="sidebar-normal">{{ __('Danh sách bộ phận') }} </span>
                          </a>
                      </li>
                      <li class="nav-item{{ $activePage == 'them_bo_phan' ? ' active' : '' }}">
                          <a class="nav-link" href="{{ route('them_bo_phan') }}">
                              <span class="sidebar-mini"> UM </span>
                              <span class="sidebar-normal"> {{ __('Thêm bộ phận') }} </span>
                          </a>
                      </li>
                  </ul>
              </div>
          </li>
          <li class="nav-item {{ ($activePage == 'hoat_dong' ) ? ' active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#hoat_dong"  aria-expanded="true">
              <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
              <p>{{ __('Hoạt động') }}
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse hide" id="hoat_dong">
              <ul class="nav">
                <li class="nav-item{{ $activePage == 'hoat_dong' ? ' active' : '' }}">
                  <a class="nav-link" href="{{ route('hoat_dong') }}">
                    <span class="sidebar-mini"> UP </span>
                    <span class="sidebar-normal">{{ __('Hoạt động') }} </span>
                  </a>
                </li>
                <li class="nav-item{{ $activePage == 'them_hoat_dong' ? ' active' : '' }}">
                  <a class="nav-link" href="{{ route('them_hoat_dong') }}">
                      <span class="sidebar-mini"> UM </span>
                      <span class="sidebar-normal"> {{ __('Thêm hoạt động') }} </span>
                  </a>
              </li>
              </ul>
            </div>
          </li>
      @endhasanyrole


      </ul>
  </div>
</div>

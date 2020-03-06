<aside class="left-sidebar" data-sidebarbg="skin6" >
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    @if(Auth::guard('reception')->check())
                    <div class="user-profile d-flex no-block dropdown m-t-20">
                        <div class="user-pic"><img src="/assets/images/users/1.jpg" alt="users" class="rounded-circle" width="40" /></div>
                        <div class="user-content hide-menu m-l-10">
                            <a href="javascript:void(0)" class="" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <h5 class="m-b-0 user-name font-medium">{{$receptionLogin->email}} <i class="fa fa-angle-down"></i></h5>
                                <span class="op-5 user-email">{{$receptionLogin->email}}@hondaquoctien.com</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Userdd">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('receptions.edit',$receptionLogin->id)}}"><i class="ti-settings m-r-5 m-l-5"></i> Đổi mật khẩu</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('getLogout')}}"><i class="fa fa-power-off m-r-5 m-l-5"></i> Đăng xuất</a>
                            </div>
                        </div>
                    </div>
                    @endif
                </li>
                <!-- <li class="p-15 m-t-10"><a title="Thêm mới khách hàng" href="" class="btn btn-block create-btn text-white no-block d-flex align-items-center"><i class="fa fa-plus-square"></i> <span class="hide-menu m-l-5">Thêm mới khách hàng</span> </a></li> -->
                <li class="sidebar-item"> <a title="Thêm mới khách hàng" class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('customers.create')}}"  aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu"></span></a></li>
                <li class="sidebar-item"> <a title="Xe sửa chữa" class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('repairs.create')}}" aria-expanded="false"><i class="mdi mdi-account-network"></i><span class="hide-menu"></span></a></li>
                <li class="sidebar-item" > <a title="Tiếp nhận dịch vụ" class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('services.create')}}"  aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu"></span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" onClick=" return alertPopup()" aria-expanded="false"><i class="mdi mdi-border-all"></i><span class="hide-menu"></span></a></li>
            </ul>
            
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>

@php
   $segment = request()->segment(1);
@endphp
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <img alt="image" class="img-circle" src="backend/img/profile_small.jpg" />
                         </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ auth()->user()->name }}</strong>
                         </span> <span class="text-muted text-xs block">Cài đặt <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="">Hồ sơ</a></li>
                        
                        <li class="divider"></li>
                        <li><a href="{{ route('auth.logout') }}">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            
            {{-- Dashboard --}}
            <li class="{{ ($segment == 'dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard.index') }}">
                    <i class="fa fa-dashboard"></i> 
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            
            {{-- Quản lý sản phẩm --}}
            <li class="{{ (in_array($segment, ['product', 'attribute', 'product-catalogue'])) ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-cube"></i> 
                    <span class="nav-label">Quản lý sản phẩm</span> 
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{ route('product.catalogue.index') }}">Nhóm sản phẩm</a></li>
                    <li><a href="{{ route('product.index') }}">Sản phẩm</a></li>
                    <li><a href="{{ route('attribute.catalogue.index') }}">Nhóm thuộc tính</a></li>
                    <li><a href="{{ route('attribute.index') }}">Thuộc tính</a></li>
                </ul>
            </li>
            
        </ul>
    </div>
</nav>
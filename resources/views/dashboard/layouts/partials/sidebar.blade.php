<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            @if (Auth::check())
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            @endif
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                            class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-th"></i> <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('governorates') }}">
                    <i class="fa fa-th"></i> <span>Governorates</span>
                </a>
            </li>
            <li>
                <a class="p-0">
                    <form class="px-3" id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                        <!-- Add a button or link to trigger the form submission -->
                        <button style="width: 100%" class="btn btn-danger" type="submit"><span>Logout</span></button>
                    </form>
                </a>
            </li>

            {{-- <li class="treeview">
                        <a href="#">
                            <i class="fa fa-pie-chart"></i>
                            <span>governorates</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> cities</a></li>
                            </li>
                        </ul>
                    </li> --}}
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

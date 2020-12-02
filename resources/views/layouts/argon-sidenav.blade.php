<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="{{url('/')}}/argon/img/brand/blue.png" class="navbar-brand-img" alt="argon.">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                @can('admin')

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{url('/')}}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/students')}}">
                            <i class="ni ni-single-02 text-yellow"></i>
                            <span class="nav-link-text">Data Siswa</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/attendances') }}">
                            <i class="ni ni-pin-3 text-primary"></i>
                            <span class="nav-link-text">Data Kehadiran</span>
                        </a>
                    </li>
                </ul>

                @endcan

                @can('student')

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{url('/')}}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/students')}}">
                            <i class="ni ni-single-02 text-yellow"></i>
                            <span class="nav-link-text">Data Siswa</span>
                        </a>
                    </li>
                </ul>

                @endcan

            </div>
        </div>
    </div>
</nav>

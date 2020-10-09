<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="{{ url('/') }}" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                <li>
                    <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-user"></i> <span>Students</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subPages" class="collapse ">
                        <ul class="nav">
                            <li><a href="{{ url('/students') }}" class="">Data Beasiswa</a></li>
                            <li><a href="{{ url('/students/create') }}" class="">Tambah Data</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="{{ url('/meetings') }}"><i class="lnr lnr-home"></i> <span>meetings</span></a></li>
            </ul>
        </nav>
    </div>
</div>

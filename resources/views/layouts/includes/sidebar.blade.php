<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    @if (auth()->user()->role == 'admin')
                        <a href="#">PRO.ID</a>
                    @else
                        <img src="{{ Auth::user()->getAvatar() }}" alt="" style="width: 50px; height: 50px; border-radius:50%;">
                        <br>
                        <p style="font-size:18px;">{{ Auth::user()->name }}</p>
                    @endif
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            @if (auth()->user()->role == 'admin')
                <ul class="menu">
                    <li class="sidebar-title">User</li>

                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <div class="avatar avatar-xl">
                                <img src="{{ Auth::user()->getAvatar() }}" alt="" style="width: 20px; height: 20px">
                            </div>
                            <span>{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            @else                
                <ul class="menu">
                    <li class="sidebar-item {{ Request::is('profil') ? 'active' : '' }}">
                        <a href="/profil" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Kelas Saya</span>
                        </a>
                    </li>
                </ul>
                <ul class="menu">
                    <li class="sidebar-item {{ Request::is('/') ? 'active' : '' }}">
                        <a href="/" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Beranda</span>
                        </a>
                    </li>
                </ul>
                <ul class="menu">
                    <li class="sidebar-item {{ Request::is('/') ? 'active' : '' }}">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Pengaturan</span>
                        </a>
                    </li>
                </ul>
                <ul class="menu">
                    <li class="sidebar-item {{ Request::is('/') ? 'active' : '' }}">
                        <a href="{{ route('logout') }}" class='sidebar-link' onclick="event.preventDefault(); document.getElementById('logout-form').submit();">                         
                            <i class="bi bi-grid-fill"></i>
                            <span>Keluar</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            @endif

            @if (auth()->user()->role == 'admin')
                <ul class="menu">
                    <li class="sidebar-title">Menu</li>
                    <li class="sidebar-item {{ Request::is('home') ? 'active' : '' }}">
                        <a href="/home" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item  has-sub {{ Request::is('user') ? 'active' : '' }}">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-person-fill"></i>
                            <span>User</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item ">
                                <a href="{{ route('user.index') }}">List User</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item  has-sub {{ Request::is('kelas') ? 'active' : '' }}">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-people-fill"></i>
                            <span>Kelas</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{ route('kelas.index') }}">List Kelas</a> 
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item  has-sub {{ Request::is('materi') ? 'active' : '' }}">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-book-fill"></i>
                            <span>Materi</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item ">
                                <a href="{{ route('materi.index') }}">List Materi</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item  has-sub {{ Request::is('kuis') ? 'active' : '' }}">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-question-circle-fill"></i>
                            <span>Kuis</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item ">
                                <a href="{{ route('kuis.index') }}">List Kuis</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            @endif

        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
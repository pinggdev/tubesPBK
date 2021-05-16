<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-menu">
            <ul class="menu">
                <h3>Tutorial</h3>
                <li class="sidebar-item {{ Request::is('profil') ? 'active' : '' }}">
                    <a href="/profil" class='sidebar-link'>
                        <i class="bi bi-backspace-fill"></i>
                        <span>Kembali</span>
                    </a>
                </li>
            </ul>
            <ul class="menu">
                @for ($i = 1; $i <= $kelas->bab; $i++)                            
                <li class="sidebar-item  has-sub {{ Request::is('kelas') ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-book-fill"></i>
                        <span>Bab {{ $i}}</span>
                    </a>
                    <ul class="submenu ">
                        @foreach ($kelas->materi as $mtr)    
                            @if ($mtr->babmateri == $i)
                                <li class="submenu-item ">
                                    <a href="/tutorial/{{ $mtr->kelas->id }}/{{ $mtr->id }}">{{ $mtr->materi }}</a> 
                                </li>
                            @endif   
                        @endforeach
                    </ul>
                    <a href="/kuisbab/{{ $kelas->id }}/{{ $i }}" class='sidebar-link'>
                        <i class="bi bi-book-fill"></i>
                        <span>Kuis {{ $i}}</span>
                    </a>
                </li>
                @endfor       
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
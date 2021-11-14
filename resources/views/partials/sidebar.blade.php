<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('dist/img/BlueSkyLogo.png') }}" alt="AdminLTE Logo" class="brand-image  elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Enterprise</span>
    </a>
    @php
        $profile = DB::table('users')
            ->where('id', '=', Auth::user()->id)
            ->get();
    @endphp
    <!-- Sidebar -->
    <div class="sidebar" style="background-color: black">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ url('/profile_file/' . $profile[0]->foto) }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="/profile/{{ Auth::user()->id }}" class="d-block"> {{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="\" class="nav-link {{ $title === 'Home' ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Home

                        </p>
                    </a>
                </li>

                @if (Auth::user()->id_jabatan == 1)
                    <li class="nav-header">MENU ADMIN</li>
                    <li class="nav-item">
                        <a href="/register" class="nav-link {{ $title === 'Register Employee' ? 'active' : '' }} ">
                            <i class="nav-icon fas fa-address-card"></i>
                            <p>
                                Register Employee
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/deleteemployee"
                            class="nav-link {{ $title === 'Delete Employee' ? 'active' : '' }} ">
                            <i class="nav-icon fas fa-minus-square"></i>
                            <p>
                                Delete Employee
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/announce" class="nav-link {{ $title === 'Make Announcement' ? 'active' : '' }} ">
                            <i class="nav-icon fas fa-bullhorn"></i>
                            <p>
                                Make Announcement
                            </p>
                        </a>
                    </li>
                @endif


                <li class="nav-header">MENU</li>
                <li class="nav-item">
                    <a href="/chat" class="nav-link {{ $title === 'Chat' ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-inbox"></i>
                        <p>
                            Chat
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/find" class="nav-link {{ $title === 'Find' ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-search"></i>
                        <p>
                            Find Other Employee
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/discussion" class="nav-link {{ $title === 'Discussion' ? 'active' : '' }} ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="nav-icon bi bi-people-fill" viewBox="0 0 16 16">

                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            <path fill-rule="evenodd"
                                d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                            <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                        </svg>
                        <p>
                            Discussion
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/todo" class="nav-link {{ $title === 'Todo List' ? 'active' : '' }} ">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-arrow-up-circle-fill nav-icon" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5z" />
                            <path
                                d="M1.713 11.865v-.474H2c.217 0 .363-.137.363-.317 0-.185-.158-.31-.361-.31-.223 0-.367.152-.373.31h-.59c.016-.467.373-.787.986-.787.588-.002.954.291.957.703a.595.595 0 0 1-.492.594v.033a.615.615 0 0 1 .569.631c.003.533-.502.8-1.051.8-.656 0-1-.37-1.008-.794h.582c.008.178.186.306.422.309.254 0 .424-.145.422-.35-.002-.195-.155-.348-.414-.348h-.3zm-.004-4.699h-.604v-.035c0-.408.295-.844.958-.844.583 0 .96.326.96.756 0 .389-.257.617-.476.848l-.537.572v.03h1.054V9H1.143v-.395l.957-.99c.138-.142.293-.304.293-.508 0-.18-.147-.32-.342-.32a.33.33 0 0 0-.342.338v.041zM2.564 5h-.635V2.924h-.031l-.598.42v-.567l.629-.443h.635V5z" />
                        </svg>
                        <p>
                            Note
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/about" class="nav-link {{ $title === 'About Us' ? 'active' : '' }} ">
                        <i class="nav-icon fa fa-building"></i>
                        <p>
                            About Us

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/chat" class="nav-link {{ $title === 'Feedback' ? 'active' : '' }} ">
                        <i class="nav-icon fa fa-comment"></i>
                        <p>
                            Feedback
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-arrow-up-circle-fill nav-icon" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z" />
                        </svg>
                        <p>
                            Back To Top
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-arrow-up-circle-fill nav-icon" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                            <path fill-rule="evenodd"
                                d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                        </svg>
                        <p>
                            Logout
                        </p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
{{-- <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form> --}}

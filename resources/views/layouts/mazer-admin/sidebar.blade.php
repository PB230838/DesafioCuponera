<div class="sidebar-wrapper active">
    <div class="sidebar-header position-relative">
        <div class="d-flex justify-content-between align-items-center">
            <div class="sidebar-toggler  x">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>
            <li class="sidebar-item @if (Route::currentRouteName() == 'home') active @endif">
                <a href="{{ route('home') }}" class='sidebar-link'>
                    <i class="fa fa-home"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="sidebar-item @if (Route::currentRouteName() == 'admin.dashboard.index') active @endif">
                <a href="{{ route('admin.dashboard.index') }}" class='sidebar-link'>
                    <i class="fa fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @if(auth()->user()->hasRole('ADMIN'))
                <li class="sidebar-item has-sub @if (in_array(Route::currentRouteName(), ['admin.roles.index', 'admin.permissions.index', 'admin.users.index'])) active @endif">
                    <a href="#" class='sidebar-link'>
                        <i class="fa fa-user-check"></i>
                        <span>Admin</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="{{ route('admin.roles.index') }}">Role Lista</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('admin.permissions.index') }}">Permisos Lista</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('admin.users.index') }}">Usuarios Lista</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('admin.empresas.index') }}">Empresas Lista</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ route('admin.cupones.index') }}">Cupones Lista</a>
                        </li>
                    </ul>
                </li>
            @endif
            <li class="sidebar-title">Profile</li>
            <li class="sidebar-item @if (Route::currentRouteName() == 'profile.edit') active @endif">
                <a href="{{ route('profile.edit', auth()->user()->id) }}" class='sidebar-link'>
                    <i class="bi bi-person"></i>
                    <span>Perfil</span>
                </a>
            </li>
            @if(auth()->user()->hasRole('ADMIN'))
                <li class="sidebar-item">
                    <span class="sidebar-link">
                        <i class="fa fa-user"></i>
                        <span >Rol: Soy ADMIN</span>
                    </span>
                </li>
            @elseif(auth()->user()->roles->isEmpty())
                <!-- No mostrar nada -->
            @else
                <li class="sidebar-item">
                    <span class="sidebar-link">
                        <i class="fa fa-user"></i>
                        <span >Rol: NO ADMIN</span>
                    </span>
                </li>
            @endif
            <li class="sidebar-item ">
                <a href="{{ route('profile.show', auth()->user()->id) }}" class='sidebar-link'>
                    <i class="bi bi-door-open-fill text-danger"></i>
                    <span>Cerrar sesión</span>
                </a>
            </li>
        </ul>
    </div>
</div>

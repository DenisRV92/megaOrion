<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <a href="" class="brand-link">
        <img src="/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a>
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

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('showJokes') }}" class="nav-link">
                        <i class="nav-icon fas fa-th text-white"></i>
                        <p class="text-white">
                            Анектоды
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('showUser')}}" class="nav-link ">
                        <i class="nav-icon fas fa-user text-white"></i>
                        <p class="text-white">
                            Пользователи
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

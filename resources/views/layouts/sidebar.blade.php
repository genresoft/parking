<div class="app-sidebar colored" style="background-color: blue; color: white;">
    <div class="sidebar-header" style="background-color: #0093D0; color: white;">
        <a class="header-brand" href="http://secureparking.co.id/" target="_blank">
            <div class="logo-img">
                <img height="35" src="{{ asset('img/secure.png') }}" class="header-brand-img" alt="lavalite">
            </div>
        </a>
        <button type="button" class="nav-toggle"><i data-toggle="expanded"
                class="ik ik-toggle-right toggle-icon"></i></button>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    <div class="sidebar-content" style="background-color: #0093D0">
        <div class="nav-container" style="background-color: #0055A5; color: white;">
            <nav id="main-menu-navigation" class="navigation-main">
                @if (Auth::user()->hasRole('admin'))
                    <div class="nav-lavel" style="background-color: rgba(252, 176, 52, 1); color: white;">Navigation
                    </div>
                    <div class="nav-item active">
                        <a href="{{ route('home') }}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                    </div>

                    <div class="nav-item has-sub {{ request()->routeIs('user*') ? 'open' : '' }}">
                        <a href="javascript:void(0)"><i class="ik ik-user"></i><span>Manage Admins </span> </a>
                        <div class="submenu-content" style="background-color: #0093D0">
                            <a href="{{ route('user.create') }}"
                                class="menu-item {{ request()->routeIs('user.create') ? 'active' : '' }}">Create</a>
                            <a href="{{ route('user.index') }}"
                                class="menu-item  {{ request()->routeIs('user.index') ? 'active' : '' }}">List</a>
                        </div>
                    </div>
                    <div class="nav-item has-sub {{ request()->routeIs('customers*') ? 'open' : '' }}">
                        <a href="javascript:void(0)"><i class="ik ik-users"></i><span>Manage Customers </span> </a>
                        <div class="submenu-content" style="background-color: #0093D0">
                            <a href="{{ route('customers.create') }}"
                                class="menu-item  {{ request()->routeIs('customers.create') ? 'active' : '' }}">Create</a>
                            <a href="{{ route('customers.index') }}"
                                class="menu-item  {{ request()->routeIs('customers.index') ? 'active' : '' }}">List</a>
                        </div>
                    </div>
                    <div class="nav-lavel" style="background-color: rgba(252, 176, 52, 1); color: white;">UI Element
                    </div>
                    <div class="nav-item has-sub {{ request()->routeIs('categories*') ? 'open' : '' }}">
                        <a href="#"><i class="ik ik-box"></i><span>Manage Category</span></a>
                        <div class="submenu-content" style="background-color: #0093D0">
                            <a href="{{ route('categories.create') }}"
                                class="menu-item  {{ request()->routeIs('categories.create') ? 'active' : '' }}">Create</a>
                            <a href="{{ route('categories.index') }}"
                                class="menu-item  {{ request()->routeIs('categories.index') ? 'active' : '' }}">List</a>
                        </div>
                    </div>
                    <div class="nav-item has-sub {{ request()->routeIs('vehicles*') ? 'open' : '' }}">
                        <a href="#"><i class="ik ik-truck"></i><span>Register Vehicles</span> </a>
                        <div class="submenu-content" style="background-color: #0093D0">
                            <a href="{{ route('vehicles.create') }}"
                                class="menu-item  {{ request()->routeIs('vehicles.create') ? 'active' : '' }}">Create</a>
                            <a href="{{ route('vehicles.index') }}"
                                class="menu-item  {{ request()->routeIs('vehicles.index') ? 'active' : '' }}">List</a>
                        </div>
                    </div>

                    <div
                        class="nav-item has-sub {{ request()->routeIs('vehiclesIn*') || request()->routeIs('vehiclesOut*') ? 'open' : '' }}">
                        <a href="#"><i class="ik ik-gitlab"></i><span>Manage Vehicles</span> </a>
                        <div class="submenu-content" style="background-color: #0093D0">
                            <a href="{{ route('vehiclesIn.index') }}"
                                class="menu-item  {{ request()->routeIs('vehiclesIn*') ? 'active' : '' }}">In
                                Vehicles</a>
                            <a href="{{ route('vehiclesOut.index') }}"
                                class="menu-item  {{ request()->routeIs('vehiclesOut*') ? 'active' : '' }}">Out
                                Vehicle</a>
                        </div>
                    </div>

                    <div class="nav-lavel" style="background-color: rgba(252, 176, 52, 1); color: white;">Reports
                        Section</div>
                    <div class="nav-item active">
                        <a href="{{ route('reports.index') }}"><i class="ik ik-edit"></i><span>Report</span></a>
                        {{-- <div class="submenu-content">
                        <a href="pages/form-components.html" class="menu-item">Components</a>
                        <a href="pages/form-addon.html" class="menu-item">Add-On</a>
                        <a href="pages/form-advance.html" class="menu-item">Advance</a>
                    </div> --}}
                    </div>
                @else
                    <div class="nav-lavel" style="background-color: rgba(252, 176, 52, 1); color: white;">Navigation
                    </div>
                    <div class="nav-item active">
                        <a href="{{ route('home') }}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                    </div>

                    <div class="nav-lavel" style="background-color: rgba(252, 176, 52, 1); color: white;">UI Element
                    </div>
                    <div class="nav-item has-sub {{ request()->routeIs('vehicles*') ? 'open' : '' }}">
                        <a href="#"><i class="ik ik-truck"></i><span>Register Vehicles</span> </a>
                        <div class="submenu-content" style="background-color: #0093D0">
                            <a href="{{ route('vehicles.create') }}"
                                class="menu-item  {{ request()->routeIs('vehicles.create') ? 'active' : '' }}">Create</a>
                            <a href="{{ route('vehicles.index') }}"
                                class="menu-item  {{ request()->routeIs('vehicles.index') ? 'active' : '' }}">List</a>
                        </div>
                    </div>

                    <div
                        class="nav-item has-sub {{ request()->routeIs('vehiclesIn*') || request()->routeIs('vehiclesOut*') ? 'open' : '' }}">
                        <a href="#"><i class="ik ik-gitlab"></i><span>Manage Vehicles</span> </a>
                        <div class="submenu-content" style="background-color: #0093D0">
                            <a href="{{ route('vehiclesIn.index') }}"
                                class="menu-item  {{ request()->routeIs('vehiclesIn*') ? 'active' : '' }}">In
                                Vehicles</a>
                        </div>
                    </div>

                @endif

            </nav>
        </div>
    </div>
</div>

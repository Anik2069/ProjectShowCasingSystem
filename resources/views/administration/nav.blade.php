<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/administration/dashboard"> <img alt="image" src="../../assets/img/logo.png" class="header-logo"/> <span
                    class="logo-name">Admin</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
                <a href="/administration/dashboard" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="briefcase"></i><span>Panel Maintaintence</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="/administration/create_panel">Create Panel</a></li>
                    <li><a class="nav-link" href="/administration/view_panel">View Panel</a></li>
                    <li><a class="nav-link" href="/administration/approval">Program Approval</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="briefcase"></i><span>Convener</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="/administration/convener">Add New Convener</a></li>
                    <li><a class="nav-link" href="/administration/convenerList">Convener List</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="briefcase"></i><span>Report</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route("admin.report") }}">Monthly Report</a></li>
                    <li><a class="nav-link" href="widget-data.html">Yearly Report</a></li>
                </ul>
            </li>


            <li class="menu-header">Setting</li>
{{--            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="briefcase"></i><span>System Settings</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="widget-chart.html">Add New Menu</a></li>
                    <li><a class="nav-link" href="widget-data.html">Menu List</a></li>
                    <li><a class="nav-link" href="widget-data.html">Panel Settings</a></li>
                    <li><a class="nav-link" href="widget-data.html">User Access Settings</a></li>
                </ul>
            </li>--}}

            <li class="dropdown">
                <a href="{{ route("user.changePassword") }}" class="nav-link"><i data-feather="monitor"></i><span>Change Password</span></a>
            </li>
            <li class="dropdown">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i data-feather="monitor"></i><span>Log out</span></a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </ul>
    </aside>
</div>

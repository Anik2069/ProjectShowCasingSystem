<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/administratration/dashboard"> <img alt="image" src="../../assets/img/logo.png"
                                                         class="header-logo"/> <span
                    class="logo-name">Convener</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown ">
                <a href="/administration/dashboard" class="nav-link"><i
                        data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="briefcase"></i><span>Panel Maintaintence</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="/convener/view_panel">View Panel</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="briefcase"></i><span>Program maintainence</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="/convener/program">Add New Program</a></li>
                    <li><a class="nav-link" href="/convener/view_program">VIew Program</a></li>
                    <li><a class="nav-link" href="/convener/resultCriteria">Result Criteria</a></li>
                    <li><a class="nav-link" href="/convener/assign_judges">Assign Judges</a></li>
                    <li><a class="nav-link" href="{{ route("projectSubmissionCriteria.index") }}">Project Submission Criteria</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="briefcase"></i><span>Judges & Supervisor</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="/convener/supervisor_judges">Add New Judges/Supervisor </a></li>
                    <li><a class="nav-link" href="/convener/view_judges">VIew Judges</a></li>
                    <li><a class="nav-link" href="/convener/view_supervisor">VIew Supervisor</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="briefcase"></i><span>Participant</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="/convener/view_all_participant">VIew all Participant</a></li>

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

            <li class="dropdown ">
                <a href="{{ route("user.changePassword") }}" class="nav-link"><i data-feather="monitor"></i><span>Change Password</span></a>
            </li>
            <li class="dropdown ">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                        data-feather="monitor"></i><span>Log out</span></a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </ul>
    </aside>
</div>

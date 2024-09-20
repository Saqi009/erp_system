<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="">
            <span class="align-middle" style="font-size: 35px">Zingo Assist</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a class="sidebar-link"  href="{{ route('admin.dashboard') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.attendance') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Attendance</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.lead') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Leads</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('register') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">New Registration</span>
                </a>
            </li>
        </ul>
    </div>
</nav>

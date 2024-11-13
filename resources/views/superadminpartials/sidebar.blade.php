<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand text-decoration-none" style="font-size: 35px" href="{{ route('admin.dashboard') }}">
            Zingo Assist
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('superadmin.dashboard') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('superadmin.employee_info') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Employee Info</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('superadmin.attendance') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Attendance</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('superadmin.admin_todo') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Admin Todo</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('superadmin.admin_lead') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Admin Leads</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('superadmin.gallery') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Gallery</span>
                </a>
            </li>
        </ul>
    </div>
</nav>

<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand text-decoration-none" style="font-size: 35px" href="{{ route('admin.dashboard') }}">
            Zingo Assist
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.admin_lead') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Your Lead</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.admin_todo') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Your Todo</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.employee') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Employees Info</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.employee_gallery') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Employees Gallery</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.attendance') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Attendance</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.lead') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Employee Leads</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.employees') }}">
                    <i class="align-middle" data-feather="book"></i><span class="align-middle">Employee Todo
                        Lists</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.contact') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Contacts</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.gallery') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Gallery</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.procurement') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Procurement</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.register') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">New Registration</span>
                </a>
            </li>
        </ul>
    </div>
</nav>

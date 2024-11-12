<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand text-decoration-none" style="font-size: 35px" href="{{ route('dashboard') }}">
            Zingo Assist
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('dashboard') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('attendance') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Attendance</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('todo') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">ToDo</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('employee.leads') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Leads</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('employee.contact') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Contact</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('employee.gallery') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Gallery</span>
                </a>
            </li>

        </ul>
    </div>
</nav>

<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('dashboard') }}">
            <span class="align-middle" style="font-size: 35px">Zingo Assist</span>
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
        </ul>
    </div>
</nav>

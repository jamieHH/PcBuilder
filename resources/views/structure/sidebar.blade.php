<ul class="nav nav-pills flex-column">
    <li class="nav-item {{ (isRouteOf(Request::path(), 'dashboard')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <b><i class="fa fa-tachometer"></i>Dashboard</b><span class="sr-only">(current)</span>
        </a>
    </li>
    <li class="nav-item {{ (isRouteOf(Request::path(), 'components')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('components') }}">
            <b><i class="fa fa-th-list"></i>Components</b>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <b><i class="fa fa-hdd-o"></i>Systems</b>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <b><i class="fa fa-cubes"></i>Inventories</b>
        </a>
    </li>
</ul>
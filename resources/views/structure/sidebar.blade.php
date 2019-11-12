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
        <li class="nav-sub-item {{ (isRouteOf(Request::path(), 'components/motherboards')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('components.motherboards') }}">
                <b><i class="fa fa-newspaper-o"></i>Motherboards</b>
            </a>
        </li>
        <li class="nav-sub-item {{ (isRouteOf(Request::path(), 'components/processors')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('components.processors') }}">
                <b><i class="fa fa-microchip"></i>Processors</b>
            </a>
        </li>
        <li class="nav-sub-item {{ (isRouteOf(Request::path(), 'components/memory-devices')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('components.memory-devices') }}">
                <b><i class="fa fa-microchip"></i>Memory Devices</b>
            </a>
        </li>
        <li class="nav-sub-item {{ (isRouteOf(Request::path(), 'components/storage-devices')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('components.storage-devices') }}">
                <b><i class="fa fa-database"></i>Storage Devices</b>
            </a>
        </li>
        <li class="nav-sub-item {{ (isRouteOf(Request::path(), 'components/gpus')) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('components.gpus') }}">
                <b><i class="fa fa-hdd-o"></i>GPUs</b>
            </a>
        </li>
    </li>
    <li class="nav-item {{ (isRouteOf(Request::path(), 'systems')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('systems') }}">
            <b><i class="fa fa-hdd-o"></i>Systems</b>
        </a>
        <li class="nav-sub-item {{ (isRouteOf(Request::path(), 'systems/new')) ? 'active' : '' }}">
            <a class="nav-link" href="#">
                <b><i class="fa fa-cube"></i>New System</b>
            </a>
        </li>
        <li class="nav-sub-item {{ (isRouteOf(Request::path(), 'systems/saved')) ? 'active' : '' }}">
            <a class="nav-link" href="#">
                <b><i class="fa fa-cube"></i>Saved Systems</b>
            </a>
        </li>
        <li class="nav-sub-item {{ (isRouteOf(Request::path(), 'systems/compare')) ? 'active' : '' }}">
            <a class="nav-link" href="#">
                <b><i class="fa fa-cube"></i>Compare Systems</b>
            </a>
        </li>
    </li>
    <li class="nav-item {{ (isRouteOf(Request::path(), 'inventories')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('inventories') }}">
            <b><i class="fa fa-cubes"></i>Inventories</b>
        </a>
    </li>
    <li class="nav-item {{ (isRouteOf(Request::path(), 'lists')) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('lists') }}">
            <b><i class="fa fa-list"></i>Lists</b>
        </a>
    </li>
</ul>
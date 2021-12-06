<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <x-admin-sidebar-brand></x-admin-sidebar-brand>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{__('messages.admin.dashboard.name')}}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    {{--Service--}}
    <x-admin.nav.service></x-admin.nav.service>
    <hr class="sidebar-divider">

    {{--Vehicles--}}
    <x-admin.nav.vehicles></x-admin.nav.vehicles>
    <hr class="sidebar-divider">

    {{--Customers--}}
    <x-admin.nav.customers></x-admin.nav.customers>
    <hr class="sidebar-divider">

    {{--Employees--}}
    <x-admin.nav.employees></x-admin.nav.employees>
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <x-admin-addons></x-admin-addons>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
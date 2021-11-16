<ul class="navbar-nav ml-auto">

    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
    <li class="nav-item dropdown no-arrow d-sm-none">
        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
        </a>
        <!-- Dropdown - Messages -->
        <x-admin.topbar.admin-topbar-messages></x-admin.topbar.admin-topbar-messages>
    </li>

    <!-- Nav Item - Alerts -->
{{--    <x-admin-topbar-alerts></x-admin-topbar-alerts>--}}

    <!-- Nav Item - Messages -->
{{--    <x-admin-topbar-messages-icon></x-admin-topbar-messages-icon>--}}

    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <x-admin.topbar.user></x-admin.topbar.user>

</ul>

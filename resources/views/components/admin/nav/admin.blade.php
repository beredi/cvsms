
<!-- Heading -->
<div class="sidebar-heading">
    <i class="fas fa-user-lock"></i> {{__('messages.admin.general.admin')}}
</div>

<li class="nav-item">
    <a class="nav-link" href="{{route('permissions.all')}}">
        <i class="fas fa-check-double"></i>
        <span>{{__('messages.admin.permissions.name')}}</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{route('permissions.all')}}">
        <i class="fas fa-building"></i>
        <span>{{__('messages.admin.company.name')}}</span>
    </a>
</li>

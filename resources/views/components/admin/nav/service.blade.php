
<!-- Heading -->
<div class="sidebar-heading">
    <i class="fas fa-cog"></i> {{ __('messages.admin.menu.service.name')}}
</div>

<li class="nav-item">
    <a class="nav-link" href="#">
        <i class="fas fa-plus"></i>
        <span>{{ __('messages.admin.menu.service.new-record')}}</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{route('services.all')}}">
        <i class="fas fa-list"></i>
        <span>{{ __('messages.admin.menu.service.all-records')}}</span>
    </a>
</li>

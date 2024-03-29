
<!-- Heading -->
<div class="sidebar-heading">
    <i class="fas fa-user-tie"></i> {{ __('messages.admin.menu.employees.plural_name')}}
</div>
@can('create', \App\Models\User::class)
<li class="nav-item">
    <a class="nav-link" href="{{route('employees.create')}}">
        <i class="fas fa-plus"></i>
        <span>{{ __('messages.admin.menu.employees.new-record')}}</span>
    </a>
</li>
@endcan
<li class="nav-item">
    <a class="nav-link" href="{{route('employees.all')}}">
        <i class="fas fa-list"></i>
        <span>{{ __('messages.admin.menu.employees.all-records')}}</span>
    </a>
</li>

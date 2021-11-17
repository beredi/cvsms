
<!-- Heading -->
<div class="sidebar-heading">
    <i class="fas fa-users"></i> {{ __('messages.admin.menu.customers.name')}}
</div>

<li class="nav-item">
    <a class="nav-link" href="{{route('customers.create')}}">
        <i class="fas fa-plus"></i>
        <span>{{ __('messages.admin.menu.customers.new-record')}}</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{route('customers.all')}}">
        <i class="fas fa-list"></i>
        <span>{{ __('messages.admin.menu.customers.all-records')}}</span>
    </a>
</li>

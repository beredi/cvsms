
<!-- Heading -->
<div class="sidebar-heading">
    <i class="fas fa-users"></i> {{ __('messages.admin.menu.customers.plural_name')}}
</div>
@can('create', \App\Models\Customer::class)
<li class="nav-item">
    <a class="nav-link" href="{{route('customers.create')}}">
        <i class="fas fa-plus"></i>
        <span>{{ __('messages.admin.menu.customers.new-record')}}</span>
    </a>
</li>
@endcan
<li class="nav-item">
    <a class="nav-link" href="{{route('customers.all')}}">
        <i class="fas fa-list"></i>
        <span>{{ __('messages.admin.menu.customers.all-records')}}</span>
    </a>
</li>

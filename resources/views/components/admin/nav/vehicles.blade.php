
<!-- Heading -->
<div class="sidebar-heading">
    <i class="fas fa-car"></i> {{ __('messages.admin.menu.vehicles.name')}}
</div>

<li class="nav-item">
    <a class="nav-link" href="#">
        <i class="fas fa-plus"></i>
        <span>{{ __('messages.admin.menu.vehicles.new-record')}}</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{route('vehicles.all')}}">
        <i class="fas fa-list"></i>
        <span>{{ __('messages.admin.menu.vehicles.all-records')}}</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{route('vehicles.config', ['topic' => \App\Models\Vehicle::VEHICLE_TYPE])}}">
        <i class="fas fa-cogs"></i>
        <span>{{ __('messages.admin.menu.vehicles.config')}}</span>
    </a>
</li>

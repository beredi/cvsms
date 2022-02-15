
<!-- Heading -->
<div class="sidebar-heading">
    <i class="fas fa-layer-group"></i> {{ __('messages.admin.menu.stock.name')}}
</div>

@can('create', \App\Models\Service::class)
<li class="nav-item">
    <a class="nav-link" href="{{route('stock-item.create')}}">
        <i class="fas fa-plus"></i>
        <span>{{ __('messages.admin.menu.stock.new-record')}}</span>
    </a>
</li>
@endcan

@can('viewAny', \App\Models\StockItem::class)
<li class="nav-item">
    <a class="nav-link" href="{{route('stock-item.all')}}">
        <i class="fas fa-list"></i>
        <span>{{ __('messages.admin.menu.stock.open')}}</span>
    </a>
</li>
@endcan

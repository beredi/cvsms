<table id='all-stock-items' class="display" style="width:100%">
    <thead>
    <tr>
        <th>{{__('messages.admin.menu.stock.item.name')}}</th>
        <th>{{__('messages.admin.menu.stock.item.purchase_price')}}</th>
        <th>{{__('messages.admin.menu.stock.item.price')}}</th>
        <th>{{__('messages.admin.menu.stock.item.price_with_fee')}}</th>
        <th>{{__('messages.admin.menu.stock.item.on_stock')}}</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @if($items->isNotEmpty())
        @foreach($items as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->purchase_price}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->getPriceWithFee()}}</td>
                <td>{{$item->on_stock }}</td>
                <td class="text-center">
                    @can('update', \App\Models\StockItem::class)
                        <a href="{{route('stock-item.edit', ['stockItem' => $item->id])}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                    @endcan
                </td>
                <td class="text-center">
                    @can('delete', \App\Models\StockItem::class)
                        <a href="#" data-id="{{$item->id}}" class="btn btn-sm btn-danger delete-button"  data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash-alt"></i></a>


                    @endcan
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

<table id='all-stock-items' class="display" style="width:100%">
    <thead>
    <tr>
        <th>{{__('messages.admin.menu.stock.item.name')}}</th>
        <th>{{__('messages.admin.menu.stock.item.price')}}</th>
        <th>{{__('messages.admin.menu.stock.item.price_with_fee')}}</th>
        <th>{{__('messages.admin.menu.stock.item.pieces')}}</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @if($items->isNotEmpty())
        @foreach($items as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->getPriceWithFee()}}</td>
                <td>{{$item->pivot->pieces}}</td>
                <td class="text-center">
                    @can('delete', \App\Models\StockItem::class)
                        <form action="{{route('services.detach-item', ['service' => $serviceId])}}" method="post">
                            @csrf
                            <input type="hidden" name="item_id" value="{{$item->id}}">
                            <button type="submit" class="btn btn-sm btn-danger delete-button"><i class="fas fa-trash-alt" title=""></i></button>
                        </form>
                    @endcan
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

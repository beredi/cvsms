<table id='all-invoice-items' class="display" style="width:100%">
    <thead>
    <tr>
        <th>{{__('messages.admin.menu.stock.item.name')}}</th>
        <th>{{__('messages.admin.menu.stock.item.price')}}</th>
        <th>{{__('messages.admin.menu.stock.item.price_with_fee')}}</th>
        <th>{{__('messages.admin.menu.stock.item.pieces')}}</th>
    </tr>
    </thead>
    <tbody>
    @if($items->isNotEmpty())
        @foreach($items as $item)
            @php
                $thisItem = $item->class_name::findOrFail($item->item_id);
            @endphp
            <tr>
                <td>{{$thisItem->name}}</td>
                <td>{{$thisItem->price}}</td>
                <td>{{$thisItem->price * 20 / 100 + $thisItem->price}}</td>
                <td>{{$item->pieces}}</td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

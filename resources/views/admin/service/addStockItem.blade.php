<div class="modal fade" id="addItemFromStock" tabindex="-1" role="dialog" aria-labelledby="addItemFromStockLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addItemFromStockLabel">
                    <strong>{{ __('messages.admin.menu.services.add-stock-items') }}</strong>
                </h5>
                <button
                    class="close"
                    type="button"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{route('services.assign-items')}}" method="POST" id="add-items">
                @method('POST')
                @csrf
                <div class="modal-body">
                    <div>

                        <button class="btn btn-sm btn-primary float-right" type="button" id="add-item" data-value="1"><i class="fas fa-plus-circle"></i> {{__('messages.admin.general.add')}}</button>
                    </div>
                    <div style="clear: both" id="form-items">
                            <div class="form-group float-left w-75">
                                {{ __('messages.admin.menu.stock.item.item') }}
                            </div>
                            <div class="form-group float-right w-25">
                                {{ __('messages.admin.menu.stock.item.pieces') }}
                            </div>
                            <div id="input-item-qty1">
                                <div class="form-group float-left w-75">
                                    <div class="control-group">
                                        <select
                                            name="item1"
                                            required
                                            class="select-item"
                                            id="select-item1"
                                            placeholder="{{__('messages.admin.general.search-for')}}"
                                        >
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group float-right w-25">
                                    <div class="number-input">
                                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" >
                                        </button>
                                        <input
                                            type="number"
                                            min="0"
                                            name="qty1"
                                            class="form-control @error('qty') is-invalid @enderror"
                                            value="{{ old('qty') ? old('qty') : 1 }}"
                                            required
                                        >
                                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus">
                                        </button>
                                    </div>
                                    <div class="form-group float-right">
                                        <button type="button" id="remove-input-qty1" class="btn btn-sm btn-danger remove-input-qty" data-value="1"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="modal-footer" style="width: 100%;">
                    <button class="btn btn-secondary" type="button" onclick="location.href='{{route('services.show', ["service" => $service->id])}}';">{{__('messages.admin.general.cancel')}}</button>
                        <input type="hidden" value="{{$service->id}}" name="service_id" id="service_id">
                        <input type="submit" class="btn btn-success" name="save" value="{{__('messages.admin.general.save')}}">
                </div>
            </form>
        </div>
    </div>
</div>

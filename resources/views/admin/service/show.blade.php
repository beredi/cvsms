@extends('layouts.admin')

@section('content')
    @if(\Illuminate\Support\Facades\Session::has('items-errors'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger">
                {{ \Illuminate\Support\Facades\Session::get('items-errors') }}
            </div>
        </div>
    </div>
    @endif

    @include('admin.includes.breadcrumb', ['route' => 'services.all', 'where' => __('messages.admin.menu.services.plural_name')])
    <div class="row" style="margin-top: 10px;">
        <div class="col-md-12">
            <h2 class="text-dark">{{__('messages.admin.menu.services.name')}}</h2>
        </div>
        <div class="col-md-3 col-sm-12 small">
            <a
                href="{{route('services.edit', ['service' => $service->id])}}"
                class="btn btn-primary btn-sm"
            >
                <i class="fas fa-user-edit"></i> {{__('messages.admin.general.edit')}}
            </a>
            <a
                href="#"
                class="btn btn-warning btn-sm"
                data-target="#addItemFromStock"
                data-toggle="modal"
            >
                <i class="fas fa-cart-plus" ></i> {{ __('messages.admin.menu.services.add-stock-items') }}
            </a>
        </div>
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-md-1 col-sm-12 small mt-1">
            <i class="fas fa-user-alt"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.customers.name'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary"><a href="{{route('customers.show', ['customer' => $service->customer()->id])}}">{{$service->customer()->fullName()}}</a></strong>
        </div>
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-md-1 col-sm-12 small mt-1">
            <i class="fas fa-car"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.vehicles.name'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary"><a href="{{route('vehicles.show', ['vehicle' => $service->vehicle->id])}}">{{$service->vehicle->displayName()}}</a></strong>
        </div>
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-md-1 col-sm-12 small mt-1">
            <i class="fas fa-pen"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.services.service.name'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary">{{$service->name}}</strong>
        </div>
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-md-1 col-sm-12 small mt-1">
            <i class="fas fa-audio-description"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.services.service.description'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary">{{$service->description}}</strong>
        </div>
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-md-1 col-sm-12 small mt-1">
            <i class="fas fa-bookmark"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.services.service.km'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary">{{$service->kilometers}}</strong>
        </div>
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-md-1 col-sm-12 small mt-1">
            <i class="fas fa-stopwatch"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.services.service.time_spent'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary">{{$service->time_spent}}</strong>
        </div>
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-md-1 col-sm-12 small mt-1">
            <i class="fas fa-dollar-sign"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.services.service.price'))}} [RSD]
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary">{{$service->price}}</strong>
        </div>
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-md-1 col-sm-12 small mt-1">
            <i class="fas fa-calendar-alt"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.services.service.date'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary">{{date('d.m.Y', strtotime($service->date))}}</strong>
        </div>
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-md-1 col-sm-12 small mt-1">
            <i class="fas fa-user-tie"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.employees.name'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            <strong class="text-primary"><a href="{{route('employees.show', ['user' => $service->employee->id])}}">{{$service->employee->fullName()}}</a></strong>
        </div>
    </div>
    <hr>
    <div class="row mt-2">
        <div class="col-md-1 col-sm-12 small mt-1">
            <i class="fas fa-cart-plus"></i> {{\Illuminate\Support\Str::upper(__('messages.admin.menu.services.parts'))}}
        </div>
        <div class="col-md-9 col-sm-12">
            @include('admin.stock._allServiceItems', ['items' => $service->stock_items, 'serviceId' => $service->id])
        </div>
    </div>
    @include('admin.service.addStockItem', ['service' => $service])
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            function selectizeSelect(selectId){
                $('#'+selectId).selectize({
                    valueField: 'code',
                    labelField: 'name',
                    searchField: 'name',
                    options: [],
                    load: function (query, callback) {
                        if (query.length < 2) return callback();
                        $.ajax({
                            url: '@php echo route('stock-item.get-stock-items') @endphp',
                            type: 'GET',
                            dataType: 'json',
                            data: {
                                characters: query,
                            },
                            error: function() {
                                callback();
                            },
                            success: function(res) {
                                callback(res);
                            }
                        });

                    }
                });
            }

            // generate for new select
            function generateHTMLSelect(id){
                return "<div id=\"input-item-qty"+id+"\">\n" +
                    "<div class=\"form-group float-left w-75\">\n" +
                    "<div class=\"control-group\">\n" +
                    "<select\n" +
                    "name=\"item"+id+"\"\n" +
                    "required\n" +
                    "class=\"select-item\"\n" +
                    "id=\"select-item"+id+"\"\n" +
                    "placeholder=\"{{__('messages.admin.general.search-for')}}\"\n" +
                    ">\n" +
                    "</select>\n" +
                    "</div>\n" +
                    "</div>\n" +
                    "<div class=\"form-group float-right w-25\">\n" +
                    "<div class=\"number-input\">\n" +
                    "<button type=\"button\" onclick=\"this.parentNode.querySelector('input[type=number]').stepDown()\" >\n" +
                    "</button>\n" +
                    "<input\n" +
                    "type=\"number\"\n" +
                    "min=\"0\"\n" +
                    "name=\"qty"+id+"\"\n" +
                    "class=\"form-control @error('qty') is-invalid @enderror\"\n" +
                    "value=\"{{ old('qty') ? old('qty') : 1 }}\"\n" +
                    "required\n" +
                    ">\n" +
                    "<button type=\"button\" onclick=\"this.parentNode.querySelector('input[type=number]').stepUp()\" class=\"plus\">\n" +
                    "</button>\n" +
                    "</div>\n" +
                    "<div class=\"form-group float-right\">\n" +
                    "<button type=\"button\" id=\"remove-input-qty"+id+"\" class=\"btn btn-sm btn-danger remove-input-qty\" data-value=\""+id+"\"><i class=\"fas fa-trash\"></i></button>\n" +
                    "</div>\n" +
                    "</div>\n" +
                    "</div>"
            }

            $('#all-stock-items').DataTable( {
                "order": []
            } );
            selectizeSelect('select-item1');

            // logic - On click ADD button in modal
            $('#add-item').on('click', function (){
                const dataValue = $(this).attr('data-value');
                const newDataValue = parseInt(dataValue) + 1;
                $(this).attr('data-value', newDataValue);
                $('#form-items').append(generateHTMLSelect(newDataValue));
                selectizeSelect('select-item'+newDataValue);
            })

            $('form#add-items').on('click', 'button.remove-input-qty', function (){
                const dataValue = $(this).attr('data-value');
                $('div#input-item-qty'+dataValue).remove();
            })

        });
    </script>
@endsection

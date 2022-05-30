@extends('layouts.admin')
@section('content')
    @include('admin.includes.breadcrumb', ['route' => 'services.all', 'where' => __('messages.admin.menu.services.plural_name')])
    <div class="row">
        <div class="col-lg-5 col-md-12">
            <h2>{{__('messages.admin.menu.services.update-record')}}</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('services.update', ['service' => $service->id]) }}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="customer" class="required">{{ __('messages.admin.menu.customers.name') }}</label>
                    <div class="control-group">
                        <select name="customer" required id="customer" placeholder="{{__('messages.admin.general.search-for')}}">
                            <option value=""></option>
                            @foreach($customers as $customer)
                                <option value="{{$customer->id}}"
                                @if($service->customer()->id == $customer->id) selected @endif
                                >{{$customer->fullName()}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="vehicle" class="required">{{ __('messages.admin.menu.vehicles.name') }}</label>
                    <div class="control-group">
                        <select name="vehicle" required id="vehicle" placeholder="{{__('messages.admin.general.search-for')}}">
                            <option value=""></option>
                            @foreach($service->customer()->vehicles as $vehicle)
                                <option value="{{$vehicle->id}}"
                                        @if($service->vehicle->id == $vehicle->id) selected @endif
                                >{{$vehicle->displayName()}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="required">{{__('messages.admin.menu.services.service.name')}} </label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $service->name }}" required>
                </div>
                <div class="form-group">
                    <label for="description">{{__('messages.admin.menu.services.service.description')}} </label>
                    <textarea name="description" class="form-control" id="description" rows="3">{{ $service->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="kilometers" class="required">{{__('messages.admin.menu.services.service.km')}} </label>
                    <input type="number" name="kilometers" class="form-control @error('kilometers') is-invalid @enderror" value="{{ $service->kilometers }}" required>
                </div>
                <div class="form-group">
                    <label for="time_spent" class="required">{{__('messages.admin.menu.services.service.time_spent')}} [h]</label>
                    <input type="number" step="0.01" name="time_spent" class="form-control @error('time_spent') is-invalid @enderror" value="{{ $service->time_spent }}" required>
                </div>
                <div class="form-group">
                    <label for="price">{{__('messages.admin.menu.services.service.price')}} [RSD]</label>
                    <input type="number" step="0.01" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ $service->price }}">
                </div>
                <div class="form-group">
                    <label for="paid">{{__('messages.admin.menu.services.service.paid')}} [RSD]</label>
                    <input type="number" step="0.01" name="paid" class="form-control @error('paid') is-invalid @enderror" value="{{ $service->paid }}">
                </div>
                <div class="form-group">
                    <label for="date" class="required">{{__('messages.admin.menu.services.service.date')}} [RSD]</label>
                    <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{ $service->date }}" required>
                </div>


                <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="save-service" value="save">
                            {{ __('messages.admin.menu.services.update-record') }}
                        </button>
                        <button type="submit" class="btn btn-warning" name="save-service" value="addStockItem">
                            <i class="fas fa-cart-plus"></i> {{ __('messages.admin.menu.services.add-stock-items') }}
                        </button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('js/handlers/services.js')}}"></script>
@endsection

@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-5 col-md-12">
            <h2>{{__('messages.admin.menu.vehicles.update-record')}}</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('vehicles.update', ['vehicle' => $vehicle->id])}}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="type" class="required">{{ __('messages.admin.menu.vehicles.vehicle.type') }}</label>
                    <div class="control-group">
                        <select name="type" required id="type" placeholder="{{__('messages.admin.general.search-for')}}">
                            <option value=""></option>
                            @foreach($types as $type)
                                <option value="{{$type->id}}"
                                @if($vehicle->type->id == $type->id) selected @endif
                                >{{$type->type}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="brand" class="required">{{ __('messages.admin.menu.vehicles.vehicle.brand') }}</label>
                    <div class="control-group">
                        <select name="brand" required id="brand" placeholder="{{__('messages.admin.general.search-for')}}">
                            <option value=""></option>
                            @foreach($brands as $brand)
                                <option value="{{$brand->id}}"
                                        @if($vehicle->brand()->id == $brand->id) selected @endif
                                >{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="model" class="required">{{ __('messages.admin.menu.vehicles.vehicle.model') }}</label>
                    <div class="control-group">
                        <select name="model" required id="models" placeholder="{{__('messages.admin.general.search-for')}}">
                            <option value=""></option>
                            @foreach($models as $model)
                                <option value="{{$model->id}}"
                                        @if($vehicle->model->id == $model->id) selected @endif
                                >{{$model->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="customers">{{ __('messages.admin.menu.customers.name') }}</label>
                    <div class="control-group">
                        <select name="customers" id="customers" placeholder="{{__('messages.admin.general.search-for')}}">
                            <option value=""></option>
                            @foreach($customers as $customer)
                                <option value="{{$customer->id}}"
                                        @if($vehicle->customer->id == $customer->id) selected @endif
                                >{{$customer->fullName()}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="engine_volume">{{__('messages.admin.menu.vehicles.vehicle.engine_volume')}} </label>
                    <input type="number" step="0.01" name="engine_volume" class="form-control @error('engine_volume') is-invalid @enderror" value="{{ $vehicle->engine_volume }}">
                </div>
                <div class="form-group">
                    <label for="engine_power">{{__('messages.admin.menu.vehicles.vehicle.engine_power')}} [kW] </label>
                    <input type="number" step="0.01" name="engine_power" class="form-control @error('engine_power') is-invalid @enderror" value="{{ $vehicle->engine_power }}">
                </div>
                <div class="form-group">
                    <label for="chassis_num">{{__('messages.admin.menu.vehicles.vehicle.chassis_num')}}</label>
                    <input type="number" step="0.01" name="chassis_num" class="form-control @error('chassis_num') is-invalid @enderror" value="{{ $vehicle->chassis_num }}">
                </div>
                <div class="form-group">
                    <label for="year">{{ __('messages.admin.menu.vehicles.vehicle.year') }}</label>
                    <div class="control-group">
                        <select name="year" id="year" placeholder="{{__('messages.admin.general.search-for')}}">
                            <option value=""></option>
                            @foreach($years as $year)
                                <option value="{{$year}}"
                                        @if($year == $vehicle->year) selected @endif
                                >{{$year}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="transmission" class="required">{{ __('messages.admin.menu.vehicles.vehicle.transmission') }}</label>
                    <div class="control-group">
                        <select name="transmission" required id="transmission" placeholder="{{__('messages.admin.general.search-for')}}">
                            <option value=""></option>
                            @foreach(\App\Models\Vehicle::getTransmissionTypes() as $trasType)
                                <option value="{{$trasType}}"
                                    @if($trasType == $vehicle->transmission) selected @endif
                                >{{$trasType}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" name="create_vehicle" id="create_vehicle" value="{{__('messages.admin.menu.vehicles.update-record')}}" class="btn btn-lg btn-success">
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('js/handlers/vehicles.js')}}"></script>
@endsection

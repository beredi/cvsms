@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-5">
            <h5>{{ __('messages.admin.menu.vehicles.create_topic', ['topic' => $topic]) }}</h5>
        </div>
    </div>
    <form method="POST" action="{{ route('vehicle'.$topic.'.store') }}">
        @csrf
        @if($topic == \App\Models\Vehicle::VEHICLE_MODEL)
            <div class="form-group">
                <label for="{{\App\Models\Vehicle::VEHICLE_MODEL}}" class="required">
                    {{ __('messages.admin.menu.vehicles.vehicle.'.\App\Models\Vehicle::VEHICLE_MODEL) }}
                </label>
                <div class="control-group">
                    <select name="{{$topic}}" required id="{{$topic}}" placeholder="{{__('messages.admin.general.search-for')}}">
                        <option value=""></option>
                        @if($brands !== null and $brands->isNotEmpty())
                            @foreach($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        @endif
        <div class="form-group">
            <label for="name" class="required">{{__('messages.admin.menu.vehicles.vehicle.name')}}</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                   @if($topic == 'type')
                   name = 'type'
                   @else
                   name = 'name'
                   @endif
                   required autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                {{ __('messages.admin.general.add') }}
            </button>
        </div>
    </form>
@endsection
@section('scripts')
    <!-- Page level custom scripts -->
    <script>
        $(document).ready(function() {
            $('#{{\App\Models\Vehicle::VEHICLE_MODEL}}').selectize({
                create: true
            });
        });
    </script>
@endsection

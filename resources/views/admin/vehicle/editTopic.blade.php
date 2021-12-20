@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-5">
            <h5>{{ __('messages.admin.menu.vehicles.update_topic', ['topic' => $topic]) }}</h5>
        </div>
    </div>
    <form method="POST" action="{{ route('vehicle'.$topic.'.update', ['type' => $brand->id]) }}">
        @method('PATCH')
        @csrf

        @if($topic == 'model')
            <div class="form-group">
                <span>{{__('messages.admin.menu.vehicles.vehicle.brand')}}: <strong>{{$brand->brand->name}}</strong></span>
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
                   value="{{ ($topic=='type')?$brand->type:$brand->name }}" required autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                {{ __('messages.admin.general.update') }}
            </button>
        </div>
    </form>
@endsection

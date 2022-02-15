@extends('layouts.admin')
@section('content')
    @include('admin.includes.breadcrumb', ['route' => 'stock-item.all', 'where' => __('messages.admin.menu.stock.name')])
    <div class="row">
        <div class="col-lg-5 col-md-12">
            <h2>{{__('messages.admin.menu.stock.new-record')}}</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('stock-item.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name" class="required">{{ __('messages.admin.menu.stock.item.name') }}</label>
                    <div class="control-group">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="purchase_price" class="required">{{ __('messages.admin.menu.stock.item.purchase_price') }}</label>
                    <div class="control-group">
                        <input type="number" name="purchase_price" class="form-control @error('purchase_price') is-invalid @enderror" value="{{ old('purchase_price') }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="price" class="required">{{ __('messages.admin.menu.stock.item.price') }}</label>
                    <div class="control-group">
                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="on_stock" class="required">{{ __('messages.admin.menu.stock.item.on_stock') }}</label>
                    <div class="number-input">
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" ></button>
                        <input type="number" min="0" name="on_stock" class="form-control @error('on_stock') is-invalid @enderror" value="{{ old('on_stock') ? old('on_stock') : 1 }}" required>
                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                    </div>
                </div>

                <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            {{ __('messages.admin.menu.stock.new-record') }}
                        </button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('js/handlers/services.js')}}"></script>
@endsection

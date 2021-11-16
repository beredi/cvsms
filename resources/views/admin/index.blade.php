@extends('layouts.admin')

@section('content')

    <h1>{{__('messages.admin.dashboard.welcome', ['name' => \Illuminate\Support\Facades\Auth::user()->name])}}</h1>

@endsection

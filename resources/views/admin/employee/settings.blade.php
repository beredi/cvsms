@extends('layouts.admin')
@section('content')
<h3>{{__('messages.admin.settings.settings-for',['name' => $user->fullName()])}}</h3>
<div class="row">
    <div class="col-md-5">
        <form method="POST" action="{{ route('settings.store') }}">
            @csrf
            <div class="form-group">
                <label for="lang" class="required">{{ __('messages.admin.settings.language') }}</label>
                <div class="control-group">
                    <select name="lang" required id="lang" placeholder="{{__('messages.admin.general.search-for')}}">
                        <option value=""></option>
                        @foreach(\App\Models\Setting::getLanguages() as $value => $language)
                            <option value="{{$value}}"
                                    @if($user->language() == $value) selected @endif
                            >{{$language}}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="user_id" value="{{$user->id}}">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    {{ __('messages.admin.settings.update-record') }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
    <script>
        $(function (){
            $('#lang').selectize();
        });
    </script>
@endsection

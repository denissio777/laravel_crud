@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="form-horizontal" action="{{route('admin.update', $user) }}" method="post">
            <input type="hidden" name="_method" value="put">
            {{ csrf_field() }}
            <fieldset class="form-horizontal">
                <fieldset class="form-horizontal">
                    <div class="form-group row">
                        <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First name') }}</label>

                        <div class="col-md-6">
                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{$user->first_name ?? ''}}" required autocomplete="first_name" autofocus>

                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last name') }}</label>

                        <div class="col-md-6">
                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{$user->last_name ?? ''}}" required autocomplete="last_name" autofocus>

                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="date_of_birthday" class="col-md-4 col-form-label text-md-right">{{ __('Date of birthday') }}</label>

                        <div class="col-md-6">
                            <input id="date_of_birthday" type="date" class="form-control @error('date_of_birthday') is-invalid @enderror" name="date_of_birthday" value="{{$user->date_of_birthday ?? ''}}" required autocomplete="date_of_birthday" autofocus>

                            @error('date_of_birthday')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                        <div class="col-md-6">
                            <input id="phone" type="tel" pattern="[0]{1}[0-9]{2}-[0-9]{3}-[0-9]{4}" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$user->phone ?? ''}}" required autocomplete="phone" autofocus>
                            <small class="form-text text-muted">Please enter ur phone in format 0XX-XXX-XXXX</small>
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email ?? ''}}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-6">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </div>
                </fieldset>
            </fieldset>
        </form>
    </div>
@endsection
















{{--@extends('layouts.app')--}}
{{--@section('content')--}}
{{--<div class="container">--}}
    {{--<form class="form-horizontal" action="{{route('admin.update', $user) }}" method="post">--}}
        {{--<input type="hidden" name="_method" value="put">--}}
        {{--{{ csrf_field() }}--}}
        {{--<fieldset class="form-horizontal">--}}
            {{--<div class="form-group"><label class="col-sm-2 control-label">First name:</label>--}}
                {{--<div class="col-sm-10">--}}
                    {{--<input type="text" name="first_name" class="form-control" placeholder="" value="{{$user->first_name ?? ''}}">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="form-group"><label class="col-sm-2 control-label">Last name:</label>--}}
                {{--<div class="col-sm-10">--}}
                    {{--<input type="text" name="last_name" class="form-control" placeholder="" value="{{$user->last_name ?? ''}}">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="form-group"><label class="col-sm-2 control-label">Date of birthday:</label>--}}
                {{--<div class="col-sm-10">--}}
                    {{--<input type="date" name="date_of_birthday" class="form-control" placeholder="" value="{{$user->date_of_birthday ?? ''}}">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="form-group"><label class="col-sm-2 control-label">Phone:</label>--}}
                {{--<div class="col-sm-10">--}}
                    {{--<input type="tel" pattern="[0]{1}[0-9]{2}-[0-9]{3}-[0-9]{4}" name="phone" class="form-control" placeholder="" value="{{$user->phone ?? ''}}">--}}
                    {{--<small class="form-text text-muted">Please enter ur phone in format 0XX-XXX-XXXX</small>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="form-group"><label class="col-sm-2 control-label">E-mail:</label>--}}
                {{--<div class="col-sm-10">--}}
                    {{--<input type="text" name="email" class="form-control" placeholder="" value="{{$user->email ?? ''}}">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="form-group"><label class="col-sm-2 control-label">Password:</label>--}}
                {{--<div class="col-sm-10">--}}
                    {{--<input type="password" name="password" class="form-control" placeholder="" value="">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
                {{--<div class="col-sm-4 col-sm-offset-2">--}}
                    {{--<button class="btn btn-primary" type="submit">Save</button>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</fieldset>--}}
    {{--</form>--}}
{{--</div>--}}
{{--@endsection--}}

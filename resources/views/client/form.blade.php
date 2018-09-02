@extends('layouts.app')

@section('content')
<div class="row">
      <div class="medium-12 large-12 columns">
        <h4>{{ $modify == 1 ? 'Modify Client' : 'New Client' }}</h4>
        <form action="{{ $modify == 1 ? route('update_client', [ 'client_id' => $client_id ]) : route('create_client') }}" method="post">
          {{ csrf_field() }}
          <div class="medium-4  columns">
            <label>Title</label>
            <select name="title">
            @foreach( $titles as $title )
                          <option value="{{ $title }}" >{{ $title }}.</option>
            @endforeach
                        </select>
          </div>
          <div class="medium-4  columns">
            <label>Name</label>
            <input name="name" type="text" value="{{ old('name') ? old('name') : $name }}">
            <small class="error">{{$errors->first('name')}}</small>
          </div>
          <div class="medium-4  columns">
            <label>Last Name</label>
            <input name="last_name" type="text" value="{{ old('last_name') ? old('last_name') : $last_name }}">
            <small class="error">{{$errors->first('last_name')}}</small>
          </div>
          <div class="medium-8  columns">
            <label>Address</label>
            <input name="address" type="text" value="{{ old('address') ? old('address') : $address }}">
            <small class="error">{{$errors->first('address')}}</small>
          </div>
          <div class="medium-4  columns">
            <label>zip_code</label>
            <input name="zip_code" type="text" value="{{ old('zip_code') ? old('zip_code') : $zip_code }}">
            <small class="error">{{$errors->first('zip_code')}}</small>
          </div>
          <div class="medium-4  columns">
            <label>City</label>
            <input name="city" type="text" value="{{ old('city') ? old('city') : $city }}">
            <small class="error">{{$errors->first('city')}}</small>
          </div>
          <div class="medium-4  columns">
            <label>State</label>
            <input name="state" type="text" value="{{ old('state') ? old('state'): $state }}">
            <small class="error">{{$errors->first('state')}}</small>
          </div>
          <div class="medium-12  columns">
            <label>Email</label>
            <input name="email" type="text" value="{{ old('email') ? old('email') : $email }}">
            <small class="error">{{$errors->first('email')}}</small>
          </div>
          <div class="medium-12  columns">
            <input value="SAVE" class="button success hollow" type="submit">
          </div>
        </form>
      </div>
    </div>
@endsection
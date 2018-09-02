@extends('layouts.app')

@section('content')
    <div class="row">
      <div class="medium-6 large-5 columns">
        <form method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="file" name="image_upload" />
            <small class="error">{{$errors->first('image_upload')}}</small>
            <input type="submit" value="UPLOAD" class="button success hollow" />
        </form>
      </div>
    </div>
@endsection
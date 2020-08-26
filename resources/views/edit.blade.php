@extends('app')

@section('content')
<div class="mt-4">
<form action="{{ route('update',$test->id) }}" method="POST">
    @csrf
    @method('PUT')
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" value="{{$test->name}}" name="name" class="form-control @error('name') is-invalid @enderror" id="name">
    @error('name')
    <div class="invalid-feedback">
    {{ $message }}
    </div>
    @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection
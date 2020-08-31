@extends('app')

@section('content')
<div class="mt-4">
<form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
    <label for="profile">Profile</label>
    <input type="file" name="profile" class="form-control" id="profile">
    </div>
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name">
    @error('name')
    <div class="invalid-feedback">
    {{ $message }}
    </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email">
    @error('email')
    <div class="invalid-feedback">
    {{ $message }}
    </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="photos">Photos</label>
    <input type="file" name="photos[]" class="form-control" id="photos" multiple />
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection
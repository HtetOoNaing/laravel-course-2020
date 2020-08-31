@extends('app')

@section('content')
<div class="mt-4">
<form action="{{ route('update',$test->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
    <label for="profile">
    <img src='{{asset("storage/$test->profile")}}' class="rounded-circle" alt="profile" width="30" height="30" title="" />
    </label>
    <input type="file" name="profile" class="form-control d-none" id="profile">
    </div>
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" value="{{$test->name}}" name="name" class="form-control @error('name') is-invalid @enderror" id="name">
    @error('name')
    <div class="invalid-feedback">
    {{ $message }}
    </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" value="{{$test->email}}" name="email" class="form-control @error('email') is-invalid @enderror" id="email">
    @error('email')
    <div class="invalid-feedback">
    {{ $message }}
    </div>
    @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection
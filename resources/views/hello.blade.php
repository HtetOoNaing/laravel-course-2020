@extends('app')

@section('content')
<div class="my-4">
<a href="{{ route('create') }}" class="btn btn-primary">Add New Test</a>
</div>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Profile</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($tests as $key => $test)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td><img src='storage/{{$test->profile}}' class="rounded-circle" alt="" width="30" height="30" title="" /></td>
      <td>{{$test->name}}</td>
      <td>{{$test->email}}</td>
      <td>
        <a href="{{ route('edit',$test->id) }}" class="btn btn-sm btn-outline-info">Edit</a>
        <a href="{{ route('delete',$test->id) }}" class="btn btn-sm btn-outline-danger">Delete</a>
      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>
@endsection
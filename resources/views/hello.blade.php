@extends('app')

@section('content')

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
      @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Test</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
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
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="" method="POST" id="editForm" enctype="multipart/form-data">
      @csrf
      @method('PUT')
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Test</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
          <div class="form-group">
            <label for="profile">
              <img src='' id="editProfileImg" class="rounded-circle" width="30" height="30" title="" />
            </label>
            <input type="file" name="profile" class="form-control d-none" id="profile">
          </div>
          <div class="form-group">
            <label for="editName">Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="editName">
            @error('name')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="editEmail">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="editEmail">
            @error('email')
            <div class="invalid-feedback">
            {{ $message }}
            </div>
            @enderror
          </div>
          <!-- <div class="form-group">
            <label for="photos">Photos</label>
            <input type="file" name="photos[]" class="form-control" id="photos" multiple />
          </div> -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="my-4">
<!-- <a href="{{ route('create') }}" class="btn btn-primary">Add New Test</a> -->
<button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add New Test</button>
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
        <!-- <a href="{{ route('edit',$test->id) }}" class="btn btn-sm btn-outline-info">Edit</a> -->
        <button class="btn btn-sm btn-outline-info" onclick="handleEdit({{$test}})">Edit</button>
        <a href="{{ route('delete',$test->id) }}" class="btn btn-sm btn-outline-danger">Delete</a>
      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>
@endsection

@section('script')
<script>
  function handleEdit(test) {
    console.log(test);
    $('#editName').val(test.name);
    $('#editEmail').val(test.email);
    $('#editProfileImg').attr('src','storage/'+test.profile);
    // let img = document.getElementById('editProfileImg');
    // img.src = 'storage/' + test.profile;
    let form = document.getElementById('editForm');
    form.action = 'update/'+test.id;
    $('#editModal').modal('show');
  }

  // $('#editProfileImg').click(function() {
  //   $("#profile").click();
  // })
</script>
@endsection
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Image upload lts6.0</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
  <div class="conainer">
  <div class="panel panel-primary">
                   <div class="panel-heading">
                      <h2>Laravel 6.0 image upload example</h2>
                   </div>
                   <div class="panel-body">
                      @if ($message = Session::get('success'))
                      <div class="alert alert-success alert-block">
                         <button type="button" class="close" data-dismiss="alert">×</button>
                         <strong>{{ $message }}</strong>
                      </div>
                      <img src="images/{{ Session::get('image') }}">
                      @endif
                      @if (count($errors) > 0)
                      <div class="alert alert-danger">
                         <strong>Whoops!</strong> There were some problems with your input.
                         <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                         </ul>
                      </div>
                      @endif
                       @if (Route::has('image.upload.post'))
                      <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
                            {{-- <a href="{{ route('register') }}">Register</a> --}}
                        @endif
                        <form action="#">
                         @csrf
                         <div class="row">
                            <div class="col-md-6">
                               <input type="file" name="image" class="form-control">
                            </div>
                            <div class="col-md-6">
                               <button type="submit" class="btn btn-success">Upload</button>
                            </div>
                         </div>
                      </form>
                   </div>
                </div>
</div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title>custom auth</title>
</head>
<body>
    <form action="{{route('register-user')}}" method="post">
        @if (Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if (Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
        @endif
        @csrf
        <div class="form-group">
          <label for="exampleInputName1">Name </label>
          <input type="text" class="form-control" value="{{old('name')}}" name="name" id="exampleInputName1"  placeholder="Enter Name">
          {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your name with anyone else.</small> --}}
          <span class="text-dunger">@error('name'){{$message}}@enderror</span>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" value="{{old('email')}}" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
          {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
          <span class="text-dunger">@error('email'){{$message}}@enderror</span>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" value="{{old('password')}}" id="exampleInputPassword1" name="password" placeholder="Password">
          <span class="text-dunger">@error('password'){{$message}}@enderror</span>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </form>
      <div class="form-check">
        <a href="/login"> GO BACK login page</a>
        </div>
</body>
</html>
<!doctype html>
<html lang="en">
  <head>
    <title>Add-Car</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>










    <div class="row">
  <div class="col-3 col-s-3 menu">
    
  </div>

  <div class="col-6 col-s-9">
<br>
<h1><center>Car Registration Form</center></h1>
    <br>
<form action="{{route('register-car')}}" method="post" enctype="multipart/form-data">

@csrf
@if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if(Session::has('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}}</div>
        @endif


    <div class="input-group flex-nowrap">
    <div class="input-group-prepend">
       <span class="input-group-text" id="addon-wrapping">Company</span>
    </div>
       <input type="text" class="form-control" name="company" placeholder="" aria-label="Username" aria-describedby="addon-wrapping">
       <p class="error-text text-danger">@error('company'){{$message}}@enderror</p>
    </div>



<div class="input-group flex-nowrap">
  <div class="input-group-prepend">
    <span class="input-group-text" id="addon-wrapping">Registration No</span>
  </div>
  <input type="text" class="form-control"name="reg_no" placeholder="" aria-label="Username" aria-describedby="addon-wrapping">
  <p class="error-text text-danger">@error('reg_no'){{$message}}@enderror</p>
</div>


<div class="circal-form">
        <span class="circal-title text-dark"><h5>Type:</h5> </span>
        <!-- <div class="category"> -->
            <input type="radio"    name="type"   value="sedan" @if (old('type') === 'sedan') checked @endif>  Sedan
            <input type="radio" name="type"  value="micro" @if (old('type') === 'micro') checked @endif>  Microbus
            <input type="radio" name="type"  value="suv" @if (old('type') === 'suv') checked @endif>  SUV
            <span class="text-danger">@error('type'){{$message}}@enderror</span>
        <!-- </div> -->
</div>

<div class="input-group flex-nowrap">
  <div class="input-group-prepend">
    <span class="input-group-text" id="addon-wrapping">Model</span>
  </div>
  <input type="text" class="form-control"  name="model" placeholder="" aria-label="Username" aria-describedby="addon-wrapping">
  <p class="error-text text-danger">@error('model'){{$message}}@enderror</p>
</div>


<div class="input-group flex-nowrap">
  <div class="input-group-prepend">
    <span class="input-group-text" id="addon-wrapping">Year</span>
  </div>
  <input type="text" class="form-control"  name="year" placeholder="" aria-label="Username" aria-describedby="addon-wrapping">
  <p class="error-text text-danger">@error('year'){{$message}}@enderror</p>
</div>

<div class="input-group flex-nowrap">
  <div class="input-group-prepend">
    <span class="input-group-text" id="addon-wrapping">Seat No</span>
  </div>
  <input type="text" class="form-control" name="seat" placeholder="" aria-label="Single-Bed" aria-describedby="addon-wrapping">
  <p class="error-text text-danger">@error('seat'){{$message}}@enderror</p>
</div>

<div class="input-group flex-nowrap">
  <div class="input-group-prepend">
    <span class="input-group-text" id="addon-wrapping">Bodyrent</span>
  </div>
  <input type="text" class="form-control" name="bodyrent" placeholder="" aria-label="Username" aria-describedby="addon-wrapping">
  <p class="error-text text-danger">@error('bodyrent'){{$message}}@enderror</p>
</div>
 <h5>Image</h5>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input"  name="image" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div>
</div>
<div class="text-danger">
  @error('image')
    {{ $message }}
  @enderror
</div>

<div class="button">
        <input type="submit" class="btn btn-success btn-sm mx-1" name="submit" value="Register Car">
     </div>

</form>  
<br>
<div class="box">
   <span>
   <a href="{{ url('car-list') }}" class="btn btn-info btn-sm mx-1">Go Back</a>
   </span>
   
</div>

</div>
    
  </body>
</html>
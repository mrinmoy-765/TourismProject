<!doctype html>
<html lang="en">
  <head>


<style>

.aside {
  background-color: #33b5e5;
  padding: 15px;
  color: #ffffff;
  text-align: center;
  font-size: 14px;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}

</style>


    <title>Title</title>
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
  <div class="col-2 col-s-3 menu">
  
</div>



<div class="col-6 col-s-9">


  <h1>Edit Profile Record</h1>
  <br>
 <form   method="post"   action="{{ url('update-admin/'.$data->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if(Session::has('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}}</div>
        @endif


    <input type="hidden" name="id" value="{{$data->id}}">

<div class="input-group flex-nowrap">
  <div class="input-group-prepend">
    <span class="input-group-text" id="addon-wrapping">First Name</span>
  </div>
  <input type="text" class="form-control" name="firstname" value="{{($data->firstname)}}" placeholder="" aria-label="Username" aria-describedby="addon-wrapping">
  <p class="error-text text-danger">@error('firstname'){{$message}}@enderror</p>
</div>


<div class="input-group flex-nowrap">
  <div class="input-group-prepend">
    <span class="input-group-text" id="addon-wrapping">Last Name</span>
  </div>
  <input type="text" class="form-control"name="lastname"  value="{{($data->lastname)}}" placeholder="" aria-label="Username" aria-describedby="addon-wrapping">
  <p class="error-text text-danger">@error('lastname'){{$message}}@enderror</p>
</div>


<div class="input-group flex-nowrap">
  <div class="input-group-prepend">
    <span class="input-group-text" id="addon-wrapping">Email</span>
  </div>
  <input type="text" class="form-control"name="email"  value="{{($data->email)}}" placeholder="" aria-label="Username" aria-describedby="addon-wrapping">
  <p class="error-text text-danger">@error('email'){{$message}}@enderror</p>
</div>


<div class="input-group flex-nowrap">
  <div class="input-group-prepend">
    <span class="input-group-text" id="addon-wrapping">Phone No</span>
  </div>
  <input type="text" class="form-control"name="phone"  value="{{($data->phone)}}" placeholder="" aria-label="Username" aria-describedby="addon-wrapping">
  <p class="error-text text-danger">@error('phone'){{$message}}@enderror</p>
</div>


<div class="input-group flex-nowrap">
  <div class="input-group-prepend">
    <span class="input-group-text" id="addon-wrapping">Present Address</span>
  </div>
  <input type="text" class="form-control"name="prsentaddress"  value="{{($data->prsentaddress)}}" placeholder="" aria-label="Username" aria-describedby="addon-wrapping">
  <p class="error-text text-danger">@error('prsentaddress'){{$message}}@enderror</p>
</div>


 <div class="input-group flex-nowrap">
  <div class="input-group-prepend">
    <span class="input-group-text" id="addon-wrapping">Password</span>
  </div>
  <input type="text" class="form-control"name="seat" value="{{($data->password)}}" placeholder="" aria-label="Username" aria-describedby="addon-wrapping">
  <p class="error-text text-danger">@error('password'){{$message}}@enderror</p>
 </div>

 <div class="input-group flex-nowrap">
  <div class="input-group-prepend">
    <span class="input-group-text" id="addon-wrapping">Blood Group</span>
  </div>
  <input type="text" class="form-control"name="bg"  value="{{($data->bg)}}" placeholder="" aria-label="Username" aria-describedby="addon-wrapping">
  <p class="error-text text-danger">@error('bg'){{$message}}@enderror</p>
</div> 



   <div class="button">
        <input type="submit" class="btn btn-success btn-sm mx-1" name="update" value="Update">
     </div>
     
   

</form>

<br>
<div class="box">
   <span>
   <a href="{{ url('/admin-dashboard') }}" class="btn btn-info btn-sm mx-1">Go Back</a>
   </span>
   
</div>
</div>

  </div>


 


  </body>
</html>


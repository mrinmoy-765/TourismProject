<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Admin Login</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>



<nav class="navbar   ">
  <div class="container-fluid bg-color   ">
  <!--  <a class="navbar-brand " href="#"> -->
      <img src="{{URL::asset('/Images/travel-ell.avif')}}" alt="Na" width="100" height="90" class="image  justify-content: center;">
      <span class="navtext text-white  fw-bold justify-content-left ">Travel ELL</span> 
     
  <!--  </a> -->
 
    <span class="navbar-text text-white">
        Admin|Login
      </span>
</nav>
<section class="bg-main  hero-section">
    <div class="container">
        <div class="row mb-5 ">
            <div class="d-flex flex-column align-items-start justify-content-center col-xl-6 xol-lg-6 col-md-12 col-12 order-1 order-lg-0 text-md-start text-center">
                
                <video autoplay class="hero-video" loop muted src="{{URL::asset('/Images/login.mp4')}}">
                        Your browser does not support the video tag.
                </video>

                
            </div>

            <div class="col-xl-6 xol-lg-6 col-md-12 col-12 order-0 order-lg-1 hero-image--section ">
                <div class="text-md-end text-center mb-5">

                    
                <form  action="{{route('login-admin')}}" method="post">

                @if(Session::has('success'))
                      <div class="alert alert-success">{{Session::get('success')}}</div>
                     @endif
                @if(Session::has('fail'))
                         <div class="alert alert-danger">{{Session::get('fail')}}</div>
                     @endif
                @csrf 

                       <div class="mb-3" >
                       <label for="exampleInputEmail1" class="form-label">Email address</label>
                       <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{old('email')}}" aria-describedby="emailHelp">
                       <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                       </div>
                       
                       <span class="error email error">
                          <p class="error-text">@error('email'){{$message}}@enderror</p>
                      </span>

                       <div class="mb-3">
                       <label for="exampleInputPassword1" class="form-label">Password</label>
                       <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                       </div>

                       <span class="error firstname error">
                           <p class="error-text">@error('password'){{$message}}@enderror</p>
                       </span>

                       <div class="mb-3 form-check">
                       <input type="checkbox" class="form-check-input" id="exampleCheck1">
                       <label class="form-check-label" for="exampleCheck1">Check me out</label>
                       </div>
                       <button type="submit" class="btn btn-primary mb-6">Log in</button><br>
                       
                </form>
                <div class="mb-6 d-flex justify-content-left">
                       <a href="{{URL::asset('./admin-reg')}}">Register an Admin</a>
                       </div>

                </div>
            </div>

            

        </div>

    </div>

</section>

</body>
</html>
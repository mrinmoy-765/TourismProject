<!doctype html>
<html lang="en">
  <head>
    <title>Admin Registration</title>

<style>
    body{


       
        background:url('/Images/reg.jpg') no-repeat;
        background-position: center ; 
        background-size: cover;
        min-height:100vh;
         width:100%; 
        
        

    }





</style>




    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    
</head>
  <body class="body">
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css"></script>

   

    <div class="heading text-white">Travel Ell</div>
<div class="container">
    
    <form action="{{route('register-admin')}}" method="post">
        @if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if(Session::has('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}}</div>
        @endif
      @csrf 
        <div class="card-details">
            <div class="card-box">
            <span class="error firstname error">
                <p class="error-text">@error('firstname'){{$message}}@enderror</p>
            </span>
                <!-- <span class="details">First Name</span> -->
                <!-- <label for="firstname">Firstname</label> -->
                <i class="fa-solid fa-user icon"></i>
                <input type="text"   name="firstname"  value="{{old('firstname')}}" placeholder="Enter First Name">
                
            </div>

            <!-- <span class="error-text">@error('firstname'){{$message}}@enderror</span> -->

            
           

            <div class="card-box">
            <span class="error firstname error">
                <p class="error-text">@error('lastname'){{$message}}@enderror</p>
            </span>
                <!-- <span class="details">Last Name</span> -->
                <i class="fa-solid fa-user icon1"></i>
                <input type="text"  name="lastname"   value="{{old('lastname')}}" placeholder="Enter Last Name">
                <!-- <span class="text-danger">@error('lastname'){{$message}}@enderror</span> -->
            </div>

            <div class="card-box">
            <span class="error firstname error">
                <p class="error-text">@error('email'){{$message}}@enderror</p>
            </span>
                <!-- <span class="details">Email</span> -->
                <i class="fa-solid fa-envelope icon2"></i>
                <input type="email" name="email"    value="{{old('email')}}"  placeholder="Enter Email">
                <!-- <span class="text-danger">@error('email'){{$message}}@enderror</span> -->
            </div>

            <div class="card-box">
            <span class="error firstname error">
                <p class="error-text">@error('phone'){{$message}}@enderror</p>
            </span>
                <!-- <span class="details">Phone No</span> -->
                <i class="fa-solid fa-phone icon3"></i>
                <input type="phone" name="phone"   value="{{old('phone')}}" placeholder="Enter Phone no">
                <!-- <span class="text-danger">@error('phone'){{$message}}@enderror</span> -->
            </div>

            <div class="card-box">

            <span class="error firstname error">
                <p class="error-text">@error('present_address'){{$message}}@enderror</p>
            </span>
                <!-- <span class="details">Present Address</span> -->
                
                <i class="fa-solid fa-map-location icon4"></i>
                <input type="text" name="present_address"    value="{{old('present_address')}}"  placeholder="Enter present Address">
                <!-- <span class="text-danger">@error('present_address'){{$message}}@enderror</span> -->
            </div>
           
            <div class="card-box">
            <span class="error firstname error">
                <p class="error-text">@error('permanent_address'){{$message}}@enderror</p>
            </span>
                <!-- <span class="details">Permanent Address</span> -->
                <i class="fa-solid fa-house icon5"></i>
                <input type="text" name="permanent address"     value="{{old('permanent_address')}}" placeholder="Enter Permanent Address">
                <!-- <span class="text-danger">@error('permanent_address'){{$message}}@enderror</span> -->
            </div>

            <div class="card-box">
            <span class="error firstname error">
                <p class="error-text">@error('password'){{$message}}@enderror</p>
            </span>
                <!-- <span class="details">Password</span> -->
                <i class="fa-solid fa-key icon6"></i>
                <input type="Password" name="password"     value=""  placeholder="Enter password">
                <!-- <span class="text-danger">@error('password'){{$message}}@enderror</span> -->
            </div>

            <div class="card-box">
            <span class="error firstname error">
                <p class="error-text">@error('password_confirmation'){{$message}}@enderror</p>
            </span>
                <!-- <span class="details">Confirm Password</span> -->
                <i class="fa-solid fa-lock icon7"></i>
                <input type="Password" name="password_confirmation"    value="" placeholder="Confirm password">
                <!-- <span class="text-danger">@error('password_confirmation'){{$message}}@enderror</span> -->
            </div>
        </div>

      <div class="circal-form">
        <span class="circal-title text-white">Gender</span>
        <div class="category">
            <input type="radio"    name="gender"   value="male" @if (old('gender') === 'male') checked @endif>Male
            <input type="radio" name="gender"  value="female" @if (old('gender') === 'female') checked @endif>Female
            <span class="text-danger">@error('gender'){{$message}}@enderror</span>
        </div>
      </div>
      
      <div class="bg">
    <span class="BG text-white">Blood Group:</span>
    <label for="bloodGroup"></label>
    <select id="bloodGroup" name="bloodGroup">
        <option value="A+" {{ old('bloodGroup') == 'A+' ? 'selected' : '' }}>A+</option>
        <option value="A-" {{ old('bloodGroup') == 'A-' ? 'selected' : '' }}>A-</option>
        <option value="B+" {{ old('bloodGroup') == 'B+' ? 'selected' : '' }}>B+</option>
        <option value="B-" {{ old('bloodGroup') == 'B-' ? 'selected' : '' }}>B-</option>
        <option value="AB+" {{ old('bloodGroup') == 'AB+' ? 'selected' : '' }}>AB+</option>
        <option value="AB-" {{ old('bloodGroup') == 'AB-' ? 'selected' : '' }}>AB-</option>
        <option value="O+" {{ old('bloodGroup') == 'O+' ? 'selected' : '' }}>O+</option>
        <option value="O-" {{ old('bloodGroup') == 'O-' ? 'selected' : '' }}>O-</option>
    </select>
</div>



<div class="mb-6 d-flex justify-content-left">
                       <a href="{{URL::asset('./admin-login')}}"><span class="text-white">Login???<span></a>
                       </div>      

     <div class="button">
        <input type="submit" name="submit" value="Register">
     </div>

    </form>

</div>





 </div> 

</body>
</html>
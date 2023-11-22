<!DOCTYPE html>
<html lang="en">
<head>



<style>
  .h1 {
  font-size: 40px;
}

</style>


  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Aug 30 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <link rel="stylesheet" type="text/css" href="css/style.css"/>
  <title>Car-List</title>
</head>
<body>




 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="{{URL('/admin-dashboard')}}" class="logo d-flex align-items-center">
    <img src="{{URL::asset('/Images/travel-ell.avif')}}" alt="">
    <span class="d-none d-lg-block">Travel ELL</span>
  </a>
  <!-- <i class="bi bi-list toggle-sidebar-btn"></i> -->
</div><!-- End Logo -->

<div class="search-bar">
  <form class="search-form d-flex align-items-center" method="GET" action="#">
    <input type="search" name="search" placeholder="Search Car" title="Enter search keyword">
    <button type="submit" title="Search"><i class="bi bi-search"></i></button>
  </form>
</div><!-- End Search Bar -->

<a href="{{ url('/car-list') }}" class="btn btn-info">Reset Search</a>


<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item d-block d-lg-none">
      <a class="nav-link nav-icon search-bar-toggle " href="#">
        <i class="bi bi-search"></i>
      </a>
    </li><!-- End Search Icon-->

    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
        <span class="d-none d-md-block dropdown-toggle ps-2">{{$data->firstname}}</span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6>{{$data->firstname}}</h6>
          <span>Admin</span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
            <i class="bi bi-person"></i>
            <span>My Profile</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
            <i class="bi bi-gear"></i>
            <span>Account Settings</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
            <i class="bi bi-question-circle"></i>
            <span>Need Help?</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sign Out</span>
          </a>
        </li>

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->




<!-- Middle-part of dashboard page -->


<div class="row">
  <div class="col-3 col-s-3 menu">
    <ul>
      <li> <a class="text-white" href="">Hotels</a></li>
      <li><a class="text-white" href="">Tour Bus</a></li>
      <li><a class="text-white" href="">Private Cars</a></li>
      <li><a class="text-white" href="">Resturants</a></li>
      <li> <a class="text-white" href="">Food Items</a></li>
      <li><a class="text-white" href="">Gallery</a></li>
      <li><a class="text-white" href="">Upcoming Tours</a></li>
      <li><a class="text-white" href="">Tour Packges</a></li>
      <li> <a class="text-white" href="">User Management</a></li>
      
    </ul>
  </div>

  <div class="col-6 col-s-9">

    <br>

    <div class="hotel">
    <span class="h1" style="float: left;">Car List</span>
    <span class="h2" style="float: right;">
        <a href="{{url('add-car')}}" class="btn btn-outline-success">Add a new Car</a>
    </span>
    <div style="clear: both;"></div>
</div>

    
  

    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Type</th>
      <th scope="col">Registration No</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($car as $cars)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$cars->type}}</td>
      <td>{{$cars->reg_no}}</td>
      <td><a href="{{url('detailscar/'.$cars->id)}}" class="btn btn-primary">view details</a></td>
    </tr>
    @endforeach
  </tbody>
</table>


  </div>

<!-- Right Pannel of Dashboard page -->

  <div class="col-3 col-s-12">
    <div class="aside">
      <h2>What?</h2>
      <p>"Our goal is to promote and facilitate travel and tourism activities, fostering economic growth and cultural exchange."</p>
      <h2>Where?</h2>
      <p>"All over the country with everybody."</p>
      <h2>How?</h2>
      <p>"With yours crucial role in managing and maintaining the site and stisfying our customer."</p>
    </div>
  </div>
</div>

<div class="footer">
  <p>Copyright © Travel ELL
All Rights Reserved.</p>
</div>









 <!-- Vendor JS Files -->
 <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


</body>
</html>
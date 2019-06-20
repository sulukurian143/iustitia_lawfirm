<!DOCTYPE html>
<html lang="en">

<head>
<style>
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
}
</style>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Iustitia</title>

  <!-- Custom fonts for this template-->
  <link href="user/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="user/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="user/css1/sb-admin.css" rel="stylesheet">
  <script src="user/vendor/jquery/jquery.min.js"></script>


</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="/creates">{{Session::get('email')}}</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <!-- <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2"> -->
        <div class="input-group-append">
          <!-- <button class="btn btn-primary" type="button"> -->
            <!-- <i class="fas fa-search"></i> -->
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <!-- <i class="fas fa-bell fa-fw"></i>
          <span class="badge badge-danger"></span> -->
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <!-- <a class="dropdown-item" href="/user_noti">Notification</a> -->
         
      </li>
      
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
				</a>
				<!-- <p>{{Session::get('email')}}</p> -->
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
					
        <a class="dropdown-item" href="/edit_user">Settings</a>
          <a class="dropdown-item" href="/createus">Change password</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/logout" >Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <!-- <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i> -->
          <!-- <span>Dashboard</span> -->
        </a>
      </li>
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Login Screens:</h6>
          <a class="dropdown-item" href="login.html">Login</a>
          <a class="dropdown-item" href="register.html">Register</a>
          <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Other Pages:</h6>
          <a class="dropdown-item" href="404.html">404 Page</a>
          <a class="dropdown-item" href="blank.html">Blank Page</a>
        </div>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="/create3">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Lawyers</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/payment_sel">
          <i class="fas fa-fw fa-table"></i>
          <span>Payment</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/user_rating">
          <i class="fas fa-fw fa-table"></i>
          <span>Rating</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/my_lawyer">
          <i class="fas fa-fw fa-table"></i>
          <span>My lawyers</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/us_doc">
          <i class="fas fa-fw fa-table"></i>
          <span>Documents</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <h3>Iustitia</h3>
          </li>
          <!-- <li class="breadcrumb-item active">Overview</li> -->
        </ol>

        <!-- Icon Cards-->
        <!-- <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">26 New Messages!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5">11 New Tasks!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5">123 New Orders!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5">13 New Tickets!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div> -->

        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header">
              <div class="card-body">
					<form method="POST" name="search" action="/lawyer_appt">
            @csrf
            <table border="2px solid" width="80%" id="table">
           
          <tr>
          <th>Email</th>
          <th>Date</th>
          <th>Time</th>
          
          <th>Action</th>
          </tr>

          
          @foreach($data as $a)
             <tr>
             <input type="text" id="id" name="id" hidden value="{{$a->id}} " disabled>
             <input type="text" name="eid" hidden value="{{$a->eid}} " disabled>
             <td><input type="text" name="date" disabled value="{{$a->email}} " disabled></td>
                <td><input type="text" name="date" disabled value="{{$a->date}} " disabled></td>
                <td><input type="text" name="b1" disabled value="{{$a->stime}}"></td>
                <td><input type="button" name="b3" id="button" value="{{$a->token}}" onclick="myFunction()"></td>
                
             </tr>
             @endforeach
            </table>
</form> 
<script>
function myFunction() {
  var id=document.getElementById('id').value;
  var data = { 'id': id,'_token':$('meta[name="csrf-token"]').attr('content') };
  $.ajax({
    url: "/noti_update",
    data: data,
    success: function (result) {
     // alert(result);
     $.ajax({
    url: "/noti_update1",
    data: data,
    success: function (result) {
      document.getElementById('button').value=result;
     alert(result);
     
      
    }
  });
      
    }
  });
}
</script>
  </div>

  <!-- /#wrapper --> 

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  
  <!-- Bootstrap core JavaScript-->
  <script src="user/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="user/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="user/vendor/chart.js/Chart.min.js"></script>
  <script src="user/vendor/datatables/jquery.dataTables.js"></script>
  <script src="user/vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="user/js1/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="user/js1/demo/datatables-demo.js"></script>
  <script src="user/js1/demo/chart-area-demo.js"></script>

</body>

</html>

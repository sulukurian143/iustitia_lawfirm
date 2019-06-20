<!DOCTYPE html>
<html lang="en">

<!--index.html 17:55:36 GMT -->
<head>
<meta http-equiv="x-ua-compatible" content="ie=edge">
<!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="format-detection" content="telephone=no">
<meta charset="UTF-8">
<meta name="description" content="Practo - The Ultimate Multipurpose Admin Template">
<meta name="keywords" content="Practo, Admin, Template, Bootstrap">
<title>Iustitia</title>
<link rel="shortcut icon" href="favicon.ico">
<link href="lawyer/css/animate.min.css" rel="stylesheet">
<link href="lawyer/css/material-design-iconic-font.min.css" rel="stylesheet">
<link href="lawyer/css/fullcalendar.min.css" rel="stylesheet">
<link href="lawyer/css/jquery.mCustomScrollbar.min.css" rel="stylesheet">
<link href="lawyer/css/main.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <style type="text/css">

body {
	margin: 0;
	font-family: "Titillium Web";
	font-size: 15px;
}


</style>
  <script>
   
  $(document).ready(function() {
   var calendar = $('#calendar').fullCalendar({
    editable:true,
    header:{
     left:'prev,next today',
     center:'title',
     right:'month,agendaWeek,agendaDay'
    },
    events: 'load.php',
    selectable:true,
    selectHelper:true,
    select: function(start, end, allDay)
    {
     var title = prompt("Enter Event Title");
     if(title)
     {
      var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
      var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
      $.ajax({
       url:"calender_insert",
       type:"POST",
       data:{title:title, start:start, end:end},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Added Successfully");
       }
      })
     }
    },
    editable:true,
    eventResize:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"update.php",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function(){
       calendar.fullCalendar('refetchEvents');
       alert('Event Update');
      }
     })
    },

    eventDrop:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"update.php",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function()
      {
       calendar.fullCalendar('refetchEvents');
       alert("Event Updated");
      }
     });
    },

    eventClick:function(event)
    {
     if(confirm("Are you sure you want to remove it?"))
     {
      var id = event.id;
      $.ajax({
       url:"delete.php",
       type:"POST",
       data:{id:id},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Event Removed");
       }
      })
     }
    },

   });
  });
   
  </script>
</head>

<body>
<header id="header" class="clearfix" data-spy="affix" data-offset-top="65">
  <ul class="header-inner">
    
    <!-- Logo -->
    <li class="logo"> 
      <div id="menu-trigger"><i class="jtv jtv-menu"></i></div>
    </li>
    
   
    
    <!-- Quick Apps -->
    <li class="hidden-xs dropdown pull-right"> <a href="#" data-toggle="dropdown">
		<img src="lawyer/images/profile-pic.jpg" height="42" width="42" alt=""> <span class="f-11"> <span class="d-block"></span> 
		<small class="text-lowercase">{{Session::get('email')}}</small> </span></a>
      <div class="dropdown-menu pull-right" id="launch-apps">
        <div class="dropdown-header bg-teal"></div>
         <ul class="side-menu">
    <li>
      
    
        <li><a href="/editprofile">View Profile</a></li>
        <li><a href="create2">Privacy Settings</a></li>
        <li><a href="/lawyerdetails">Settings</a></li>
        <li><a href="/logout">Logout</a></li>
      
    </li>
      </div>
    </li>
    <!-- Time -->
    <li class="pull-right hidden-xs">
      <div id="time"> <span id="t-hours"></span> <span id="t-min"></span> <span id="t-sec"></span> </div>
    </li>
  </ul>
</header>
<aside id="sidebar"> 
  
  <!--| MAIN MENU |-->
  <ul class="side-menu">
    
    <li class="active"> <a href="/lhome"> <i class="jtv jtv-home"></i> <span>Home</span> </a> </li>
    <!-- <li> <a href="typography.html"> <i class="jtv jtv-format-underlined"></i> <span>Request<span class="label label-danger">New</span></span> </a> </li> -->
		<li> <a href="/app_approve"> <i class="jtv jtv-widgets"></i> <span>Appointment</span> </a> </li>
		<li> <a href="/notification"> <i class="jtv jtv-widgets"></i> <span>Notifications</span> </a> </li>
    <li> <a href="create4"> <i class="jtv jtv-widgets"></i> <span>Schedule</span> </a> </li>
    <li> <a href="/lawyer_doc"> <i class="jtv jtv-widgets"></i> <span>Documents</span> </a> </li>
    <li> <a href="/fees"> <i class="jtv jtv-widgets"></i> <span>Fees</span> </a> </li>
    <!-- <li class="sm-sub"> <a href="#"> <i class="jtv jtv jtv-view-list"></i> <span>Case Progress</span> </a>
    <li class="sm-sub"> <a href="#"> <i class="jtv jtv jtv-view-list"></i> <span>Tables</span> </a>
      <ul>
        <li><a href="normal-tables.html">Normal Tables</a></li>
        <li><a href="data-tables.html">Data Tables</a></li>
      </ul>
    
    <li> <a href="#"> <i class="jtv jtv-shopping-cart"></i> <span>Buy this template</span> </a> </li> -->
  </ul>
</aside>

<section id="content">
  <div class="container">
    <header class="page-header">
      <!-- <h3>Dashboard <small>Statistics for this month</small></h3> -->
    </header>
    <!-- <div class="overview row">
      <div class="col-md-3 col-sm-6">
        <div class="o-item bg-cyan">
          <div class="oi-title"> <span data-value="450382"></span> <span>Website Traffics</span> </div>
          <div class="overview-chart-line text-center"><!-- 9,5,6,3,9,7,5,4,6,5,6,4,9 --></div>
        </div>
      </div> 
      <!-- <div class="col-md-3 col-sm-6">
        <div class="o-item bg-amber">
          <div class="oi-title"> <span data-value="8737"></span> <span>Total Sales</span> </div>
          <div class="overview-chart-line text-center"><!-- 2,4,6,5,6,4,5,3,7,3,6,5,9,6 --></div>
        </div>
      </div>
      <!-- <div class="col-md-3 col-sm-6">
        <div class="o-item bg-green">
          <div class="oi-title"> <span data-value="450382"></span> <span>Website Impressions</span> </div>
          <div class="overview-chart-line text-center"><!-- 9,4,6,5,6,4,5,7,9,3,6,5,9 --></div>
        </div>
      </div>
      <!-- <div class="col-md-3 col-sm-6">
        <div class="o-item bg-bluegray">
          <div class="oi-title"> <span data-value="452"></span> <span>Support Tickets</span> </div>
          <div class="overview-chart-line text-center"><!-- 6,9,5,6,3,7,5,4,6,5,6,4,2 --></div>
        </div>
      </div>
    </div>
    <div>
      
    </div>
    <center><div>
    <!-- <form action="/schedule" method="post">  -->
    <form action="/scheduler" method="post" id="appt">
    @csrf
    
          
      
        Pick the date<input type="date" name="date" id="to" onchange="DateCheck()"><br><br><br>
        <input type="checkbox" name="check[]" value="06:00am">06:00am
        <input type="checkbox" name="check[]" value="07:00am">07:00am
        <input type="checkbox" name="check[]" value="08:00am">08:00am
        <input type="checkbox" name="check[]" value="09:00am">09:00am
        <input type="checkbox" name="check[]" value="10:00am">10:00am
        <input type="checkbox" name="check[]" value="11:00am">11:00am
        <input type="checkbox" name="check[]" value="12:00pm">12:00pm
        <input type="checkbox" name="check[]" value="01:00pm">01:00pm<br><br>
        <input type="checkbox" name="check[]" value="02:00pm">02:00pm
        <input type="checkbox" name="check[]" value="03:00pm">03:00pm
        <input type="checkbox" name="check[]" value="04:00pm">04:00pm
        <input type="checkbox" name="check[]" value="05:00pm">05:00pm
        <input type="checkbox" name="check[]" value="06:00pm">06:00pm
        <input type="checkbox" name="check[]" value="07:00pm">07:00pm
        <input type="checkbox" name="check[]" value="08:00pm">08:00pm
        <input type="checkbox" name="check[]" value="09:00pm">09:00pm
        <input type="checkbox" name="check[]" value="10:00pm">10:00pm
     
     <!-- Select date: <input type="date" name="date" id="val">
    <input type="button" id="demo" value="Submit" onclick="myFunction()">
  </form></div><br><br> -->
  <?php
                $email=Session::get('email');
?>
  

      <input type="text"  name="email" hidden value="<?php echo $email; ?>">
      <br><br><input type="submit" name="submit"> </center> </form>
      <script>
                          function DateCheck()
                    {
                      var StartDate= document.getElementById('from').value;
                      var EndDate= document.getElementById('to').value;
                      var eDate = new Date(EndDate);
                      var sDate = new Date(StartDate);
                      if(StartDate!= '' && EndDate!= '' && sDate > eDate)
                        {
                        
                        document.getElementById('to').value="";
                        return false;
                        }
                    }
                    </script>
                         <script>
                        $(function() {
                  $(document).ready(function () {

                  var todaysDate = new Date(); // Gets today's date
                    var year = todaysDate.getFullYear();                        // YYYY
                    var month = ("0" + (todaysDate.getMonth() + 1)).slice(-2);  // MM
                    var day = ("0" + todaysDate.getDate()).slice(-2);           // DD
                    var minDate = (year +"-"+ month +"-"+ day); // Results in "YYYY-MM-DD" for today's date 
                    $('#from').attr('min',minDate);
                    $('#to').attr('min',minDate);
                  });
                });

                </script>
      <!-- <td style="width:20%"><input type="text" size="40" name="date1" id="val1" readonly></td>
      <td style="width:20%"><input type="time" size="40" name="stime" required></td>
      <td style="width:20%"><input type="time" size="40" name="etime" required></td>
      <td style="width:20%"><input type="text" size="40" name="event" required></td>
      </tr>
      <script>
       document.getElementById("demo").onclick = function() {myFunction()};
       function myFunction()
       {
        var val=document.getElementById("val");
        var val1=document.getElementById("val1");
        var t1=val.value;
        var t2=val1.value;
        val1.value=t1;
      }
      </script></table><br><br>
    <input type="submit" name="submit"> </center> 
    </form>
       -->
    
 
<!-- <footer id="footer"> Copyright © 2019 Sulu Kurian
  <ul class="f-menu">
    <li><a href="#">Home</a></li>
    <li><a href="#">Dashboard</a></li>
    <li><a href="#">Reports</a></li>
    <li><a href="#">Support</a></li>
    <li><a href="#">Contact</a></li>
  </ul>
</footer> -->

<!-- Javascript Libraries --> 
<!-- <script src="lawyer/js/jquery.min.js"></script>  -->
<script src="{{ asset('js/validate/jquery.js') }}"></script>
    <script src="{{ asset('js/validate/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/validate/additional-methods.min.js') }}"></script>
  <script src="lawyer/js/valappt.js"></script> 
<script src="lawyer/js/bootstrap.min.js"></script> 
<script src="lawyer/js/jquery.flot.js"></script> 
<script src="lawyer/js/jquery.flot.resize.js"></script> 
<script src="lawyer/js/jquery.flot.orderBars.js"></script> 
<script src="lawyer/js/curvedLines.js"></script> 
<script src="lawyer/js/jquery.flot.orderBars.js"></script> 
<script src="lawyer/js/jquery.mCustomScrollbar.concat.min.js"></script> 
<script src="lawyer/js/jquery.sparkline.min.js"></script> 
<script src="lawyer/js/jquery.easypiechart.min.js"></script> 
<script src="lawyer/js/bootstrap-growl.min.js"></script> 
<script src="lawyer/js/jquery.mCustomScrollbar.concat.min.js"></script> 
<script src="lawyer/js/moment.min.js"></script> 
<script src="lawyer/js/fullcalendar.min.js"></script> 
<script src="lawyer/js/flot-charts/curved-line-chart.js"></script> 
<script src="lawyer/js/flot-charts/bar-chart.js"></script> 
<script src="lawyer/js/charts.js"></script> 
<script src="lawyer/js/functions.js"></script> 
<script src="lawyer/js/demo.js"></script>
</body>

<!--index.html 17:56:39 GMT -->
</html>
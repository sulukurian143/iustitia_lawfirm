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
    
    <!-- Messages -->
    <!-- <li class="dropdown"> <a href="#" data-toggle="dropdown" class="hi-messages"> <i class="jtv jtv-email"></i> <i class="hi-count">6</i> </a>
      <div class="dropdown-menu hi-dropdown">
        <div class="dropdown-header bg-green m-b-15"> MESSAGES
          <ul class="actions a-alt">
            <li><a href="#"><i class="jtv jtv-plus"></i></a></li>
          </ul>
        </div>
        <div class="list-group lg-alt"> <a class="list-group-item media" href="#">
          <div class="pull-left"> <img class="img-avatar" src="lawyer/images/profile-pics/1.jpg" alt="" width="40" height="40"> </div>
          <div class="media-body">
            <div class="list-group-item-heading">John Smith <small>22 Hours ago</small></div>
            <small class="list-group-item-text c-gray">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam mattis lobortis sapien non posuere</small> </div>
          </a> <a class="list-group-item media" href="#">
          <div class="pull-left"> <img class="img-avatar" src="lawyer/images/profile-pics/5.jpg" alt="" width="40" height="40"> </div>
          <div class="media-body">
            <div class="list-group-item-heading">Steave Gection <small>10 Hours ago</small></div>
            <small class="list-group-item-text c-gray">Quisque non tortor ultricies, posuere elit id, lacinia purus curabitur.</small> </div>
          </a> <a class="list-group-item media" href="#">
          <div class="pull-left"> <img class="img-avatar" src="lawyer/images/profile-pics/2.jpg" alt="" width="40" height="40"> </div>
          <div class="media-body">
            <div class="list-group-item-heading">Charlie Adams <small>Yesterday</small></div>
            <small class="list-group-item-text c-gray">Donec congue tempus ligula, varius hendrerit mi hendrerit sit amet. Duis ac quam sit amet leo feugiat iaculis</small> </div>
          </a> <a class="list-group-item media" href="#">
          <div class="pull-left"> <img class="img-avatar" src="lawyer/images/profile-pics/4.jpg" alt="" width="40" height="40"> </div>
          <div class="media-body">
            <div class="list-group-item-heading">John Doe <small>05/06/2018</small></div>
            <small class="list-group-item-text c-gray">Duis tincidunt augue nec sem dignissim scelerisque. Vestibulum rhoncus sapien sed nulla aliquam lacinia</small> </div>
          </a> <a class="list-group-item media" href="#">
          <div class="pull-left"> <img class="img-avatar" src="lawyer/images/profile-pics/2.jpg" alt="" width="40" height="40"> </div>
          <div class="media-body">
            <div class="list-group-item-heading">Smith Doe <small>08/06/2018</small></div>
            <small class="list-group-item-text c-gray">Phasellus a ullamcorper lectus, sit amet viverra quam. In luctus tortor vel nulla pharetra bibendum</small> </div>
          </a> <a class="view-more" href="#">View more</a> </div>
      </div>
    </li>
     -->
    <!-- Notifications -->
    <!-- <li class="dropdown"> <a href="#" data-toggle="dropdown" class="hi-notifications"> <i class="jtv jtv-notifications"></i> <i class="hi-count">9</i> </a>
      <div class="dropdown-menu hi-dropdown">
        <div class="dropdown-header bg-orange m-b-15"> Notifications
          <ul class="actions a-alt">
            <li><a href="#"><i class="jtv jtv-check-all"></i></a></li>
          </ul>
        </div>
        <div class="list-group lg-alt"> <a class="list-group-item media" href="#">
          <div class="pull-right"> <img class="img-avatar" src="lawyer/images/profile-pics/1.jpg" alt="" width="40" height="40"> </div>
          <div class="media-body">
            <div class="list-group-item-heading">John Smith <small>13 Hours ago</small></div>
            <small class="list-group-item-text c-gray">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam mattis lobortis sapien non posuere</small> </div>
          </a> <a class="list-group-item media" href="#">
          <div class="media-body">
            <div class="list-group-item-heading">John Doe <small>15 Hours ago</small></div>
            <small class="list-group-item-text c-gray">Quisque non tortor ultricies, posuere elit id, lacinia purus curabitur.</small> </div>
          </a> <a class="list-group-item media" href="#">
          <div class="media-body">
            <div class="list-group-item-heading">Smith Doe <small>Yesterday</small></div>
            <small class="list-group-item-text c-gray">Donec congue tempus ligula, varius hendrerit mi hendrerit sit amet. Duis ac quam sit amet leo feugiat iaculis</small> </div>
          </a> <a class="list-group-item media" href="#">
          <div class="pull-right"> <img class="img-avatar" src="lawyer/images/profile-pics/4.jpg" alt="" width="40" height="40"> </div>
          <div class="media-body">
            <div class="list-group-item-heading">Charlie Adams <small>07/09/2018</small></div>
            <small class="list-group-item-text c-gray">Duis tincidunt augue nec sem dignissim scelerisque. Vestibulum rhoncus sapien sed nulla aliquam lacinia</small> </div>
          </a> <a class="list-group-item media" href="#">
          <div class="pull-right"> <img class="img-avatar" src="lawyer/images/profile-pics/2.jpg" alt="" width="40" height="40"> </div>
          <div class="media-body">
            <div class="list-group-item-heading">Steave Gection <small>01/08/2018</small></div>
            <small class="list-group-item-text c-gray">Phasellus a ullamcorper lectus, sit amet viverra quam. In luctus tortor vel nulla pharetra bibendum</small> </div>
          </a> <a class="view-more" href="#">View more</a> </div>
      </div>
    </li>
     -->
    <!-- Ongoing Projects -->
    <!-- <li class="dropdown"> <a data-toggle="dropdown" href="#" class="hi-projects"> <i class="jtv jtv-format-subject"></i> </a>
      <div class="dropdown-menu hi-dropdown">
        <div class="dropdown-header bg-red m-b-15"> ONGOING PROJECTS
          <ul class="actions a-alt">
            <li><a class="" href="#"><i class="jtv jtv-plus"></i></a></li>
          </ul>
        </div>
        <div class="list-group lg-alt">
          <div class="list-group-item">
            <div class="list-group-item-heading m-b-5">HTML5 Validation Report</div>
            <div class="progress">
              <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%"> <span class="sr-only">95% Complete (success)</span> </div>
            </div>
          </div>
          <div class="list-group-item">
            <div class="list-group-item-heading m-b-5">Google Chrome Extension</div>
            <div class="progress">
              <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"> <span class="sr-only">80% Complete (success)</span> </div>
            </div>
          </div>
          <div class="list-group-item">
            <div class="list-group-item-heading m-b-5">Social Intranet Projects</div>
            <div class="progress">
              <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"> <span class="sr-only">20% Complete</span> </div>
            </div>
          </div>
          <div class="list-group-item">
            <div class="list-group-item-heading m-b-5">Bootstrap Admin Template</div>
            <div class="progress">
              <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"> <span class="sr-only">60% Complete (warning)</span> </div>
            </div>
          </div>
          <div class="list-group-item">
            <div class="list-group-item-heading m-b-5">Youtube Client App</div>
            <div class="progress">
              <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"> <span class="sr-only">80% Complete (danger)</span> </div>
            </div>
          </div>
          <a class="view-more" href="#">View more</a> </div>
      </div>
    </li>
     -->
    <!-- Events -->
    <!-- <li class="dropdown hidden-xs"> <a href="#" data-toggle="dropdown" class="hi-events"> <i class="jtv jtv-calendar"></i> </a>
      <div class="dropdown-menu hi-dropdown">
        <div class="dropdown-header bg-blue m-b-15"> UPCOMING EVENTS
          <ul class="actions a-alt">
            <li><a class="" href="#"><i class="jtv jtv-plus"></i></a></li>
          </ul>
        </div>
        <div class="list-group lg-alt"> <a class="list-group-item media" href="#">
          <div class="pull-left">
            <div class="event-time bg-cyan">
              <h2>16/07</h2>
              <small>11:30 AM</small> </div>
          </div>
          <div class="media-body">
            <div class="list-group-item-heading">Lorem ipsum dolor sit amet</div>
            <small class="list-group-item-text c-gray">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam mattis lobortis sapien non posuere</small> <small class="list-group-item-text c-gray f-11">10 Days to go</small> </div>
          </a> <a class="list-group-item media" href="#">
          <div class="pull-left">
            <div class="event-time bg-green">
              <h2>20/7</h2>
              <small>11:30 AM</small> </div>
          </div>
          <div class="media-body">
            <div class="list-group-item-heading">Sed pellentesque libero vel dapibus placerat 2019</div>
            <small class="list-group-item-text c-gray">Vestibulum ut auctor est. Proin euismod semper tortor id egestas</small> <small class="list-group-item-text c-gray f-11">20 Days to go</small> </div>
          </a> <a class="list-group-item media" href="#">
          <div class="pull-left">
            <div class="event-time bg-orange">
              <h2>2/8</h2>
              <small>11:30 AM</small> </div>
          </div>
          <div class="media-body">
            <div class="list-group-item-heading">Quisque magna tellus, vulputate a faucibus at</div>
            <small class="list-group-item-text c-gray">Phasellus luctus commodo augue, at posuere augue. Sed pellentesque libero vel dapibus placerat</small> <small class="list-group-item-text c-gray f-11">31 Days to go</small> </div>
          </a> <a class="list-group-item media" href="#">
          <div class="pull-left">
            <div class="event-time bg-red">
              <h2>30/10</h2>
              <small>11:30 AM</small> </div>
          </div>
          <div class="media-body">
            <div class="list-group-item-heading">Proin euismod semper tortor id</div>
            <small class="list-group-item-text c-gray">Quisque magna tellus, vulputate a faucibus at, rhoncus vitae est. Nulla scelerisque sollicitudin mollis</small> <small class="list-group-item-text c-gray f-11">55 Days to go</small> </div>
          </a> <a class="list-group-item media" href="#">
          <div class="pull-left">
            <div class="event-time bg-blue">
              <h2>23/11</h2>
              <small>11:30 AM</small> </div>
          </div>
          <div class="media-body">
            <div class="list-group-item-heading">Maecenas cursus varius 2018</div>
            <small class="list-group-item-text c-gray">Etiam dolor diam, pulvinar nec vehicula id, sodales sagittis libero. Maecenas cursus varius libero et eleifend</small> <small class="list-group-item-text c-gray f-11">64 Days to go</small> </div>
          </a> </div>
        <a class="view-more" href="#">View more</a> </div>
    </li>
     -->
    <!-- Search -->
    <!-- <li class="top-search">
      <input class="ts-input" placeholder="Search..." type="text">
      <i class="ts-reset jtv jtv-close"></i> </li>
     -->
    <!-- Settings -->
    <!-- <li class="pull-right dropdown hidden-xs"> <a href="#" data-toggle="dropdown"> <i class="jtv jtv-more-vert"></i> </a>
      <ul class="dropdown-menu">
        <li><a data-toggle="fullscreen" href="#">Toggle Fullscreen</a></li>
        <li><a data-toggle="localStorage" href="#">Clear Local Storage</a></li>
        <li><a href="#">Account Settings</a></li>
        <li><a href="#">Other Settings</a></li>
      </ul>
    </li>
     -->
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
    <!-- <li class="sm-sub"> <a href="#"> <i class="jtv jtv jtv-view-list"></i> <span>Case Progress</span> </a> -->
    <!-- <li class="sm-sub"> <a href="#"> <i class="jtv jtv jtv-view-list"></i> <span>Tables</span> </a>
      <ul>
        <li><a href="normal-tables.html">Normal Tables</a></li>
        <li><a href="data-tables.html">Data Tables</a></li>
      </ul>
    
    <li> <a href="#"> <i class="jtv jtv-shopping-cart"></i> <span>Buy this template</span> </a> </li>
  </ul> -->
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
    <form action="/emergency_lawyer" method="post">
    @csrf
    <table border="1px solid black">
        <tr>
          <!-- <th>Date</th> -->
          <th>Email</th>
          
          <th>Action</th>
      </tr>
      <tr>
      @foreach($user as $us)
       <td><input type="text" name="email" value="{{$us->uemail}}"></td>
       <td><input type="submit" name="submit" value="Arrange an appointment"></td>
      </tr>
      
      @endforeach
      </table>
     <!-- Select date: <input type="date" name="date" id="val">
    <input type="button" id="demo" value="Submit" onclick="myFunction()">
  </form></div><br><br> -->
  
      <!-- <br><input type="submit" name="submit"> </center> </form> -->
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
<script src="lawyer/js/jquery.min.js"></script> 
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
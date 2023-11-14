<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <!--Google Font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!--Font Awesome-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <!--Stylesheet-->
    <!-- <link rel="stylesheet" href="stylenav.css -->
    <link rel="stylesheet" href="stylenav.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="drag.js" defer></script>
    <script src="todo.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

</head>

<body>
    <div class="sidebar">
        <div class="logo">
            <a href="#">
                <img src="profileicon.jpg" alt="logo" class="logo">
            </a>
        </div>
        <nav id="sliderr">
            <li>
                <a href="homepage.php">
                    <i class="fas fa-home"></i>
                    <p>Home</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="far fa-calendar-alt"></i>
                    <p>Focus Mode</p>
                </a>
            </li>
            <li>
                <a href="index.php">
                    <i class="far fa-calendar-alt"></i>
                    <p>Calender</p>
                </a>
            </li>
            <li>
                <a href="navbar.php">
                    <i class="fas fa-book"></i>
                    <p>Homework</p>
                </a>
            </li>
            <li>
                <a href="assignment.php">
                    <i class="fas fa-clipboard-check"></i>
                    <p>Assignment</p>
                </a>
            </li>
            <li>
                <!-- <a href="notes.php">
                    <i class="far fa-sticky-note"></i>
                    <p>Notes</p>
                </a> -->
            </li>
            <li>
                <a href="setting.html">
                    <i class="fas fa-sign-out-alt"></i>
                    <p>Logout</p>
                </a>
            </li>
        </nav>
    </div>
    <nav style="z-index: -1; "  class="navbar navbar-dark nv justify-content-between">  
        <a style="width: 100px;" class="navbar-brand"></a>
        <h1 style="color: #FBE8A6">Calender</h1>
        <form class="form-inline">
            <div>
                <!-- <div id="demo"></div> -->
                        
            </div>
            
        </form>
    </nav>
    <h2 align="center"><a href="#"></a></h2>
  <br />
  <div class="container">
   <div id="calendar"></div>
  </div>
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
       url:"insert.php",
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
</body>

</html>
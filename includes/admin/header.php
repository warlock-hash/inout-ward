<?php
 session_start();
 date_default_timezone_set("Asia/Karachi");

   
$project_name = "Inward & Outward System";


     if (!isset($_SESSION['Member_obj'])){
         header("Location: ../public/index.php");
        exit();
    }
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?=$project_name;?></title>
    <meta name="description" content="">
    <!-- jquery
		============================================ -->
    <script src="../includes/admin/assets/js/vendor/jquery-1.12.4.min.js"></script>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="../includes/admin/assets/img/usindh_icon.ico">
 
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="../includes/admin/assets/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="../includes/admin/assets/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="../includes/admin/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="../includes/admin/assets/css/owl.theme.css">
    <link rel="stylesheet" href="../includes/admin/assets/css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="../includes/admin/assets/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="../includes/admin/assets/css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="../includes/admin/assets/css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="../includes/admin/assets/css/main.css">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="../includes/admin/assets/css/educate-custon-icon.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="../includes/admin/assets/css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="../includes/admin/assets/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="../includes/admin/assets/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="../includes/admin/assets/css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="../includes/admin/assets/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="../includes/admin/assets/css/calendar/fullcalendar.print.min.css">
     <!-- x-editor CSS
		============================================ -->
    <link rel="stylesheet" href="../includes/admin/assets/css/editor/select2.css">
    <link rel="stylesheet" href="../includes/admin/assets/css/editor/datetimepicker.css">
    <link rel="stylesheet" href="../includes/admin/assets/css/editor/bootstrap-editable.css">
    <link rel="stylesheet" href="../includes/admin/assets/css/editor/x-editor-style.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="../includes/admin/assets/css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="../includes/admin/assets/css/data-table/bootstrap-editable.css">
    <!-- modals CSS
		============================================ -->
    <link rel="stylesheet" href="../includes/admin/assets/css/modals.css">
    <!-- SELECT
		============================================ -->

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!--    <link rel="stylesheet" href="/resources/demos/style.css">-->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="../includes/admin/assets/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="../includes/admin/assets/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="../includes/admin/assets/js/vendor/modernizr-2.8.3.min.js"></script>
       <!-- Button
		============================================ -->
    <link rel="stylesheet" href="../includes/admin/assets/css/buttons.css">
    <link rel="stylesheet" href="../includes/admin/assets/scrolling.css">
    
<style>
    td>img{
            width: 60px;
    
    height: 60px;
    border-radius: 50%;
    }
    

    
    .header-top-area{
        background: #232121;
    }
    .sidebar-nav{
    background:#232121;
    }
    .sidebar-nav .metismenu {
    background:#232121;
        padding-top:10px; 
}
    #sidebar .sidebar-header{
      background:#232121;
    }
    #sidebar {
            box-shadow: 8px 3px 11px 7px rgba(0,0,0,.14), 0px 1px 13px 0px rgb(152, 152, 152);
background: #232121;
/*        background-image: url(assets/img/dashboard/sidebar-7.jpg) ;*/
   
}
    .sidebar-nav .metismenu a {
    color: #fff;
}
    .sidebar-nav .metismenu li .icon-wrap {
    color: #fff;
}
    .footer-copyright-area{
      background:#232121;    
    }
    .sidebar-nav ul{
       background:#232121;
    }
    #sidebar.active .sidebar-nav ul.metismenu li ul.submenu-angle{
        background:#232121;
        padding-top:5px; 
            border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
         box-shadow: 8px 3px 11px 7px rgba(0,0,0,.14), 0px 1px 13px 0px rgb(152, 152, 152);
    }
    .sidebar-nav .metismenu a:hover, .sidebar-nav .metismenu a:focus, .sidebar-nav .metismenu a:active {
       box-shadow: 1px 1px 7px 0px rgb(131, 131, 131), 0px 1px 13px 0px rgb(198, 197, 197);
    background: #232121;
    border-radius: 10px;
}
    .sidebar-nav .metismenu a:hover, .sidebar-nav .metismenu a:focus, .sidebar-nav .metismenu a:active {
        color: #fffefe;}
    #sidebar.active .sidebar-nav .metismenu a:hover, #sidebar.active .sidebar-nav .metismenu a:focus, #sidebar.active .sidebar-nav .metismenu a:active {
     box-shadow: 1px 1px 7px 0px rgb(131, 131, 131), 0px 1px 13px 0px rgb(198, 197, 197);
    background: #232121;
    border-radius: 10px;
}
    .menu-switcher-pro .btn-info:active, .menu-switcher-pro .btn-info:focus, .menu-switcher-pro .btn-info:hover, .menu-switcher-pro .btn-info:visited, .header-drl-controller-btn.btn-info:active:focus {
         background: #232121;
    box-shadow: 1px 1px 7px 0px rgb(131, 131, 131), 0px 1px 13px 0px rgb(198, 197, 197);
   
    border-radius: 10px;
        
}
    .card{
           background: white;
    margin: 20px;
    border-radius: 10px;
    box-shadow: 1px 1px 20px 10px rgb(218, 218, 218), 0px 1px 13px 0px rgb(74, 71, 71);
    }
    .card .card-header{
        box-shadow: 0 1px 4px 0 rgba(0,0,0,.14);
        background: linear-gradient(60deg,#ffa726,#fb8c00);
        border-radius: 3px;
/*    margin-top: -20px;*/
        margin-left: 20px;
        margin-right: 20px;
    padding: 25px;
    }
    .card .card-body{
        border-radius: 3px;
/*    margin-top: -20px;*/
    padding: 20px;
    }
    

.student-inner-std{
            border-radius: 10px;
    box-shadow:  1px 1px 11px 4px rgb(218, 218, 218), 0px 1px 13px 0px rgb(74, 71, 71);
    }
    .student-dtl{
        box-shadow: 0 1px 4px 0 rgba(0,0,0,.14);
        background: linear-gradient(60deg,#ffa726,#fb8c00);
        border-radius: 3px;

        margin-left: 20px;
        margin-right: 20px;
    padding: 25px;
    }
    


/* width */
::-webkit-scrollbar {
  width: 15px;
    height: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey; 
  border-radius: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
      background: #424242;
    box-shadow: inset -2px 2px 6px 3px #cac3c3;
    border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #000000; 
}
</style>
    <script>
        $( function() {
            $( "#outward_date" ).datepicker({ minDate: -20, maxDate: "+1M +10D" });
        } );
        $( function() {
            $( "#inward_date" ).datepicker({ minDate: -20, maxDate: "+1M +10D" });
        } );
    </script>
</head>

<body>
<?php 
    $col_array = array(array("CANDIDATE ID","CANDIDATE_ID","INT","=","candidates"),
                array("SLIP NO","SLIP_NO","VARCHAR","LIKE","candidates"),
                array("NAME","NAME","VARCHAR","LIKE","candidates"),
                array("FATHER NAME","FATHER_NAME","VARCHAR","LIKE","candidates"),
                array("SURNAME","SURNAME","VARCHAR","LIKE","candidates"),
                array("DISCIPLINE","DISCIPLINE_TITLE","VARCHAR","LIKE","disciplines"),
                array("CNIC NO","CNIC_NO","VARCHAR","LIKE","candidates"),
                  );
    
    $side_bar_values = array(
    //for single menu item
    array("is_submenu"=>"0","value"=>"Dashboard","link"=>"../admin/adminPanel.php","class"=>"educate-icon educate-home icon-wrap")
   // for submenu 
//   array("is_submenu"=>"1","value"=>"Education","link"=>"events.html","class"=>"educate-icon educate-event icon-wrap sub-icon-mg","sub_menu"=>array(
//       array("value"=>"Dashboard v.1","link"=>"events.html")
//       ,
//       array("value"=>"Dashboard v.2","link"=>"events.html")
//       ,
//       array("value"=>"Dashboard v.3","link"=>"events.html")
//   )
//)
    
                            );
    $nav_values = array(
    //for single menu item
    array("is_submenu"=>"0","value"=>"Dashboard","link"=>"../admin/mainPanel.php",)
    //for submenu 
//   array("is_submenu"=>"1","value"=>"Education","link"=>"events.html","sub_menu"=>array(
//       array("value"=>"Dashboard v.1","link"=>"events.html")
//       ,
//       array("value"=>"Dashboard v.2","link"=>"events.html")
//       ,
//       array("value"=>"Dashboard v.3","link"=>"events.html")
//   )
//)
    
                            );
           
                    
                    $status = array(array("0","Rejected","class='text-danger'"),
                                    array("1","Pending","class='text-warning'"),
                                   array("2","Approved","class='text-success'")
                                   );
                

?>
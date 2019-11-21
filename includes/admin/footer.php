 
    <!-- bootstrap JS
		============================================ -->
    <script src="../includes/admin/assets/js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="../includes/admin/assets/js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="../includes/admin/assets/js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="../includes/admin/assets/js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="../includes/admin/assets/js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="../includes/admin/assets/js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="../includes/admin/assets/js/jquery.scrollUp.min.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="../includes/admin/assets/js/counterup/jquery.counterup.min.js"></script>
    <script src="../includes/admin/assets/js/counterup/waypoints.min.js"></script>
    <script src="../includes/admin/assets/js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="../includes/admin/assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../includes/admin/assets/js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="../includes/admin/assets/js/metisMenu/metisMenu.min.js"></script>
    <script src="../includes/admin/assets/js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="../includes/admin/assets/js/morrisjs/raphael-min.js"></script>
<!--    <script src="assets/js/morrisjs/morris.js"></script>-->
<!--    <script src="assets/js/morrisjs/morris-active.js"></script>-->
    <!-- morrisjs JS
		============================================ -->
    <script src="../includes/admin/assets/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="../includes/admin/assets/js/sparkline/jquery.charts-sparkline.js"></script>
    <script src="../includes/admin/assets/js/sparkline/sparkline-active.js"></script>
    <!-- calendar JS
		============================================ -->
    <script src="../includes/admin/assets/js/calendar/moment.min.js"></script>
    <script src="../includes/admin/assets/js/calendar/fullcalendar.min.js"></script>
    <script src="../includes/admin/assets/js/calendar/fullcalendar-active.js"></script>
    <!-- data table JS
		============================================ -->

    <script src="../includes/admin/assets/js/data-table/bootstrap-table.js"></script>
    <script src="../includes/admin/assets/js/data-table/tableExport.js"></script>
    <script src="../includes/admin/assets/js/data-table/data-table-active.js"></script>
    <script src="../includes/admin/assets/js/data-table/bootstrap-table-editable.js"></script>
    <script src="../includes/admin/assets/js/data-table/bootstrap-editable.js"></script>
    <script src="../includes/admin/assets/js/data-table/bootstrap-table-resizable.js"></script>
    <script src="../includes/admin/assets/js/data-table/colResizable-1.5.source.js"></script>
    <script src="../includes/admin/assets/js/data-table/bootstrap-table-export.js"></script>
    <!--  editable JS
		============================================ -->
    <script src="../includes/admin/assets/js/editable/jquery.mockjax.js"></script>
    <script src="../includes/admin/assets/js/editable/mock-active.js"></script>
    <script src="../includes/admin/assets/js/editable/select2.js"></script>
    <script src="../includes/admin/assets/js/editable/moment.min.js"></script>
    <script src="../includes/admin/assets/js/editable/bootstrap-datetimepicker.js"></script>
    <script src="../includes/admin/assets/js/editable/bootstrap-editable.js"></script>
    <script src="../includes/admin/assets/js/editable/xediable-active.js"></script>
    <!-- Chart JS
		============================================ -->
    <script src="../includes/admin/assets/js/chart/jquery.peity.min.js"></script>
    <script src="../includes/admin/assets/js/peity/peity-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="../includes/admin/assets/js/tab.js"></script>
    
    <!-- plugins JS
		============================================ -->
    <script src="../includes/admin/assets/js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="../includes/admin/assets/js/main.js"></script>
    <script>
document.getElementById('min-height').style="padding:30px;min-height:"+(window.innerHeight-120)+"px;";
       var asc = true;
function sortTable(index) {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("table");
  switching = true;
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[index];
      y = rows[i + 1].getElementsByTagName("TD")[index];
      //check if the two rows should switch place:
        
      if (asc === true && x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase() ) {
        //if so, mark as a switch and break the loop:
        shouldSwitch = true;
        break;
      }
        if (asc === false && x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase() ) {
        //if so, mark as a switch and break the loop:
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
    asc = !asc;
}
function addOnclick(){
   // console.log("yes");
    var col = document.getElementById("table").rows[0].getElementsByTagName("th");
    for(var i = 0 ; i < col.length ; i++){
    col[i].setAttribute("onclick", "sortTable("+i+")");
    }
}
 $(document).ready(function(){
       $('img').click(function(){
        alertImage("Image",this.src);                 
                         });                
            });     
</script>
    
    <!-- tawk chat JS
		============================================ -->
<!--    <script src="assets/js/tawk-chat.js"></script>-->
</body>

</html>
<?php
if(isset($_REQUEST['error'])){
    
    alert('Error',$_REQUEST['error']);
    unset($_REQUEST['error']);
}
if(isset($_REQUEST['success'])){
    
    alert('Success',$_REQUEST['success']);
    unset($_REQUEST['success']);
}
function alert($title,$msg){
    
    echo "<script>";
    echo "alertMsg('$title','$msg');";
    echo "</script>";
    //exit();
}
?>
<script>
 //addOnclick();
     function redirect(path){
         //  console.log('adf');
           window.location.href=path;
       }
</script>
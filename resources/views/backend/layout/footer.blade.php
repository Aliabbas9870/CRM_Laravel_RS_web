<footer class="main-footer">
    <strong>Copyright &copy; {{ date('Y') }}  RS <a href="#"></a>.</strong> All rights reserved

 </footer>
</div>
<!-- /.wrapper -->
<!-- Start Core Plugins
 =====================================================================-->
<!-- jQuery -->
<script src="frontend/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
<!-- jquery-ui -->
<script src="frontend/plugins/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="frontend/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- lobipanel -->
<script src="frontend/plugins/lobipanel/lobipanel.min.js" type="text/javascript"></script>
<!-- Pace js -->
<script src="frontend/plugins/pace/pace.min.js" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="frontend/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript">    </script>
<!-- FastClick -->
<script src="frontend/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
<!-- CRMadmin frame -->
<script src="frontend/js/custom.js" type="text/javascript"></script>
<!-- End Core Plugins
 =====================================================================-->
<!-- Start Page Lavel Plugins
 =====================================================================-->
<!-- ChartJs JavaScript -->
<script src="frontend/plugins/chartJs/Chart.min.js" type="text/javascript"></script>
<!-- Counter js -->
<script src="frontend/plugins/counterup/waypoints.js" type="text/javascript"></script>
<script src="frontend/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
<!-- Monthly js -->
<script src="frontend/plugins/monthly/monthly.js" type="text/javascript"></script>
<!-- End Page Lavel Plugins
 =====================================================================-->
<!-- Start Theme label Script
 =====================================================================-->
<!-- Dashboard js -->
<script src="frontend/js/dashboard.js" type="text/javascript"></script>
<!-- End Theme label Script
 =====================================================================-->
<script>
 function dash() {
 // single bar chart
 var ctx = document.getElementById("singelBarChart");
 var myChart = new Chart(ctx, {
 type: 'bar',
 data: {
 labels: ["Sun", "Mon", "Tu", "Wed", "Th", "Fri", "Sat"],
 datasets: [
 {
 label: "My First dataset",
 data: [40, 55, 75, 81, 56, 55, 40],
 borderColor: "rgba(0, 150, 136, 0.8)",
 width: "1",
 borderWidth: "0",
 backgroundColor: "rgba(0, 150, 136, 0.8)"
 }
 ]
 },
 options: {
 scales: {
 yAxes: [{
     ticks: {
         beginAtZero: true
     }
 }]
 }
 }
 });
       //monthly calender
       $('#m_calendar').monthly({
         mode: 'event',
         //jsonUrl: 'events.json',
         //dataType: 'json'
         xmlUrl: 'events.xml'
     });

 //bar chart
 var ctx = document.getElementById("barChart");
 var myChart = new Chart(ctx, {
 type: 'bar',
 data: {
 labels: ["January", "February", "March", "April", "May", "June", "July", "august", "september","october", "Nobemver", "December"],
 datasets: [
 {
 label: "My First dataset",
 data: [65, 59, 80, 81, 56, 55, 40, 65, 59, 80, 81, 56],
 borderColor: "rgba(0, 150, 136, 0.8)",
 width: "1",
 borderWidth: "0",
 backgroundColor: "rgba(0, 150, 136, 0.8)"
 },
 {
 label: "My Second dataset",
 data: [28, 48, 40, 19, 86, 27, 90, 28, 48, 40, 19, 86],
 borderColor: "rgba(51, 51, 51, 0.55)",
 width: "1",
 borderWidth: "0",
 backgroundColor: "rgba(51, 51, 51, 0.55)"
 }
 ]
 },
 options: {
 scales: {
 yAxes: [{
     ticks: {
         beginAtZero: true
     }
 }]
 }
 }
 });
     //counter
     $('.count-number').counterUp({
         delay: 10,
         time: 5000
     });
 }
 dash();
</script>
</body>
</html>


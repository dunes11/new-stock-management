<script src="assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="assets/vendors/chart.js/Chart.min.js"></script>
<script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
<script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
<script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/misc.js"></script>
<script src="assets/js/settings.js"></script>
<script src="assets/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="assets/js/dashboard.js"></script>

<!-- <script>
setTimeout(function() {
  var alertElement = document.querySelector('#myAlert');
  alertElement.classList.add('hidden');
  setTimeout(function() {
    alertElement.parentNode.removeChild(alertElement);
  }, 500);
}, 5000);
</script> -->


<script>
setTimeout(function() {
    var alertElement = document.querySelector('#myAlert');
    alertElement.parentNode.removeChild(alertElement);
}, 5000);
</script>
<!--js code for get quatity -->
<script>
  // add an event listener to the product dropdown
  document.getElementById("product").addEventListener("change", function() {
    // get the selected product ID
    var product_id = this.value;
    // send an AJAX request to the PHP script
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        // update the quantity input field with the quantity retrieved from the PHP script
        document.getElementById("quantity").value = this.responseText;
      }
    };
    xhttp.open("POST", "get_quantity.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("product_id=" + product_id);
  });
</script>


</body>

</html>
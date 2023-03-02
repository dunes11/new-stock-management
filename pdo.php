<div id="myAlert" class="alert alert-danger" role="alert">
  This is a danger alert—check it out!
</div>

<script>
setTimeout(function() {
  var alertElement = document.querySelector('#myAlert');
  alertElement.parentNode.removeChild(alertElement);
}, 5000);
</script>

<?php
include_once("header.php")
?>
    <div class="redirection">
      <p>Te registraste correctamente.</p>
      <p>En 3 segundos te vamos a redireccionar al Inicio</p>
    </div>
<?php
  include_once("footer2.php")
?>

<script type="text/javascript">
  function redireccionar(){
    window.location="index.php";
  }
  setTimeout("redireccionar()", 3000); //tiempo expresado en milisegundos
</script>

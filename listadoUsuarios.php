<?php
require_once("funciones.php")
if (!estaLogueado()) {
  header("Location:index.php");
}

$usuarios = traerTodos();

include_once("header.php")
?>

<div class="">
  Listado de usuarios
  <ul>
    <?php foreach($usuarios as $usuario) : ?>
      <li>
        <a href="perfilUsuarios.php?usuario=<?=$usuarios["email"]?>"><?=$usuario["name"]?>
        </a>
      </li>
    <?php endforeach;?>
  </ul>
</div>
<?php include("footer.php"); ?>

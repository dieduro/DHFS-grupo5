<?php

// llena la DB con datos de usuarios.json
function exportToDB(){
  $arrayUsersJson = $db->traerTodosJSON();
  foreach ($arrayUsersJson as $user) {
    guardarUsuarioDB($user);
  }
}

?>

<?php

  if (isset($_SESSION['email_cad']) && $_SESSION['email_cad'] != null) {

    header('location: /login/index.php?erro=true');
  exit;
}
// header('location: /logout');
?>

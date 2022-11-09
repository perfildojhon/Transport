
<?php
if (!isset($_SESSION['email_cad'])){
  header('location: login.php?erro=true');
  exit;
}
?>
<?php
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
  header('location:../404.php');
} else {
?>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">

    </div>
    <strong>Copyright &copy; <?php date("Y") ?> Version 1.2.0 <a href="http://dasawisma.batubara.go.id">e-Dasawisma Kab.Batu Bara </a>.</strong>
  </footer>
<?php
}
?>
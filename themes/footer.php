<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:../404.php');
}
else{
?>	
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          
        </div>
        <strong>Copyright &copy; 2021 Version 7.8.22 <a href="http://dasawisma.batubara.go.id">e-Dasawisma-DINAS KOMINFO Kab.Batu Bara </a>.</strong>
      </footer>
<?php
}
?>	
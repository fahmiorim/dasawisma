 <?php 
 error_reporting(0);
 session_start(); 
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
    header('location:../index.php'); 
}
// 
else{
 include "../config/koneksi.php";
 include "../config/fungsi_terbilang.php";
  include "../config/library.php";
	  
		  
					$totagt0501 =pg_query($koneksi, "select sum(anggotakel) as totjlhagt0501 from keluarga where kodekel='0501'");
						$jlhtotagt0501=pg_fetch_array($totagt0501); 
						$jumlahagt0501=$jlhtotagt0501[totjlhagt0501];
						$totjumlahagt0501=number_format($jumlahagt0501,0,",",".");
					echo "$totjumlahagt0501";
 } ?>
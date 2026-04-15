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
	  
		  
					$totlansia0501 =pg_query($koneksi, "select sum(lansia) as totjlhlansia0501 from keluarga where kodekel='0501'");
						$jlhtotlansia0501=pg_fetch_array($totlansia0501); 
						$jumlahlansia0501=$jlhtotlansia0501[totjlhlansia0501];
						$totjumlahlansia0501=number_format($jumlahlansia0501,0,",",".");
					echo "$totjumlahlansia0501";
 } ?>
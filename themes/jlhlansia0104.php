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
	  
		  
					$totlansia0104 =pg_query($koneksi, "select sum(lansia) as totjlhlansia0104 from keluarga where kodekel='0104'");
						$jlhtotlansia0104=pg_fetch_array($totlansia0104); 
						$jumlahlansia0104=$jlhtotlansia0104[totjlhlansia0104];
						$totjumlahlansia0104=number_format($jumlahlansia0104,0,",",".");
					echo "$totjumlahlansia0104";
 } ?>
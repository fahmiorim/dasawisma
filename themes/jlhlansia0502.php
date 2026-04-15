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
	  
		  
					$totlansia0502 =pg_query($koneksi, "select sum(lansia) as totjlhlansia0502 from keluarga where kodekel='0502'");
						$jlhtotlansia0502=pg_fetch_array($totlansia0502); 
						$jumlahlansia0502=$jlhtotlansia0502[totjlhlansia0502];
						$totjumlahlansia0502=number_format($jumlahlansia0502,0,",",".");
					echo "$totjumlahlansia0502";
 } ?>
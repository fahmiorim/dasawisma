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
	  
		  
					$totlansia0303 =pg_query($koneksi, "select sum(lansia) as totjlhlansia0303 from keluarga where kodekel='0303'");
						$jlhtotlansia0303=pg_fetch_array($totlansia0303); 
						$jumlahlansia0303=$jlhtotlansia0303[totjlhlansia0303];
						$totjumlahlansia0303=number_format($jumlahlansia0303,0,",",".");
					echo "$totjumlahlansia0303";
 } ?>
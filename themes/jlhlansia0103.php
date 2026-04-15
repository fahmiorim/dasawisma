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
	  
		  
					$totlansia0103 =pg_query($koneksi, "select sum(lansia) as totjlhlansia0103 from keluarga where kodekel='0103'");
						$jlhtotlansia0103=pg_fetch_array($totlansia0103); 
						$jumlahlansia0103=$jlhtotlansia0103[totjlhlansia0103];
						$totjumlahlansia0103=number_format($jumlahlansia0103,0,",",".");
					echo "$totjumlahlansia0103";
 } ?>
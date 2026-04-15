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
	  
		  
					$totklg0505 =pg_query($koneksi, "select count(nokk) as totjlhklg0505 from keluarga where kodekel='0505'");
						$jlhtotklg0505=pg_fetch_array($totklg0505); 
						$jumlahklg0505=$jlhtotklg0505[totjlhklg0505];
						$totjumlahklg0505=number_format($jumlahklg0505,0,",",".");
					echo "$totjumlahklg0505";
 } ?>
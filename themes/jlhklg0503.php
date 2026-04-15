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
	  
		  
					$totklg0503 =pg_query($koneksi, "select count(nokk) as totjlhklg0503 from keluarga where kodekel='0503'");
						$jlhtotklg0503=pg_fetch_array($totklg0503); 
						$jumlahklg0503=$jlhtotklg0503[totjlhklg0503];
						$totjumlahklg0503=number_format($jumlahklg0503,0,",",".");
					echo "$totjumlahklg0503";
 } ?>
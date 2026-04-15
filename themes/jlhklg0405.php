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
	  
		  
					$totklg0405 =pg_query($koneksi, "select count(nokk) as totjlhklg0405 from keluarga where kodekel='0405'");
						$jlhtotklg0405=pg_fetch_array($totklg0405); 
						$jumlahklg0405=$jlhtotklg0405[totjlhklg0405];
						$totjumlahklg0405=number_format($jumlahklg0405,0,",",".");
					echo "$totjumlahklg0405";
 } ?>
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
	  
		  
					$totklg0403 =pg_query($koneksi, "select count(nokk) as totjlhklg0403 from keluarga where kodekel='0403'");
						$jlhtotklg0403=pg_fetch_array($totklg0403); 
						$jumlahklg0403=$jlhtotklg0403[totjlhklg0403];
						$totjumlahklg0403=number_format($jumlahklg0403,0,",",".");
					echo "$totjumlahklg0403";
 } ?>
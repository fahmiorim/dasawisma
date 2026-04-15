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
	  
		  
					$totklg0408 =pg_query($koneksi, "select count(nokk) as totjlhklg0408 from keluarga where kodekel='0408'");
						$jlhtotklg0408=pg_fetch_array($totklg0408); 
						$jumlahklg0408=$jlhtotklg0408[totjlhklg0408];
						$totjumlahklg0408=number_format($jumlahklg0408,0,",",".");
					echo "$totjumlahklg0408";
 } ?>
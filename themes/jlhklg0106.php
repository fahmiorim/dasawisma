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
	  
		  
					$totklg0106 =pg_query($koneksi, "select count(nokk) as totjlhklg0106 from keluarga where kodekel='0106'");
						$jlhtotklg0106=pg_fetch_array($totklg0106); 
						$jumlahklg0106=$jlhtotklg0106[totjlhklg0106];
						$totjumlahklg0106=number_format($jumlahklg0106,0,",",".");
					echo "$totjumlahklg0106";
 } ?>
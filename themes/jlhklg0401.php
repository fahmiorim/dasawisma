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
	  
		  
					$totklg0401 =pg_query($koneksi, "select count(nokk) as totjlhklg0401 from keluarga where kodekel='0401'");
						$jlhtotklg0401=pg_fetch_array($totklg0401); 
						$jumlahklg0401=$jlhtotklg0401[totjlhklg0401];
						$totjumlahklg0401=number_format($jumlahklg0401,0,",",".");
					echo "$totjumlahklg0401";
 } ?>
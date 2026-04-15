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
	  
		  
					$totklg0203 =pg_query($koneksi, "select count(nokk) as totjlhklg0203 from keluarga where kodekel='0203'");
						$jlhtotklg0203=pg_fetch_array($totklg0203); 
						$jumlahklg0203=$jlhtotklg0203[totjlhklg0203];
						$totjumlahklg0203=number_format($jumlahklg0203,0,",",".");
					echo "$totjumlahklg0203";
 } ?>
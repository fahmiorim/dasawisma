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
	  
		  
					$totklg0301 =pg_query($koneksi, "select count(nokk) as totjlhklg0301 from keluarga where kodekel='0301'");
						$jlhtotklg0301=pg_fetch_array($totklg0301); 
						$jumlahklg0301=$jlhtotklg0301[totjlhklg0301];
						$totjumlahklg0301=number_format($jumlahklg0301,0,",",".");
					echo "$totjumlahklg0301";
 } ?>
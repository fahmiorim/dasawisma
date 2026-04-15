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
	  
		  
					$totklg0508 =pg_query($koneksi, "select count(nokk) as totjlhklg0508 from keluarga where kodekel='0508'");
						$jlhtotklg0508=pg_fetch_array($totklg0508); 
						$jumlahklg0508=$jlhtotklg0508[totjlhklg0508];
						$totjumlahklg0508=number_format($jumlahklg0508,0,",",".");
					echo "$totjumlahklg0508";
 } ?>
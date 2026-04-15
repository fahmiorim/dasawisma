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
	  
		  
					$totklg0104 =pg_query($koneksi, "select count(nokk) as totjlhklg0104 from keluarga where kodekel='0104'");
						$jlhtotklg0104=pg_fetch_array($totklg0104); 
						$jumlahklg0104=$jlhtotklg0104[totjlhklg0104];
						$totjumlahklg0104=number_format($jumlahklg0104,0,",",".");
					echo "$totjumlahklg0104";
 } ?>
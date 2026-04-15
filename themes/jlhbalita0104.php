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
	  
		  
					$totbalita0104 =pg_query($koneksi, "select sum(balita) as totjlhbalita0104 from keluarga where kodekel='0104'");
						$jlhtotbalita0104=pg_fetch_array($totbalita0104); 
						$jumlahbalita0104=$jlhtotbalita0104[totjlhbalita0104];
						$totjumlahbalita0104=number_format($jumlahbalita0104,0,",",".");
					echo "$totjumlahbalita0104";
 } ?>
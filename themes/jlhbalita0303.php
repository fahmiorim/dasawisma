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
	  
		  
					$totbalita0303 =pg_query($koneksi, "select sum(balita) as totjlhbalita0303 from keluarga where kodekel='0303'");
						$jlhtotbalita0303=pg_fetch_array($totbalita0303); 
						$jumlahbalita0303=$jlhtotbalita0303[totjlhbalita0303];
						$totjumlahbalita0303=number_format($jumlahbalita0303,0,",",".");
					echo "$totjumlahbalita0303";
 } ?>
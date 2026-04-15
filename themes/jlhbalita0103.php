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
	  
		  
					$totbalita0103 =pg_query($koneksi, "select sum(balita) as totjlhbalita0103 from keluarga where kodekel='0103'");
						$jlhtotbalita0103=pg_fetch_array($totbalita0103); 
						$jumlahbalita0103=$jlhtotbalita0103[totjlhbalita0103];
						$totjumlahbalita0103=number_format($jumlahbalita0103,0,",",".");
					echo "$totjumlahbalita0103";
 } ?>
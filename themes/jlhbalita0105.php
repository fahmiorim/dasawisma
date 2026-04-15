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
	  
		  
					$totbalita0105 =pg_query($koneksi, "select sum(balita) as totjlhbalita0105 from keluarga where kodekel='0105'");
						$jlhtotbalita0105=pg_fetch_array($totbalita0105); 
						$jumlahbalita0105=$jlhtotbalita0105[totjlhbalita0105];
						$totjumlahbalita0105=number_format($jumlahbalita0105,0,",",".");
					echo "$totjumlahbalita0105";
 } ?>
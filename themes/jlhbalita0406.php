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
	  
		  
					$totbalita0406 =pg_query($koneksi, "select sum(balita) as totjlhbalita0406 from keluarga where kodekel='0406'");
						$jlhtotbalita0406=pg_fetch_array($totbalita0406); 
						$jumlahbalita0406=$jlhtotbalita0406[totjlhbalita0406];
						$totjumlahbalita0406=number_format($jumlahbalita0406,0,",",".");
					echo "$totjumlahbalita0406";
 } ?>
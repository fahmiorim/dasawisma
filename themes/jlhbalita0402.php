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
	  
		  
					$totbalita0402 =pg_query($koneksi, "select sum(balita) as totjlhbalita0402 from keluarga where kodekel='0402'");
						$jlhtotbalita0402=pg_fetch_array($totbalita0402); 
						$jumlahbalita0402=$jlhtotbalita0402[totjlhbalita0402];
						$totjumlahbalita0402=number_format($jumlahbalita0402,0,",",".");
					echo "$totjumlahbalita0402";
 } ?>
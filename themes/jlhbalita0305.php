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
	  
		  
					$totbalita0305 =pg_query($koneksi, "select sum(balita) as totjlhbalita0305 from keluarga where kodekel='0305'");
						$jlhtotbalita0305=pg_fetch_array($totbalita0305); 
						$jumlahbalita0305=$jlhtotbalita0305[totjlhbalita0305];
						$totjumlahbalita0305=number_format($jumlahbalita0305,0,",",".");
					echo "$totjumlahbalita0305";
 } ?>
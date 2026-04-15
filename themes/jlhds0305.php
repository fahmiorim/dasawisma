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
	  
		  
					$totds0305 =pg_query($koneksi, "select count(kode) as totjlhds0305 from dasawisma where kodekel='0305'");
						$jlhtotds0305=pg_fetch_array($totds0305); 
						$jumlahds0305=$jlhtotds0305[totjlhds0305];
						$totjumlahds0305=number_format($jumlahds0305,0,",",".");
					echo "$totjumlahds0305";
 } ?>
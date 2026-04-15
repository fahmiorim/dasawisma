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
	  
		  
					$totds0406 =pg_query($koneksi, "select count(kode) as totjlhds0406 from dasawisma where kodekel='0406'");
						$jlhtotds0406=pg_fetch_array($totds0406); 
						$jumlahds0406=$jlhtotds0406[totjlhds0406];
						$totjumlahds0406=number_format($jumlahds0406,0,",",".");
					echo "$totjumlahds0406";
 } ?>
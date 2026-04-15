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
	  
		  
					$totds0303 =pg_query($koneksi, "select count(kode) as totjlhds0303 from dasawisma where kodekel='0303'");
						$jlhtotds0303=pg_fetch_array($totds0303); 
						$jumlahds0303=$jlhtotds0303[totjlhds0303];
						$totjumlahds0303=number_format($jumlahds0303,0,",",".");
					echo "$totjumlahds0303";
 } ?>
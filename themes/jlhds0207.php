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
	  
		  
					$totds0207 =pg_query($koneksi, "select count(kode) as totjlhds0207 from dasawisma where kodekel='0207'");
						$jlhtotds0207=pg_fetch_array($totds0207); 
						$jumlahds0207=$jlhtotds0207[totjlhds0207];
						$totjumlahds0207=number_format($jumlahds0207,0,",",".");
					echo "$totjumlahds0207";
 } ?>
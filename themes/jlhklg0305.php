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
	  
		  
					$totklg0305 =pg_query($koneksi, "select count(nokk) as totjlhklg0305 from keluarga where kodekel='0305'");
						$jlhtotklg0305=pg_fetch_array($totklg0305); 
						$jumlahklg0305=$jlhtotklg0305[totjlhklg0305];
						$totjumlahklg0305=number_format($jumlahklg0305,0,",",".");
					echo "$totjumlahklg0305";
 } ?>
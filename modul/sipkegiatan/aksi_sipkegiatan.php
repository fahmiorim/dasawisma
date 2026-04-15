<?php
error_reporting(0);
session_start(); 
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
    header('location:../../404.php'); 
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
  include "../../config/koneksi.php";
  


  $module = $_GET['module'];
  $act    = $_GET['act'];

  
  // Input Data sipkegiatan
  if ($module=='sipkegiatan' AND $act=='input'){
       
	  
       $insert = "insert into sipkegiatan(tglentry,
								 bulan,
								  tahun,
								  namaposyandu,
								  kodekel,
								  kelurahan,
								  kodekec,
								  kecamatan,
								  lingkungan,
								  dasawisma,
								  userentry,
								  waktuentry,
								  level,
								   bumil,
								  diperiksa,
								  fetab,
								  menyusui,
								  kondom,
								  kondompb,
								  pil,
								  pilpb,
								  implant,
								  implantpb,
								  mop,
								  moppb,
								  mow,
								  mowpb,
								  iud,
								  iudpb,
								  suntik,
								  suntikpb,
								  lain,
								  lainpb,
								  balitasl,
								  balitasp,
								  balitakmsl,
								  balitakmsp,
								  balitadl,
								  balitadp,
								    balitanl,
								  balitanp,
								  balitavital,
								  balitavitap,
								   pmtl,
								  pmtp,
								  bumiltt1,
								  bumiltt2,
								  bcgl,
								  bcgp,
								  dpt1l,
								  dpt1p,
								  dpt2l,
								  dpt2p,
								  dpt3l,
								  dpt3p,
								  polio1l,
								  polio1p,
								  polio2l,
								  polio2p,
								  polio3l,
								  polio3p,
								  polio4l,
								  polio4p,
								  campakl,
								  campakp,
								  hepatitisbl1,
								  hepatitisbp1,
								  hepatitisbl2,
								  hepatitisbp2,
								  hepatitisbl3,
								  hepatitisbp3,
								  diarel,
								  diarep,
								  oralitl,
								  oralitp,
								  nobln,
								  idposyandu) 
						values('$_POST[tglentry]',
								'$_POST[bulan]',
								'$_POST[tahun]',
								'$_POST[namaposyandu]',
								'$_POST[kodekel]',
								'$_POST[kelurahan]',
								'$_POST[kodekec]',
								'$_POST[kecamatan]',
								'$_POST[lingkungan]',
								'$_POST[dasawisma]',
								'$_POST[userentry]',
								'$_POST[waktuentry]',
								'$_POST[level]',
								'$_POST[bumil]',
								'$_POST[diperiksa]',
								'$_POST[fetab]',
								'$_POST[menyusui]',
								'$_POST[kondom]',
								'$_POST[kondompb]',
								'$_POST[pil]',
								'$_POST[pilpb]',
								'$_POST[implant]',
								'$_POST[implantpb]',
								'$_POST[mop]',
								'$_POST[moppb]',
								'$_POST[mow]',
								'$_POST[mowpb]',
								'$_POST[iud]',
								'$_POST[iudpb]',
								'$_POST[suntik]',
								'$_POST[suntikpb]',
								'$_POST[lain]',
								'$_POST[lainpb]',
								'$_POST[balitasl]',
								'$_POST[balitasp]',
								'$_POST[balitakmsl]',
								'$_POST[balitakmsp]',
								'$_POST[balitadl]',
								'$_POST[balitadp]',
								'$_POST[balitanl]',
								'$_POST[balitanp]',
								'$_POST[balitavital]',
								'$_POST[balitavitap]',
								'$_POST[pmtl]',
								'$_POST[pmtp]',
								'$_POST[bumiltt1]',
								'$_POST[bumiltt2]',
								'$_POST[bcgl]',
								'$_POST[bcgp]',
								'$_POST[dpt1l]',
								'$_POST[dpt1p]',
								'$_POST[dpt2l]',
								'$_POST[dpt2p]',
								'$_POST[dpt3l]',
								'$_POST[dpt3p]',
								'$_POST[polio1l]',
								'$_POST[polio1p]',
								'$_POST[polio2l]',
								'$_POST[polio2p]',
								'$_POST[polio3l]',
								'$_POST[polio3p]',
								'$_POST[polio4l]',
								'$_POST[polio4p]',
								'$_POST[campakl]',
								'$_POST[campakp]',
								'$_POST[hepatitisbl1]',
								'$_POST[hepatitisbp1]',
								'$_POST[hepatitisbl2]',
								'$_POST[hepatitisbp2]',
								'$_POST[hepatitisbl3]',
								'$_POST[hepatitisbp3]',
								'$_POST[diarel]',
								'$_POST[diarep]',
								'$_POST[oralitl]',
								'$_POST[oralitp]',
								'$_POST[nobln]',
								'$_POST[idposyandu]'
								)";

$result = pg_query($koneksi, $insert);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data SIP Hasil Kegiatan Berhasil Tambah');
        window.location.href = '../../appmaster.php?module=sipkegiatan';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
      
    }
  

  // Update sipkegiatan
  elseif ($module=='sipkegiatan' AND $act=='update'){
   
      $update= "UPDATE sipkegiatan SET bulan = '$_POST[bulan]',
									tahun= '$_POST[tahun]',
									idposyandu= '$_POST[idposyandu]',
									namaposyandu= '$_POST[namaposyandu]',
									kodekel= '$_POST[kodekel]',
									kelurahan= '$_POST[kelurahan]',
									kodekec= '$_POST[kodekec]',
									kecamatan= '$_POST[kecamatan]',
									lingkungan= '$_POST[lingkungan]',
									dasawisma= '$_POST[dasawisma]',
									bumil= '$_POST[bumil]',
									diperiksa= '$_POST[diperiksa]',
									fetab= '$_POST[fetab]',
									menyusui= '$_POST[menyusui]',
									kondom= '$_POST[kondom]',
									kondompb= '$_POST[kondompb]',
									pil= '$_POST[pil]',
									pilpb= '$_POST[pilpb]',
									implant= '$_POST[implant]',
									implantpb= '$_POST[implantpb]',
									mop= '$_POST[mop]',
									moppb= '$_POST[moppb]',
									mow= '$_POST[mow]',
									mowpb= '$_POST[mowpb]',
									iud= '$_POST[iud]',
									iudpb= '$_POST[iudpb]',
									suntik= '$_POST[suntik]',
									suntikpb= '$_POST[suntikpb]',
									lain= '$_POST[lain]',
									lainpb= '$_POST[lainpb]',
									balitasl= '$_POST[balitasl]',
									balitasp= '$_POST[balitasp]',
									balitakmsl= '$_POST[balitakmsl]',
									balitakmsp= '$_POST[balitakmsp]',
									balitadl= '$_POST[balitadl]',
									balitadp= '$_POST[balitadp]',
									balitanl= '$_POST[balitanl]',
									balitanp= '$_POST[balitanp]',
									balitavital= '$_POST[balitavital]',
									balitavitap= '$_POST[balitavitap]',
									pmtl= '$_POST[pmtl]',
									pmtp= '$_POST[pmtp]',
									bumiltt1= '$_POST[bumiltt1]',
									bumiltt2= '$_POST[bumiltt2]',
									bcgl= '$_POST[bcgl]',
									bcgp= '$_POST[bcgp]',
									dpt1l= '$_POST[dpt1l]',
									dpt1p= '$_POST[dpt1p]',
									dpt2l= '$_POST[dpt2l]',
									dpt2p= '$_POST[dpt2p]',
									dpt3l= '$_POST[dpt3l]',
									dpt3p= '$_POST[dpt3p]',
									polio1l= '$_POST[polio1l]',
									polio1p= '$_POST[polio1p]',
									polio2l= '$_POST[polio2l]',
									polio2p= '$_POST[polio2p]',
									polio3l= '$_POST[polio3l]',
									polio3p= '$_POST[polio3p]',
									polio4l= '$_POST[polio4l]',
									polio4p= '$_POST[polio4p]',
									campakl= '$_POST[campakl]',
									campakp= '$_POST[campakp]',
									hepatitisbl1= '$_POST[hepatitisbl1]',
									hepatitisbp1= '$_POST[hepatitisbp1]',
									hepatitisbl2= '$_POST[hepatitisbl2]',
									hepatitisbp2= '$_POST[hepatitisbp2]',
									hepatitisbl3= '$_POST[hepatitisbl3]',
									hepatitisbp3= '$_POST[hepatitisbp3]',
									diarel= '$_POST[diarel]',
									diarep= '$_POST[diarep]',
									oralitl= '$_POST[oralitl]',
									oralitp= '$_POST[oralitp]',
									nobln= '$_POST[nobln]'
                                WHERE id = '$_POST[id]'";
      
	
      $result = pg_query($koneksi, $update);

if(!$result){
  echo pg_last_error($koneksi);
} else {
  
	 ?>
	
    <script>
        alert('Data SIP Hasil Kegiatan Berhasil update');
        window.location.href = '../../appmaster.php?module=sipkegiatan';
    </script>
    <?php
	
}

// Close the connection
pg_close($koneksi);
    }
  
}
?>

<?php
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
  header('location:404.php');
} else {

  // Home (Beranda)
  if ($_GET['module'] == 'beranda') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/beranda/beranda.php";
    }
  } elseif ($_GET['module'] == 'grapkec') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "module/grafik/grafikdatakec.php";
    }
  }
  // Penambahan grafik desa
  elseif ($_GET['module'] == 'grapdesa') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "module/grafik/grafikdatadesa.php";
    }
  }
  elseif ($_GET['module'] == 'graphbantuan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "module/grafik/grafikbantuankec.php";
    }
  }
  elseif ($_GET['module'] == 'graphbantuan1') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "module/grafik/grafikbantuandesa.php";
    }
  }

//=======================================

  elseif ($_GET['module'] == 'akseptorkb') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/akseptorkb/akseptorkb.php";
    }
  } elseif ($_GET['module'] == 'hapusakseptorkb') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/akseptorkb/hapusakseptorkb.php";
    }
  } elseif ($_GET['module'] == 'editakseptorkb') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/akseptorkb/editakseptorkb.php";
    }
  } elseif ($_GET['module'] == 'lihatakseptorkb') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/akseptorkb/lihatakseptorkb.php";
    }
  } elseif ($_GET['module'] == 'catkeluarga') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admkel' or $_SESSION['ses_level'] == 'admkec') {
      include "module/catkeluarga/catkeluarga.php";
    }
  } elseif ($_GET['module'] == 'lapkeluarga') {
    include "module/catkeluarga/lapkeluarga.php";
  }
  //Pembaharuan
  //

  elseif ($_GET['module'] == 'hakakses') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/hakakses/hakakses.php";
    }
  } elseif ($_GET['module'] == 'hapushakakses') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/hakakses/hapushakakses.php";
    }
  } elseif ($_GET['module'] == 'edithakakses') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/hakakses/edithakakses.php";
    }
  } elseif ($_GET['module'] == 'tahunaktif') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/tahunaktif/tahunaktif.php";
    }
  } elseif ($_GET['module'] == 'hapustahunaktif') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/tahunaktif/hapustahunaktif.php";
    }
  } elseif ($_GET['module'] == 'edittahunaktif') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/tahunaktif/edittahunaktif.php";
    }
  } elseif ($_GET['module'] == 'resetpassword') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/resetpassword/resetpassword.php";
    }
  } elseif ($_GET['module'] == 'editpassword') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/resetpassword/editpassword.php";
    }
  } elseif ($_GET['module'] == 'user') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/user/user.php";
    }
  } elseif ($_GET['module'] == 'edituser') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/user/edituser.php";
    }
  } elseif ($_GET['module'] == 'hapususer') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/user/hapususer.php";
    }
  } elseif ($_GET['module'] == 'kecamatan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/kecamatan/kec.php";
    }
  } elseif ($_GET['module'] == 'editkec') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/kecamatan/editkec.php";
    }
  } elseif ($_GET['module'] == 'hapuskec') {
    if ($_SESSION['ses_level'] == 'admin') {
      include "module/kecamatan/hapuskec.php";
    }
  } elseif ($_GET['module'] == 'kelurahan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/kelurahan/kel.php";
    }
  } elseif ($_GET['module'] == 'editkel') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/kelurahan/editkel.php";
    }
  } elseif ($_GET['module'] == 'hapuskel') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/kelurahan/hapuskel.php";
    }
  } elseif ($_GET['module'] == 'lingkungan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/lingkungan/lingkungan.php";
    }
  } elseif ($_GET['module'] == 'editlingkungan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/lingkungan/editlingkungan.php";
    }
  } elseif ($_GET['module'] == 'hapuslingkungan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/lingkungan/hapuslingkungan.php";
    }
  } elseif ($_GET['module'] == 'lihatlingkungan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/lingkungan/lihatlingkungan.php";
    }
  } elseif ($_GET['module'] == 'dasawisma') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkel') {
      include "module/dasawisma/dasawisma.php";
    }
  } elseif ($_GET['module'] == 'editdasawisma') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkel') {
      include "module/dasawisma/editdasawisma.php";
    }
  } elseif ($_GET['module'] == 'hapusdasawisma') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkel') {
      include "module/dasawisma/hapusdasawisma.php";
    }
  } elseif ($_GET['module'] == 'lapdasawisma') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/dasawisma/lapdasawisma.php";
    }
  } elseif ($_GET['module'] == 'lihatdasawisma') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkel') {
      include "module/dasawisma/lihatdasawisma.php";
    }
  }
  elseif ($_GET['module'] == 'kriteria') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/kriteria/kriteria.php";
    }
  } elseif ($_GET['module'] == 'editkriteria') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/kriteria/editkriteria.php";
    }
  } elseif ($_GET['module'] == 'hapuskriteria') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/kriteria/hapuskriteria.php";
    }
  } elseif ($_GET['module'] == 'lihatkriteria') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/kriteria/lihatkriteria.php";
    }
  } elseif ($_GET['module'] == 'datawarga') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkel') {
      include "module/datawarga/datawarga.php";
    }
  } elseif ($_GET['module'] == 'editdatawarga') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkel') {
      include "module/datawarga/edit_datawarga.php";
    }
  } elseif ($_GET['module'] == 'hapusdatawarga') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkel') {
      include "module/datawarga/hapus_datawarga.php";
    }
  } elseif ($_GET['module'] == 'lapdatawarga') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/datawarga/lapdatawarga.php";
    }
  } elseif ($_GET['module'] == 'lihatdatawarga') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkel') {
      include "module/datawarga/lihat_datawarga.php";
    }
  } elseif ($_GET['module'] == 'keluarga') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/keluarga/keluarga.php";
    }
  } elseif ($_GET['module'] == 'editkeluarga') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/keluarga/editkeluarga.php";
    }
  } elseif ($_GET['module'] == 'hapuskeluarga') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/keluarga/hapuskeluarga.php";
    }
  } elseif ($_GET['module'] == 'lapkeluarga') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/keluarga/lapkeluarga.php";
    }
  } elseif ($_GET['module'] == 'lihatkeluarga') {
    if ($_SESSION['ses_level'] == 'admkel') {
      include "module/keluarga/lihatkeluarga.php";
    }
  }
  elseif ($_GET['module'] == 'rekap18a') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/mstpekarangan/rekap18a/rptkeluargakel.php";
    }
  } elseif ($_GET['module'] == 'rekap18ads') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/mstpekarangan/rekap18a/lap_keluargakel.php";
    }
  }
  //=============== 6-5-2021 =============
  elseif ($_GET['module'] == 'ibubayi') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkel') {
      include "module/ibubayi/ibubayi.php";
    }
  } elseif ($_GET['module'] == 'editibubayi') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkel') {
      include "module/ibubayi/editibubayi.php";
    }
  } elseif ($_GET['module'] == 'hapusibubayi') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkel') {
      include "module/ibubayi/hapusibubayi.php";
    }
  } elseif ($_GET['module'] == 'lihatibubayi') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkel') {
      include "module/ibubayi/lihatibubayi.php";
    }
  }
  //==================== 02-08-2021 ===========
 //Bantuan

elseif ($_GET['module'] == 'bantuan') {
  if ($_SESSION['ses_level'] == 'admkel' or $_SESSION['ses_level'] == 'admin') {
    include "module/bantuan/bantuan.php";
  }
}
elseif ($_GET['module'] == 'editbantuan') {
  if ($_SESSION['ses_level'] == 'admkel' or $_SESSION['ses_level'] == 'admin') {
    include "module/bantuan/editbantuan.php";
  }
} elseif ($_GET['module'] == 'lihatbantuan') {
  if ($_SESSION['ses_level'] == 'admkel' or $_SESSION['ses_level'] == 'admin') {
    include "module/bantuan/lihatbantuan.php";
  }
}
  elseif ($_GET['module'] == 'hapusbantuan') {
    if ($_SESSION['ses_level'] == 'admkel' or $_SESSION['ses_level'] == 'admin') {
      include "module/bantuan/hapusbantuan.php";
    }
  }

 elseif ($_GET['module'] == 'koperasi') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/koperasi/koperasi.php";
    }
  } elseif ($_GET['module'] == 'editkoperasi') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/koperasi/editkoperasi.php";
    }
  } elseif ($_GET['module'] == 'hapuskoperasi') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/koperasi/hapuskoperasi.php";
    }
  } elseif ($_GET['module'] == 'lapkoperasi') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/koperasi/lapkoperasi.php";
    }
  } elseif ($_GET['module'] == 'lihatkoperasi') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/koperasi/lihatkoperasi.php";
    }
  } elseif ($_GET['module'] == 'tamanbaca') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/tamanbaca/tamanbaca.php";
    }
  } elseif ($_GET['module'] == 'edittamanbaca') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/tamanbaca/edittamanbaca.php";
    }
  } elseif ($_GET['module'] == 'hapustamanbaca') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/tamanbaca/hapustamanbaca.php";
    }
  } elseif ($_GET['module'] == 'laptamanbaca') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/tamanbaca/laptamanbaca.php";
    }
  } elseif ($_GET['module'] == 'lihattamanbaca') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/tamanbaca/lihattamanbaca.php";
    }
  }
  //==============Pembaharuan 5-5-2021 ===========
  elseif ($_GET['module'] == 'bangunan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/bangunan/bangunan.php";
    }
  } elseif ($_GET['module'] == 'editbangunan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/bangunan/editbangunan.php";
    }
  } elseif ($_GET['module'] == 'hapusbangunan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/bangunan/hapusbangunan.php";
    }
  } elseif ($_GET['module'] == 'lapbangunan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/bangunan/lapbangunan.php";
    }
  } elseif ($_GET['module'] == 'lihatbangunan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/bangunan/lihatbangunan.php";
    }
  }
  //==============Pembaharuan 6-5-2021 ===========
  elseif ($_GET['module'] == 'mobiler') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/mobiler/mobiler.php";
    }
  } elseif ($_GET['module'] == 'editmobiler') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/mobiler/editmobiler.php";
    }
  } elseif ($_GET['module'] == 'hapusmobiler') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/mobiler/hapusmobiler.php";
    }
  } elseif ($_GET['module'] == 'lapmobiler') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/mobiler/lapmobiler.php";
    }
  } elseif ($_GET['module'] == 'lihatmobiler') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/mobiler/lihatmobiler.php";
    }
  } elseif ($_GET['module'] == 'mesin') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/mesin/mesin.php";
    }
  } elseif ($_GET['module'] == 'editmesin') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/mesin/editmesin.php";
    }
  } elseif ($_GET['module'] == 'hapusmesin') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/mesin/hapusmesin.php";
    }
  } elseif ($_GET['module'] == 'lapmesin') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/mesin/lapmesin.php";
    }
  } elseif ($_GET['module'] == 'lihatmesin') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/mesin/lihatmesin.php";
    }
  } elseif ($_GET['module'] == 'posyandu') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/posyandu/posyandu.php";
    }
  } elseif ($_GET['module'] == 'editposyandu') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/posyandu/editposyandu.php";
    }
  } elseif ($_GET['module'] == 'hapusposyandu') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/posyandu/hapusposyandu.php";
    }
  } elseif ($_GET['module'] == 'lapposyandu') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/posyandu/lapposyandu.php";
    }
  } elseif ($_GET['module'] == 'lihatposyandu') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/posyandu/lihatposyandu.php";
    }
  } elseif ($_GET['module'] == 'rptposyandu') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admkel' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/rptposyandu/rptposyandu.php";
    }
  } elseif ($_GET['module'] == 'lapposyandu') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admkel' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/rptposyandu/lapposyandu.php";
    }
  } elseif ($_GET['module'] == 'pelatihan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/pelatihan/pelatihan.php";
    }
  } elseif ($_GET['module'] == 'editpelatihan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/pelatihan/editpelatihan.php";
    }
  } elseif ($_GET['module'] == 'hapuspelatihan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/pelatihan/hapuspelatihan.php";
    }
  } elseif ($_GET['module'] == 'lappelatihan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/pelatihan/lappelatihan.php";
    }
  } elseif ($_GET['module'] == 'lihatpelatihan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/pelatihan/lihatpelatihan.php";
    }
  } elseif ($_GET['module'] == 'satuan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "module/satuan/satuan.php";
    }
  } elseif ($_GET['module'] == 'editsatuan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "module/satuan/editsatuan.php";
    }
  } elseif ($_GET['module'] == 'hapussatuan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "module/satuan/hapussatuan.php";
    }
  } elseif ($_GET['module'] == 'lihatsatuan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "module/satuan/lihatsatuan.php";
    }
  } elseif ($_GET['module'] == 'kategori') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "module/kategori/kategori.php";
    }
  } elseif ($_GET['module'] == 'editkategori') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "module/kategori/editkategori.php";
    }
  } elseif ($_GET['module'] == 'hapuskategori') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "module/kategori/hapuskategori.php";
    }
  } elseif ($_GET['module'] == 'lihatkategori') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "module/kategori/lihatkategori.php";
    }
  } elseif ($_GET['module'] == 'pekerjaan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "module/pekerjaan/pekerjaan.php";
    }
  } elseif ($_GET['module'] == 'editpekerjaan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "module/pekerjaan/editpekerjaan.php";
    }
  } elseif ($_GET['module'] == 'hapuspekerjaan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "module/pekerjaan/hapuspekerjaan.php";
    }
  } elseif ($_GET['module'] == 'lihatpekerjaan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "module/pekerjaan/lihatpekerjaan.php";
    }
  } elseif ($_GET['module'] == 'mstkeluarga') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "module/mstkeluarga/mstkeluarga.php";
    }
  } elseif ($_GET['module'] == 'editmstkeluarga') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "module/mstkeluarga/editmstkeluarga.php";
    }
  } elseif ($_GET['module'] == 'hapusmstkeluarga') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "module/mstkeluarga/hapusmstkeluarga.php";
    }
  } elseif ($_GET['module'] == 'lihatmstkeluarga') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "module/mstkeluarga/lihatmstkeluarga.php";
    }
  } elseif ($_GET['module'] == 'mstjabatan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "module/mstjabatan/mstjabatan.php";
    }
  } elseif ($_GET['module'] == 'editmstjabatan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "module/mstjabatan/editmstjabatan.php";
    }
  } elseif ($_GET['module'] == 'hapusmstjabatan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "module/mstjabatan/hapusmstjabatan.php";
    }
  } elseif ($_GET['module'] == 'lihatmstjabatan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "module/mstjabatan/lihatmstjabatan.php";
    }
  } elseif ($_GET['module'] == 'mstanggota') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "module/mstanggota/mstanggota.php";
    }
  } elseif ($_GET['module'] == 'editmstanggota') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "module/mstanggota/editmstanggota.php";
    }
  } elseif ($_GET['module'] == 'hapusmstanggota') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "module/mstanggota/hapusmstanggota.php";
    }
  } elseif ($_GET['module'] == 'lihatmstanggota') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec') {
      include "module/mstanggota/lihatmstanggota.php";
    }
  } elseif ($_GET['module'] == 'datakrt') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkel') {
      include "module/datakrt/datakrt.php";
    }
  } elseif ($_GET['module'] == 'editdatakrt') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkel') {
      include "module/datakrt/editdatakrt.php";
    }
  } elseif ($_GET['module'] == 'lihatdatakrt') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkel') {
      include "module/datakrt/lihatdatakrt.php";
    }
  } elseif ($_GET['module'] == 'hapusdatakrt') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkel') {
      include "module/datakrt/hapusdatakrt.php";
    }
  } elseif ($_GET['module'] == 'lapdatakrt') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkel') {
      include "module/datakrt/lapdatakrt.php";
    }
  } elseif ($_GET['module'] == 'mstkomoditi') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/mstkomoditi/mstkomoditi.php";
    }
  } elseif ($_GET['module'] == 'editmstkomoditi') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/mstkomoditi/editmstkomoditi.php";
    }
  } elseif ($_GET['module'] == 'lihatmstkomoditi') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/mstkomoditi/lihatmstkomoditi.php";
    }
  } elseif ($_GET['module'] == 'hapusmstkomoditi') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/mstkomoditi/hapusmstkomoditi.php";
    }
  } elseif ($_GET['module'] == 'mstpekarangan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/mstpekarangan/mstpekarangan.php";
    }
  } elseif ($_GET['module'] == 'editmstpekarangan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/mstpekarangan/editmstpekarangan.php";
    }
  } elseif ($_GET['module'] == 'lihatmstpekarangan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/mstpekarangan/lihatmstpekarangan.php";
    }
  } elseif ($_GET['module'] == 'hapusmstpekarangan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/mstpekarangan/hapusmstpekarangan.php";
    }
  } elseif ($_GET['module'] == 'sipkunjungan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/sipkunjungan/sipkunjungan.php";
    }
  } elseif ($_GET['module'] == 'editsipkunjungan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/sipkunjungan/editsipkunjungan.php";
    }
  } elseif ($_GET['module'] == 'lihatsipkunjungan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/sipkunjungan/lihatsipkunjungan.php";
    }
  } elseif ($_GET['module'] == 'hapussipkunjungan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/sipkunjungan/hapussipkunjungan.php";
    }
  } elseif ($_GET['module'] == 'lapsipkunjungan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/sipkunjungan/lapsipkunjungan.php";
    }
  } elseif ($_GET['module'] == 'sipkegiatan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/sipkegiatan/sipkegiatan.php";
    }
  } elseif ($_GET['module'] == 'editsipkegiatan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/sipkegiatan/editsipkegiatan.php";
    }
  } elseif ($_GET['module'] == 'lihatsipkegiatan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/sipkegiatan/lihatsipkegiatan.php";
    }
  } elseif ($_GET['module'] == 'hapussipkegiatan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/sipkegiatan/hapussipkegiatan.php";
    }
  } elseif ($_GET['module'] == 'lapsipkegiatan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkec' or $_SESSION['ses_level'] == 'admkel') {
      include "module/sipkegiatan/lapsipkegiatan.php";
    }
  } elseif ($_GET['module'] == 'rekapiva') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "module/rekapiva/rekapiva.php";
    }
  } elseif ($_GET['module'] == 'editrekapiva') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "module/rekapiva/editrekapiva.php";
    }
  } elseif ($_GET['module'] == 'lihatrekapiva') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "module/rekapiva/lihatrekapiva.php";
    }
  } elseif ($_GET['module'] == 'hapusrekapiva') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "module/rekapiva/hapusrekapiva.php";
    }
  } elseif ($_GET['module'] == 'evaluasiiva') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "module/evaluasiiva/evaluasiiva.php";
    }
  } elseif ($_GET['module'] == 'editevaluasiiva') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "module/evaluasiiva/editevaluasiiva.php";
    }
  } elseif ($_GET['module'] == 'lihatevaluasiiva') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "module/evaluasiiva/lihatevaluasiiva.php";
    }
  } elseif ($_GET['module'] == 'hapusevaluasiiva') {
    if ($_SESSION['ses_level'] == 'admkec') {
      include "module/evaluasiiva/hapusevaluasiiva.php";
    }
  } elseif ($_GET['module'] == 'kehamilan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkel') {
      include "module/kehamilan/kehamilan.php";
    }
  } elseif ($_GET['module'] == 'editkehamilan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkel') {
      include "module/kehamilan/editkehamilan.php";
    }
  } elseif ($_GET['module'] == 'hapuskehamilan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkel') {
      include "module/kehamilan/hapuskehamilan.php";
    }
  } elseif ($_GET['module'] == 'lihatkehamilan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk' or $_SESSION['ses_level'] == 'admkel') {
      include "module/kehamilan/lihatkehamilan.php";
    }
  } elseif ($_GET['module'] == 'pendidikan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/pendidikan/pendidikan.php";
    }
  } elseif ($_GET['module'] == 'editpendidikan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/pendidikan/editpendidikan.php";
    }
  } elseif ($_GET['module'] == 'hapuspendidikan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/pendidikan/hapuspendidikan.php";
    }
  } elseif ($_GET['module'] == 'lihatpendidikan') {
    if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
      include "module/pendidikan/lihatpendidikan.php";
    }
  } else {
?>

    <section class="content">
      <div class="error-page">
        <h2 class="headline text-yellow"> 404</h2>
        <div class="error-content">
          <h3><i class="fa fa-warning text-yellow"></i> Oops! Fitur ini masih tahap pengembangan.</h3>
          <!--<h3><i class="fa fa-warning text-yellow"></i> Oops! Alamat Website tidak ketemu.</h3>-->
          <p>
            Coba Cek Penulisan Link Website
            Lakukan Refresh <a href="?module=beranda">Kembali ke dashboard</a> atau coba kembali cek penulisan link.
          </p>
          <form class="search-form">
            <div class="input-group">
              <input type="text" name="search" class="form-control" placeholder="Search" />
              <div class="input-group-btn">
                <button type="submit" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i></button>
              </div>
            </div><!-- /.input-group -->
          </form>
        </div><!-- /.error-content -->
      </div><!-- /.error-page -->
    </section><!-- /.content -->
<?php
  }
}
?>
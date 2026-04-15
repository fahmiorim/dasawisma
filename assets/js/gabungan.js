 $(document).ready(function () {
 
                $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };
 
                var t = $('#mytableserverside').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "<?php echo site_url('jemaat/ajax_tabel'); ?>",
                    "columns": [
                        {
                            "data": null,
                            "class": "text-center",
                            "orderable": false
                        },  
                        {"data": "nama_lengkap"},
                        {"data": "tgllhr_jemaat"},  
                        {"data": "alamat"},  
                        {
                            "class": "text-center",
                            "data": "aksi",
                            "orderable": false
                        }
                    ], 
                    "limit": [[10, 20]],
                    "order": [[1, 'desc']],
                    "rowCallback": function (row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            });


function cekstatus(objcekshowstatus){
  if (objcekshowstatus.value=="1"){ 
    document.getElementById("showstatus").style.display='none'; //show other options
  document.getElementsByName("snd_id_kk").item("snd_id_kk").value='0'; 
  // document.getElementsByName("snd_tgl_ccl1").item("snd_tgl_ccl1").value='<?php echo"$tgl_sekarang_ind"; ?>'; 
    }
  else{
    document.getElementById("showstatus").style.display='inline'; //show other options
  document.getElementsByName("snd_id_kk").item("snd_id_kk").value=''; 
  // document.getElementsByName("snd_tgl_ccl1").item("snd_tgl_ccl1").value='<?php echo"$tgl_sekarang_ind"; ?>'; 
  }
}
 
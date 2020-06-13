         <!-- Begin Page Content -->
     <div class="container-fluid " style=" margin-top : 10%;" id="con">
  <div class="card mb-3 m-auto rounded" style=" width: 80%; " >
   <div class="row no-gutters rounded">
    <div class="col-md-5">
        <form method="post" action="<?=base_url('User/kirim')?>" enctype="multipart/form-data">
         <?=$this->session->flashdata('terkirim');?>
            <div class="kiri " style="height: 350px; position: relative; ">
                  <img src="<?=base_url('/asset/img/users/default.png')?>" style="height: 250px; margin-top: 50px;">
              </div>
            </div>

            <div class="col-md-7">
            <div class="card-body">
              <div class="row">
              <div class="col">
              <h5 class="card-title"><?=$nama;?></h5>
              <hr>

              <div class="form m-100 ">
                      <div class="col my-2">
                        <select name="jenisTugas" id="jenisTugas" class="custom-select mr-sm-2">
                          <option selected value="0">Jenis Tugas</option>
                          <option value="individu" id="ind">Individu</option>
                          <option value="kelompok" id="kel">Kelompok</option>
                        </select>
                       </div>
                        <?=$this->session->flashdata('jenisTugas');?>

                      <div class="col my-2">
                        <select name="matkul" id="matkul" class="custom-select mr-sm-2">
                          <option selected value="0">Mata Kuliah</option>
                          <option value="WasPen">Wawasan Pendidikan</option>
                          <option value="AlPro">Algoritma Pemrograman</option>
                          <option value="EngProf">Bahasa Inggris Profesi</option>
                          <option value="StrukData">Struktur Data</option>
                          <option value="SO">Sistem Operasi</option>
                          <option value="DB">Basis Data</option>
                          <option value="BelPem">Belajar Pembelajaran</option>
                        </select>
                        <?=$this->session->flashdata('matkul');?>
                      </div>

                      <div class="col-5">
                        <input type="number" id="tugasKe" name="tugasKe" class="form-control " placeholder="Tugas ke-" >
                        <?=$this->session->flashdata('tugasKe');?>
                        <?=$this->session->flashdata('kelompokKe');?>
                      </div>

                      <div id="kl" class="col-5 hide">
                        <input type="number" id="kelompokKe" name="kelompokKe" class="form-control " placeholder="Kelompok ke-" >
                      </div>

                      <div class="fileUpload col-4 btn btn-danger">
                        <span>Pilih File</span>
                        <?= form_open_multipart('upload/do_upload');?>
                        <input name="file" type="file" class="uploadFile">
                      </div>

                      <input id="namaFile"  placeholder="Silahkan Pilih File..." disabled="disabled" style="height: 5rem;">
                      <?=$this->session->flashdata('file');?>
                      <div class="col-auto mr-2 right-2">
                        <a class="mr-3" href="<?=base_url('/auth/logout');?>" data-toggle="modal" data-target="#logoutModal">
                           <button type="button" class=" btn btn-secondary col-4">Batal</button>
                       </a>
                        <button type="submit" name="kirim" class=" btn btn-primary col-4">Kirim</button>
                      </div>
                 </div>

               </div>
       </form>



      </div>
    </div>
  </div>
</div>





    </div>
      <!-- End of Main Content -->
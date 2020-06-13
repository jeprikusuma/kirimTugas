


<div class="login-awal">
  <div class="keluar">
   <?=$this->session->flashdata('register');?>
  </div>
  <div class="info">
    <h2 class="form-title" id="signup">Selamat Datang</h2>
    <p>
      Sistem ini merupakan sistem pengiriman tugas untuk Mahasiswa Pendidikan Teknik Informatika kelas D. Silahkan login terlebih dahulu menggunakan username dan password yang telah disediakan.
    </p>
  </div>
  <div class="login">
   <form class="user" method="post" action="<?=base_url('auth')?> " >
    <div class="tengah">
      <h2 class="form-title" id="login">Log in</h2>
      <div class="form-isi">
      <div class="form-holder">
        <input type="text" id="username" name="username" placeholder="Username" />
        <?=form_error('username', '<br><small class="text-danger pl-3">', '</small>');?>
        <?=$this->session->flashdata('username');?>
        <input type="password" placeholder=" Password" name="password" id="password" />
        <?=form_error('password', '<br><small class="text-danger pl-3">', '</small>');?>
        <?=$this->session->flashdata('password');?>
      </div>
      <button class="submit-btn" name="login-btn">Login</button>
      <input type="hidden" class="hidden" value="<?=$this->session->flashdata('hidden');?> ">
      </div>
    </div>
  </div>

</div>





<div class="container">
<ul class="list-group ml-auto mr-auto col-md-6" style="margin-top: 10%;" >

	<li class="list-group-item list list-group-item-danger">Hapus <b style="font-size: 20px;"><?= $file; ?> </b>?</li>
	<li class="list-group-item list list-group-item" style="color: red;">Folder yang dipilih akan dihapus dan semua tugas akan ikut terhapus.</li>

	<li class="list-group-item list list-group-item">
		<a href="<?=base_url('admin');?>" class="btn btn-outline-primary">Kembali</a>
		<a href="<?=base_url('admin/hapusFolder/');?><?= $file; ?>" data-toggle="modal" data-target="#HpsModal" class="btn btn-outline-danger">Hapus</a>
	</li>
</ul>
</div>
	
	<div class="modal fade" id="HpsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    <div class="modal-dialog" role="document">
	      <div class="modal-content">
	        <div class="modal-header">
	          <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
	          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	            <span aria-hidden="true">×</span>
	          </button>
	        </div>
	        <div class="modal-body">Apakah anda ingin menghapus file ini?</div>
	        <div class="modal-footer">
	          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
	          <a class="btn btn-danger" href="<?= base_url('admin/hapusFolder/');?><?= $file;?>">Hapus</a>
	        </div>
	      </div>
	    </div>
	  </div>
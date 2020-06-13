<div class="container">
<ul class="list-group ml-auto mr-auto col-md-6" style="margin-top: 10%;" >

	<li class="list-group-item list list-group-item-primary">Kumpulan Folder Tugas</li>
	<?php foreach($folder as $fl): ?>
	<li class="list-group-item list"><?= $fl; ?>
		<a href="<?= base_url('admin/pilihFolder/'); ?><?= $fl;?>" class="badge badge-primary float-right ml-1e ml-1" style="right: 0;">
			Pilih
		</a>
		<a href="<?= base_url('admin/hapus/'); ?><?= $fl;?>" class="badge badge-danger float-right ml-1e " style="right: 0;">
			Hapus
		</a>
	</li>
	<?php endforeach; ?>

	<li class="list-group-item list list-group-item">
		<button href="<?=base_url('/auth/logout');?>" data-toggle="modal" data-target="#logoutModal" class="btn btn-outline-primary">Kembali</button>
	</li>
</ul>
</div>
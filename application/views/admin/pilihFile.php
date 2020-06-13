<div class="container">
<ul class="list-group ml-auto mr-auto col-md-6" style="margin-top: 10%;" >

	<li class="list-group-item list list-group-item-primary">Tugas <?= $file; ?> </li>
	<?php foreach($fileData as $fld): ?>
		<?= $fld; ?>
	<?php endforeach; ?>
	<li class="list-group-item list list-group-item">
		<a href="<?= base_url('admin'); ?>" class="btn btn-outline-primary">Kembali</a>
		<a href="<?= base_url('admin/download/'); ?><?= $file;?>" class="btn btn-outline-primary">Download</a>
	</li>
</ul>
</div>
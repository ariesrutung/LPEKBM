<?php
if (!$this->session->userdata('id')) {
	redirect(base_url() . 'admin');
}
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Slider</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo base_url(); ?>admin/slider/add" class="btn btn-primary btn-sm">Tambah Slider</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">

			<?php
			if ($this->session->flashdata('error')) {
			?>
				<div class="callout callout-danger">
					<p><?php echo $this->session->flashdata('error'); ?></p>
				</div>
			<?php
			}
			if ($this->session->flashdata('success')) {
			?>
				<div class="callout callout-success">
					<p><?php echo $this->session->flashdata('success'); ?></p>
				</div>
			<?php
			}
			?>


			<div class="box box-info">
				<div class="box-body table-responsive">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>No.</th>
								<th>Gambar</th>
								<th>Judul</th>
								<th>Tombol Aksi I</th>
								<th>LINK</th>
								<th>Tombol Aksi II</th>
								<th>LINK</th>
								<th>Posisi</th>
								<th>Bahasa</th>
								<th width="140">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;
							foreach ($slider as $row) {
								$i++;
							?>
								<tr>
									<td><?php echo $i; ?></td>
									<td style="width:150px;"><img src="<?php echo base_url(); ?>public/uploads/<?php echo $row['photo']; ?>" alt="<?php echo $row['heading']; ?>" style="width:140px;"></td>
									<td><?php echo $row['heading']; ?></td>
									<td><?php echo $row['button1_text']; ?></td>
									<td><?php echo $row['button1_url']; ?></td>
									<td><?php echo $row['button2_text']; ?></td>
									<td><?php echo $row['button2_url']; ?></td>
									<td><?php echo $row['position']; ?></td>
									<td><?php echo $row['lang_name']; ?></td>
									<td>
										<a href="<?php echo base_url(); ?>admin/slider/edit/<?php echo $row['id']; ?>" class="btn btn-primary btn-xs">Ubah</a>
										<a href="<?php echo base_url(); ?>admin/slider/delete/<?php echo $row['id']; ?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure?');">Hapus</a>
									</td>
								</tr>
							<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
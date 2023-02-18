<?php
if (!$this->session->userdata('id')) {
	redirect(base_url() . 'admin');
}
?>
<section class="content-header">
	<div class="content-header-left">
		<h1>Halaman Tabel Harga</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo base_url(); ?>admin/pricing_table/add" class="btn btn-primary btn-sm">Tambah Baru</a>
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
								<th>Ikon</th>
								<th>Judul</th>
								<th>Harga</th>
								<th>Deskripsi</th>
								<th>Bahasa</th>
								<th width="140">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;
							foreach ($pricing_table as $row) {
								$i++;
							?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><i class="<?php echo $row['icon']; ?>" style="color:#333;font-size:40px;"></i></td>
									<td><?php echo $row['title']; ?></td>
									<td><?php echo $row['price']; ?></td>
									<td><?php echo $row['subtitle']; ?></td>
									<td><?php echo $row['lang_name']; ?></td>
									<td>
										<a href="<?php echo base_url(); ?>admin/pricing_table/edit/<?php echo $row['id']; ?>" class="btn btn-primary btn-xs">Ubah</a>
										<a href="<?php echo base_url(); ?>admin/pricing_table/delete/<?php echo $row['id']; ?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure?');">Hapus</a>
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
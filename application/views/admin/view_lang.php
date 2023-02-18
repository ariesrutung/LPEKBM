<?php
if (!$this->session->userdata('id')) {
	redirect(base_url() . 'admin');
}
?>
<section class="content-header">
	<div class="content-header-left">
		<h1>Bahasa</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo base_url(); ?>admin/lang/add" class="btn btn-primary btn-sm">Tambah Baru</a>
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
								<th width="50">No.</th>
								<th>Nama Bahasa</th>
								<th>ID Bahasa</th>
								<th>Tata Letak</th>
								<th>Bahasa Default</th>
								<th width="200">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;
							foreach ($lang as $row) {
								$i++;
							?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $row['lang_name']; ?></td>
									<td><?php echo $row['lang_short_name']; ?></td>
									<td><?php echo $row['layout_direction']; ?></td>
									<td><?php echo $row['lang_default']; ?></td>
									<td>
										<a href="<?php echo base_url(); ?>admin/lang/detail/<?php echo $row['lang_id']; ?>" class="btn btn-warning btn-xs">Lihat</a>
										<a href="<?php echo base_url(); ?>admin/lang/edit/<?php echo $row['lang_id']; ?>" class="btn btn-primary btn-xs">Ubah</a>
										<a href="<?php echo base_url(); ?>admin/lang/delete/<?php echo $row['lang_id']; ?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure?');">Hapus</a>
									</td>
								</tr>
							<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</div>


</section>
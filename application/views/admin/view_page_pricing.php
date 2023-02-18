<?php
if (!$this->session->userdata('id')) {
    redirect(base_url() . 'admin');
}
?>

<section class="content-header">
    <div class="content-header-left">
        <h1>Halaman Tabel Harga</h1>
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
                                <th>Judul</th>
                                <th>Bahasa</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($page_pricing as $row) {
                                $i++;
                            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row['pricing_heading']; ?></td>
                                    <td><?php echo $row['lang_name']; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>admin/page-pricing/edit/<?php echo $row['id']; ?>" class="btn btn-primary btn-xs">Ubah</a>
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
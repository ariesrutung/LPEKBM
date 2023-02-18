<?php
if (!$this->session->userdata('id')) {
    redirect(base_url() . 'admin');
}
?>

<section class="content-header">
    <div class="content-header-left">
        <h1>tambah Halaman Dinamis</h1>
    </div>
    <div class="content-header-right">
        <a href="<?php echo base_url(); ?>admin/page-dynamic" class="btn btn-primary btn-sm">Lihat Semua</a>
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

            <?php echo form_open_multipart(base_url() . 'admin/page-dynamic/add', array('class' => 'form-horizontal')); ?>
            <div class="box box-info">
                <div class="box-body">
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Nama Halaman * </label>
                        <div class="col-sm-9">
                            <input type="text" autocomplete="off" class="form-control" name="name" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Slug </label>
                        <div class="col-sm-9">
                            <input type="text" autocomplete="off" class="form-control" name="slug" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Isi Halaman*</label>
                        <div class="col-sm-9">
                            <textarea class="form-control editor" name="content" style="height:140px;"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Gambar *</label>
                        <div class="col-sm-9" style="margin-top:5px;">
                            <input type="file" name="banner">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Judul Meta </label>
                        <div class="col-sm-9">
                            <input type="text" autocomplete="off" class="form-control" name="meta_title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Deskripsi Meta </label>
                        <div class="col-sm-9">
                            <textarea class="form-control h_100" name="meta_description"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Bahasa </label>
                        <div class="col-sm-2">
                            <select name="lang_id" class="form-control select2">
                                <?php
                                foreach ($all_lang as $row) {
                                ?><option value="<?php echo $row['lang_id']; ?>"><?php echo $row['lang_name']; ?></option><?php
                                                                                                                        }
                                                                                                                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label"></label>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success pull-left" name="form1">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>

</section>
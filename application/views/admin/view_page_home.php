<style>
    .text-danger {
        color: #856404 !important;
        background-color: #fff3cd !important;
        border-color: #ffeeba !important;
        padding: 10px;
    }
</style>
<?php
if (!$this->session->userdata('id')) {
    redirect(base_url() . 'admin');
}
?>

<section class="content-header">
    <div class="content-header-left">
        <h1>Halaman Beranda Website</h1>
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
                            foreach ($page_home as $row) {
                                $i++;
                            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo $row['lang_name']; ?></td>
                                    <td>
                                        <a href="<?php echo base_url(); ?>admin/page-home/edit/<?php echo $row['id']; ?>" class="btn btn-primary btn-xs">Ubah</a>
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


<section class="content-header">
    <div class="content-header-left">
        <h1>Ucapan Selamat Datang</h1>
    </div>
</section>


<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info" style="padding-top:0;">
                <div class="box-body" style="padding-top:0;">


                    <h3 class="sec_title">Bagian Selamat Datang</h3>
                    <?php echo form_open_multipart(base_url() . 'admin/page-home/update', array('class' => 'form-horizontal')); ?>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Video</label>
                        <div class="col-sm-6">
                            <textarea name="home_welcome_video" class="form-control" cols="30" rows="10" style="height:100px;"><?php echo $page_home_lang_independent['home_welcome_video']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Ditampilkan di Beranda?</label>
                        <div class="col-sm-2">
                            <select name="home_welcome_status" class="form-control select2" style="width:auto;">
                                <option value="Show" <?php if ($page_home_lang_independent['home_welcome_status'] == 'Show') {
                                                            echo 'selected';
                                                        } ?>>Tampilkan</option>
                                <option value="Hide" <?php if ($page_home_lang_independent['home_welcome_status'] == 'Hide') {
                                                            echo 'selected';
                                                        } ?>>Sembunyikan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2"></label>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success pull-left" name="form_home_welcome">Update</button>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-2"></label>
                        <div class="col-sm-4">
                            <div class="text-danger" role="alert">
                                <strong>Info!</strong> Menggunakan kode embed yang diambil dari video youtube.
                            </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?>



                    <h3 class="sec_title">Gambar Latar Belakang Video</h3>
                    <?php echo form_open_multipart(base_url() . 'admin/page-home/update', array('class' => 'form-horizontal')); ?>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Gambar Latar Belakang</label>
                        <div class="col-sm-6" style="padding-top:6px;">
                            <img src="<?php echo base_url(); ?>public/uploads/<?php echo $page_home_lang_independent['home_welcome_video_bg']; ?>" class="existing-photo" style="height:180px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Ubah Gambar </label>
                        <div class="col-sm-6" style="padding-top:5px;">
                            <input type="file" name="home_welcome_video_bg">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2"></label>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success pull-left" name="form_home_welcome_video_bg">Update</button>
                            </select>
                        </div>
                    </div>
                    <?php echo form_close(); ?>



                    <h3 class="sec_title">Bagian Mengapa Pilih Kami</h3>
                    <?php echo form_open_multipart(base_url() . 'admin/page-home/update', array('class' => 'form-horizontal')); ?>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Tampilkan di Beranda? </label>
                        <div class="col-sm-2">
                            <select name="home_why_choose_status" class="form-control select2" style="width:auto;">
                                <option value="Show" <?php if ($page_home_lang_independent['home_why_choose_status'] == 'Show') {
                                                            echo 'selected';
                                                        } ?>>Tampilkan</option>
                                <option value="Hide" <?php if ($page_home_lang_independent['home_why_choose_status'] == 'Hide') {
                                                            echo 'selected';
                                                        } ?>>Sembunyikan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2"></label>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success pull-left" name="form_home_why_choose">Update</button>
                            </select>
                        </div>
                    </div>
                    <?php echo form_close(); ?>



                    <h3 class="sec_title">Bagian Fitur</h3>
                    <?php echo form_open_multipart(base_url() . 'admin/page-home/update', array('class' => 'form-horizontal')); ?>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Tampilkan di Beranda? </label>
                        <div class="col-sm-2">
                            <select name="home_feature_status" class="form-control select2" style="width:auto;">
                                <option value="Show" <?php if ($page_home_lang_independent['home_feature_status'] == 'Show') {
                                                            echo 'selected';
                                                        } ?>>Tampilkan</option>
                                <option value="Hide" <?php if ($page_home_lang_independent['home_feature_status'] == 'Hide') {
                                                            echo 'selected';
                                                        } ?>>Sembunyikan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2"></label>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success pull-left" name="form_home_feature">Update</button>
                            </select>
                        </div>
                    </div>
                    <?php echo form_close(); ?>


                    <h3 class="sec_title">Bagian Layanan</h3>
                    <?php echo form_open_multipart(base_url() . 'admin/page-home/update', array('class' => 'form-horizontal')); ?>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Tampilkan di Beranda? </label>
                        <div class="col-sm-2">
                            <select name="home_service_status" class="form-control select2" style="width:auto;">
                                <option value="Show" <?php if ($page_home_lang_independent['home_service_status'] == 'Show') {
                                                            echo 'selected';
                                                        } ?>>Tampilkan</option>
                                <option value="Hide" <?php if ($page_home_lang_independent['home_service_status'] == 'Hide') {
                                                            echo 'selected';
                                                        } ?>>Sembunyikan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2"></label>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success pull-left" name="form_home_service">Update</button>
                            </select>
                        </div>
                    </div>
                    <?php echo form_close(); ?>



                    <h3 class="sec_title">Bagian Penghitung Informasi</h3>
                    <?php echo form_open(base_url() . 'admin/page-home/update', array('class' => 'form-horizontal')); ?>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Tampilkan di Beranda? </label>
                        <div class="col-sm-2">
                            <select name="counter_status" class="form-control select2" style="width:auto;">
                                <option value="Show" <?php if ($page_home_lang_independent['counter_status'] == 'Show') {
                                                            echo 'selected';
                                                        } ?>>Tampilkan</option>
                                <option value="Hide" <?php if ($page_home_lang_independent['counter_status'] == 'Hide') {
                                                            echo 'selected';
                                                        } ?>>Sembunyikan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label"></label>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success pull-left" name="form_home_counter_text">Update</button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>



                    <h3 class="sec_title">Bagian Penghitung Foto</h3>
                    <?php echo form_open_multipart(base_url() . 'admin/page-home/update', array('class' => 'form-horizontal')); ?>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Existing Counter Background</label>
                        <div class="col-sm-6" style="padding-top:6px;">
                            <img src="<?php echo base_url(); ?>public/uploads/<?php echo $page_home_lang_independent['counter_photo']; ?>" class="existing-photo" style="height:180px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">New Counter Background</label>
                        <div class="col-sm-6" style="padding-top:6px;">
                            <input type="file" name="counter_photo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label"></label>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success pull-left" name="form_home_counter_photo">Update</button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>



                    <h3 class="sec_title">Bagian Portofolio</h3>
                    <?php echo form_open(base_url() . 'admin/page-home/update', array('class' => 'form-horizontal')); ?>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Tampilkan di Beranda? </label>
                        <div class="col-sm-2">
                            <select name="home_portfolio_status" class="form-control select2" style="width:auto;">
                                <option value="Show" <?php if ($page_home_lang_independent['home_portfolio_status'] == 'Show') {
                                                            echo 'selected';
                                                        } ?>>Tampilkan</option>
                                <option value="Hide" <?php if ($page_home_lang_independent['home_portfolio_status'] == 'Hide') {
                                                            echo 'selected';
                                                        } ?>>Sembunyikan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2"></label>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success pull-left" name="form_home_portfolio">Update</button>
                            </select>
                        </div>
                    </div>
                    <?php echo form_close(); ?>


                    <h3 class="sec_title">Bagian Pemesanan</h3>
                    <?php echo form_open(base_url() . 'admin/page-home/update', array('class' => 'form-horizontal')); ?>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Tampilkan di Beranda? </label>
                        <div class="col-sm-2">
                            <select name="home_booking_status" class="form-control select2" style="width:auto;">
                                <option value="Show" <?php if ($page_home_lang_independent['home_booking_status'] == 'Show') {
                                                            echo 'selected';
                                                        } ?>>Tampilkan</option>
                                <option value="Hide" <?php if ($page_home_lang_independent['home_booking_status'] == 'Hide') {
                                                            echo 'selected';
                                                        } ?>>Sembunyikan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2"></label>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success pull-left" name="form_home_booking">Update</button>
                            </select>
                        </div>
                    </div>
                    <?php echo form_close(); ?>


                    <h3 class="sec_title">Gambar Latar Bagian Pemesanan</h3>
                    <?php echo form_open_multipart(base_url() . 'admin/page-home/update', array('class' => 'form-horizontal')); ?>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Latar Belakang</label>
                        <div class="col-sm-6" style="padding-top:6px;">
                            <img src="<?php echo base_url(); ?>public/uploads/<?php echo $page_home_lang_independent['home_booking_photo']; ?>" class="existing-photo" style="height:180px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Ubah Gambar</label>
                        <div class="col-sm-6" style="padding-top:6px;">
                            <input type="file" name="home_booking_photo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label"></label>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success pull-left" name="form_home_booking_photo">Update</button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>



                    <h3 class="sec_title">Bagian Tim</h3>
                    <?php echo form_open(base_url() . 'admin/page-home/update', array('class' => 'form-horizontal')); ?>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Tampilkan di Beranda? </label>
                        <div class="col-sm-2">
                            <select name="home_team_status" class="form-control select2" style="width:auto;">
                                <option value="Show" <?php if ($page_home_lang_independent['home_team_status'] == 'Show') {
                                                            echo 'selected';
                                                        } ?>>Tampilkan</option>
                                <option value="Hide" <?php if ($page_home_lang_independent['home_team_status'] == 'Hide') {
                                                            echo 'selected';
                                                        } ?>>Sembunyikan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2"></label>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success pull-left" name="form_home_team">Update</button>
                            </select>
                        </div>
                    </div>
                    <?php echo form_close(); ?>


                    <h3 class="sec_title">Bagian Tabel Harga</h3>
                    <?php echo form_open(base_url() . 'admin/page-home/update', array('class' => 'form-horizontal')); ?>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Tampilkan di Beranda? </label>
                        <div class="col-sm-2">
                            <select name="home_ptable_status" class="form-control select2" style="width:auto;">
                                <option value="Show" <?php if ($page_home_lang_independent['home_ptable_status'] == 'Show') {
                                                            echo 'selected';
                                                        } ?>>Tampilkan</option>
                                <option value="Hide" <?php if ($page_home_lang_independent['home_ptable_status'] == 'Hide') {
                                                            echo 'selected';
                                                        } ?>>Sembunyikan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2"></label>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success pull-left" name="form_home_pricing_table">Update</button>
                            </select>
                        </div>
                    </div>
                    <?php echo form_close(); ?>


                    <h3 class="sec_title">Bagian Testimoni</h3>
                    <?php echo form_open(base_url() . 'admin/page-home/update', array('class' => 'form-horizontal')); ?>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Tampilkan di Beranda? </label>
                        <div class="col-sm-2">
                            <select name="home_testimonial_status" class="form-control select2" style="width:auto;">
                                <option value="Show" <?php if ($page_home_lang_independent['home_testimonial_status'] == 'Show') {
                                                            echo 'selected';
                                                        } ?>>Tampilkan</option>
                                <option value="Hide" <?php if ($page_home_lang_independent['home_testimonial_status'] == 'Hide') {
                                                            echo 'selected';
                                                        } ?>>Sembunyikan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2"></label>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success pull-left" name="form_home_testimonial">Update</button>
                            </select>
                        </div>
                    </div>
                    <?php echo form_close(); ?>

                    <h3 class="sec_title">Gambar Latar Bagian Testimoni</h3>
                    <?php echo form_open_multipart(base_url() . 'admin/page-home/update', array('class' => 'form-horizontal')); ?>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Latar Belakang</label>
                        <div class="col-sm-6" style="padding-top:6px;">
                            <img src="<?php echo base_url(); ?>public/uploads/<?php echo $page_home_lang_independent['home_testimonial_photo']; ?>" class="existing-photo" style="height:180px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Ubah Gambar</label>
                        <div class="col-sm-6" style="padding-top:6px;">
                            <input type="file" name="home_testimonial_photo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label"></label>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success pull-left" name="form_home_testimonial_photo">Update</button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>


                    <h3 class="sec_title">Bagian Blog</h3>
                    <?php echo form_open(base_url() . 'admin/page-home/update', array('class' => 'form-horizontal')); ?>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Jumlah Item Ditampilkan? </label>
                        <div class="col-sm-2">
                            <input type="text" name="home_blog_item" class="form-control" value="<?php echo $page_home_lang_independent['home_blog_item']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Tampilkan di Beranda? </label>
                        <div class="col-sm-2">
                            <select name="home_blog_status" class="form-control select2" style="width:auto;">
                                <option value="Show" <?php if ($page_home_lang_independent['home_blog_status'] == 'Show') {
                                                            echo 'selected';
                                                        } ?>>Tampilkan</option>
                                <option value="Hide" <?php if ($page_home_lang_independent['home_blog_status'] == 'Hide') {
                                                            echo 'selected';
                                                        } ?>>Sembunyikan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2"></label>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success pull-left" name="form_home_blog">Update</button>
                            </select>
                        </div>
                    </div>
                    <?php echo form_close(); ?>




                </div>
            </div>
        </div>
    </div>
</section>
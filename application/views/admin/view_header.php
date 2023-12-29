<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin Panel</title>

	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/ionicons.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/datepicker3.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/all.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/select2.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/dataTables.bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/jquery.fancybox.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/_all-skins.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/magnific-popup.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/style.css">



	<style>
		.skin-blue .main-header .logo {
			display: flex;
			align-items: center;
			padding-left: 20px;
		}

		.skin-blue .wrapper,
		.skin-blue .main-header .logo,
		.skin-blue .main-header .navbar,
		.skin-blue .main-sidebar,
		.content-header .content-header-right a,
		.content .form-horizontal .btn-success {
			background-color: #1e40af !important;
		}

		.content-header .content-header-right a,
		.content .form-horizontal .btn-success {
			border-color: #4172a5 !important;
		}

		.content-header>h1,
		.content-header .content-header-left h1,
		h3 {
			color: #4172a5 !important;
		}

		.box.box-info {
			border-top-color: #4172a5 !important;
		}

		.nav-tabs-custom>.nav-tabs>li.active {
			border-top-color: #f4f4f4 !important;
		}

		.skin-blue .sidebar a {
			color: #fff !important;
		}

		.skin-blue .sidebar-menu>li>.treeview-menu {
			margin: 0 !important;
		}

		.skin-blue .sidebar-menu>li>a {
			border-left: 0 !important;
		}

		.nav-tabs-custom>.nav-tabs>li {
			border-top-width: 1px !important;
		}

		/* Custom CSS 17 Februari 2023 */

		li.treeview.active>a {
			background-color: #fff !important;
			color: #000 !important;
			margin: 2px 0 2px 10px !important;
			border-radius: 30px 0 0 30px;
		}

		.logo img {
			width: 20%;
			height: auto;
			margin-right: 10px;
			border: 2px solid #fff !important;
			border-radius: 100%;
		}

		ul.treeview-menu.menu-open li a:hover {
			background-color: #2849b2;
			border-radius: 30px 0 0 30px;
			/* padding: 12px !important; */
		}

		.user-image {
			object-fit: cover;
		}
	</style>



</head>

<body class="hold-transition fixed skin-blue sidebar-mini">

	<div class="wrapper">

		<header class="main-header">

			<a href="<?php echo base_url(); ?>admin/dashboard" class="logo">
				<img src="<?php echo base_url('/public/uploads/logo.png') ?>" alt="">
				<span class="logo-lg"> <?php echo $setting['website_name']; ?>
				</span>
			</a>

			<nav class="navbar navbar-static-top">

				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>

				<span style="float:left;line-height:50px;color:#fff;padding-left:15px;font-size:18px;">Panel Admin</span>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- <li>
							<a href="<?php // echo base_url(); 
										?>" target="_blank">Kunjungi Web</a>
						</li> -->

						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<?php if ($this->session->userdata('photo') == '') : ?>
									<img src="<?php echo base_url(); ?>public/img/no-photo.jpg" class="user-image" alt="user photo">
								<?php else : ?>
									<img src="<?php echo base_url(); ?>public/uploads/<?php echo $this->session->userdata('photo'); ?>" class="user-image" alt="user photo">
								<?php endif; ?>

								<span class="hidden-xs"><?php echo $this->session->userdata('full_name'); ?></span>
							</a>
							<ul class="dropdown-menu">
								<li class="user-footer">
									<div>
										<a href="<?php echo base_url(); ?>admin/profile" class="btn btn-default btn-flat">Ubah Profil</a>
									</div>
									<div>
										<a href="<?php echo base_url(); ?>admin/login/logout" class="btn btn-default btn-flat">Keluar</a>
									</div>
								</li>
							</ul>
						</li>

					</ul>
				</div>

			</nav>
		</header>

		<?php
		$class_name = '';
		$segment_2 = 0;
		$segment_3 = 0;
		$class_name = $this->router->fetch_class();
		$segment_2 = $this->uri->segment('2');
		$segment_3 = $this->uri->segment('3');
		?>

		<aside class="main-sidebar">
			<section class="sidebar">


				<ul class="sidebar-menu">

					<li class="treeview <?php if ($class_name == 'dashboard') {
											echo 'active';
										} ?>">
						<a href="<?php echo base_url(); ?>admin/dashboard">
							<i class="bi bi-laptop"></i> <span>Dasbor</span>
						</a>
					</li>


					<li class="treeview <?php if (($class_name == 'setting') || ($class_name == 'captcha') || ($class_name == 'captcha_setting') || ($class_name == 'lang') || ($class_name == 'menu') || ($class_name == 'social_media')) {
											echo 'active';
										} ?>">
						<a href="#">
							<i class="bi bi-cog"></i>
							<span>Pengaturan</span>
							<span class="pull-right-container">
								<i class="bi bi-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="<?php echo base_url(); ?>admin/setting"><i class="bi bi-globe"></i>Web</a></li>
							<li class="treeview <?php if (($class_name == 'captcha') || ($class_name == 'captcha_setting') || ($class_name == 'captcha-setting')) {
													echo 'active';
												} ?>">
								<a href="#">
									<i class="bi bi-shield"></i>
									<span>Captcha</span>
									<span class="pull-right-container">
										<i class="bi bi-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									<li><a href="<?php echo base_url(); ?>admin/captcha/setting"><i class="bi bi-circle-o"></i>Pengaturan</a></li>
									<li><a href="<?php echo base_url(); ?>admin/captcha"><i class="bi bi-circle-o"></i>Riwayat Captcha</a></li>
								</ul>
							</li>

					</li>
					<li><a href="<?php echo base_url(); ?>admin/lang"><i class="bi bi-language"></i>Bahasa</a></li>
					<li><a href="<?php echo base_url(); ?>admin/menu"><i class="bi bi-bars"></i>Menu</a></li>
					<li><a href="<?php echo base_url(); ?>admin/social_media"><i class="bi bi-share-square-o"></i>Media Sosial</a></li>
				</ul>
				</li>

				<li class="treeview <?php if (($class_name == 'page_home') || ($class_name == 'page_about') || ($class_name == 'page_faq') || ($class_name == 'page_service') || ($class_name == 'page_testimonial') || ($class_name == 'page_news') || ($class_name == 'page_event') || ($class_name == 'page_contact') || ($class_name == 'page_search') || ($class_name == 'page_team') || ($class_name == 'page_portfolio') || ($class_name == 'page_photo_gallery') || ($class_name == 'page_pricing') || ($class_name == 'page_term') || ($class_name == 'page_privacy') || ($class_name == 'footer_setting')) {
										echo 'active';
									} ?>">
					<a href="#">
						<i class="bi bi-newspaper-o"></i>
						<span>Halaman</span>
						<span class="pull-right-container">
							<i class="bi bi-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url(); ?>admin/page-home"><i class="bi bi-home"></i>Beranda</a></li>
						<li><a href="<?php echo base_url(); ?>admin/page-news"><i class="bi bi-file-text"></i>Berita</a></li>
						<li><a href="<?php echo base_url(); ?>admin/page-about"><i class="bi bi-info-circle"></i>Tentang LPEKBM</a></li>
						<li><a href="<?php echo base_url(); ?>admin/page-faq"><i class="bi bi-question-circle"></i>FAQ</a></li>
						<li><a href="<?php echo base_url(); ?>admin/page-service"><i class="bi bi-circle-o"></i>Layanan</a></li>
						<li><a href="<?php echo base_url(); ?>admin/page-testimonial"><i class="bi bi-circle-o"></i>Testimoni</a></li>
						<li><a href="<?php echo base_url(); ?>admin/page-event"><i class="bi bi-circle-o"></i>Kegiatan</a></li>
						<li><a href="<?php echo base_url(); ?>admin/page-contact"><i class="bi bi-phone"></i>Kontak</a></li>
						<li><a href="<?php echo base_url(); ?>admin/page-search"><i class="bi bi-search"></i>Pencarian</a></li>
						<li><a href="<?php echo base_url(); ?>admin/page-team"><i class="bi bi-users"></i>Tim</a></li>
						<li><a href="<?php echo base_url(); ?>admin/page-portfolio"><i class="bi bi-circle-o"></i>Portofolio</a></li>
						<li><a href="<?php echo base_url(); ?>admin/page-photo-gallery"><i class="bi bi-picture-o"></i>Galeri Foto</a></li>
						<li><a href="<?php echo base_url(); ?>admin/page-pricing"><i class="bi bi-money"></i>Tabel Harga</a></li>
						<li><a href="<?php echo base_url(); ?>admin/page-term"><i class="bi bi-check-square-o"></i>SK</a></li>
						<li><a href="<?php echo base_url(); ?>admin/page-privacy"><i class="bi bi-user-secret"></i>Kebijakan</a></li>
						<li><a href="<?php echo base_url(); ?>admin/footer-setting"><i class="bi bi-circle-o"></i>Footer</a></li>
					</ul>
				</li>

				<li class="treeview <?php if (($class_name == 'page_dynamic') || ($class_name == 'file') || ($class_name == 'faq') || ($class_name == 'why_choose') || ($class_name == 'feature') || ($class_name == 'service') || ($class_name == 'client') || ($class_name == 'portfolio') || ($class_name == 'portfolio_category') || ($class_name == 'pricing_table') || ($class_name == 'photo') || ($class_name == 'testimonial') || ($class_name == 'team_member') || ($class_name == 'subscriber') || ($class_name == 'event') || ($class_name == 'slider') || ($class_name == 'category') || ($class_name == 'comment') || ($class_name == 'news') || ($class_name == 'captcha_setting') || ($class_name == 'lang') || ($class_name == 'menu') || ($class_name == 'social_media')) {
										echo 'active';
									} ?>">
					<a href="#">
						<i class="bi bi-cog"></i>
						<span>Konten Web</span>
						<span class="pull-right-container">
							<i class="bi bi-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url(); ?>admin/slider"><i class="bi bi-circle-o"></i>Slider</a></li>
						<li class="treeview <?php if (($class_name == 'category') || ($class_name == 'news') || ($class_name == 'comment')) {
												echo 'active';
											} ?>">
							<a href="#">
								<i class="bi bi-newspaper-o"></i>
								<span>Berita</span>
								<span class="pull-right-container">
									<i class="bi bi-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo base_url(); ?>admin/news"><i class="bi bi-circle-o"></i>Berita</a></li>
								<li><a href="<?php echo base_url(); ?>admin/category"><i class="bi bi-circle-o"></i>Kategori</a></li>
								<!-- <li><a href="<?php // echo base_url(); 
													?>admin/comment"><i class="bi bi-circle-o"></i>Komentar</a></li> -->
							</ul>
						</li>
				</li>
				<li><a href="<?php echo base_url(); ?>admin/event"><i class="bi bi-circle-o"></i>Kegiatan</a></li>
				<li><a href="<?php echo base_url(); ?>admin/testimonial"><i class="bi bi-circle-o"></i>Testimoni</a></li>
				<li class="treeview <?php if (($class_name == 'subscriber')) {
										echo 'active';
									} ?>">
					<a href="#">
						<i class="bi bi-comment"></i>
						<span>Pelanggan</span>
						<span class="pull-right-container">
							<i class="bi bi-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url(); ?>admin/subscriber"><i class="bi bi-circle-o"></i>Pelanggan</a></li>
						<li><a href="<?php echo base_url(); ?>admin/subscriber/send_email"><i class="bi bi-circle-o"></i>Kirim Pesan</a></li>
					</ul>
				</li>

				<li><a href="<?php echo base_url(); ?>admin/photo"><i class="bi bi-circle-o"></i>Galeri Foto</a></li>
				<li class="treeview <?php if (($class_name == 'portfolio') || ($class_name == 'portfolio_category')) {
										echo 'active';
									} ?>">
					<a href="#">
						<i class="bi bi-bars"></i>
						<span>Portfolio</span>
						<span class="pull-right-container">
							<i class="bi bi-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url(); ?>admin/portfolio_category"><i class="bi bi-circle-o"></i> Kategori Portofolio</a></li>
						<li><a href="<?php echo base_url(); ?>admin/portfolio"><i class="bi bi-circle-o"></i> Portofolio</a></li>
					</ul>
				</li>
				<li><a href="<?php echo base_url(); ?>admin/pricing_table"><i class="bi bi-circle-o"></i>Tabel Harga</a></li>
				<li><a href="<?php echo base_url(); ?>admin/feature"><i class="bi bi-circle-o"></i>Even Berjalan</a></li>
				<li><a href="<?php echo base_url(); ?>admin/why_choose"><i class="bi bi-circle-o"></i>Mengapa Pilih Kami </a></li>
				<li><a href="<?php echo base_url(); ?>admin/faq"><i class="bi bi-circle-o"></i>FAQ </a></li>
				<li><a href="<?php echo base_url(); ?>admin/file"><i class="bi bi-circle-o"></i>Unggah File </a></li>
				<li><a href="<?php echo base_url(); ?>admin/team_member"><i class="bi bi-circle-o"></i>Tim Kerja </a></li>
				<li><a href="<?php echo base_url(); ?>admin/client"><i class="bi bi-circle-o"></i>Klien </a></li>
				<li><a href="<?php echo base_url(); ?>admin/service"><i class="bi bi-circle-o"></i>Layanan </a></li>
				<li><a href="<?php echo base_url(); ?>admin/service"><i class="bi bi-circle-o"></i>Fitur </a></li>
				<li class="treeview <?php if (($class_name == 'page_dynamic')) {
										echo 'active';
									} ?>">
					<a href="<?php echo base_url(); ?>admin/page-dynamic">
						<i class="bi bi-cog"></i> <span>Halaman Dinamis</span>
					</a>
				</li>

				</ul>
				</li>

				</ul>
			</section>
		</aside>

		<div class="content-wrapper">
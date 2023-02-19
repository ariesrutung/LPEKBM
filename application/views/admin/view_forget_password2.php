<?php
$CI = &get_instance();
$CI->load->model('admin/Model_common');
$setting_data = $CI->Model_common->get_setting_data();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/datepicker3.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/all.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/_all-skins.min.css">

    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <style>
        .login-page {
            background: #333;
        }

        .login-logo {
            color: #fff;
        }

        body {
            color: #000;
            overflow-x: hidden;
            height: 100%;
            background-color: #B0BEC5;
            background-image: url(https://www.rssing.com/inc2/img/symphony.webp) !important;
            background-position: center center !important;
            background-repeat: repeat !important;
            height: 100%;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100%;
            position: absolute;
        }

        .card0 {
            box-shadow: 0px 4px 8px 0px #757575;
            border-radius: 0px;
        }

        .card2 {
            margin: 0px 40px;
        }

        .logo {
            width: 10%;
            height: auto;
            margin-top: 20px;
            margin-left: 35px;
        }

        .image {
            width: 360px;
            height: 280px;
        }

        .border-line {
            border-right: 1px solid #EEEEEE;
        }

        .facebook {
            background-color: #3b5998;
            color: #fff;
            font-size: 18px;
            padding-top: 5px;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            cursor: pointer;
        }

        .twitter {
            background-color: #1DA1F2;
            color: #fff;
            font-size: 18px;
            padding-top: 5px;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            cursor: pointer;
        }

        .linkedin {
            background-color: #2867B2;
            color: #fff;
            font-size: 18px;
            padding-top: 5px;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            cursor: pointer;
        }

        .line {
            height: 1px;
            width: 45%;
            background-color: #E0E0E0;
            margin-top: 10px;
        }

        .or {
            width: 10%;
            font-weight: bold;
        }

        .text-sm {
            font-size: 14px !important;
        }

        ::placeholder {
            color: #BDBDBD;
            opacity: 1;
            font-weight: 300
        }

        :-ms-input-placeholder {
            color: #BDBDBD;
            font-weight: 300
        }

        ::-ms-input-placeholder {
            color: #BDBDBD;
            font-weight: 300
        }

        input,
        textarea {
            padding: 10px 12px 10px 12px;
            border: 1px solid lightgrey;
            border-radius: 2px;
            margin-bottom: 5px;
            margin-top: 2px;
            width: 100%;
            box-sizing: border-box;
            color: #2C3E50;
            font-size: 14px;
            letter-spacing: 1px;
        }

        input:focus,
        textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #304FFE;
            outline-width: 0;
        }

        button:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            outline-width: 0;
        }

        a {
            color: inherit;
            cursor: pointer;
        }

        .btn-blue {
            background-color: #000066;
            width: 150px;
            color: #fff;
            border-radius: 2px;
        }

        .btn-blue:hover {
            background-color: #e8f0fe;
            cursor: pointer;
            border: 1px solid #000066;
        }

        .bg-blue {
            color: #fff;
            background-color: #000066;
        }

        @media screen and (max-width: 991px) {
            .logo {
                margin-left: 0px;
            }

            .image {
                width: 300px;
                height: 220px;
            }

            .border-line {
                border-right: none;
            }

            .card2 {
                border-top: 1px solid #EEEEEE !important;
                margin: 0px 15px;
            }
        }

        a:hover {
            text-decoration: none;
            color: #000066 !important;
        }

        .social-contact a:hover {
            background-color: #fff;
            color: #000;
            border-radius: 5px;
            padding: 5px;
        }

        .error {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .alert-warning {
            color: #856404;
            background-color: #fff3cd;
            border-color: #ffeeba;
        }
    </style>

</head>

<body class="hold-transition login-page sidebar-mini">
    <div class="container">
        <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
            <div class="card card0 border-0">
                <div class="row d-flex">
                    <div class="col-lg-6">
                        <div class="card1 pb-5">
                            <div class="row">
                                <img src="<?php echo base_url('/public/uploads/logo_2.png') ?>" class="logo">
                            </div>
                            <div class="row px-3 justify-content-center mt-4 mb-5 border-line">
                                <img src="https://png.pngtree.com/png-vector/20221025/ourmid/pngtree-log-in-people-sign-username-png-image_6377438.png" class="image">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card2 card border-0 px-4 py-5">
                            <div class="row mb-4 px-3">
                                <b>
                                    <?php echo $setting_data['website_name']; ?> - Lupa Kata Sandi
                                </b>
                            </div>

                            <?php
                            if ($this->session->flashdata('error')) {
                                echo '<div class="error">' . $this->session->flashdata('error') . '</div>';
                            }
                            if ($this->session->flashdata('success')) {
                                echo '<div class="success">' . $this->session->flashdata('success') . '</div>';
                            }
                            ?>
                            <?php echo form_open(base_url() . 'admin/forget-password'); ?>
                            <div class="alert alert-warning" role="alert">
                                Silakan masukkan email Anda yang terdaftar!
                            </div>
                            <div class="row px-3 form-group has-feedback">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Email</h6>
                                </label>
                                <input class="form-control mb-4" placeholder="Email" name="email" type="text" autocomplete="off" autofocus>
                            </div>

                            <div class="row px-3 form-group has-feedback">
                                <div class="col-xs-4">
                                    <input type="submit" class="btn btn-blue btn-block btn-flat login-button" name="form1" value="Submit">
                                </div>
                            </div>

                            <div class="row px-3 form-group has-feedback">
                                <div class="col-xs-8" style="padding-top:7px;">
                                    <a href="<?php echo base_url(); ?>admin/login" style="color:red;">Kembali ke halaman login</a>
                                </div>
                            </div>

                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
                <div class="bg-blue py-4">
                    <div class="row px-3">
                        <small class="ml-4 ml-sm-5 mb-2">Hak Cipta <?php echo $setting_data['website_name']; ?> &copy; 2022. All rights reserved.</small>
                        <div class="social-contact ml-4 ml-sm-auto">
                            <a class="fa fa-facebook mr-4 text-sm" href="https://www.facebook.com/LPEKBM/" target="_blank"></a>
                            <a class="fa fa-instagram mr-4 text-sm" href="https://www.instagram.com/lpekbm_manokwari/" target="_blank"></a>
                            <a class="fa fa-youtube mr-4 text-sm" href="https://www.youtube.com/@lpekbm" target="_blank"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="<?php echo base_url(); ?>public/admin/js/jquery-2.2.3.min.js"></script>
    <script src="<?php echo base_url(); ?>public/admin/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>public/admin/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>public/admin/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>public/admin/js/select2.full.min.js"></script>
    <script src="<?php echo base_url(); ?>public/admin/js/jquery.inputmask.js"></script>
    <script src="<?php echo base_url(); ?>public/admin/js/jquery.inputmask.date.extensions.js"></script>
    <script src="<?php echo base_url(); ?>public/admin/js/jquery.inputmask.extensions.js"></script>
    <script src="<?php echo base_url(); ?>public/admin/js/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>public/admin/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url(); ?>public/admin/js/icheck.min.js"></script>
    <script src="<?php echo base_url(); ?>public/admin/js/fastclick.js"></script>
    <script src="<?php echo base_url(); ?>public/admin/js/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url(); ?>public/admin/js/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url(); ?>public/admin/js/app.min.js"></script>
    <script src="<?php echo base_url(); ?>public/admin/js/demo.js"></script>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>


</body>

</html>
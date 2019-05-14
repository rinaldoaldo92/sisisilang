<?php 
          

          if($this->session->userdata('id') == '') {
            $this->session->set_flashdata('sukses', 'Kamu dan anda belum login, silahkan login dulu disini.');
            redirect(base_url('pelayanrakyat'));

          }
?>

<!DOCTYPE html>

<html lang="id">

<head>
<title><?php echo $title; ?></title>
  <meta charset="utf-8">
  <meta content='#29C5FF' name='theme-color'>
  <meta content="#29C5FF" name="msapplication-navbutton-color">
  <meta content="#29C5FF" name="apple-mobile-web-app-status-bar-style">
  <meta content="masihmikir" name="description">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <link href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" rel="stylesheet">
  <link href="<?php echo base_url("assets/css/bootstrap.css"); ?>" rel="stylesheet">
  <link href="<?php echo base_url("assets/css/bootstrap-social.css"); ?>" rel="stylesheet">
  <link href="<?php echo base_url("assets/css/style.css"); ?>" rel="stylesheet">
  <script src="<?php echo base_url("assets/js/tinymce/js/tinymce/tinymce.min.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/popper.js"); ?>"></script>
  <script src="<?php echo base_url("assets/fontawesome/svg-with-js/js/fontawesome-all.js"); ?>"></script>
  <script type="text/javascript">tinymce.init({
  selector: '#text',
  theme: 'modern',
  plugins: ['advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker', 'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking', 'save table contextmenu directionality emoticons template paste jbimages'],
  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link insert jbimages | print preview media fullpage | forecolor backcolor emoticons',
 });</script>
   <script type="text/javascript">tinymce.init({
  selector: '#caption',
  theme: 'modern',
  plugins: ['advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker', 'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking', 'save table contextmenu directionality emoticons template paste jbimages'],
  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link insert jbimages | print preview media fullpage | forecolor backcolor emoticons',
 });</script>
    </head>
<body class="body-pelayanrakyat">
      <nav class="navbar navbar-expand-lg navbar-dark navbar-pelayanrakyat">
    <button class="navbar-toggler" data-toggle="collapse" type="button" data-target="#navbar-dashboard" aria-controls="navbar-dashbaord" aria-label="Toggle navigation" aria-expanded="false" ><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbar-dashboard">
    <ul class="navbar-nav">
    <li class="nav-item"><a href="<?php echo base_url("pelayanrakyat/dashboard"); ?>" class="nav-link"><i class="fas fa-home"></i><br>Beranda</a></li>
    <li class="nav-item"><a href="<?php echo base_url("pelayanrakyat/dashboard/profil"); ?>" class="nav-link"><i class="fas fa-user-circle"></i><br>Profil</a></li>
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" role="button" href="#" aria-haspopup="true" aria-expanded="false"><i class="fas fa-users"></i><br>User</a>
          <div class="dropdown-menu dropdown-menu-pelayanrakyat">
            <a href="<?php echo base_url("pelayanrakyat/dashboard/tambahpengguna"); ?>" class="dropdown-item">Tambah User</a>
            <a href="<?php echo base_url("pelayanrakyat/dashboard/listpengguna"); ?>" class="dropdown-item">List User</a>
          </div>
      </li>
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" role="button" href="#" aria-haspopup="true" aria-expanded="false"><i class="fas fa-th-list"></i><br>Manajemen</a>
          <div class="dropdown-menu dropdown-menu-pelayanrakyat">
            <a href="<?php echo base_url("pelayanrakyat/dashboard/administrasi"); ?>" class="dropdown-item">List Tulisan</a>
          </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" role="button" href="#" aria-haspopup="true" aria-expanded="false"><i class="fas fa-plus-square"></i><br>Buat</a>
          <div class="dropdown-menu dropdown-menu-pelayanrakyat">
        <a href="<?php echo base_url("pelayanrakyat/dashboard/buat"); ?>" class="dropdown-item">Tulisan</a> 
          </div>
      </li>
    <li class="nav-item"><a href="<?php echo base_url("pelayanrakyat/logout"); ?>" class="nav-link"><i class="fas fa-sign-out-alt"></i><br>Keluar</a></li>
  </ul>
</div>
</nav>
</div>
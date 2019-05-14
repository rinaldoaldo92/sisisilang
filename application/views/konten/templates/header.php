<!DOCTYPE html>

<html lang="id">

<head>
<title><?php echo $title ?></title>
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
  <script src="<?php echo base_url("assets/js/jquery-3.3.1.min.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/tinymce/js/tinymce/tinymce.min.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/popper.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
  <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
  <script src="<?php echo base_url("assets/fontawesome/svg-with-js/js/fontawesome-all.js"); ?>"></script>
<script type="text/javascript">tinymce.init({
  selector: '#text',
  theme: 'modern',
  plugins: ['advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker', 'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media jbimages nonbreaking', 'save table contextmenu directionality emoticons template paste'],
  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | insert jbimages print preview fullpage | forecolor backcolor emoticons',
 });</script>
<script type="text/javascript">tinymce.init({
  selector: '#caption',
  theme: 'modern',
  plugins: ['advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker', 'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media jbimages nonbreaking', 'save table contextmenu directionality emoticons template paste'],
  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | insert jbimages print preview fullpage | forecolor backcolor emoticons',
 });</script>
  </head>
<body>
    <nav class="navbar navbar-expand-lg navbar-expand-xl navbar-dark bg-orange">
    <button class="navbar-toggler" data-toggle="collapse" type="button" data-target="#navbar-utama" aria-controls="navbar-utama" aria-label="Toggle navigation" aria-expanded="false" ><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbar-utama">
    <ul class="navbar-nav">
      <li class="nav-item"><a href="<?php echo base_url("konten"); ?>" class="nav-link">Beranda</a></li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" role="button" href="#" aria-haspopup="true" aria-expanded="false">Narasi</a>
          <div class="dropdown-menu">
            <a href="<?php echo base_url("narasi/media"); ?>" class="dropdown-item">Media</a>
          </div>
      </li>
      </ul>
    </div>
  </nav>

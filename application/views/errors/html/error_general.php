<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<title>Error</title>
<style>
@import url('https://fonts.googleapis.com/css?family=Questrial|Noticia+Text|Material+Icons');

p, strong, a, a:focus, a:hover, ol, li, td, thead, ul, b, strong, label, .btn, figcaption, .figure-caption, .dropdown-item {
  font-family: 'Questrial', sans-serif;
  text-align: left;
  color: white;
}

h1, h2, h3, h4, h5, h6, blockquote, i {
  font-family: 'Noticia Text', serif;
  text-align: left;
  color: white;
}

body {
  background: #913D88;
}

#konten {
  margin: 30px;
}
</style>
</head>
<body>
	<div id="konten">
		<h1><?php echo $heading; ?></h1>
		<?php echo $message; ?>
	</div>
</body>
</html>
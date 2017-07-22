<!DOCTYPE html>
<html>
<head>
	<title>Admin Template 1</title>
</head>
<body>
<h3>This is default template</h3>
<?php

?>
<?php $this->load->view($content_view); ?>
<?php 
foreach ($articles as $article) {
 echo ' Title '.$article->title.'<br>';
}
?>
</body>
</html>
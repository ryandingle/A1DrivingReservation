<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $title;?></title>
	<base href="<?php echo base_url();?>" />
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="assets/css/custom.css" />
</head>
<body>
	<div class="header">
    	<?php $this->load->view($header);?>
    </div>
    <div class="content">
		<?php $this->load->view($content);?>    
    </div>
    <div class="footer">
    	<?php $this->load->view($footer);?>
    </div>
    <script type="text/javascript" src="assets/js/core.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/prototype.js"></script>
</body>
</html>
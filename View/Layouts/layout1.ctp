<?php
/**
 *
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
//		echo $this->Html->css("cake.generic.css"); 
		echo $this->Html->css('bootstrap-theme.css');
		echo $this->Html->css('bootstrap.css');
//		echo $this->Html->css("mine.css"); 
		echo $this->Html->script('jquery.js');
		echo $this->Html->script("bootstrap.js"); 
		 

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

	?>
</head>
<body>
	<div class = "navbar navbar-default"> <a class = "navbar-brand"> Chat System</a> </div> 
	<div id="container">
		<div>
			<h1><?php //echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1>
		</div>
		<div id="content" class = "container theme-showcase">

			<?php echo $this->Session->flash(); ?>
			<h1><?php echo "<div class = 'page-header'>$title </div>" ;?></h1>    
			<?php echo $this->fetch('content'); ?>
		</div>
		
	</div>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<p id="footer" sytle={margin-bottom : 0px ;} class  = "alert alert-success">
			<?php echo $this->Html->link("Project ChatSystem - LocDX HEDSPI k54", "http://facebook.com/dinh.loc1"); ?>  
	</p> 
	<?php    echo $this->element('sql_dump'); ?>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GameShop</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url();?>">gameShop</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo base_url();?>">Home</a></li>
          <?php if(!$this->session->userdata('logged_in')):?>
            <li><a href="<?php echo base_url();?>users/register">Create Account</a></li>
          <?php else : ?>
			<li><a href="#"><?php echo $this->session->userdata('username'); ?></a></li>
          <?php endif; ?>
           </ul>
          <?php if(!$this->session->userdata('logged_in')): ?>
			  <form class="navbar-form navbar-right" action="<?php base_url();?>users/login" method="post">
				<div class="form-group">
                   <input name= "username" type="text" class="form-control" placeholder="Enter Username">
				</div>
				<div class="form-group">
                   <input name= "password" type="password" class="form-control" placeholder="Enter Password">
				</div>
				<button type="submit" class="btn btn-default" name="submit">Login</button>
			  </form>
          <?php else : ?>
			  <form class="navbar-form navbar-right" action="<?php base_url();?>users/logout" method="post">
			  <button name="submit" type="submit" class="btn btn-default">Logout</button>
			  </form>
          <?php endif; ?>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
				<?php $this->load->view('layouts/includes/sidebar'); ?>
            </div>
			<div class="col-md-8">
				<div class="panel panel-default">
				<div class="panel-heading panel-heading-green">
					<h3 class="panel-title">gameShop</h3>
				</div>
				<div class="panel-body">


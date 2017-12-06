<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
  <meta name="author" content="">

	<title>Editor</title>

	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?=public_url()?>css/style.css">
	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body id="home">

	<header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="<?=base_url()?>">Editor</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php if ($content == 'home') { echo 'active'; } ;?>">
              <a href="<?=base_url()?>" class="nav-link">Dashboard</a>
            </li>
            <li class="nav-item <?php if ($content == 'intro') { echo 'active'; } ;?>">
              <a href="<?=base_url('intro')?>" class="nav-link">Intro</a>
            </li>
            <li class="nav-item <?php if ($content == 'events' || $content == 'events_new') { echo 'active'; } ;?>">
              <a href="<?=base_url('events')?>" class="nav-link">Events</a>
            </li>
            <li class="nav-item <?php if ($content == 'visuals') { echo 'active'; } ;?>">
              <a href="<?=base_url('visuals')?>" class="nav-link">Visuals</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <div class="container-fluid">
      <div class="row">
        <?php $this->load-> view('content/'.$content); ?>
      </div>
    </div>

		<div id="myNav" class="overlay">
		  <a href="#" class="closebtn">&times;</a>
		  <div class="overlay-content">
				<div class="row">
					<ul class="list-visuals">
						<?php foreach ($visuals as $visual):?>
							<?php
								$posX = $visual['coords'][0]*120;
								$posY = $visual['coords'][1]*120;
							?>
							<li class="visual-item" style="background-position: -<?=$posX?>px -<?=$posY?>px" title="<?=$visual['name']?>" data-name="<?=$visual['name']?>">
								<span>
									<?=$visual['name']?>
								</span>
							</li>
						<?php endforeach;?>
					</ul>
				</div>
		  </div>
		</div>

		<script src="//code.jquery.com/jquery-3.1.1.min.js" crossorigin="anonymous"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

		<?php if ($content == 'visuals') { ?>
			<script src="<?=public_url()?>js/visuals.js"></script>
		<?php }; ?>

		<?php if ($content == 'events_new') { ?>
			<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
			<script src="<?=public_url()?>js/newevent.js"></script>
		<?php }; ?>

  </body>
</html>

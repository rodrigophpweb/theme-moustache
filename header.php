<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?php wp_title();?></title>
	<?php wp_head();?>
</head>
<body>
	<!-- Header -->
	<header>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
					  <a class="navbar-brand" href="#">
					  	<!-- <img src="<?php echo get_template_directory_uri();?>/assets/images/logo-negative-moustache.png" alt="Agência Moustache"> -->
					  	<?php the_custom_logo();?>
					  </a>
					  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					    <span class="navbar-toggler-icon"></span>
					  </button>

					  <div class="collapse navbar-collapse" id="navbarSupportedContent">
					    <?php
			
							wp_nav_menu(
								array(
									'theme_location'  => 'moustache-menu-header',
									'container'       => 'div',
        							'container_class' => 'collapse navbar-collapse',
        							'container_id'    => 'navbarSupportedContent',
									'menu_class'      => 'navbar-nav mr-auto',
									'fallback_cb'     => '',
									'add_li_class'    => 'nav-item'
								)
							);
						?>

					    <!-- <ul class="navbar-nav mr-auto">
					      <li class="nav-item active">
					        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
					      </li>
					      <li class="nav-item">
					        <a class="nav-link" href="#">Notícias</a>
					      </li>
					      <li class="nav-item">
					        <a class="nav-link" href="#">Moustache</a>
					      </li>
					    </ul> -->
					    <?php get_search_form();?>
					  </div>
					</nav>
				</div>
			</div>
		</div>
	</header>

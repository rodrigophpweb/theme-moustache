<?php get_header()?>
<!-- Carousel com Slick.JS -->
<pre>
	
</pre>
<section id="carousel">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center mt-5 mb-3">
				<h2>Resultado de busca para:  <?php echo get_search_query();?></h2>
			</div>
			<div class="col-lg-3 mt-3 mb-5">
                <artice class="card rounded-0 shadow-sm bg-white">
					<header>
						<h3>
							<?php 
								$categoria = get_the_category();
								foreach ($categoria as $cat):
							?>

								<a href="<?=site_url('category');?>/<?=$cat->slug?>" title="<?=$cat->name?>"><?=$cat->name?></a>
							<?php endforeach;?>
						</h3>
						<?php the_post_thumbnail('moustache-noticias',['class' => 'card-img-top rounded-0']);?>
					</header>					
					<div class="card-body">
						<?php the_title('<h4 class="card-title">','</h4>');?>
						<p class="card-text"><?php the_excerpt()?></p>
						<a href="<?php the_permalink();?>" class="btn btn-primary btn-block rounded-0" title="<?php the_title_attribute();?>">Saiba Mais</a>
					</div>
				</artice>
			</div>
		</div>
	</div>
</section>
<?php get_footer()?>
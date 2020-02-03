<?php get_header();?>
	<section id="categoria">
		<div class="container">
			<div class="row mt-5">
				<div class="col-lg-12 text-center">
					<?php single_cat_title('<h2>','</h2>');?>
				</div>
				<?php while (have_posts()) : the_post();?>
			        <article class="col-12 col-sm-6 col-md-4 col-lg-3 mt-3 mb-5">
		                <div class="card rounded-0 shadow-sm bg-white">
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
								<?php the_title('<h4>','</h4>');?>
								<p class="card-text"><?php the_excerpt()?></p>
								<a href="<?php the_permalink();?>" class="btn btn-primary btn-block rounded-0" title="<?php the_title_attribute();?>">Saiba Mais</a>
							</div>
						</div>
					</article>
				<?php endwhile; ?>		     
			</div>
		</div>
	</section>
<?php get_footer();?>
<?php get_header();?>
	<section id="categoria">
		<div class="container">
			<div class="row mt-5">
				<div class="col-lg-12 text-center">
					<?php single_cat_title('<h2>','</h2>');?>
				</div>
				<?php while (have_posts()) : the_post();?>
			        <div class="col-lg-3 mt-3 mb-5">
		                <div class="card rounded-0 shadow-sm bg-white">
							<h3>
								<?php 
									$categoria = get_the_category();
									foreach ($categoria as $cat):
								?>
									<a href="<?=site_url('category');?>/<?=$cat->slug?>" title="<?=$cat->name?>"><?=$cat->name?></a>
								<?php endforeach;?>
							</h3>
							<img class="card-img-top rounded-0" src="<?php echo get_template_directory_uri();?>/assets/images/card.jpg" alt="Card image cap">
							<div class="card-body">
								<?php the_title('<h4>','</h4>');?>
								<p class="card-text"><?php the_excerpt()?></p>
								<a href="<?php the_permalink();?>" class="btn btn-primary btn-block rounded-0" title="<?php the_title_attribute();?>">Saiba Mais</a>
							</div>
						</div>
					</div>
				<?php endwhile; ?>		     
			</div>
		</div>
	</section>
<?php get_footer();?>
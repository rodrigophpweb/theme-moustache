<?php get_header();?>
	<section id="single">
		<div class="container">
			<article>
				<?php while (have_posts()) : the_post();?>
					<div class="row mt-5">					
							<div class="col-lg-6">
								<?php the_post_thumbnail('large',['class'=> 'img-fluid']);?>							
							</div>
							<div class="col-lg-6 text-left">
								<header>
									<?php the_title('<h2>','</h2>');?>
									<?php the_date( 'd/m/Y', '<span>', '</span>' ); ?> - 						
									<span>
										<?php 
											$categoria = get_the_category();
											foreach ($categoria as $cat):
										?>
											<a href="<?=site_url('category');?>/<?=$cat->slug?>" title="<?=$cat->name?>"><?=$cat->name?></a>
										<?php endforeach;?>
									</span>
								</header>
							</div>
						
					</div>
					<div class="row mt-5">
						<div class="col-lg-12">
							<?php the_content();?>
						</div>
					</div>
				<?php endwhile;?>
			</article>
		</div>
	</section>
<?php get_footer();?>
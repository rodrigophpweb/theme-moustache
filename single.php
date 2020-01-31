<?php get_header();?>
	<section id="single">
		<div class="container">
			<?php while (have_posts()) : the_post();?>
				<div class="row mt-5">
					<div class="col-lg-12">
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
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-lg-12">
						<?php the_content();?>
					</div>
				</div>
			<?php endwhile;?>
		</div>
	</section>
<?php get_footer();?>
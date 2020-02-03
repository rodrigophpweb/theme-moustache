<!-- Carousel com Slick.JS -->
<section id="carousel">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center mt-5 mb-3">
				<h2>Notícias</h2>
			</div>
			
			<?php 
				$args = array(
	                'post_type'     	=> 'post',
	                'order'         	=> 'DESC',
	                'posts_per_page'	=> '12',
	                'post_status'   	=> 'publish',
	            );
				$the_query = new WP_Query( $args ); 
			?>
			 
			<?php if ( $the_query->have_posts() ) : ?>
			    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
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
			    <?php wp_reset_postdata(); ?>
			 
			<?php else : ?>
			    <p><?php _e( 'Desculpe, nenhum post corresponde aos seus critérios' ); ?></p>
			<?php endif; ?>
		</div>
	</div>
</section>
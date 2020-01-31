<?php get_header()?>
<!-- Carousel com Slick.JS -->
<section id="carousel">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center mt-5 mb-3">
				<h2>Resultado de busca para:  <?php echo get_search_query();?></h2>
			</div>
			<div class="col-lg-3">
                <div class="card rounded-0 shadow-sm bg-white">
					<h3>
						<?php 
							$categoria = get_the_category();
							foreach ($categoria as $cat) {
								echo($cat->name);	
							}
						?>
					</h3>
					<img class="card-img-top rounded-0" src="<?php echo get_template_directory_uri();?>/assets/images/card.jpg" alt="Card image cap">
					<div class="card-body">
						<h4 class="card-title"><?php the_title();?></h4>
						<p class="card-text"><?php the_excerpt()?></p>
						<a href="<?php the_permalink();?>" class="btn btn-primary btn-block rounded-0" title="<?php the_title_attribute();?>">Saiba Mais</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer()?>
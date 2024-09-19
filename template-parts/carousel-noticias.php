<div class="carousel-noticias">
    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <?php query_posts('post_type=post&orderby=date&showposts=3'); ?>
            <?php if (have_posts()) : ?>
                <?php $cont = 0; ?>
                <?php while (have_posts()) : the_post(); ?>
                    <!-- Carousel items -->
                    <div class="carousel-item <?php echo $cont == 0 ? 'active' : ''; ?> p-0">
                        <?php the_post_thumbnail('small', array('class' => 'fit-cover')); ?>
                        <div class="black-overlay"></div>
                        <div class="carousel-caption text-start">
                            <p class="mb-0 text-danger"><?php //echo $antetitulo =  get_field('noticia-antetitulo-padrao')->name ? get_field('noticia-antetitulo-padrao')->name : get_post_meta($post->ID, 'noticia-antetitulo', true); ?></p>
                            <h2><a href="<?php the_permalink() ?>" class="text-white text-decoration-none"><?php the_title(); ?></a></h2>
                        </div>
                    </div>
                    <?php $cont++; ?>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
        </div>
    </div>
</div>
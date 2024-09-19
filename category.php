<?php get_header(); ?>
<div class="container">
    <div class="row px-2 mb-4">
        <div class="col-md-12">
            <h5 class="pb-2 my-3 border-bottom text-center text-primary">
                <?php echo single_cat_title('', false); ?>
            </h5>
            <?php if (have_posts()) :  ?>


                <p class="text-secondary fst-italic text-end mt-0 mb-3"><strong><?php echo $wp_query->found_posts; ?></strong> registro(s) encontrado(s)</p>
                <?php while (have_posts()) : the_post(); ?>

                    <div class="card mb-3 border-0">
                        <div class="row g-0">
                            <div class="col-md-4 col-lg-3">
                                <?php the_post_thumbnail('small', array('class' => 'img-fluid rounded')); ?>
                            </div>
                            <div class="col-md-8 col-lg-9">
                                <div class="card-body d-none d-xl-block">
                                    <h2 class="card-title">
                                        <a class="stretched-link link-secondary" href="<?php the_permalink(); ?>" title="<?php printf(__('%s', 'your-theme'), the_title_attribute('echo=0')); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>
                                    <p class="card-text"><?php //the_excerpt(); ?></p>
                                    <p class="card-text text-muted"><small><?php echo time_ago(); ?> - Em <?php echo get_categorias(array('parent_id' => 2, 'link' => null, 'separator' => ' - ', 'exclude' => array('noticias'), 'class' => null)); ?></small></p>
                                </div>
                                <div class="card-body d-none d-lg-block d-xl-none py-2">
                                    <h4 class="card-title">
                                        <a class="stretched-link link-secondary" href="<?php the_permalink(); ?>" title="<?php printf(__('%s', 'your-theme'), the_title_attribute('echo=0')); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h4>
                                    <p class="card-text"><?php //the_excerpt(); ?></p>
                                    <p class="card-text text-muted"><small><?php echo time_ago(); ?> - Em <?php echo get_categorias(array('parent_id' => 2, 'link' => null, 'separator' => ' - ', 'exclude' => array('noticias'), 'class' => null)); ?></small></p>

                                </div>
                                <div class="card-body d-none d-md-block d-lg-none py-2">
                                    <h5 class="card-title">
                                        <a class="stretched-link link-secondary" href="<?php the_permalink(); ?>" title="<?php printf(__('%s', 'your-theme'), the_title_attribute('echo=0')); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h5>
                                    <p class="card-text"><?php //the_excerpt(); ?></p>
                                    <p class="card-text text-muted"><small><?php echo time_ago(); ?> - Em <?php echo get_categorias(array('parent_id' => 2, 'link' => null, 'separator' => ' - ', 'exclude' => array('noticias'), 'class' => null)); ?></small></p>
                                </div>
                                <div class="card-body d-sm-block d-md-none d-lg-none d-xl-none px-0">
                                    <h2 class="card-title">
                                        <a class="stretched-link link-secondary" href="<?php the_permalink(); ?>" title="<?php printf(__('%s', 'your-theme'), the_title_attribute('echo=0')); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>
                                    <p class="card-text"><?php //the_excerpt(); ?></p>
                                    <p class="card-text text-muted"><small><?php echo time_ago(); ?> - Em <?php echo get_categorias(array('parent_id' => 2, 'link' => null, 'separator' => ' - ', 'exclude' => array('noticias'), 'class' => null)); ?></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>

    <?php endwhile ?>
    <div class="col-xs-12">
        <?php echo wpse64458_pagination(true) ?>
    </div>
<?php else : ?>
    <div class="jumbotron jumbotron-fluid p-3">
        <div class="container text-center">
            <h1 class="display-1">:(</h1>
            <h4 class="text-secondary">Nenhum registro encontrado</h4>
        </div>
    </div>
<?php endif; ?>
<?php wp_reset_query(); ?>
    </div>
</div>
</div>
<?php get_footer(); ?>
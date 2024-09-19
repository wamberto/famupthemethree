<div class="card text-center my-3">
    <div class="card-body">
        <h5 class="card-title">Siga a famup no</h5>
        <a href="https://news.google.com/u/2/publications/CAAqBwgKMNOysgsw4M3JAw?hl=pt-BR&gl=BR&ceid=BR%3Apt-419" target="_blank"><img src="<?php bloginfo('template_url');  ?>/assets/img/Google_News.png" alt="Google_News" /></a>
    </div>

</div>




<?php if (is_single()) { ?>
    <?php
    $categories = wp_list_filter(get_the_category($post->ID));
    if ($categories) {
        $category_ids = array();
        foreach ($categories as $individual_category) {
            $category_ids[] = $individual_category->term_id;
        }
        $args = array(
            'post_type' => 'post',
            //'category_name' => 'noticias',
            'category__in' => $category_ids,
            'post__not_in' => array($post->ID),
            'showposts' => 5,
            'ignore_sticky_posts' => 1
        );
    }
    ?>
    <?php
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) { ?>
        <h5 class="pb-2 mb-2 text-center text-primary">
            Relacionados
        </h5>
        <div class="card bg-white mb-5">
            <ul class="list-group list-group-flush">
                <!--  -->
                <?php while ($the_query->have_posts()) :  $the_query->the_post();  ?>
                    <a class="list-group-item list-group-item-action" href="<?php the_permalink(); ?>" title="<?php printf(__('%s', 'your-theme'), the_title_attribute('echo=0')); ?>">
                        <div class="d-flex  align-items-center">

                            <div class="flex-grow-1 lh-1">
                                <span class="badge bg-secondary fw-light mb-2 py-1">
                                    <?php echo get_field('antetitulo'); ?>
                                </span>
                                <h6 class="">
                                    <?php echo title_limite(80); ?>
    </h6>
                            </div>
                            <div class="flex-shrink-0  ms-3 ">
                                <div class="image-box">
                                    <?php the_post_thumbnail('img-thumbs-three', array('class' => 'img-fluid rounded')); ?>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between text-secondary">
                            <p class="fw-light fs-6 m-0"><small class="text-muted"><?php echo time_ago();                                                                                        ?></small></p>
                        </div>
                    </a>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </ul>
        </div>
    <?php } else { ?>
        <p>Nenhuma Notícia relacionada a essa categoria no momento.</p>
    <?php } ?>
<?php } ?>
<?php if (is_home()) { ?>


    <h5 class="pb-2 my-3 border-bottom text-center text-primary">
        Você Sabia?
    </h5>
    <?php query_posts('post_type=post&category_name=voce-sabia&orderby=date&showposts=1'); ?>
    <?php if (have_posts()) : ?>
        <?php $cont = 0; ?>
        <?php while (have_posts()) : the_post(); ?>
            <?php if (get_field('slide') != null) : ?>
                <div id="carouselExampleFade" class="carousel slide carousel-fade mb-5" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php foreach (get_field('slide') as $slide) { ?>
                            <div class="carousel-item  <?php echo $cont == 0 ? 'active' : ''; ?>">
                                <div class="card full-height text-white">
                                    <?php if (get_field('video') != null) { ?>
                                        <video autoplay muted loop>
                                            <source src="<?php echo get_field('video'); ?>" type="video/mp4">
                                        </video>
                                    <?php } else { ?>
                                        <img src="<?php echo $slide['imagem']; ?>" class="crop-image rounded" alt="...">
                                    <?php }  ?>
                                    <div class="black-overlay"></div>
                                    <div class="card-img-overlay d-flex align-items-end justify-content-center p-4">
                                        <a class="text-white text-center  stretched-link" href="<?php the_permalink(); ?>" title="<?php printf(__('%s', 'your-theme'), the_title_attribute('echo=0')); ?>">
                                            <p> <span class="badge rounded-pill bg-transparent border p-2"> <?php echo get_categorias(array('parent_id' => 2, 'link' => null, 'separator' => ' - ', 'exclude' => array('noticias'), 'class' => null)); ?></span></p>
                                            <h3 class="card-title text-center lh-sm"><?php echo $title = $mobile ? title_limite(100) : the_title(); ?></h3>
                                            <p class="card-text fw-light lh-sm"><?php echo $excerpt = $mobile ? get_excerpt(100, false) : get_the_excerpt(); ?></p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php $cont++; ?>
                        <?php } ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>

    <!-- mais lidos -->
    <?php
    $popular = new WP_Query(
        array(
            'post_type' => 'post',
            // 'date_query' => array(  array('year' => date( 'Y' ),'week' => date( 'W' ) ) ),  
            'date_query' => array(array('year' => date('Y'), 'week' => strftime('%U'))),
            //'date_query' => array(array('column' => 'post_date_gmt', 'after' => '7 days ago')),
            // 'date_query' => array('after' => '1 week ago', 'before' => 'today', 'inclusive' => true),
            'posts_per_page'      => 5,                // Máximo de 5 artigos
            'no_found_rows'       => true,              // Não conta linhas
            'post_status'         => 'publish',         // Somente posts publicados
            'ignore_sticky_posts' => true,              // Ignora posts fixos
            'orderby'             => 'meta_value_num',  // Ordena pelo valor da post meta
            'meta_key'            => 'tp_post_counter', // A nossa post meta
            'order'               => 'DESC'             // Ordem decrescente
        )
    );
    ?>
    <?php if ($popular->have_posts()) :  ?>
        <h5 class="pb-2 mb-2 text-center text-primary">Mais lidas</h5>
        <div class="card bg-light mb-5">
            <ul class="list-group list-group-flush">
                <?php $cont = 1;  ?>
                <?php while ($popular->have_posts()) : $popular->the_post();  ?>
                    <a class="list-group-item list-group-item-action" href="<?php the_permalink(); ?>" title="<?php printf(__('%s', 'your-theme'), the_title_attribute('echo=0')); ?>">
                        <div class="d-flex  align-items-center">
                            <div class="flex-grow-1 lh-1">
                                <p class="fw-light fs-6 text-muted m-0">
                                    <small>
                                        <span class="badge rounded-pill bg-info fw-light mb-2"><?php echo $cont;  ?></span>
                                        <span class="badge rounded-pill bg-info fw-light mb-2">
                                            <?php echo get_categorias(array('parent_id' => 2, 'link' => null, 'separator' => ' - ', 'exclude' => array('noticias'), 'class' => null)); ?>
                                        </span>
                                    </small>
                                </p>
                                <p class="">
                                    <?php echo title_limite(60); ?>
                                </p>
                            </div>
                            <div class="flex-shrink-0  ms-3">
                                <?php the_post_thumbnail('img-thumbs-three', array('class' => 'img-fluid rounded')); ?>
                            </div>
                        </div>
                    </a>
                    <?php $cont++  ?>
                <?php endwhile; ?>
                <?php wp_reset_query(); ?>
            </ul>
        </div>
    <?php endif;  ?>
    <!-- /mais lidos -->
<?php } ?>
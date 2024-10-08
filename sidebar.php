
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
            Relacionadas
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
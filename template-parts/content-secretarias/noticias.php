<?php $slug = get_post_by_url(3, 'post_name'); ?>
<?php
/* https://wordpress.stackexchange.com/questions/120407/how-to-fix-pagination-for-custom-loops */
if (get_query_var('paged')) {
    $paged = get_query_var('paged');
} elseif (get_query_var('page')) { // 'page' is used instead of 'paged' on Static Front Page
    $paged = get_query_var('page');
} else {
    $paged = 1;
}
$custom_query_args = array(
    'post_type' => 'post',
    'posts_per_page' => get_option('posts_per_page'),
    'paged' => $paged,
    'post_status' => 'publish',
    'ignore_sticky_posts' => true,
    'category_name' => $slug,
    'order' => 'DESC', // 'ASC'
    'orderby' => 'date' // modified | title | name | ID | rand
);
$custom_query = new WP_Query($custom_query_args);
if ($custom_query->have_posts()) :
?>
    <div class="container mb-4">
        <div class="row">
        <div class="col-md-8">
        <div class="card">
.
        </div>
        </div>
        <div class="col-md-4">
        <div class="card">
..
        </div>
        <div class="card">
...
        </div>
        </div>
        
            <div class="col-md-12">
                <?php while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
                    <div class="card mb-3" style="border: none; background: transparent">
                        <div class="row no-gutters">
                            <div class="col-md-2 d-none d-md-block">
                                <?php the_post_thumbnail('thumb-list', array('class' => 'card-img img-fluid rounded')); ?>
                            </div>
                            <div class="col-md-10">
                                <div class="card-body pt-0 text-secondary">
                                    <p class="text-primary mb-0"><?php echo $antetitulo = get_field('noticia-antetitulo')->name ? get_field('noticia-antetitulo')->name : get_post_meta($post->ID, 'noticia-antetitulo', true); ?></p>
                                    <h5 class="mb-0"><a href="<?php echo get_permalink(); //echo get_bloginfo('url') . '/secretarias/'.$slug.'/noticias/'.$post->post_name; ?>" class="text-secondary"><?php the_title(); ?></a></h5>
                                    <p class="card-text">
                                        <small class="text-muted"><i class="fa fa-calendar"></i> <?php the_time('d/m/Y'); ?> - <i class="fa fa-clock-o"></i> <?php the_time('H:i'); ?></small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php if ($custom_query->max_num_pages > 1) : // custom pagination  
                ?>
                    <?php
                    $orig_query = $wp_query; // fix for pagination to work
                    $wp_query = $custom_query;
                    ?>
                    <?php echo wpse64458_pagination(); ?>
                    <?php
                    $wp_query = $orig_query; // fix for pagination to work
                    ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
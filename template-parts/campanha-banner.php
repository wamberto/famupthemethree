<?php
$args_campanha = array(
    'post_type' => 'page',
    'name' => 'campanha-banner',
    'posts_per_page' => 1,
    'meta_query'    => array(
        'relation'      => 'AND',
        array(
            'key' => 'data_final', 'value' => date('Ymd'), 'type' => 'NUMERIC', 'compare' => '>='
        )
    )
);
?>
<?php $campanha = new WP_Query($args_campanha); ?>
<?php if ($campanha->have_posts()) : ?>
    <?php while ($campanha->have_posts()) : $campanha->the_post(); ?>
        <?php $link = get_field('link') != '' ? get_field('link_destaque') : get_the_permalink(); ?>
        <a href="<?php echo $link; ?>" class="mb-0">
            <?php if (get_field('imagens')[0] != false && get_field('imagens')[1] == false && get_field('imagens')[2] == false) { ?>
                <img src="<?php echo (get_field('imagens')[0]['imagem']); ?>" class="mx-auto d-block img-fluid" alt="..." width="100%">
            <?php } else if (get_field('imagens')[0] != false && get_field('imagens')[1] != false && get_field('imagens')[2] == false) { ?>
                <img src="<?php echo (get_field('imagens')[0]['imagem']); ?>" class="mx-auto d-block img-fluid d-none d-lg-block" alt="..." width="100%">
                <img src="<?php echo (get_field('imagens')[1]['imagem']); ?>" class="mx-auto d-block img-fluid d-block d-lg-none" alt="..." width="100%">
            <?php } else if (get_field('imagens')[0] != false && get_field('imagens')[1] != false && get_field('imagens')[2] != false) { ?>
                <img src="<?php echo (get_field('imagens')[0]['imagem']); ?>" class="mx-auto d-block img-fluid d-none d-lg-block" alt="..." width="100%">
                <img src="<?php echo (get_field('imagens')[1]['imagem']); ?>" class="mx-auto d-block img-fluid d-none d-sm-block d-lg-none" alt="..." width="100%">
                <img src="<?php echo (get_field('imagens')[2]['imagem']); ?>" class="mx-auto d-block img-fluid d-block d-sm-none" alt="..." width="100%">
            <?php }  ?>
        </a>
    <?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_query(); ?>
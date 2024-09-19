<?php
get_header();
tp_count_post_views();
global $post;
$idpost = $post->post_parent;
?>
<div class="container mb-4">
    <div class="row px-2">
        <div class="col-md-12 col-lg-8">
            <article class="blog-post">
                <?php if (have_posts()) : ?>
                    <div class="post" id="post-<?php the_ID(); ?>" <?php post_class('post'); ?> data-id="Link post: <?php echo get_the_title(); ?>">
                        <?php while (have_posts()) : the_post(); ?>
                        <?php if (has_post_thumbnail()) : ?>
                                <div class="card border-0 mb-4">
                                    <?php the_post_thumbnail('img-bigest', array('class' => 'img-fluid rounded-4', 'alt' => get_caption_image())); ?>
                                    <?php $post_thumbnail_id = get_post_thumbnail_id($post->ID); ?>
                                    <?php //var_dump(wp_get_attachment_caption($post_thumbnail_id)); 
                                    ?>
                                    <div class="card-img-overlay">
                                        <?php if (get_field('credito_foto') != null) { ?>
                                            <div class="card-text"><small>
                                                    <span class="fw-light badge rounded-pill bg-dark py-1">
                                                        <i class="fa fa-copyright"></i> <?php echo get_field('credito_foto'); ?>
                                                    </span>
                                                </small>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                           <p class="text-secondary mb-0">
                                    <?php echo get_categorias(array('parent_id' => 2, 'link' => null, 'separator' => ' - ', 'exclude' => array('noticias'), 'class' => null)); ?>
                            </p>
                            <h2 class=""><?php the_title(); ?></h2>
                            <div class="d-flex justify-content-between text-secondary  border-top border-bottom mb-3 pt-3">
                                <p class="fw-light fs-6m-0"><small class="text-muted">Em <?php the_time('d/m/Y'); ?> </small></p>
                            </div>
                          
                            <div class="the-content border-bottom mb-2">
                                <?php the_content(); ?>
                            </div>
                            <ul class="list-group list-group-flush fw-light fs-6">
                                <li class="list-group-item fst-italic px-0">
                                        Por <?php echo get_the_author_meta('display_name'); ?><br>
                                    <?php if (get_field('fonte') != null) { ?>
                                        Fonte: <?php echo get_field('fonte'); ?><br>
                                    <?php } ?>
                                    <?php if (get_field('credito_foto') != null) { ?>
                                        Fotografia: <?php echo get_field('credito_foto'); ?><br>
                                    <?php } ?>
                                </li>
                                <?php $posttags = get_the_tags(); ?>
                                <?php if ($posttags) { ?>
                                    <li class="list-group-item px-0">
                                        <p style="line-height: 2em!important">
                                            <?php foreach ($posttags as $tag) { ?>
                                                <a href="<?php echo get_term_link($tag); ?>" class="">
                                                    <span class="badge rounded-pill bg-secondary">
                                                        <?php echo $tag->name; ?>
                                                    </span>
                                                </a>
                                            <?php } ?>
                                        </p>
                                    </li>
                                <?php } ?>
                            </ul>
                    </div>
                    <?php edit_post_link('editar este post', '<p class="edit-link">', '</p>'); ?>
                <?php endwhile; ?>
            <?php endif; ?>
            </article>
        </div>
        <div class="col-md-12 col-lg-4">
            <?php  get_sidebar(); 
            ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
<?php
get_header();
tp_count_post_views();
global $post;
$idpost = $post->post_parent;
?>
<div class="container mb-4">
        <article class="blog-post">
            <?php if (have_posts()) : ?>
                <div class="post" id="post-<?php the_ID(); ?>" <?php post_class('post'); ?> data-id="Link post: <?php echo get_the_title(); ?>">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php if (has_post_thumbnail()) : ?>
                          <div class="card mb-4">
                                    <?php the_post_thumbnail('img-post-thumbnails', array('class' => 'crop-image rounded')); ?>
                                 <div class="card-img-overlay">
								     <?php if (get_field('credito_da_foto') != null) { ?>
                                        <div class="card-text"><small>
                                                <span class="fw-light badge rounded-pill bg-dark py-1">
                                                    <i class="fa fa-copyright"></i> <?php echo get_field('credito_da_foto'); ?>
                                                </span>
                                            </small>
                                        </div>
                                    <?php } ?>
								 </div>
                          </div>
                        <?php endif; ?>
                        <h3 class="text-center mb-4"><?php the_title(); ?></h3>

                        <div class="border-bottom mb-2">
                        <?php the_content(); ?>
                        </div>
                        <ul class="list-group list-group-flush">
                        <?php if (get_field('fonte') != null) { ?>
                            <li class="list-group-item bg-light px-0">
                                <p class="text-secondary">
                                    Fonte: <?php echo get_field('fonte'); ?><br>
                               </p>
                            </li>
                            <?php } ?>
                            <?php $posttags = get_the_tags(); ?>
                            <?php if ($posttags) { ?>
                                <li class="list-group-item bg-light px-0">
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
<?php get_footer(); ?>
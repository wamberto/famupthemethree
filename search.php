<?php get_header(); ?>
 
    <div class="col-lg-12 mb-4">
            <form class="" role="search" method="get" action="<?php echo home_url('/'); ?>">
                <div class="input-group">
                    <input type="text" class="form-control border-info border-end-0" placeholder="<?php echo esc_attr_x('Pesquisar…', 'placeholder') ?>" value="<?php echo get_search_query() ?>" name="s" aria-label="Pesquisar..." aria-describedby="button-addon2" size="100%">
                    <?php if ($_GET['s']) { ?>
                            <a href="<?php bloginfo('url'); ?>/?s=" class="btn btn-outline-danger rounded-0 border-info border-start-0 bg-white"><i class="fa fa-times"></i></a>
                    <?php } ?>
                   <button class="btn btn-primary" type="submit" id="button-addon2">Buscar</button>
                </div>
          
            </form>
        </div>
        <?php if ($_GET['s'] != "") { ?>
        <p class="text-secondary font-italic text-center"><strong><?php echo $wp_query->found_posts; ?></strong> resultado(s)  encotrado(s) com o termo</p>
        <h4 class="text-primary text-center mb-0">"<?php echo $_GET['s']; ?>"</h4>
        <?php } ?>
        <div class="col-md-12 my-4">
             <?php if (have_posts()) : ?>
                <?php global $wp_query;
                $total_pages = $wp_query->max_num_pages;
                if ($total_pages > 1) { ?>
                    <?php echo wpse64458_pagination(); ?>
                <?php } ?>
                <ul class="list-group list-group-flush">
                    <?php while (have_posts()) : the_post() ?>
                        <li class="list-group-item bg-light py-3">
                            <div id="post-<?php the_ID(); ?>">
                                <h6 class="mb-0"><a href="<?php the_permalink(); ?>" class="text-secondary" title="<?php printf(__('link para %s', 'your-theme'), the_title_attribute('echo=0')); ?>" rel="bookmark"><?php the_title(); ?></a></h6>
                                <p class="fw-light lh-sm small"><?php echo get_the_excerpt(); ?></p>
                                <?php if ($post->post_type == 'post') { ?>
                                    <p class="fw-light lh-sm mb-0 small">
                                        Em <?php the_time('d/m/Y \à\s H:i'); ?> |
                                        <?php echo tp_get_post_views(get_the_ID()); ?> visualizações
                                        <?php edit_post_link(__('Edit', 'seu-template'), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t") ?>
                                    </p>
                                <p class="fw-light lh-sm my-0 small">
                                        Categoria:  <?php echo get_categorias(array('parent_id' => 2, 'link' => 'categoria/', 'separator' => ' - ', 'exclude' => array('noticias'), 'class' => '')); ?>
                                        <?php the_tags('<span class=""><span class="">' . __(' | Tags: ', 'seu-template') . '</span>', " - ", "</span>\n\t\t\t\t\t\t") ?>
                                </p>
                                <?php } ?>
                           </div>
                            <!– #post-<?php the_ID(); ?> –>
                        </li>
                    <?php endwhile; ?>

                    <?php global $wp_query;
                    $total_pages = $wp_query->max_num_pages;
                    if ($total_pages > 1) { ?>
                        <?php echo wpse64458_pagination(); ?>
                    <?php } ?>

                <?php else : ?>

                    <div class="jumbotron jumbotron-fluid mt-3 p-3">
                        <div class="container text-center">
                            <h1 class="display-1">:(</h1>
                            <h4 class="text-secondary">Nenhum registro encontrado</h4>
                        </div>
                    </div>
                </ul>
            <?php endif; ?>
        </div>



<?php get_footer(); ?>
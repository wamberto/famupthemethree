<?php get_header(); ?>
<div class="container mb-4">
        <div class="jumbotron jumbotron-fluid p-3">
                <div class="container text-center">
                    <h1 class="display-1">404 :(</h1>
                    <h4 class="text-secondary">Oops! Esta página não pode ser encontrada.</h4>

                <p class="text-secondary"><?php _e('Parece que não conseguimos encotrar o que você está procurando, talves a pesquisa possa ajudar.', 'your-theme'); ?></p>
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
               
        </div>
</div>
<?php get_footer(); ?>

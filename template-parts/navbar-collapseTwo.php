<div id="navbarOne">
    <nav class="navbar navbar-expand-lg navbar-dark bg-info  py-0">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Brand</a>
            <button class="navbar-toggler my-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-info text-white dropdown-toggle" data-bs-toggle="collapse" aria-pressed="true" href="#collapseNavbarOne" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <span class="h5">Prefeitura</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-info text-white dropdown-toggle" data-bs-toggle="collapse" href="#collapseNavbarTwo" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <span class="h5">Secretarias e Órgãos</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="has-megamenu">
                        <a class="btn btn-info text-white" data-bs-toggle="collapse" href="#collapseNavbarSearch" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <i class="bi bi-search"></i>
                        </a>
                        <div class="dropdown-menu megamenu" role="menu">
                            <div class="container">
                                <form class="" role="search" method="get" action="<?php echo home_url('/'); ?>">
                                    <div class="input-group">
                                        <input type="text" class="form-control border-primary border-right-0" placeholder="<?php echo esc_attr_x('Pesquisar…', 'placeholder') ?>" value="<?php echo get_search_query() ?>" name="s" aria-label="Pesquisar..." aria-describedby="button-addon2" size="100%">
                                        <?php if ($_GET['s']) { ?>
                                            <div class="input-group-append">
                                                <a href="<?php bloginfo('url'); ?>/?s=" class="btn btn-outline-danger border-left-0 bg-white"><i class="fa fa-times"></i></a>
                                            </div>
                                        <?php } ?>
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit" id="button-addon2">Pesquisar</button>
                                        </div>
                                    </div>
                                </form>
                            </div> <!-- dropdown-mega-menu.// -->
                        </div>
                    </li>
                </ul>
            </div> <!-- navbar-collapse.// -->
        </div>
    </nav>
    <!-- Colllapse 1-->
    <div class="collapse" id="collapseNavbarOne" data-bs-parent="#navbarOne" style="background-color: #55B6AA">
             collapse 1
    </div>
    <div class="collapse " id="collapseNavbarTwo" data-bs-parent="#navbarOne"  style="background-color: #55B6AA">
        <div class="row mx-0 p-3">
            <div class="col-lg-6 col-xl-8">
                <div class="row mx-1">
                    <div class="col-12">
                        <h4 class="text-white">Secretarias</h4>
                    </div>
                    <?php $args1 = array('post_type' => 'secretaria', 'meta_key' => 'tipo_da_pasta', 'meta_value' => 'secretaria', 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => 12, 'offset' => 0); ?>
                    <?php query_posts($args1); ?>
                    <?php if (have_posts()) { ?>
                        <div class="col-lg-12 col-xl-6">
                            <div class="list-group list-group-flush   bg-transparent">
                                <?php while (have_posts()) {
                                    the_post(); ?>
                                    <a href="<?php the_permalink(); ?>" class="list-group-item list-group-item-action list-group-item-info"><?php the_title(); ?></a>
                                <?php } /* enwhile */ ?>
                            </div>
                        </div>
                    <?php }/* endif */ ?>
                    <?php wp_reset_query(); ?>
                    <?php $args2 = array('post_type' => 'secretaria', 'meta_key' => 'tipo_da_pasta', 'meta_value' => 'secretaria', 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => 12, 'offset' => 12); ?>
                    <?php query_posts($args2); ?>
                    <?php if (have_posts()) { ?>
                        <div class="col-lg-12 col-xl-6">
                            <div class="list-group list-group-flush">
                                <?php while (have_posts()) {
                                    the_post(); ?>
                                    <a href="<?php the_permalink(); ?>" class="list-group-item list-group-item-action list-group-item-info"><?php the_title(); ?></a>
                                <?php } /* enwhile */ ?>
                            </div>
                        </div>
                    <?php }/* endif */ ?>
                    <?php wp_reset_query(); ?>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="row mx-1">
                    <div class="col-12">
                        <h4 class="text-white">Orgãos</h4>
                    </div>
                    <?php $args3 = array('post_type' => 'secretaria', 'meta_key' => 'tipo_da_pasta', 'meta_value' => 'orgao', 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => -1, 'offset' => 0); ?>
                    <?php query_posts($args3); ?>
                    <?php if (have_posts()) { ?>
                        <div class="col-md-12">
                            <div class="list-group list-group-flush">
                                <?php while (have_posts()) {
                                    the_post(); ?>

                                    <a href="<?php the_permalink(); ?>" class="list-group-item list-group-item-action list-group-item-info"><?php the_title(); ?></a>

                                <?php } /* enwhile */ ?>
                            </div>
                        </div>
                    <?php }/* endif */ ?>
                    <?php wp_reset_query(); ?>
                    <div class="col-12 mt-2">
                        <h4 class="text-white">Coordenadorias</h4>
                    </div>
                    <?php $args2 = array('post_type' => 'secretaria', 'meta_key' => 'tipo_da_pasta', 'meta_value' => 'coordenadoria', 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => -1, 'offset' => 0); ?>
                    <?php query_posts($args2); ?>
                    <?php if (have_posts()) { ?>
                        <div class="col-md-12">
                            <div class="list-group list-group-flush">
                                <?php while (have_posts()) {
                                    the_post(); ?>
                                    <a href="<?php the_permalink(); ?>" class="list-group-item list-group-item-action list-group-item-info"><?php the_title(); ?></a>
                                <?php } /* enwhile */ ?>
                            </div>
                        </div>
                    <?php }/* endif */ ?>
                    <?php wp_reset_query(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="collapse" id="collapseNavbarSearch" data-bs-parent="#navbarOne" style="background-color: #55B6AA">
        <form class="d-flex p-4" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>

    <!-- Colllapse 2-->
    <div class="collapse" id="navbarTogglePrefeitura">
        Prefeitura
    </div>
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-white p-0">
            <div class="accordion accordion-flush mb-4" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button text-secondary collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            <p class="fs-4 fw-bold m-0">Serviços</p>
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button text-secondary collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            <p class="fs-4 fw-bold m-0">Prefeitura</p>
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button text-secondary collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            <p class="fs-4 fw-bold m-0">Secretarias e Órgãos</p>
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body ">
                            <div class="list-group list-group-flush">
                                <li class="list-group-item fs-6 px-0 text-secondary" aria-disabled="true">SECRETARIAS</li>
                                <?php $args3 = array('post_type' => 'secretaria', 'meta_key' => 'tipo_da_pasta', 'meta_value' => 'secretaria', 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => -1, 'offset' => 0); ?>
                                <?php query_posts($args3); ?>
                                <?php if (have_posts()) { ?>
                                    <?php while (have_posts()) {
                                        the_post(); ?>
                                        <a href="<?php the_permalink(); ?>" class="list-group-item list-group-item-action"><?php the_title(); ?></a>
                                    <?php } /* enwhile */ ?>
                                <?php }/* endif */ ?>
                                <?php wp_reset_query(); ?>
                                <li class="list-group-item fs-6 px-0 text-secondary" aria-disabled="true">ÓRGÃOS</li>
                                <?php $args4 = array('post_type' => 'secretaria', 'meta_key' => 'tipo_da_pasta', 'meta_value' => 'orgao', 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => -1, 'offset' => 0); ?>
                                <?php query_posts($args4); ?>
                                <?php if (have_posts()) { ?>
                                    <?php while (have_posts()) {
                                        the_post(); ?>
                                        <a href="<?php the_permalink(); ?>" class="list-group-item list-group-item-action"><?php the_title(); ?></a>
                                    <?php } /* enwhile */ ?>
                                <?php }/* endif */ ?>
                                <?php wp_reset_query(); ?>
                                <li class="list-group-item fs-6 px-0 text-secondary" aria-disabled="true">COORDENADORIAS</li>
                                <?php $args5 = array('post_type' => 'secretaria', 'meta_key' => 'tipo_da_pasta', 'meta_value' => 'coordenadoria', 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => -1, 'offset' => 0); ?>
                                <?php query_posts($args5); ?>
                                <?php if (have_posts()) { ?>
                                    <?php while (have_posts()) {
                                        the_post(); ?>
                                        <a href="<?php the_permalink(); ?>" class="list-group-item list-group-item-action"><?php the_title(); ?></a>
                                    <?php } /* enwhile */ ?>
                                <?php }/* endif */ ?>
                                <?php wp_reset_query(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form class="d-flex p-4" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</div>
<style>
    /*-------------------------------
 * override bootstrap
 -------------------------------*/

    #navbarOne {
        --bs-primary-text: #ccc!important;
        --bs-primary-bg-subtle: #efefef !important;
        --bs-body-color: #999999 !important;
        --bs-accordion-btn-active-icon: #ccc !important;
        --bs-accordion-btn-icon: #00cc00 !important;
        --bs-list-group-action-hover-bg: #66E4D4;
        --bs-list-group-action-hover-color: #66E4D4;
        --bs-list-group-active-bg: #66E4D4;

    }

    #navbarOne .navbar-collapse .btn {
        border-radius: 0;
        padding: 20px 15px 20px 15px;
    }

    #navbarOne .list-group-item-info {
        background-color: #55B6AA;
    
    }

    #navbarOne .list-group-item-info {
        color: white;
        background-color: #55B6AA;
    }
    #navbarOne .list-group-item-action:hover {
        color: white;
        color:  #66E4D4;
        background-color: shade-color(#55B6AA, 10%);
    }

    /*
    #navbarOne .accordion {
        --bs-accordion-color: var(--bs-body-color);
        --bs-accordion-bg: var(--bs-body-bg);
        --bs-accordion-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, border-radius 0.15s ease;
        --bs-accordion-border-color: var(--bs-border-color);
        --bs-accordion-border-width: var(--bs-border-width);
        --bs-accordion-border-radius: var(--bs-border-radius);
        --bs-accordion-inner-border-radius: calc(var(--bs-border-radius) - (var(--bs-border-width)));
        --bs-accordion-btn-padding-x: 1.25rem;
        --bs-accordion-btn-padding-y: 1rem;
        --bs-accordion-btn-color: var(--bs-body-color);
        --bs-accordion-btn-bg: var(--bs-accordion-bg);

        --bs-accordion-btn-icon: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23b33900'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
        --bs-accordion-btn-icon-width: 1.25rem;
        --bs-accordion-btn-icon-transform: rotate(-180deg);
        --bs-accordion-btn-icon-transition: transform 0.2s ease-in-out;
        --bs-accordion-btn-active-icon: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23b33900'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
        --bs-accordion-btn-focus-border-color: #d99680;
        --bs-accordion-btn-focus-box-shadow: 0 0 0 0.25rem rgba(255, 255, 255, 0.25);
        --bs-accordion-body-padding-x: 1.25rem;
        --bs-accordion-body-padding-y: 1rem;
        --bs-accordion-active-color: var(--bs-primary-text);
        --bs-accordion-active-bg: var(--bs-primary-bg-subtle);
    }
    */
</style>
<script>
    $('#main_nav a').on('click', function() {
        $('.btn').addClass('active');
        $('.btn.collapsed').removeClass('active');
    })
</script>
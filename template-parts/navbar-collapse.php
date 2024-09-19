<style>

 .navbar .megamenu{ padding: 1rem; }


/* ============ desktop view ============ */

@media all and (min-width: 992px) {

  .navbar .has-megamenu{position:static!important;}
  .navbar .megamenu{
    left:0; 
    right:0; 
    width:100%; 
    margin-top:0;
    border: none;
    border-radius: 0;
  }

}	
</style>
<div id="navbarOne">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Brand</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown has-megamenu">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> Prefeitura </a>
                        <div class="dropdown-menu megamenu" role="menu">
                            1 This is content of megamenu. <br>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.
                        </div> <!-- dropdown-mega-menu.// -->
                    </li>
                    <li class="nav-item dropdown has-megamenu">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> Secretarias e Órgãos </a>
                        <div class="dropdown-menu megamenu shadow" role="menu">
                            <div class="row mx-0 p-0">
                                <div class="col-lg-6 col-xl-8">
                                    <div class="row mx-1">
                                        <div class="col-12 border-secondary border-bottom">
                                            <h4 class="text-secondary">Secretarias</h4>
                                        </div>
                                        <?php $args1 = array('post_type' => 'secretaria', 'meta_key' => 'tipo_da_pasta', 'meta_value' => 'secretaria', 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => 12, 'offset' => 0); ?>
                                        <?php query_posts($args1); ?>
                                        <?php if (have_posts()) { ?>
                                            <div class="col-lg-12 col-xl-6">
                                                <div class="list-group list-group-flush">
                                                    <?php while (have_posts()) {
                                                        the_post(); ?>
                                                        <a href="<?php the_permalink(); ?>" class="list-group-item list-group-item-action"><?php the_title(); ?></a>
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
                                                        <a href="<?php the_permalink(); ?>" class="list-group-item list-group-item-action"><?php the_title(); ?></a>
                                                    <?php } /* enwhile */ ?>
                                                </div>
                                            </div>
                                        <?php }/* endif */ ?>
                                        <?php wp_reset_query(); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xl-4">
                                    <div class="row mx-1">
                                        <div class="col-12 border-secondary border-bottom">
                                            <h4 class="text-secondary">Orgãos</h4>
                                        </div>
                                        <?php $args3 = array('post_type' => 'secretaria', 'meta_key' => 'tipo_da_pasta', 'meta_value' => 'orgao', 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => -1, 'offset' => 0); ?>
                                        <?php query_posts($args3); ?>
                                        <?php if (have_posts()) { ?>
                                            <div class="col-md-12">
                                                <div class="list-group list-group-flush">
                                                    <?php while (have_posts()) {
                                                        the_post(); ?>
                                                        <a href="<?php the_permalink(); ?>" class="list-group-item list-group-item-action"><?php the_title(); ?></a>
                                                    <?php } /* enwhile */ ?>
                                                </div>
                                            </div>
                                        <?php }/* endif */ ?>
                                        <?php wp_reset_query(); ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 border-secondary border-bottom mt-2">
                                            <h4 class="text-secondary">Coordenadorias</h4>
                                        </div>
                                        <?php $args2 = array('post_type' => 'secretaria', 'meta_key' => 'tipo_da_pasta', 'meta_value' => 'coordenadoria', 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => -1, 'offset' => 0); ?>
                                        <?php query_posts($args2); ?>
                                        <?php if (have_posts()) { ?>
                                            <div class="col-md-12">
                                                <div class="list-group list-group-flush">
                                                    <?php while (have_posts()) {
                                                        the_post(); ?>
                                                        <a href="<?php the_permalink(); ?>" class="list-group-item list-group-item-action"><?php the_title(); ?></a>
                                                    <?php } /* enwhile */ ?>
                                                </div>
                                            </div>
                                        <?php }/* endif */ ?>
                                        <?php wp_reset_query(); ?>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- dropdown-mega-menu.// -->
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="has-megamenu">
                        <a class="btn btn-primary text-white" href="#" data-bs-toggle="dropdown"> <i class="bi bi-search"></i></a>
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
    <div class="collapse" id="navbarTogglePrefeitura">
       Togle Prefeitura
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
        /* --bs-primary-text: #ccc!important; */
        --bs-primary-bg-subtle: #efefef !important;
        --bs-body-color: #999999 !important;
        --bs-accordion-btn-active-icon: #ccc !important;
        --bs-accordion-btn-icon: #00cc00 !important;

    }

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

    #navbarOne .accordion-button {
        position: relative;
        display: flex;
        align-items: center;
        width: 100%;
        padding: var(--bs-accordion-btn-padding-y) var(--bs-accordion-btn-padding-x);
        font-size: 1rem;
        color: var(--bs-accordion-btn-color);
        text-align: left;
        background-color: var(--bs-accordion-btn-bg);
        border: 0;
        border-radius: 0;
        overflow-anchor: none;
        transition: var(--bs-accordion-transition);
    }

    #navbarOne .accordion-button:not(.collapsed) {
        color: var(--bs-accordion-active-color);
        background-color: var(--bs-accordion-active-bg);
        box-shadow: inset 0 calc(-1 * var(--bs-accordion-border-width)) 0 var(--bs-accordion-border-color);
    }

    #navbarOne .accordion-button:not(.collapsed)::after {
        background-image: var(--bs-accordion-btn-active-icon);
        transform: var(--bs-accordion-btn-icon-transform);
    }

    #navbarOne .accordion-button::after {
        flex-shrink: 0;
        width: var(--bs-accordion-btn-icon-width);
        height: var(--bs-accordion-btn-icon-width);
        margin-left: auto;
        content: "";
        background-image: var(--bs-accordion-btn-icon);
        background-repeat: no-repeat;
        background-size: var(--bs-accordion-btn-icon-width);
        transition: var(--bs-accordion-btn-icon-transition);
    }

    @media (prefers-reduced-motion: reduce) {
        #navbarOne .accordion-button::after {
            transition: none;
        }
    }

    #navbarOne .accordion-button:hover {
        z-index: 2;
    }

    #navbarOne .accordion-button:focus {
        z-index: 3;
        border-color: var(--bs-accordion-btn-focus-border-color);
        outline: 0;
        box-shadow: var(--bs-accordion-btn-focus-box-shadow);
    }

    #navbarOne .accordion-header {
        margin-bottom: 0;
    }

    #navbarOne .accordion-item {
        color: var(--bs-accordion-color);
        background-color: var(--bs-accordion-bg);
        border: var(--bs-accordion-border-width) solid var(--bs-accordion-border-color);
    }

    #navbarOne .accordion-item:first-of-type {
        border-top-left-radius: var(--bs-accordion-border-radius);
        border-top-right-radius: var(--bs-accordion-border-radius);
    }

    #navbarOne .accordion-item:first-of-type .accordion-button {
        border-top-left-radius: var(--bs-accordion-inner-border-radius);
        border-top-right-radius: var(--bs-accordion-inner-border-radius);
    }

    #navbarOne .accordion-item:not(:first-of-type) {
        border-top: 0;
    }

    #navbarOne .accordion-item:last-of-type {
        border-bottom-right-radius: var(--bs-accordion-border-radius);
        border-bottom-left-radius: var(--bs-accordion-border-radius);
    }

    #navbarOne .accordion-item:last-of-type .accordion-button.collapsed {
        border-bottom-right-radius: var(--bs-accordion-inner-border-radius);
        border-bottom-left-radius: var(--bs-accordion-inner-border-radius);
    }

    #navbarOne .accordion-item:last-of-type .accordion-collapse {
        border-bottom-right-radius: var(--bs-accordion-border-radius);
        border-bottom-left-radius: var(--bs-accordion-border-radius);
    }

    #navbarOne .accordion-body {
        padding: var(--bs-accordion-body-padding-y) var(--bs-accordion-body-padding-x);
    }

    #navbarOne .accordion-flush .accordion-collapse {
        border-width: 0;
    }

    #navbarOne .accordion-flush .accordion-item {
        border-right: 0;
        border-left: 0;
        border-radius: 0;
    }

    #navbarOne .accordion-flush .accordion-item:first-child {
        border-top: 0;
    }

    #navbarOne .accordion-flush .accordion-item:last-child {
        border-bottom: 0;
    }

    #navbarOne .accordion-flush .accordion-item .accordion-button,
    #navbarOne .accordion-flush .accordion-item .accordion-button.collapsed {
        border-radius: 0;
    }

    [data-bs-theme=dark] #navbarOne .accordion-button::after {
        --bs-accordion-btn-icon: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%2366b0ff'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
        --bs-accordion-btn-active-icon: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%2366b0ff'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
    }
</style>
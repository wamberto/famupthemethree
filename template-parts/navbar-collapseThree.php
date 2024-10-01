<div id="navbarOne" class="fixed-top border-bottom border-danger border-4 shadow" style="margin-top: 104px">
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white border-bottom border-dark border-2 py-3">
        <div class="container">
            <a href="<?php bloginfo('url'); ?>" class="navbar-brand">
                <img src="<?php bloginfo('siteurl'); ?>/wp-content/uploads/imagens/logo-famup-color-i.png" width="200" class="img-fluid" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn" data-bs-toggle="collapse" aria-pressed="true" href="#collapseNavbarOne" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <span class="h5">Institucional</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn" data-bs-toggle="collapse" href="#collapseNavbarTwo" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <span class="h5">Municípios</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn" data-bs-toggle="collapse" href="#collapseNavbarThree" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <span class="h5">Área Técnica</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="btn" href="https://sisgf.famup.org.br/usuario/login" target="_blank">
                            <span class="h5">Área Restrita</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="btn" data-bs-toggle="collapse" href="#collapseNavbarSearch" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <i class="bi bi-search"></i>
                        </a>
                    </li>
                </ul>
            </div> <!-- navbar-collapse.// -->
        </div>
    </nav>
    <!-- Colllapse 1-->
    <div class="collapse bg-danger" id="collapseNavbarOne" data-bs-parent="#navbarOne">
        <div class="container">
            <div class="row mx-0 pt-3">
                <div class="col-12">
                    <div class="list-inline pb-3">
                        <a href="<?php bloginfo('siteurl'); ?>/quem-somos" class="list-inline-item link-light px-2">Quem somos</a>
                        <a href="<?php bloginfo('siteurl'); ?>/diretoria" class="list-inline-item link-light px-2">Diretoria</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="collapse bg-danger" id="collapseNavbarTwo" data-bs-parent="#navbarOne">
        <div class="container">
            <div class="row mx-0 pt-3">
                <div class="col-12">
                    <div class="list-inline pb-3">
                        <a href="<?php bloginfo('siteurl'); ?>/associacoes" class="list-inline-item link-light px-2">Associações</a>
                        <a href="<?php bloginfo('siteurl'); ?>/paraiba" class="list-inline-item link-light px-2">Dados municipais</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="collapse bg-danger" id="collapseNavbarThree" data-bs-parent="#navbarOne">
        <div class="container">
            <div class="row mx-0 pt-3">
                <div class="col-12">
                    <ul class="list-inline text-white">
                        <li class="list-inline-item">Transferências</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="collapse bg-danger" id="collapseNavbarSearch" data-bs-parent="#navbarOne">
        <div class="container">
            <div class="row mx-0 py-3">
                <div class="col-12">
                    <form class="d-flex" role="search">
                        <div class="input-group">
                            <input class="form-control" type="search" placeholder="Pesquisar..." aria-label="Pesquisar">
                            <button class="btn btn-outline-light" type="submit">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Colllapse 2-->
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-white p-0">
            <div class="accordion accordion-flush mb-4" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button text-secondary collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            <p class="fs-4 fw-bold m-0">Institucional</p>
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="list-group list-group-flush">
                                <a href="<?php bloginfo('siteurl'); ?>/quem-somos" class="list-group-item fs-6 px-0 text-secondary">Quem somos</a>
                                <a href="<?php bloginfo('siteurl'); ?>/diretoria" class="list-group-item fs-6 px-0 text-secondary">Diretoria</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button text-secondary collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            <p class="fs-4 fw-bold m-0">Municípios</p>
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="list-group list-group-flush">
                                <a href="<?php bloginfo('siteurl'); ?>/associacoes" class="list-group-item fs-6 px-0 text-secondary">Associações</ai>
                                <a href="<?php bloginfo('siteurl'); ?>/paraiba" class="list-group-item fs-6 px-0 text-secondary">Dados Municipais</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button text-secondary collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            <p class="fs-4 fw-bold m-0">Área Técnica</p>
                        </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body ">
                            <div class="list-group list-group-flush">
                                <li class="list-group-item fs-6 px-0 text-secondary">Em breve</li>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item py-3 px-4">
                    <h2 class="accordion-header" id="flush-headingFour">
                        <a href="https://sisgf.famup.org.br/usuario/login" target="_blank" class="text-secondary">
                            <p class="fs-4 fw-bold m-0">Área Restrita</p>
                        </a>
                    </h2>
                   
                </div>
            </div>
            <form class="d-flex  p-4" role="search">
                <div class="input-group">
                    <input class="form-control" type="search" placeholder="Pesquisar..." aria-label="Pesquisar">
                    <button class="btn btn-outline-danger" type="submit">Buscar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    /*-------------------------------
 * override bootstrap
 -------------------------------*/
    /*
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
*/

    #navbarOne .navbar-collapse .btn {
        color: #666666;
        border: none;
        background-color: none;
        border-bottom: 5px solid transparent;

    }

    #navbarOne .navbar-collapse .btn.active {
        font-weight: bold;
        color: #cc0000 !important;
        border-radius: 0;
        border: none;
        border-bottom: 5px solid #cc0000;

    }

    #navbarOne .list-group-item-info {
        color: #0c5c6c;
        background-color: transparent;
        font-weight: 700;
        border-bottom: 1px solid #0ebfe3;
    }

    #navbarOne .list-group-item-action:hover {
        color: #117f95;
        background-color: shade-color(#55B6AA, 100%);
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
        $('.nav-item .btn').addClass('active');
        $('.nav-item .btn.collapsed').removeClass('active');
    })
</script>
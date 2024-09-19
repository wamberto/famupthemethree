<?php /* Template Name: paraiba */ ?>
<?php get_header(); ?>
<?php get_header(); ?>
<?php //the_post(); 
?>
<?php $url = 'https://sisgf.famup.org.br' ?>
<?php
$municipio = file_get_contents($url . "/data_sharing/municipio_dados.php");
$obj = json_decode($municipio);
$arr = (array) $obj;
$mun = isset($arr[get_the_title()]) ? $arr[get_the_title()] : null;

$prefeitura = file_get_contents($url . "/data_sharing/prefeitura_dados.php");
$obj_pref = json_decode($prefeitura);
$arr_pref = (array) $obj_pref;
$pref = isset($arr_pref[get_the_title()]) ? $arr_pref[get_the_title()] : null;

$telefones = file_get_contents($url . "/data_sharing/prefeitura_telefones.php");
$obj_fones = json_decode($telefones);
$arr_fones = (array) $obj_fones;
$fones = isset($arr_fones[get_the_title()]) ? $arr_fones[get_the_title()] : null;

$emails = file_get_contents($url . "/data_sharing/prefeitura_emails.php");
$obj_emails = json_decode($emails);
$arr_emails = (array) $obj_emails;
$emails = isset($arr_emails[get_the_title()]) ? $arr_emails[get_the_title()] : null;
?>
<?php
$args = array(
    'sort_order' => 'ASC',
    'hierarchical' => 1,
    'exclude' => '',
    'child_of' => 238,
    'parent' => -1,
    'exclude_tree' => '',
    'number' => '',
    'offset' => 0,
    'post_type' => 'page',
    'post_status' => 'publish'
);

$pages = get_pages($args);
?>
<style>
    #my-map-canvas .text-marker {
        max-width: none !important;
        background: none !important;
    }

    img {
        max-width: none
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-12">

            <nav class="navbar">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <h1 class="text-danger"><?php the_title(); ?>-PB</h1>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

                        <ul class="list-group list-group-flush me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 50vh;">
                            <?php
                            foreach ($pages as $page) {
                                $active = $page->post_title == get_the_title() ? 'active' : '';
                                echo '<a class="list-group-item list-group-item-action ' . $active . '" href="' . get_page_link($page->ID) . '">' . $page->post_title . '</a>';
                            }
                            ?>
                        </ul>

                    </div>
                </div>
            </nav>
            <hr>
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php if ($pref != null) { ?>
                    <dl class="row">
                        <dt class="col-md-3">Bandeira</dt>
                        <dd class="col-md-9">
                            <?php
                            if ($pref->prefeitura_foto) {
                                echo '<img src="https://sisgf.famup.org.br/assets/imgs/foto_contatos/' . $pref->prefeitura_foto . '" height="150px"></img>';
                            } else { ?>
                                <img src="<?php bloginfo('siteurl'); ?>/wp-content/uploads/imagens/brasao-pb-200x200.png" width="150" class="img-fluid" />
                            <?php } ?>
                        </dd>

                        <dt class="col-md-3">Razão social</dt>
                        <dd class="col-md-9"><?php echo $pref->prefeitura_nome; ?></dd>

                        <dt class="col-sm-3">Endereço</dt>
                        <dd class="col-sm-9">
                            <?php echo $pref->prefeitura_endereco . ' - ' . $pref->prefeitura_bairro . ' - CEP.: ' . $pref->prefeitura_cep . ' - ' . $pref->municipio; ?>-PB </dt>
                        </dd>

                        <dt class="col-sm-3">Site</dt>
                        <dd class="col-sm-9"><?php if ($pref->prefeitura_site) {
                                                    echo '<a href="http://' . $pref->prefeitura_site . '" target="_blank">' . $pref->prefeitura_site . '</a>';
                                                } ?></dd>

                        <dt class="col-sm-3">Telefones</dt>
                        <dd class="col-sm-9">
                            <?php if (!empty($fones)) { ?>
                                <?php foreach ($fones as $fone) { ?>
                                    <?php if ($fone->municipio === $mun->municipio) { ?>
                                        <?php echo $fone->numero . '&nbsp; | &nbsp;'; ?>
                                    <?php } ?>
                                <?php } ?>
                            <?php
                            } else {
                                echo "Nenhum telefone cadastrado";
                            }
                            ?>
                        </dd>
                        <dt class="col-sm-3">Emails</dt>
                        <dd class="col-sm-9">
                            <?php if (!empty($emails)) { ?>
                                <?php foreach ($emails as $email) { ?>
                                    <?php if ($email->municipio === $mun->municipio) { ?>
                                        <?php echo $email->endereco . '&nbsp; | &nbsp;'; ?>
                                    <?php } ?>
                                <?php } ?>
                            <?php
                            } else {
                                echo "Nenhum emails cadastrado";
                            }
                            ?>
                        </dd>

                        <dt class="col-sm-12">
                            <hr>
                        </dt>

                        <dt class="col-sm-3">Prefeito</dt>
                        <dd class="col-sm-9">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <?php if ($pref->prefeito_foto !== "") { ?>
                                        <figure class="figure my-2" style="height: 96px; width: 96px">
                                            <img src="<?php echo $url . '/assets/imgs/foto_contatos/' . $pref->prefeito_foto; ?>" class="crop-thumbnail img-thumbnail img-fluid rounded-circle" />
                                        </figure>
                                    <?php  } else { ?>
                                        <figure class="figure my-2" style="height: 96px; width: 96px">
                                            <img src="<?php echo $url . '/assets/imgs/foto_contatos/user-circle.png'; ?>" class="crop-thumbnail img-thumbnail img-fluid rounded-circle" />
                                        </figure>
                                    <?php } ?>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <?php echo $pref->prefeito . ' (' . $pref->partido . ')' ; ?>
                                </div>
                            </div>

                        </dd>
                    </dl>

                    <!--  https://www.embed-map.com/ -->
                    <div style="text-decoration:none; overflow:hidden;max-width:100%;width:100%;height:500px;">
                        <div id="embed-ded-map-canvas" style="height:100%; width:100%;max-width:100%;">
                            <iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo get_the_title(); ?>+paraiba,+brasil&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
                        </div>
                        <a class="from-embedmap-code" href="https://www.bootstrapskins.com/themes" id="get-data-for-map">premium bootstrap themes</a>
                        <style>
                            #embed-ded-map-canvas img {
                                max-height: none;
                                max-width: none !important;
                                background: none !important;
                            }
                        </style>
                    </div>

                        <h3 class="text-danger mt-4" >Dados Gerais</h3>
                        <hr>

                    <dl class="row mt-4">

                        <dt class="col-sm-3">Associação</dt>
                        <dd class="col-sm-9"><a href="<?php bloginfo('url') ?>/associacoes/<?php echo $mun->associacao; ?>"><?php echo $mun->associacao; ?></a></dd>

                        <dt class="col-sm-3">Mesorregião</dt>
                        <dd class="col-sm-9"><?php echo $mun->mesorregiao; ?></dd>

                        <dt class="col-sm-3">Micrigrregião</dt>
                        <dd class="col-sm-9"><?php echo $mun->microrregiao; ?></dd>

                        <dt class="col-sm-3">Área</dt>
                        <dd class="col-sm-9"><?php echo $mun->area; ?> km²</dd>

                        <dt class="col-sm-3">Distância da Capital</dt>
                        <dd class="col-sm-9"><?php echo $mun->distancia_capital; ?> km</dd>

                        <dt class="col-sm-3">Limites</dt>
                        <dd class="col-sm-9"><?php echo $mun->limites; ?> km</dd>

                        <dt class="col-sm-3">Data de Emancipação</dt>
                        <dd class="col-sm-9"><?php echo $mun->emancipacao; ?></dd>

                        <dt class="col-sm-3">Vegetação</dt>
                        <dd class="col-sm-9"><?php echo $mun->vegetacao; ?></dd>

                        <dt class="col-sm-3">Clima</dt>
                        <dd class="col-sm-9"><?php echo $mun->clima; ?></dd>

                        <dt class="col-sm-3">Padroeira</dt>
                        <dd class="col-sm-9"><?php echo $mun->padroeira; ?></dd>

                        <dt class="col-sm-3">História</dt>
                        <dd class="col-sm-9"><?php echo $mun->historia; ?></dd>
                    </dl>
                <?php } else { ?>
                    <dl class="row">

                        <dt class="col-md-3">Bandeira</dt>
                        <dd class="col-md-9">
                            <img src="<?php bloginfo('siteurl'); ?>/wp-content/uploads/imagens/bandeira-paraiba.jpg" width="200" class="img-fluid" />
                        </dd>

                        <dt class="col-sm-3">Razão Social</dt>
                        <dd class="col-sm-9">Governo do Estado da Paraíba</dd>

                        <dt class="col-sm-3">Endereço</dt>
                        <dd class="col-sm-9">Rua Frei Martinho, Jaguaribe - 58015-020 João Pessoa</dd>

                        <dt class="col-sm-3">Site</dt>
                        <dd class="col-sm-9"><a href="https://paraiba.pb.gov.br" target="_blank">paraiba.pb.gov.br</a></dd>

                        <dt class="col-sm-3">Governador</dt>
                        <dd class="col-sm-9">João Azevêdo Lins Filho</dd>

                        <dt class="col-sm-3">Telefones</dt>
                        <dd class="col-sm-9">(83) 3218-4545 (Central de Atendimento) | (83) 3218-4521 (Administração)</dd>

                        <dt class="col-sm-3">Emails</dt>
                        <dd class="col-sm-9">Nenhum email cadastrado</dd>

                    </dl>

                    <!--  https://www.embed-map.com/ -->
                    <div style="text-decoration:none; overflow:hidden;max-width:100%;width:100%;height:500px;">
                        <div id="embed-ded-map-canvas" style="height:100%; width:100%;max-width:100%;">
                            <iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo get_the_title(); ?>+paraiba,+brasil&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
                        </div>
                        <a class="from-embedmap-code" href="https://www.bootstrapskins.com/themes" id="get-data-for-map">premium bootstrap themes</a>
                        <style>
                            #embed-ded-map-canvas img {
                                max-height: none;
                                max-width: none !important;
                                background: none !important;
                            }
                        </style>
                    </div>


                    <dl class="row mt-4">
                        <dd class="h4 col-12">Dados do Estado</dd>

                        <dt class="col-sm-3">Área</dt>
                        <dd class="col-sm-9">56.585 km²</dd>

                        <dt class="col-sm-3">Capital</dt>
                        <dd class="col-sm-9">João Pessoa</dd>
                    </dl>


                <?php } ?>
            </div>
        </div>

    </div>
</div>



<?php get_footer(); ?>
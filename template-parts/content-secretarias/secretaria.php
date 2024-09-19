<?php $sec = $post->post_name; ?>
<?php $orgao = get_field('dados_do_orgao'); ?>
<?php $dados_locais = get_field('local'); ?>


<div class="container border-bottom mb-4 py-4">
    <div class="row justify-content-between">
        <div class="col-lg-8">
            <div class="post">
                <?php $link_site = get_field('link_do_site'); ?>
                <?php if ($site['link'] != '') { ?>
                    <ul class="list-group list-group-flush mb-3">
                        <li class="list-group-item border-bottom px-3">
                            <div class="media text-secondary">
                                <i class="material-icons md-48 rounded-circle border border-secondary shadow-sm mr-4 p-2">insert_link</i>
                                <div class="media-body align-self-center">
                                    <p class="mb-0">Link do Site</p>
                                    <h5><a href="<?php echo $link_site['link']; ?>" target="<?php echo $link_site['target']; ?>"><?php echo $link_site['texto_do_link']; ?></a></h5>
                                </div>
                            </div>
                        </li>
                    </ul>
                <?php } ?>
                <!-- Mostra o conteúdo do post em uma DIV -->
                <div class=" border-bottom pb-4">
                    <?php the_content(); ?>
                </div>
                <ul class="list-group list-group-flush mt-4">
                    <?php if ($orgao['organograma'] != "") { ?>
                        <li class="list-group-item">
                            <div class="d-flex align-items-center">
                                <i class="material-symbols-outlined red md-48 m-0 pe-3 pt-1">account_tree</i>
                                <p class="fw-bolder m-0">
                                    <a class="link-danger" href="<?php echo $orgao['organograma']; ?>" target="_blank">
                                        Faça o download do organograma da <span class="text-uppercase"> <?php echo $orgao['slug']; ?></span>
                                    </a>
                                </p>
                            </div>
                        </li>
                    <?php } ?>
                    <?php if ($orgao['site'] != "") { ?>
                        <li class="list-group-item">
                            <div class="d-flex align-items-center">
                                <i class="material-symbols-outlined red md-48 m-0 pe-3 pt-1">captive_portal</i>
                                <p class="fw-bolder m-0">
                                    <a class="link-danger" href="<?php echo $orgao['site']; ?>" target="_blank">
                                        Acesse o site oficial da <span class="text-uppercase"> <?php echo $orgao['slug']; ?></span>
                                    </a>
                                </p>
                            </div>
                        </li>
                    <?php } ?>
                </ul>

            </div> <!-- Fecha a primeira DIV -->
        </div>
        <div class="col-lg-4">
            <?php if ($dados_locais) { ?>
                <?php foreach ($dados_locais as $local) { ?>
                    <?php if ($local['titulo'] != "") { ?>
                        <p class="fw-bolder fs-4 text-secondary m-0"><?php echo $local['titulo']; ?></p>
                    <?php } ?>
                    <ul class="list-group list-group-flush mb-3">
                        <li class="list-group-item px-0 py-3">
                            <div class="d-flex align-items-center">
                                <i class="material-symbols-outlined red md-36 m-0 pe-3 pt-1">location_on</i>
                                <p class="m-0">
                                    <span class="fw-bolder"><?php echo $local['nome']; ?></span><br>
                                    <?php echo $local['endereco']; ?>
                                </p>
                            </div>
                        </li>
                        <?php if ($local['telefones']) { ?>
                            <li class="list-group-item px-0 py-3">
                                <div class="d-flex align-items-center">
                                    <i class="material-symbols-outlined red md-36 m-0 pe-3 pt-1">phone</i>
                                    <div>
                                        <?php $fones = explode(";", $local['telefones']); ?>
                                        <?php foreach ($fones as $fone) { ?>
                                            <?php $array_temp = explode("&", $fone); ?>
                                            <?php $fone = $array_temp[0];  ?>
                                            <?php $legenda = $array_temp[1];  ?>
                                            <?php $numero =  preg_replace('/[()-]/', '', iconv('UTF-8', 'ASCII//TRANSLIT', str_replace(' ', '', $array_temp[0]))); ?>
                                            <p class="fw-bolder m-0 pb-1"><a class="link-danger" href="tel:<?php echo $numero; ?>"><?php echo $fone; ?></a>
                                                <?php echo $legenda != "" ? '<span class="ms-3 fst-italic">(' . $legenda . ')</span>' : "" ?>
                                            </p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                        <?php if ($local['emails']) { ?>
                            <li class="list-group-item px-0 py-3">
                                <div class="d-flex align-items-center">
                                    <i class="material-symbols-outlined red md-36 m-0 pe-3 pt-1">email</i>
                                    <div>
                                        <?php $emails = explode(";", $local['emails']); ?>
                                        <?php foreach ($emails as $email) { ?>
                                            <p class="fw-bolder m-0 pb-1"><a class="link-danger" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                                            </p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                        <?php if ($local['horario'] != "") { ?>
                            <li class="list-group-item px-0 py-3">
                                <div class="d-flex align-items-center">
                                    <i class="material-symbols-outlined red md-36 m-0 pe-3 pt-1">schedule</i>
                                    <?php echo $local['horario']; ?>

                                </div>
                            </li>
                        <?php } ?>
                        <?php if ($local['observacao'] != "") { ?>
                            <li class="list-group-item px-0 py-3">
                                <div class="d-flex align-items-center">
                                    <i class="material-symbols-outlined red md-36 m-0 pe-3 pt-1">info</i>
                                    <?php echo $local['observacao']; ?>

                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            <?php } ?>
            <?php if ($orgao['redes_sociais']) { ?>
                <p class="fw-bolder fs-6 text-secondary text-center py-2">Fale com a gente em nossas Redes</p>
                <ul class="list-inline text-center" id="redes-sociais">
                    <?php foreach ($orgao['redes_sociais'] as $rede) { ?>
                        <li class="list-inline-item icones <?php echo $rede['rede_social']; ?>">
                            <a href="<?php echo $rede['url']; ?>" class="">
                                <i class="bi bi-<?php echo $rede['rede_social']; ?>"></i>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </div>
    </div>
</div>
<?php
$servicos = new WP_Query(
    array(
        'post_type' => 'servico',
        'showposts' => 5,
        'meta_key' => 'post_views_count',
        'orderby' => array('meta_value_num' => 'DESC', 'title' => 'ASC'),
        'tax_query' => array(
            array(
                'taxonomy' => 'pasta',
                'field' => 'slug',
                'terms' => $sec,
            )
        )
    )
); ?>
<div class="container-fluid mx-0 px-0">
    <div class="container py-4">
        <h2 class="font-italic">Serviços <?php echo $sec; ?></h2>
        <?php
        if ($servicos->have_posts()) :
        ?>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="font-italic">Serviços <?php echo $sec; ?></h2>
                        <?php while ($servicos->have_posts()) : $servicos->the_post(); ?>
                            <div class="card mb-0 text-secondary border-0">
                                <div class="row no-gutters">
                                    <div class="col-md-2 d-none d-md-block pt-2">
                                        <?php //echo wsf_icons_md(array('grupo' => get_field('grupo')->slug, 'class' => 'material-icons md-64 rounded-circle border border-secondary shadow-sm p-3')); 
                                        ?>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="card-body m-0 p-2">
                                            <p class="card-text text-primary  m-0">
                                                <?php
                                                if (isset($_GET['keyword'])) {
                                                    $term = get_term_by('id', get_field('grupo'), 'grupo');
                                                    echo $term->name;
                                                } else {
                                                    echo get_field('grupo')->name;
                                                }
                                                ?>
                                            </p>
                                            <h4 class="card-title mb-0"><a href="<?php the_permalink() ?>" class="text-secondary"><?php the_title(); ?></a></h4>
                                            <p class="card-text mb-0"><small class="text-muted"><?php //echo get_excerpt(100, false); 
                                                                                                ?></small></p>
                                            <p class="card-text">
                                                <small class="text-muted">
                                                    <?php if (get_field('servico_online')) { ?>
                                                        <span class="badge badge-pill badge-danger">Serviço Online</span> |
                                                    <?php } ?>
                                                    <i class="fa fa-eye"></i> <?php //echo chr_setPostViews(get_the_ID()); 
                                                                                ?>
                                                </small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <div class="text-right pt-4">
                            <a href="<?php bloginfo('url'); ?>/servico/?p=<?php echo $sec; ?>" class="text-right">Mais Serviços</a>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>
    </div>
</div>
<?php wp_reset_postdata(); ?>

<?php
$news_1 = new WP_Query(
    array(
        'post_type' => 'post',
        'showposts' => 1,
        'offset' => 0,
        'post_status' => 'publish',
        'ignore_sticky_posts' => true,
        'category_name' => $sec,
        'order' => 'DESC', // 'ASC'
        'orderby' => 'date' // modified | title | name | ID | rand
    )
);

$news_2 = new WP_Query(
    array(
        'post_type' => 'post',
        'showposts' => 2,
        'offset' => 1,
        'post_status' => 'publish',
        'ignore_sticky_posts' => true,
        'category_name' => $sec,
        'order' => 'DESC', // 'ASC'
        'orderby' => 'date' // modified | title | name | ID | rand
    )
);



if ($news_1->have_posts()) :
?>
    <div class="container-fluid bg-light mx-0 px-0">
        <div class="container py-4">
            <h2 class="font-italic">Notícias <?php echo $sec; ?></h2>
            <div >
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <?php while ($news_1->have_posts()) : $news_1->the_post(); ?>
                        <div class="card" style="min-height: 450px; margin-bottom:4px ; overflow: hidden;">
                        <div style="width: 100%;  height: 260px; overflow: hidden;">
                            <?php the_post_thumbnail('big', array('class' => 'card-img-top crop-image')); ?>
                            </div>
                            <div class="card-body pt-0 text-secondary">
                                <p class="text-primary mb-0"><?php echo $antetitulo = get_field('noticia-antetitulo')->name ? get_field('noticia-antetitulo')->name : get_post_meta($post->ID, 'noticia-antetitulo', true); ?></p>
                                <h5 class="mb-0"><a href="<?php echo get_permalink(); ?>" class="text-secondary"><?php the_title(); ?></a></h5>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <div class="col-md-12 col-lg-8">
                <?php while ($news_2->have_posts()) : $news_2->the_post(); ?>
                <div class="card mb-4">
                <div class="row g-0">
                    <div class="col-5">
                        <div style="width: 100%;  height: 211px; overflow: hidden;">
                    <?php the_post_thumbnail('small', array('class' => 'rounded-start crop-image')); ?>
                    </div>

                     </div>
                    <div class="col-7">
                    <div class="card-body">
                        <h5 class="card-title"><a href="<?php echo get_permalink(); ?>" class="text-secondary"><?php the_title(); ?></a></h5>
                    </div>
                    </div>
                </div>
                </div>
                <?php endwhile; ?>
                </div>
            </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

<div class="container py-4">
    <div class="row">
        <h2 class="mb-4">Estrutura administrativa</h2>
        <div class="col-md-3 mb-4">
            <?php $gestor = get_field('gestor'); ?>
            <?php if ($gestor) { ?>
                <div class="card text-center p-3">
                    <div class="card-body" style="text-align: center; padding: 30px 0 0 0">
                        <?php if ($gestor['foto'] != "") { ?>
                            <img src="<?php echo $gestor['foto']; ?>" class="rounded-circle" width="60%" />
                        <?php } else { ?>
                            <img src="<?php bloginfo('siteurl'); ?>/wp-content/uploads/dados/secretarias/fotos/<?php echo $sec; ?>.png" class="rounded-circle" width="60%" />
                        <?php } ?>
                        <p class="fs-3 fw-light mb-1"><?php echo $gestor['nome']; ?></p>
                        <p class="fw-light border-bottom pb-4"><?php echo $gestor['cargo']; ?></p>
                        <?php if ($gestor['telefones'] !== "") { ?>

                            <?php $fones = explode(";", $gestor['telefones']); ?>
                            <?php foreach ($fones as $fone) { ?>
                                <?php $array_temp = explode("&", $fone); ?>
                                <?php $fone = $array_temp[0];  ?>
                                <?php $legenda = $array_temp[1];  ?>
                                <?php $numero =  preg_replace('/[()-]/', '', iconv('UTF-8', 'ASCII//TRANSLIT', str_replace(' ', '', $array_temp[0]))); ?>
                                <p class="fw-bolder m-0 pb-1"><a class="link-danger" href="tel:<?php echo $numero; ?>"><?php echo $fone; ?></a>
                                    <?php echo $legenda != "" ? '<span class="ms-3 fst-italic">(' . $legenda . ')</span>' : "" ?>
                                </p>
                            <?php } ?>

                        <?php } ?>
                        <?php if ($gestor['emails'] !== "") { ?>
                            <?php $emails = explode(";", $gestor['emails']); ?>
                            <?php foreach ($emails as $email) { ?>
                                <p class="fw-bolder m-0 pb-1"><a class="link-danger" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                                </p>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="col-md-9 mb-4">
            <?php //$setores = json_decode(get_field('setores')); 
            ?>
            <?php $setores = get_field('setores'); ?>
            <?php if ($setores) { ?>
                <?php foreach ($setores as $setor) { ?>
                    <ul class="row list-inline">
                        <?php if ($setor['setor']) { ?>
                            <li class="col-12 border-bottom">
                                <p class="fw-light text-secondary my-0"><?php echo $setor['setor']['nome_do_setor']; ?></p>
                            </li>
                            <li class="col-12 mb-2">
                                <?php $fones = explode(";", $setor['setor']['telefones']); ?>
                                <?php foreach ($fones as $fone) { ?>
                                    <?php $array_temp = explode("&", $fone); ?>
                                    <?php $fone = $array_temp[0];  ?>
                                    <?php $legenda = $array_temp[1];  ?>
                                    <?php $numero =  preg_replace('/[()-]/', '', iconv('UTF-8', 'ASCII//TRANSLIT', str_replace(' ', '', $array_temp[0]))); ?>
                                    <p class="fw-bolder m-0 pb-1"><a class="link-danger" href="tel:<?php echo $numero; ?>"><?php echo $fone; ?></a>
                                        <?php echo $legenda != "" ? '<span class="ms-3 fst-italic">(' . $legenda . ')</span>' : "" ?>
                                    </p>
                                <?php } ?>
                            </li>

                        <?php } ?>
                        <?php foreach ($setor['pessoal'] as $k => $pessoal) { ?>
                            <li class="col-12 col-md-6 mb-2">
                                <p class="fw-bolder m-0"><?php echo $pessoal['cargo']; ?></p>
                                <p class="m-0"><?php echo $pessoal['nome']; ?></p>
                                <?php if ($pessoal['telefones']) { ?>

                                    <?php $fones = explode(";", $pessoal['telefones']); ?>
                                    <?php foreach ($fones as $fone) { ?>
                                        <?php $array_temp = explode("&", $fone); ?>
                                        <?php $fone = $array_temp[0];  ?>
                                        <?php $legenda = $array_temp[1];  ?>
                                        <?php $numero =  preg_replace('/[()-]/', '', iconv('UTF-8', 'ASCII//TRANSLIT', str_replace(' ', '', $array_temp[0]))); ?>
                                        <p class="fw-bolder m-0 pb-1"><a class="link-danger" href="tel:<?php echo $numero; ?>"><?php echo $fone; ?></a>
                                            <?php echo $legenda != "" ? '<span class="ms-3 fst-italic">(' . $legenda . ')</span>' : "" ?>
                                        </p>
                                    <?php } ?>

                                <?php } ?>
                                <?php if ($pessoal['emails']) { ?>
                                    <?php $emails = explode(";", $pessoal['emails']); ?>
                                    <?php foreach ($emails as $email) { ?>
                                        <p class="fw-bolder m-0 pb-1"><a class="link-danger" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                                        </p>
                                    <?php } ?>
                                <?php } ?>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            <?php } ?>

        </div>
    </div>
</div>
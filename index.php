<?php get_header(); ?>
<section class="container-fluid bg-body-secondary"  style="margin: -75px 0 0 0">
    <div class="container pt-5 pb-4">
        <div class="row">
            <div class="col-lg-12 col-xl-8 mb-4">
                <?php get_template_part('template-parts/carousel-noticias'); ?>
            </div>
            <div class="col-lg-12 col-xl-4 pt-1">
                <?php $dataque_2 = new WP_Query(array('post_type' => 'post', 'orderby' => 'date', 'showposts' => '2', 'offset' => '3')); ?>
                <?php if ($dataque_2->have_posts()) : while ($dataque_2->have_posts()) : $dataque_2->the_post(); ?>
                        <div class="col-12">
                            <div class="card post-medium bg-transparent border-0 text-white mb-2" style="height: 220px">
                                <?php the_post_thumbnail('img-small', ['class' => 'crop-image rounded-4', 'style' => 'height: 220px']); ?>
                                <div class="black-overlay"></div>
                                <div class="card-img-overlay d-flex flex-wrap align-content-end p-3">
                                    <h6><?php echo get_field('antetitulo'); ?> </h6>
                                    <a class="text-white " href="<?php the_permalink(); ?>" title="<?php printf(__('%s', 'your-theme'), the_title_attribute('echo=0')); ?>">
                                        <h3 class="card-title lh-1"><?php the_title(); ?></h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                <?php endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>
            <div class="col-12 text-center">
                <a href="<?php bloginfo('siteurl'); ?>/category/noticias/" class="btn btn-outline-secondary btn-lg">Mais notícias</a>
            </div>
        </div>
    </div>
</section>

<section class="container-fluid">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-4  mb-2">
                <a href="https://www.diariomunicipal.com.br/famup/" target="_blank" class="navbar-brand">
                    <img src="<?php bloginfo('siteurl'); ?>/wp-content/uploads/imagens/banner-dom.jpg" class="img-fluid rounded-3" />
                </a>
            </div>
            <div class="col-md-4 mb-2">
                <a href="https://www.diariomunicipal.com.br/famup/" target="_blank" class="navbar-brand">
                    <img src="<?php bloginfo('siteurl'); ?>/wp-content/uploads/imagens/banner-dom.jpg" class="img-fluid rounded-3" />
                </a>
            </div>
            <div class="col-md-4 mb-2">
                <a href="https://www.diariomunicipal.com.br/famup/" target="_blank" class="navbar-brand">
                    <img src="<?php bloginfo('siteurl'); ?>/wp-content/uploads/imagens/banner-dom.jpg" class="img-fluid rounded-3" />
                </a>
            </div>
        </div>
    </div>
</section>
<section class="container-fluid">
    <div class="container">
        <?php get_template_part('template-parts/section-estimativas'); ?>
    </div>
</section>

<?php get_template_part('template-parts/section-gestao-digital'); ?>
<?php get_template_part('template-parts/section-parceiros'); ?>

    <?php $aniversario_prefeito = file_get_contents("https://sisgf.famup.org.br/data_sharing/prefeito_aniversarios.php");  ?>
    <?php $aniversario_cidade = file_get_contents("https://sisgf.famup.org.br/data_sharing/municipio_aniversarios.php");  ?>
    <?php $sisgf = "https://sisgf.famup.org.br/assets/imgs/foto_contatos";  ?>

    <section class="container-fluid" id="aniversarios">
        <div class="container py-5">
            <div class="row">
            <?php $mes = null; ?>
                <div class="col-sm-12 col-lg-6">
                    <h3 class="text-muted text-center mb-3">Prefeitos(as) Aniversariantes</h3>
                    <div class="custom-scrollbar">
                    <?php $mes = isset($_POST['mes']) ? $_POST['mes'] : date('m'); ?>
                        <?php foreach (aniversario($aniversario_prefeito, $mes) as $niver) { ?>
                            <?php $mes = isset($_POST['mes']) ? $_POST['mes'] : $niver['mes']; ?>
                            
                            <?php $dia_mes = $niver['dia'].'-'.$niver['mes']; ?>
                            <?php if($dia_mes === date('j-n')) { ?>
                            <?php $cor_destaque_niver = 'bg-destaque'; ?>
                            <?php } ?>
                            
                            <div class="d-flex align-items-center"  style="position: relative;">
                                <div class="rounded-4 <?php echo $cor_destaque_niver; ?>"></div>
                                <div class="flex-shrink-0">
                                    <?php if ($niver['foto'] !== "") { ?>
                                        <figure class="figure my-2" style="height: 96px; width: 96px">
                                            <img src="<?php echo $sisgf . '/' . $niver['foto']; ?>" class="crop-thumbnail img-thumbnail img-fluid rounded-circle" />
                                        </figure>
                                    <?php  } else { ?>
                                        <figure class="figure my-2" style="height: 96px; width: 96px">
                                            <img src="<?php echo $sisgf . '/img_default_150x200.png'; ?>" class="crop-thumbnail img-thumbnail img-fluid rounded-circle" />
                                        </figure>
                                    <?php } ?>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-2"><?php echo $niver['nome'] ?></h6>
                                    <small class="text-body-secondary">
                                        <i class="fa-solid fa-cake-candles"></i> <?php echo $niver['dia'] . '/' . $niver['mes']; ?>
                                        -
                                        <i class="fa-solid fa-location-dot"></i> <?php echo $niver['municipio']; ?>
                                    </small>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <h3 class="text-muted text-center mb-3">Cidades Aniversariantes</h3>
                    <div class="custom-scrollbar px-1">
                         <?php foreach (emancipacao($aniversario_cidade, $mes) as $cidade) { ?>
                            <?php $dia_mes = $cidade['dia'].'-'.$cidade['mes']; ?>
                            <?php if($dia_mes === date('j-n')) { ?>
                            <?php $cor_destaque_cidade = 'bg-destaque'; ?>
                            <?php } ?>
                            <div class="d-flex align-items-center bg-transparent" style="position: relative;">
                                <div class="rounded-4 <?php echo $cor_destaque_cidade; ?>"></div>
                                <div class="flex-shrink-0 ms-3">
                                    <?php if ($cidade['foto'] !== "") { ?>
                                        <figure class="figure my-2" style="height: 96px; width: 96px">
                                            <img src="<?php echo $sisgf . '/' . $cidade['foto']; ?>" class="crop-thumbnail img-thumbnail img-fluid rounded-circle" />
                                        </figure>
                                    <?php  } else { ?>
                                        <figure class="figure my-2" style="height: 96px; width: 96px">
                                            <img src="<?php echo $sisgf . '/img_default_150x200.png'; ?>" class="crop-thumbnail img-thumbnail img-fluid rounded-circle" />
                                        </figure>
                                    <?php } ?>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-2"><?php echo $cidade['nome'] ?></h6>
                                    <small class="text-body-secondary">
                                        <i class="fa-solid fa-cake-candles"></i> <?php echo $cidade['dia'] . '/' . $cidade['mes'] . ' - '. $cidade['emancipacao'] ; ?>
                                        -
                                        <i class="fas fa-praying-hands"></i> <?php echo $cidade['padroeira']; ?>
                                    </small>
                                </div>
                            </div>
                            <?php $cor_destaque_cidade = ''; ?>
                        <?php } ?>
                    </div>
                </div>
                <?php
                   $meses = array(
                                  '1'=>'Janeiro',
                                  '2'=>'Fevereiro',
                                  '3'=>'Março',
                                  '4'=>'Abril',
                                  '5'=>'Maio',
                                  '6'=>'junho',
                                  '7'=>'Julho',
                                  '8'=>'Agosto',
                                  '9'=>'Setembro',
                                  '10'=>'Outubro',
                                  '11'=>'Novembro',
                                  '12'=>'Dezembro',
                                 )
                ?>
                <div class="col-sm-12">
                <form id="form1" class="d-flex p-4" action="#aniversarios" method="post">
                    <select class="form-select" name="mes" id="mes">
                        <?php foreach($meses as $k => $value) { ?>
                            <?php $selected = '';
                            if((isset($_POST['mes']) && $_POST['mes'] == $k) || (!isset($_POST['mes']) && $k == date('m'))){
                                $selected = 'selected'; 
                            }
                            ?>
                            <option value="<?php echo $k; ?>" <?php echo $selected; ?>><?php echo $value; ?></option>
                        <?php } ?>
                    </select>
                <input  type="submit" form="form1" class="btn btn-outline-danger" value="Enviar"/>
                </form>
                </div>
            </div>

            <div class="box_cidades"></div>
        </div>
    </section>

<style>

.confete{
    background-image: url('<?php bloginfo('siteurl'); ?>/wp-content/uploads/imagens/confetes-2.gif');
}

.bg-destaque {
    position: absolute;
    background-color: #ffe69c;
    animation: myAnim 2s ease 0s 1 normal forwards;
    animation-iteration-count: infinite;
    height: 100%;
    width: 100%;
    margin: 0;
    z-index: -1;
}
@keyframes myAnim {
	0% {
		opacity: 1;
	}

	50% {
		opacity: 0.2;
	}

	100% {
		opacity: 1;
	}
}

</style>

    <?php get_footer(); ?>
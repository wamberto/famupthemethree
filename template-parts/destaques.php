<?php
$arrEstimativa = file_get_contents("http://sisgf.famup.org.br/data_sharing/estimativa.php");
global $mes;
$mes = json_decode($arrEstimativa);
?>


<div class="row">
        <div class="col-12 col-sm-12 col-md-6 col-xl-12">
            <a href="https://www.diariomunicipal.com.br/famup/">
                <img src="<?php bloginfo('siteurl'); ?>/wp-content/uploads/imagens/banner-dom.jpg" width="100%" class="rounded-3 img-fluid mb-3" />
            </a>
        </div>

        <div class="col-12 col-sm-12 col-md-6 col-xl-12">
            <h5 class="text-muted text-center">Acesso rápido</h5>
            <ul class="list-unstyled">
                <li><a href="http://www.diariomunicipal.com.br/famup" target="_blank" onclick="ga('send','event','Acesso Rápido','http://www.diariomunicipal.com.br/famup')">Diário Oficial dos Municípios</a></li>
                <li><a href="<?php bloginfo('url'); ?>/paraiba" onclick="ga('send','event','Acesso Rápido','<?php bloginfo('url'); ?>/paraiba')">Dados Municipais</a></li>
                <li><a href="<?php bloginfo('url'); ?>/associacoes" onclick="ga('send','event','Acesso Rápido','<?php bloginfo('url'); ?>/associacoes')">Associações</a></li>
                <li><a href="http://sisgf.famup.org.br" target="_blank" onclick="ga('send','event','Acesso Rápido','http://sisgf.famup.org.br')">SisGF</a></li>
                <li><a href="<?php bloginfo('url'); ?>/links-uteis" onclick="ga('send','event','Acesso Rápido','<?php bloginfo('url'); ?>/links-uteis')">Links Úteis</a></li>
            </ul>
        </div>
</div>


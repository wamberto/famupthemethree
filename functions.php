<?php
/* O tamanho da imagem padrão para o site é 1920x1080 */
add_theme_support('post-thumbnails');
add_image_size('biger', 1920, 1080, true);
add_image_size('big', 1280, 720, true);
add_image_size('medium', 1024, 576, true);
add_image_size('small', 768, 432, true);
add_image_size('tinny', 320, 180, true);
add_image_size('thumbs-one', 300, 300, true);
add_image_size('img-thumbs-two', 200, 200, true);
add_image_size('img-thumbs-three', 100, 100, true);

if (function_exists('register_nav_menus')):
    register_nav_menus(array(
        'principal' => 'Menu Principal',
   ));
endif;


if (!function_exists('mes_por_extenso')) {

    function mes_por_extenso($mes, $abreviado = FALSE) {

//    $dia = date('d');
//    $mes = date('m');
//    $ano = date('Y');
//    $semana = date('w');
// configuração mes
        if ($abreviado == FALSE) {
            switch ($mes) {
                case '01': $mes = "janeiro";
                    break;
                case '02': $mes = "fevereiro";
                    break;
                case '03': $mes = "março";
                    break;
                case '04': $mes = "abril";
                    break;
                case '05': $mes = "maio";
                    break;
                case '06': $mes = "junho";
                    break;
                case '07': $mes = "julho";
                    break;
                case '08': $mes = "agosto";
                    break;
                case '09': $mes = "setembro";
                    break;
                case '10': $mes = "outubro";
                    break;
                case '11': $mes = "novembro";
                    break;
                case '12': $mes = "dezembro";
                    break;
            }
        } else if ($abreviado == TRUE) {
            switch ($mes) {
                case '01': $mes = "JAN";
                    break;
                case '02': $mes = "FEV";
                    break;
                case '03': $mes = "MAR";
                    break;
                case '04': $mes = "ABR";
                    break;
                case '05': $mes = "MAI";
                    break;
                case '06': $mes = "JUN";
                    break;
                case '07': $mes = "JUL";
                    break;
                case '08': $mes = "AGO";
                    break;
                case '09': $mes = "SET";
                    break;
                case '10': $mes = "OUT";
                    break;
                case '11': $mes = "NOV";
                    break;
                case '12': $mes = "DEZ";
                    break;
            }
        }
        return $mes;
    }

}

function estimativas($estimativa){
  $res = '';
  
  $res = mes_por_extenso($estimativa[2]->mes).': '. cor_estimativa($estimativa[2]->previsao).
         ' | ' . mes_por_extenso($estimativa[1]->mes).': '. cor_estimativa($estimativa[1]->previsao).
         ' | ' . mes_por_extenso($estimativa[0]->mes).': '. cor_estimativa($estimativa[0]->previsao);
  
  return $res;
}

function cor_estimativa($percentual){
    $res = '';
    switch ($percentual) {
      case $percentual > 0:
          $res = '<span style="color: #00CC00;">'.$percentual.' % <i class="fa-solid fa-arrow-up"></i></span>';
         break;
       case $percentual < 0:
          $res = '<span style="color: #CC0000;">'.$percentual.' % <i class="fa-solid fa-arrow-down"></i></span>';
         break;
      case $percentual == 0:
          $res = '<span style="color: #000000;">'.$percentual.' % <i class="fa-solid fa-minus"></i></span>';
         break;
     default:
          break;
  }
  return $res;
  
}

// Retorna o slug da categoria
function categoria_slug(){
	global $post;
	$i = 0;
	foreach((get_the_category($post->ID)) as $category) { 
    	if($category->slug!='noticias'):
    		$i++;
    		return $category->slug;
    		break;
    	endif;
	}
	
	if($i==0):
		return false;
	endif;
		 
}
function title_limite($maximo, $title = null){
    $title = isset($title) ? $title : get_the_title();
    $continua='';
   // $title = get_the_title();
    if( strlen($title)>$maximo){
    $continua=' ...';
    }
    $title=mb_substr($title,0,$maximo,'UTF-8');
    echo $title.$continua;
}

/* OVERRIDE */
function get_caption_image() {
    global $post;
    $post_thumbnail_id = get_post_thumbnail_id( $post->id );
 
    if ( ! $post_thumbnail_id ) {
        return '';
    }
 
    $caption = wp_get_attachment_caption( $post_thumbnail_id );
 
    if ( ! $caption ) {
        $caption = $post->post_title;
    }
    return $caption;
}

/*
 * Função:      imprime as categorias de um post de acordo com a categoria mae
 * Usado em:    search
 * Params:      array('parent_id', 'link','separator','exclude()', class=> 'string')
 */
if (!function_exists('get_categorias')) {
    function get_categorias($args)    {
        $out = '';
        $excluir = array();
        $terms = array();
        foreach ((get_the_category()) as $k => $childcat) {
            $terms[$k] =  $childcat;
            if ($args['exclude']) {
                foreach ($args['exclude'] as $exclude) {
                    if ($exclude == $childcat->slug) {
                        unset($terms[$k]);
                    }
                }
            }
        }
        $totalTerms =  count($terms);
        $i = 1;
        foreach ($terms as $k => $term) {
            //  var_dump($term);
            //  $out =  $out . $term->name;
            if ($args['link']) {
                $out = $out . ' <a href="' . get_site_url() . '/' . $args['link'] . $term->slug . '" class="' . $args['class'] . '">' . $term->name . '</a> ';
            } else {
                $out = $out . '<span class="' . $args['class'] . '">' . $term->name . '</span>';
            }
            if ($i < $totalTerms) {
                $out = $out . $args['separator'];
            }
            $i++;
        }

        return $out;
    }
}

function time_ago($type = 'post')
{
    //	https://wordpress.stackexchange.com/questions/36184/how-can-i-put-posted-x-minutes-ago-on-my-posts
    $d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';
    return __('Há')." ". human_time_diff($d('U'), current_time('timestamp'));
}

// Loop para posts mais acessados no WordPress 
// https://www.todoespacoonline.com/w/2014/10/loop-para-posts-mais-acessados-wordpress/

// Verifica se não existe nenhuma função com o nome tutsup_session_start

if (!function_exists('tutsup_session_start')) {
    // Cria a função
    function tutsup_session_start()
    {
        // Inicia uma sessão PHP
        if (!session_id()) session_start();
    }
    // Executa a ação
    add_action('init', 'tutsup_session_start');
}

// Verifica se não existe nenhuma função com o nome tp_count_post_views
if (!function_exists('tp_count_post_views')) {
    // Conta os views do post
    function tp_count_post_views()
    {
        // Garante que vamos tratar apenas de posts
        if (is_single()) {
            // Precisamos da variável $post global para obter o ID do post
            global $post;
            // Se a sessão daquele posts não estiver vazia
            if (empty($_SESSION['tp_post_counter_' . $post->ID])) {
                // Cria a sessão do posts
                $_SESSION['tp_post_counter_' . $post->ID] = true;
                // Cria ou obtém o valor da chave para contarmos
                $key = 'tp_post_counter';
                $key_value = get_post_meta($post->ID, $key, true);
                // Se a chave estiver vazia, valor será 1
                if (empty($key_value)) { // Verifica o valor
                    $key_value = 1;
                    update_post_meta($post->ID, $key, $key_value);
                } else {
                    // Caso contrário, o valor atual + 1
                    $key_value += 1;
                    update_post_meta($post->ID, $key, $key_value);
                } // Verifica o valor
            } // Checa a sessão
        } // is_single
        return;
    }
    add_action('get_header', 'tp_count_post_views');
}

function tp_get_post_views($postID)
{
    $count_key = 'tp_post_counter';
    $count = get_post_meta($postID, $count_key, true);
    if (!empty($count)) {
        //return $count.' Views';
        return $count;
    }
}

// Adicionar coluna de contagem no WP-Admin
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views', 5, 2);

function posts_column_views($defaults)
{
    $defaults['post_views'] = __('views');
    return $defaults;
}
function posts_custom_column_views($column_name, $id)
{
    if ($column_name === 'post_views') {
        echo tp_get_post_views(get_the_ID());
    }
}

/**
 * Função que traz as datas de aniversarios dos prefeitos por mes
 *
 * @param [type] $dados
 * @param [type] $mes
 * @return array
 */
function aniversario($dados, $mes){
    $dados = json_decode($dados);
    $result = array();
    foreach($dados as $dado){
        $prefeito = array();
                if($dado->mes == $mes){
                    $prefeito['nome'] = $dado->prefeito;
                    $prefeito['dia'] = $dado->dia;
                    $prefeito['mes'] = $dado->mes;
                    $prefeito['municipio'] = $dado->municipio;
                    $prefeito['foto'] = $dado->prefeito_foto;
                    $result[] = $prefeito;
                }
    }
    return $result;
}
/**
 * Função que traz os municipios com suas datas de emancipação filtrados por mes
 *
 * @param string $dados
 * @param string $mes
 * @return array
 */
function emancipacao($dados, $mes){
    $dados = json_decode($dados);
    $result = array();
    foreach($dados as $dado){
        $cidade = array();
                if($dado->mes == $mes){
                    $cidade['nome'] = $dado->municipio;
                    $cidade['dia'] = $dado->dia;
                    $cidade['mes'] = $dado->mes;
                    $cidade['padroeira'] = $dado->padroeira;
                    $cidade['foto'] = $dado->foto;
                    $result[] = $cidade;
                }
    }
    return $result;
}

// WordPress pagination for boostrap 4
// https://gist.github.com/mlbd/8b455590848feba94371746a95ad9187
if ( !function_exists( 'wpse64458_pagination' ) ) {
	function wpse64458_pagination($prev_next = false){
		global $wp_query;
		ob_start();
		$translated = esc_html__( '','wpse64458' ); // Supply translatable string
		$pagination =  paginate_links( array(
		'base' => str_replace( PHP_INT_MAX, '%#%', esc_url( get_pagenum_link( PHP_INT_MAX ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages,
		'type' => 'array',
		'prev_text'          => __('Anterior', 'wpse64458'),
		'next_text'          => __('Próxima', 'wpse64458'),
		'before_page_number' => '<span class="screen-reader-text">' . $translated . ' </span>'
		) );
		if ( ! empty( $pagination ) ) : ?>
                <nav aria-label="Page navigation example" class="py-3">
                  <?php if($prev_next == true) {?>
                    <div class="d-flex justify-content-center">
                      <?php posts_nav_link('<div class="p-2 flex-fill bd-highlight"></div>','<button type="button" class="btn btn-outline-primary">Anterior</button>','<button type="button" class="btn btn-outline-primary">Próxima</button>'); ?>
                    </div>
                <?php }else{ ?>
               
                 <ul class="pagination justify-content-center">
                    <?php foreach ($pagination as $key => $page_link) : ?>
                        <li class="page-item <?php if (strpos($page_link, 'current') !== false) {echo ' active'; } ?>">
                            <?php echo str_replace('page-numbers', 'page-link', $page_link); ?>
                        </li>
                    <?php endforeach ?>
                </ul>
                <?php } ?>
            </nav>
        <?php
        endif;
        echo ob_get_clean();
	}
}
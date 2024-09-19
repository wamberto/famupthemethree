<?php
$arrEstimativa = file_get_contents("http://sisgf.famup.org.br/data_sharing/estimativa.php");
global $mes;
$mes = json_decode($arrEstimativa);

$bg_color_prev_0 = $mes[0]->previsao < '0.0' ? 'text-bg-success' : 'text-bg-danger';
$bg_color_prev_1 = $mes[1]->previsao < '0.0' ? 'text-bg-success' : 'text-bg-danger';
$bg_color_prev_2 = $mes[2]->previsao < '0.0' ? 'text-bg-success' : 'text-bg-danger';

?>


        <div class="row">
            <h3 class="text-muted text-center mb-4">Estimativas FPM</h3>
            <div class="col-sm-12 col-md-4 mb-2">
                <div class="card text-center">
                    <div class="card-header <?php echo $mes[2]->previsao > 0.0 ? 'text-bg-success' : 'text-bg-danger'; ?>">
                       <p class="card-text"><?php echo mes_por_extenso($mes[2]->mes, true) . ' / ' . $mes[2]->ano; ?></p>
                    </div>
                    <div class="card-body px-1">
                        <h1 class="card-title"><?php echo cor_estimativa($mes[2]->previsao); ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 mb-2">
                <div class="card text-center">
                <div class="card-header <?php echo $mes[1]->previsao > 0.0 ? 'text-bg-success' : 'text-bg-danger'; ?>">
                       <p class="card-text"><?php echo mes_por_extenso($mes[1]->mes, true) . ' / ' . $mes[1]->ano; ?></p>
                    </div>
                    <div class="card-body px-1">
                        <h1 class="card-title"><?php echo cor_estimativa($mes[1]->previsao); ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 mb-2">
                <div class="card text-center">
                <div class="card-header <?php echo $mes[0]->previsao > 0.0 ? 'text-bg-success' : 'text-bg-danger'; ?>">
                       <p class="card-text"><?php echo mes_por_extenso($mes[0]->mes, true) . ' / ' . $mes[0]->ano; ?></p>
                    </div>
                    <div class="card-body px-1">
                        <h1 class="card-title"><?php echo cor_estimativa($mes[0]->previsao); ?></h1>
                    </div>
                </div>
            </div>
        </div>

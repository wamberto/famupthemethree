$('#form1').submit(function (e) {
    e.preventDefault();

    var mes = $('#mes').val();

    // console.log(mes);

    $.ajax({
        url: 'http://localhost/sisgf.famup.dev.br/data_sharing/municipio_aniversarios.php',
        method: 'POST',
        data: {mes: mes},
        dataTyle: 'json'
    }).done(function (result) {
        console.log(result);

       // for(var i =0; i < result.length; i++){
       //     $('#box_cidades').prepend('<h6 class="mb-2">'+ result[i].municipio +'</h6>');
       // }
        
    });
});

$(document).ready(function () {

    const hoje = new Date()
    var mesAtual = hoje.getMonth()

    $.ajax({
        url: 'http://localhost/sisgf.famup.dev.br/data_sharing/municipio_aniversarios.php',
        method: 'POST',
        data: {mes: mesAtual},
        dataTyle: 'json',
        success: function (data){
           // $('.box_cidades').html(data);
            for(var i =0; i < data.length; i++){
                console.log(data);
               // $('.box_cidades').prepend('<h6 class="mb-2">'+ data[i].municipio +'</h6>');
            }
        }
    });
});
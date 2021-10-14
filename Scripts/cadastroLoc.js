$(document).ready(function(){

    $('.js-example-basic-single').select2();

    $("#sltEstados").change(function(){
        var endereco = "https://servicodados.ibge.gov.br/api/v1/localidades/estados/"+$("#sltEstados").val()+"/municipios"

        $.ajax({
            url:endereco,
            type:"GET",
            data: {
                orderBy: "nome"
            },
            success: function(cidades){
                var i;
                var opcoes = "";
                for(i=0; i<cidades.length; i++){
                    opcoes = opcoes + "<option value='"+cidades[i].id+"'>"+cidades[i].nome+"</option>"
                }
                $("#sltCidades").html(opcoes);
            },
        });
    });
    
        $.ajax({
            url:"https://servicodados.ibge.gov.br/api/v1/localidades/estados",
            type:"GET",
            data: {
            orderBy: "nome"
        },
            
        success: function(estados){
            var i;
            var opcoes = "";
            for(i=0; i<estados.length; i++){
                opcoes = opcoes + "<option value='"+estados[i].id+"'>"+estados[i].nome+"</option>"
                }
                $("#sltEstados").html(opcoes);
                $("#sltEstados").trigger("change");
            },
        });
});
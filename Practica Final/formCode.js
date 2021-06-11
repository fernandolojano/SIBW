
$(document).ready(
    function cargarDatos(){
        $('#search').keyup(
            function (){
                var consulta = $(this).val();
                if( consulta != ''){
                    $.ajax({
                    url: "search.php",
                    method: "POST",
                    data: {consulta: consulta},
                    success: function mostrarEventos(datos){
                        $("#resultados").fadeIn();
                        $("#resultados").html(datos);
                    }
                    });
                }

                else{
                    $("#resultados").fadeOut();
                }
                
                $(document).on('click', 'li', function(){
                    $('#search').val($(this).text());
                    $("#resultados").fadeOut();
                })
            }
        );
    }
);



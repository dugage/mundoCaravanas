var AppActions = function() {

    var Modal = function() {
        //evento que muestra el modal y dibuja en el un formulario de crear, este
        //evento es para tablas secundarias usadas en los sub-módulos
        $("body").on("click",".modal-set", function(){
            //id relación
            var id = $(this).attr('id');
            var title = $(this).data('title');
            //configuramos los datos para la función ajax
            var type = 'POST';
            //url para llamar al metodo que devuelve el contenido del modal
            var url = $(this).data('url')+'getForm';
            var data = {id:id,form_type:"add"};
            //lanzamos la consulta y almacenamos el return
            var returndata = ActionAjax(type,url,data,null,null,true,false);
            //dibujamos en el modal-body el contenidom, en este caso seran formualrios
            $('#appModal .modal-body').html( returndata );
            //y el título del modal
            $('#appModal .modal-title').html( 'Nuevo '+title );
            //add estilo para agrandar el modal con el style modal-lg
            $('.modal-dialog').addClass('modal-lg');

        });
        //evento que muestra el modal y dibuja en el un formulario de editar, este
        //evento es para tablas secundarias usadas en los sub-módulos
        $("body").on("click",".modal-edit", function(){
            //id relación
            var id = $(this).attr('id');
            var title = $(this).data('title');
            //configuramos los datos para la función ajax
            var type = 'POST';
            //url para llamar al metodo que devuelve el contenido del modal
            var url = $(this).data('url')+'getForm';
            var data = {id:id,form_type:"edit"};
            //lanzamos la consulta y almacenamos el return
            var returndata = ActionAjax(type,url,data,null,null,true,false);
            //dibujamos en el modal-body el contenidom, en este caso seran formualrios
            $('#appModal .modal-body').html( returndata );
            //y el título del modal
            $('#appModal .modal-title').html( 'Editar '+title );
            //add estilo para agrandar el modal con el style modal-lg
            $('.modal-dialog').addClass('modal-lg');

        });
        //evento qe muestra y dibuja un modal con los documentos relacionados a la tabla principal
        //este se alimenta de ATTACHMENTS table
        $("body").on("click",".modal-doc", function(){
            //id relación
            var id = $(this).attr('id');
            //configuramos los datos para la función ajax
            var type = 'POST';
            //url para llamar al metodo que devuelve el contenido del modal
            var url = $(this).data('url')+'getDocList';
            var data = {id:id};
            //lanzamos la consulta y almacenamos el return
            var returndata = ActionAjax(type,url,data,null,null,true,false);
            //dibujamos en el modal-body el contenidom, en este caso seran formualrios
            $('#appModal .modal-body').html( returndata );
            //y el título del modal
            $('#appModal .modal-title').html( 'Documentos');
            //add estilo para agrandar el modal con el style modal-lg
            $('.modal-dialog').addClass('modal-lg');
        });
        //muestra y dibuja el modal de pagos, de cada vehículo
        $("body").on("click",".modal-admin-pay", function(){
            //id relación
            var id = $(this).attr('id');
            //configuramos los datos para la función ajax
            var type = 'POST';
            //url para llamar al metodo que devuelve el contenido del modal
            var url = $(this).data('url')+'getCollectionPay';
            var data = {id:id};
            //lanzamos la consulta y almacenamos el return
            var returndata = ActionAjax(type,url,data,null,null,true,false);
            //dibujamos en el modal-body el contenidom, en este caso seran formualrios
            $('#appModal .modal-body').html( returndata );
            //y el título del modal
            $('#appModal .modal-title').html( 'Listado de pagos');
            //add estilo para agrandar el modal con el style modal-lg
            $('.modal-dialog').addClass('modal-lg');
            
        });

    }

    return {
        //== Init demos
        init: function() {
            // init charts
            Modal();
           
        }
    };

}();

$(document).ready(function() {
    AppActions.init();
});



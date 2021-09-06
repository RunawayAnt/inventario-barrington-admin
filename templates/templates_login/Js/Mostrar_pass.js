$('#mostrar').on('change',function(event){
    if($('#mostrar').is(':checked')){
       $('#contraseña').get(0).type='text';
    } else {
       $('#contraseña').get(0).type='password';
    }
 });

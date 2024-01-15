/* TODO  datatabla lenguaje y datos*/
$(document).ready(function () {

    $("#cli_id").select2({placeholder: "Seleccionar"});
    $("#con_id").select2({placeholder: "Seleccionar"});
    
    $.post("../../controllers/cliente.php?op=combo",function(data,status){
      $('#cli_id').html(data);
    });
   
    $("#cli_id").change(function(){
      $("#cli_id option:selected").each(function(){
        cli_id = $(this).val();
        console.log(cli_id);
        $.post("../../controllers/contacto.php?op=combo_x_cliente",{cli_id:cli_id},function(data){
            $("#con_id").html(data);
        });
        $.post("../../controllers/cliente.php?op=mostrar",{cli_id:cli_id},function(data){
            
            data = JSON.parse(data);
            $("#cli_ruc").val(data.cli_ruc);
            console.log(data);
        });
      });
    });

    $("#con_id").change(function(){
        $("#con_id option:selected").each(function(){
          con_id = $(this).val();
          console.log(con_id);
          
          $.post("../../controllers/contacto.php?op=mostrar",{con_id:con_id},function(data){
              
              data = JSON.parse(data);
              $("#con_telf").val(data.con_telf);
              $("#con_email").val(data.con_email);
              console.log(data);
          });
        });
      });
  });
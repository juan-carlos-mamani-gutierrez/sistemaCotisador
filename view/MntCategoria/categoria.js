let tabla;
function init() {
  $("#mnt_form").on("submit", function (e) {
    guardaryeditar(e);
  });
}
/* TODO guardar y editar */
function guardaryeditar(e) {
  e.preventDefault();
  let formData = new FormData($("#mnt_form")[0]);
  $.ajax({
    url: "../../controllers/categoria.php?op=guardaryeditar",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (datos) {
      console.log(datos);
      if(datos == 'ok'){
        $("#mnt_form")[0].reset();
        $("#mdlmnt").modal("hide");
        $("#lista_data").DataTable().ajax.reload();
  
        swal({
          position: "center",
          title: "Cotizador!",
          text: "Registro Guardado",
          icon: "success",
          confirmButtonClass: "btn-success",
        });
      }else if(datos == 'error'){
        swal({
          position: "center",
          title: "Cotizador!",
          text: "Dato duplicado ",
          icon: "error",
          confirmButtonClass: "btn-success",
        });
      }
      
    },
  });
}
/* TODO editar */
function editar(cat_id) {
  $("#mdltitulo").html("Editar Registro");

  $.ajax({
    url: "../../controllers/categoria.php?op=mostrar",
    type: "POST",
    data: { cat_id: cat_id },
    dataType: "json",
    success: function (data) {
      $("#cat_id").val(data.cat_id);
      $("#cat_nom").val(data.cat_nom);
      $("#cat_descrip").val(data.cat_descrip);
      $("#mdlmnt").modal("show");
    },
    error: function (xhr, status, error) {
      console.error("Error en la solicitud:", status, error);
    },
  });
}
/* TODO eliminar */
function eliminar(cat_id) {
  swal({
    title: "Eliminar Registro?",
    text: "Esta seguro de eliminar el registro!",
    icon: "error",
    buttons: {
      cancel: {
        text: "Cancelar",
        value: null,
        visible: true,
        className: "btn btn-default",
        closeModal: true,
      },
      confirm: {
        text: "Eliminar",
        value: true,
        visible: true,
        className: "btn btn-danger",
        closeModal: true,
      },
    },
  }).then((isConfirm) => {
    if (isConfirm) {
      $.ajax({
        type: "POST",
        url: "../../controllers/categoria.php?op=eliminar",
        data: { cat_id: cat_id },

        success: function (data) {
          $("#lista_data").DataTable().ajax.reload();
          swal({
            position: "center",
            icon: "success",
            title: "Cotizador",
            text: "El registro se elimino correctamente",
            confirmButtonClass: "btn-success",
          });
        },
        error: function (xhr, status, error) {
          console.error("Error en la petición AJAX: " + error);
        },
      });
    }
  });
}

/* TODO  datatabla lenguaje y datos*/
$(document).ready(function () {
  
  tabla = $("#lista_data")
    .dataTable({
      aProcessing: true,
      aServerSide: true,
      dom: "Bfrtip",
      searching: true,
      lengthChange: false,
      colReorder: true,
      buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],
      ajax: {
        url: "../../controllers/categoria.php?op=listar",
        type: "post",
        dataType: "json",
        error: function (e) {
          console.log(e.responseText);
        },
      },
      bDestroy: true,
      responsive: true,
      bInfo: true,
      iDisplayLength: 10,
      autoWidth: false,
      language: {
        sProcessing: "Procesando...",
        sLengthMenu: "Mostrar _MENU_ registros",
        sZeroRecords: "No se encontraron resultados",
        sEmptyTable: "Ningún dato disponible en esta tabla",
        sInfo: "Mostrando un total de _TOTAL_ registros",
        sInfoEmpty: "Mostrando un total de 0 registros",
        sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
        sInfoPostFix: "",
        sSearch: "Buscar:",
        sUrl: "",
        sInfoThousands: ",",
        sLoadingRecords: "Cargando...",
        oPaginate: {
          sFirst: "Primero",
          sLast: "Último",
          sNext: "Siguiente",
          sPrevious: "Anterior",
        },
        oAria: {
          sSortAscending:
            ": Activar para ordenar la columna de manera ascendente",
          sSortDescending:
            ": Activar para ordenar la columna de manera descendente",
        },
      },
    })
    .DataTable();
});
$(document).on("click", "#btnnuevo", function () {
  $("#cat_id").val("");
  $("#mnt_form")[0].reset();
  $("#mdltitulo").html("Nuevo Registro");
  $("#mdlmnt").modal("show");
});
init();

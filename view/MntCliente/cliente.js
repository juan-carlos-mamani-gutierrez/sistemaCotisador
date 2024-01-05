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
    url: "../../controllers/cliente.php?op=guardaryeditar",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (datos) {
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
    },
  });
}
/* TODO editar */
function editar(cli_id) {
  $("#mdltitulo").html("Editar Registro");

  $.ajax({
    url: "../../controllers/cliente.php?op=mostrar",
    type: "POST",
    data: { cli_id: cli_id },
    dataType: "json",
    success: function (data) {
      $("#cli_id").val(data.cli_id);
      $("#cli_nom").val(data.cli_nom);
      $("#cli_ruc").val(data.cli_ruc);
      $("#cli_telf").val(data.cli_telf);
      $("#cli_email").val(data.cli_email);
      $("#mdlmnt").modal("show");
    },
    error: function (xhr, status, error) {
      console.error("Error en la solicitud:", status, error);
    },
  });
}
/* TODO eliminar */
function eliminar(cli_id) {
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
        url: "../../controllers/cliente.php?op=eliminar",
        data: { cli_id: cli_id },

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
        url: "../../controllers/cliente.php?op=listar",
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
  $("#cli_id").val("");
  $("#mnt_form")[0].reset();
  $("#mdltitulo").html("Nuevo Registro");
  $("#mdlmnt").modal("show");
});
init();

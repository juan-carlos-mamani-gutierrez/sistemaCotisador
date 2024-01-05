	<!-- #modal-dialog -->
	<div class="modal fade" id="mdlmnt">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title" id="mdltitulo"></h4>
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	      </div>
	      <!-- TODO Formulario -->
	      <form id="mnt_form" method="POST">
	        <!-- campo oculto para editar -->
	        <input type="hidden" id="cli_id" name="cli_id">
	        <div class="modal-body">
	          <fieldset>
	            <!-- TODO Imput de nombre -->
	            <div class="form-group">
	              <label for="cli_nom">Nombre</label>
	              <input type="text" class="form-control" id="cli_nom" name="cli_nom" placeholder="Ingresar el Nombre" required>
	            </div>
	            <!-- TODO Imput de ruc -->
	            <div class="form-group">
	              <label for="cli_ruc">Ruc</label>
	              <input type="text" class="form-control" id="cli_ruc" name="cli_ruc" placeholder="Ingresar el Ruc" required>
	            </div>
	            <!-- TODO Imput de Telefono -->
	            <div class="form-group">
	              <label for="cli_telf">Telefono</label>
	              <input type="tel" class="form-control" id="cli_telf" name="cli_telf" pattern="[0-9]{8}" placeholder="71234567" required>
	            </div>
	            <!-- TODO Imput de correo electronico -->
	            <div class="form-group">
	              <label for="cli_email">Correo Electronico</label>
	              <input type="email" class="form-control" id="cli_email" name="cli_email" placeholder="Ingresar el Correo Electronico" required>
	            </div>
	        </div>
	        </fieldset>


	        <div class="modal-footer">
	          <!-- TODO botones -->
	          <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
	          <button type="submit" name="action" value="add" class="btn btn-success">Guardar</button>
	        </div>
	      </form>
	    </div>
	  </div>
	</div>
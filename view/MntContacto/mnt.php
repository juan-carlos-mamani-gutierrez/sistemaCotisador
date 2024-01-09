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
	        <input type="hidden" id="con_id" name="con_id">
	        <div class="modal-body">
	          <fieldset>
				<!-- TODO select id -->
				<div class="form-group">
				<label for="cli_id">Cliente</label>
				<select id="cli_id" name="cli_id" class="default-select2 form-control">
			    </select>
				</div>
				<!-- TODO select id -->
				<div class="form-group">
				<label for="car_id">Cargo</label>
				<select id="car_id" name="car_id" class="default-select2 form-control">
			    </select>
				</div>
	            <!-- TODO Imput de nombre -->
	            <div class="form-group">
	              <label for="con_nom">Nombre</label>
	              <input type="text" class="form-control" id="con_nom" name="con_nom" placeholder="Ingresar el Nombre" required>
	            </div>
	            <!-- TODO Imput de Email -->
	            <div class="form-group">
	              <label for="con_email">Email</label>
	              <input type="email" class="form-control" id="con_email" name="con_email" placeholder="Ingresar el Correo Electronico" required>
	            </div>
	            <!-- TODO Imput de Telefono -->
	            <div class="form-group">
	              <label for="con_telf">Telefono</label>
	              <input type="tel" class="form-control" id="con_telf" name="con_telf" pattern="[0-9]{8}" placeholder="ej .71234567" required>
	            </div>
	          </fieldset>
	        </div>



	        <div class="modal-footer">
	          <!-- TODO botones -->
	          <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
	          <button type="submit" name="action" value="add" class="btn btn-success">Guardar</button>
	        </div>
	      </form>
	    </div>
	  </div>
	</div>
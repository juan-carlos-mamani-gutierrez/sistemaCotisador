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
	        <input type="hidden" id="usu_id" name="usu_id">
	        <div class="modal-body">
	          <fieldset>
	            <!-- TODO Imput de nombre -->
	            <div class="form-group">
	              <label for="usu_correo">Correo Electronico</label>
	              <input type="email" class="form-control" id="usu_correo" name="usu_correo" placeholder="Ingresar el Correo Electronico" required>
	            </div>
	            <!-- TODO Imput de descripcion -->
	            <div class="form-group">
	              <label for="usu_nom">Nombre</label>
	              <input type="text" class="form-control" id="usu_nom" name="usu_nom" placeholder="Ingresar el Nombre" required>
	            </div>
	            <!-- TODO Imput de descripcion -->
	            <div class="form-group">
	              <label for="usu_pass">Password</label>
	              <input type="password" class="form-control" id="usu_pass" name="usu_pass" placeholder="Ingresar el Password" required>
	            </div>
	          </fieldset>
	        </div>



	        <div class=" modal-footer">
	          <!-- TODO botones -->
	          <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
	          <button type="submit" name="action" value="add" class="btn btn-success">Guardar</button>
	        </div>
	      </form>
	    </div>
	  </div>
	</div>
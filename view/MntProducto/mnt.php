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
	        <input type="hidden" id="prod_id" name="prod_id">
	        <div class="modal-body">
	          <fieldset>
				
				<!-- TODO select id -->
				<div class="form-group">
				<label for="cat_id">Categoria</label>
				<select id="cat_id" name="cat_id" class="default-select2 form-control">
			    </select>
				</div>
	            <!-- TODO Imput de nombre -->
	            <div class="form-group">
	              <label for="prod_nom">Nombre</label>
	              <input type="text" class="form-control" id="prod_nom" name="prod_nom" placeholder="Ingresar el Nombre" required>
	            </div>
	            <!-- TODO Imput de Descripcion -->
	            <div class="form-group">
	              <label for="prod_descrip">Descripcion</label>
	              <input type="text" class="form-control" id="prod_descrip" name="prod_descrip" placeholder="Ingresar la Descripcion" required>
	            </div>
	            <!-- TODO Imput de Precio -->
	            <div class="form-group">
	              <label for="con_telf">precio</label>
	              <input type="number" class="form-control" id="prod_precio" name="prod_precio" placeholder="precio" required>
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
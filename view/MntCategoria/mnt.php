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
	        <input type="hidden" id="cat_id" name="cat_id">
	        <div class="modal-body">
	          <fieldset>
	            <!-- TODO Imput de nombre -->
	            <div class="form-group">
	              <label for="cat_nom">Nombre</label>
	              <input type="text" class="form-control" id="cat_nom" name="cat_nom" placeholder="Ingresar el Nombre" required>
	            </div>
	            <!-- TODO Imput de descripcion -->
	            <div class="form-group">
	              <label for="cat_descrip">Descripcion</label>
	              <textarea type="text" class="form-control" id="cat_descrip" name="cat_descrip" placeholder="Ingresar la Descripacion" rows="3" required></textarea>
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
<form id="form_clientes" autocomplete="off" class="was-validated">
	<div id="modal_clientes" class="modal fade" role="dialog">
		<div class="modal-dialog ">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title text-center">Nuevo Cliente</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					
					<input type="hidden"  name="id_clientes" >
					
					<div class="form-group">
						<label for="apellidos">Apellidos:</label>
						<input  class="form-control" required id="apellidos"  name="apellidos"  >
					</div>
					<div class="form-group">
						<label for="nombre">Nombre:</label>
						<input  class="form-control" required id="nombre"  name="nombre"  >
					</div>
					<div class="form-group">
						<label for="telefono">Teléfono:</label>
						<input class="form-control" type="tel" required id="telefono" name="telefono" >			
					</div>
					<div class="form-group">
						<label for="estado">Estado</label>
						<input class="form-control"  required id="estado" name="estado">
					</div>
					<div class="form-group">
						<label for="especialidad">Especialidad</label>
						<input class="form-control"   id="especialidad" name="especialidad">
					</div>
					<div class="form-group">
						<label for="correo">Correo</label>
						<input class="form-control" type="email" id="correo" name="correo" required >			
					</div>
					<div class="form-group">
						<label for="domicilio">Domicilio:</label>
						<textarea class="form-control"  name="domicilio" id="domicilio"></textarea>
					</div>
					<div class="form-group">
						<label for="">Datos Extra</label>
						<textarea class="form-control"  name="datos_extra" id="datos_extra"></textarea>
					</div>
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
					<button type="submit" class="btn btn-success" id="btn_formAlta">
						<i class="fa fa-save"></i> Guardar
					</button>
				</div>
			</div>
		</div>
	</div>
</form>	
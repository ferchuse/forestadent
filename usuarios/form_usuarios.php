<form id="form_edicion" class="form" autocomplete="off">
	<div id="modal_edicion" class="modal fade" role="dialog">
		<div class="modal-dialog modal-sm">
			
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title text-center">Editar Usuario</h4>	
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							
							<input id="id_usuarios" hidden name="id_usuarios">
							<label for="nombre_usuarios" class="text-center">Usuario: </label>
							<input type="text" class="form-control" id="nombre_usuarios" name="nombre_usuarios" autofocus required>
							
							<label for="pass_usuarios" class="text-center">Contraseña: </label>
							<input type="password" class="form-control" id="pass_usuarios" name="pass_usuarios" required>
							
							<label for="permiso_usuarios" class="text-center">Permisos: </label>
							<select class="form-control" name="permiso_usuarios" id="permiso_usuarios" required>
								<option value="">Elije ...</option>
								<option value="administrador">Administrador</option>
								<option value="Vendedor">Vendedor</option>
								<option value="categorias">Categorías</option>
							</select>
							
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">
						<i class="fa fa-times"></i> 
						Cerrar
					</button>
					<button type="submit" class="btn btn-success">
						<i class="fa fa-save"></i> 
						Guardar
					</button>
		</div>
	</div>
	<!--FINAL DEL MODAL -->	
</div>
</div>
</form>
<form id="form_clientes" autocomplete="off" class="was-validated">
	<div id="modal_clientes" class="modal fade" role="dialog">
		<div class="modal-dialog ">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title text-center">Editar Cliente</h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<input type="text" hidden id="id_clientes" name="id_clientes">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label for="alias_clientes">Nombre Comercial:</label>
								<input  type="text" class="form-control" name="alias_clientes" id="alias_clientes" required>
							</div>
							<div class="form-group">
								<label for="razon_social_clientes">Razón Social:</label>
								<input  class="form-control" type="text" name="razon_social_clientes" id="razon_social_clientes">
							</div>
							<div class="form-group">
								<label for="rfc_clientes">RFC:</label>
								<input  class="form-control" type="text" name="rfc_clientes" id="rfc_clientes">
							</div>
							
							<div class="form-group">
								<label for="id_vendedores">Vendedor:</label>
								<?php echo generar_select($link, "vendedores", "id_vendedores", "nombre_vendedores")?>
							</div>
							<div class="form-group">
								<label for="telefono">Teléfono:</label>
								<input   class="form-control" type="tel" name="telefono" id="telefono">
							</div>
							<div class="form-group">
								<label for="correo_clientes">Correo:</label>
								<input   class="form-control" type="email" name="correo_clientes" id="correo_clientes">
							</div>
							<div class="form-group">
								<label for="direccion">Dirección:</label>
								<input  required class="form-control" type="text" name="direccion" id="direccion">
							</div>
							
						</div>
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
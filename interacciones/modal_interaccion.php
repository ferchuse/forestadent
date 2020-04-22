<form id="form_interaccion" class="was-validated" autocomplete="off">
	<div id="modal_interaccion" class="modal fade">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					
					<h4 class="modal-title text-center">Valorar Interacción</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				
				<div class="modal-body">
					
					<div class="form-group" >
						<label for="tipo_interaccion">Tipo de Interacción:</label>
						<select class="form-control" name="tipo_interaccion"  id="tipo_interaccion" required>
							<option value="">Elige..</option>
							<option>NO CONTESTA</option>
							<option>LLAMADA CONECTADA</option>
							<option>DATOS ERRONEOS</option>
						</select>
					</div>
					<div class="form-group" >
						<label for="tipo_interaccion">Acción Posterior:</label>
						<select class="form-control" name="accion" id="accion" required>
							<option value="">Elige..</option>
							<option>Prospecto</option>
							<option>Cotizar</option>
							<option>Llamar Después</option>
							<option>No llamar</option>
							<option>Cliente</option>
						</select>
					</div>
					<div class="form-group">
						<label for="unidad_granel">Observaciones:</label>
						<textarea class="form-control" required name="observaciones" id="observaciones"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
					<button type="submit" class="btn btn-success" id="agregar_granel"><i class="fa fa-check"></i> Aceptar</button>
				</div>
			</div>
			
		</div>
	</div>
</form>
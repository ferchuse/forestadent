<form id="form_productos" autocomplete="off" class="is-validated">
	<div id="modal_productos" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title text-center"></h3>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<input hidden type="text" id="id_productos" name="id_productos">
					<div class="row">

						<div class="col-md-6">
							<div class="form-group">
								<label for="codigo_productos">Codigo:</label>
								<input type="text" class="form-control" name="codigo_productos" id="codigo_productos" placeholder="Opcional">
							</div>
							<div class="form-group">
								<label for="">Descripción:</label>
								<input placeholder="Nombre del producto" required class="form-control" type="text" name="descripcion_productos" id="descripcion_productos">
							</div>
							<div class="form-group">
								<label required for="unidad_productos">Unidad de Medida:</label>
								<select class="form-control" id="unidad_productos" name="unidad_productos">
									<option value="">Elije...</option>
									<option value="PZA">PIEZA</option>
								</select>
							</div>
							<div class="form-group">
								<label required for="id_departamentos">Categoría:</label>
								<?php echo generar_select($link, "departamentos", "id_departamentos", "nombre_departamentos", false, false, true) ?>
							</div>
							<div class="form-group">
								<label required for="estatus_productos">Estatus:</label>
								<select class="form-control" name="estatus_productos" id="estatus_productos">
									<option>ACTIVO</option>
									<option>INACTIVO</option>
								</select>
							</div>
							<div class="form-group">
								<label required for="linea">Estatus:</label>
								<select class="form-control" name="linea" id="linea">
									<option>Atoshka</option>
									<option>Universal</option>
								</select>
							</div>
						</div>


						<div class="col-md-6">
							
								<section id="precios" >
									<div class="form-group">
										<label for="costo_proveedor">Costo de Compra (Dólares):</label>
										<input placeholder="" required type="number" min="0" step=".01" class="form-control" id="costo_proveedor" name="costo_proveedor">
									</div>
									
									<div class="form-group ">
										<label>Precio de Venta:</label>
										<input placeholder="PRECIO" type="number" min="0" step=".01" class="form-control" id="precio_menudeo" name="precio_menudeo">
									</div>
									<div class="form-group " hidden>
										<label for="precio_mayoreo">Precio Mayoreo:</label>
										<input placeholder="" type="number" min="0.1" step=".01" class="form-control" id="precio_mayoreo" name="precio_mayoreo">
									</div>
								</section>
						
							<div class="form-group d-none">
								<label for="existencia_productos">Existencia:</label>
								<input placeholder="Cantidad de productos en existencia" type="number" min="0" step="any" class="form-control" id="existencia_productos" name="existencia_productos">
							</div>
							<div class="form-group ">
								<label for="min_productos">Minimo:</label>
								<input placeholder="" type="number" min="0" class="form-control" id="min_productos" name="min_productos">
							</div>
							<div class="form-group ">
								<label for="min_productos">Ubicación:</label>
								<input placeholder="" type="text" min="0" class="form-control" id="ubicacion" name="ubicacion">
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
<form id="form_edicion" autocomplete="off">
	<div class="modal fade" id="modal_edicion" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content"> 
				<div class="modal-header">
					<h4 class="modal-title">Departamento</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group" hidden>
							<label for="id_departamentos">ID</label>
							<input style="margin:10px 0;" readonly type="text" class="form-control" id="id_departamentos" name="id_departamentos" placeholder="">
						</div>
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label for="nombre_departamentos">Departamento</label>
									<input required type="text" class="form-control" id="nombre_departamentos" name="nombre_departamentos" placeholder="">
								</div>
								<div class="form-group">
									<label for="notas">Características</label>
									<input required type="text" class="form-control" id="notas" name="notas" >
								</div>
								<div class="form-group">
									<label for="composicion">Composición</label>
									<input required type="text" class="form-control" id="composicion" name="composicion" >
								</div>
								<div class="form-group">
									<label for="peso">Peso</label>
									<input required type="text" class="form-control" id="peso" name="peso" >
								</div>
								<div class="form-group">
									<label for="longitud">Longitud</label>
									<input required type="text" class="form-control" id="longitud" name="longitud" >
								</div>
								<div class="form-group">
									<label for="aguja">Aguja</label>
									<input required type="text" class="form-control" id="aguja" name="aguja" >
								</div>
								<div class="form-group">
									<label for="oferta">Oferta</label>
									<select required type="text" class="form-control" id="oferta" name="oferta" >
										<option value="Activa">Activa</option>
										<option value="Inactiva">Inactiva</option>
									</select>
								</div>
							</div>
							
							
							<div class="col-6">
								<div class="form-group">
									<label for="fibra">Fibra</label>
									<input required type="text" class="form-control" id="fibra" name="fibra" >
								</div>
								<div class="form-group">
									<label for="marca">Marca</label>
									<select required type="text" class="form-control" id="marca" name="marca" >
										<option value="atoshka">Atoshka</option>
										<option value="uyarn">Universal Yarn</option>
									</select>
								</div>
								<div class="form-group">
									<label for="temporada">Temporada</label>
									<select required type="text" class="form-control" id="temporada" name="temporada" >
										<option >Otoño-Invierno 2019</option>
										<option >Primavera-Verano 2019</option>
										<option >Todo el año</option>
									</select>
								</div>
								<div class="form-group">
									<label for="estatus_departamentos">Estatus</label>
									<select required type="text" class="form-control" id="estatus_departamentos" name="estatus_departamentos" >
										<option >ACTIVO</option>
										<option >INACTIVO</option>
									</select>
								</div>
								<div class="col-6">
									<div class="form-group">
										<span class="btn btn-success fileinput-button">
											<i class="fas fa-upload"></i> Foto Portada
											<input class="fileupload" type="file" accept="image/*" name="files[]" data-url="../fileupload/server_upload.php" >
										</span>
										
										<div class="progress " >
											<div class="progress-bar progress-bar-striped active" >
											</div>
										</div>	
										
										<img id="foto_thumb" class="w-50">
										
										<input class="url" id="foto" type="hidden" name="foto" >
										
										
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<span class="btn btn-success fileinput-button">
											<i class="fas fa-upload"></i> Foto Colores
											<input class="fileupload" type="file" accept="image/*" name="files[]" data-url="../fileupload/server_upload.php" >
										</span>
										
										<div class="progress " >
											<div class="progress-bar progress-bar-striped active" >
											</div>
										</div>	
										
										<img id="colores_thumb" class="w-50">
										<input id="colores" class="url" type="hidden" name="colores" >
									</div>
								</div>
								<div class="col-12">
									<div class="form-group">
										<span class="btn btn-success fileinput-button">
											<i class="fas fa-upload"></i> PDF Patrón
											<input class="fileupload" type="file" accept="application/pdf" name="files[]" data-url="../fileupload/server_upload.php" >
										</span>
										
										<div class="progress " >
											<div class="progress-bar progress-bar-striped active" >
											</div>
										</div>	
										
										<img hidden id="patron_thumb" class="w-50">
										<input id="patrones" class="url form-control input-sm" type="url" readonly name="patrones" >
									</div>
								</div>
								
								
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
					<button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
				</div>
			</div>
		</div>
	</div>
</form>			
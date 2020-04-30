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
						<input  class="form-control" required   name="apellidos"  >
					</div>
					<div class="form-group">
						<label for="nombre">Nombre:</label>
						<input  class="form-control" required  name="nombre"  >
					</div>
					<div class="form-group">
						<label for="telefono">Teléfono:</label>
						<input class="form-control" type="tel" required  name="telefono" >			
					</div>
					<div class="form-group">
						<label for="estado">Estado</label>
						<select  name="estado">
							<option >Aguascalientes</option>
							<option >Baja California</option>
							<option >Baja California Sur</option>
							<option >Campeche</option>
							<option >Chiapas</option>
							<option >Chihuahua</option>
							<option>Ciudad de México</option>
							<option >Coahuila de Zaragoza</option>
							<option >Colima</option>
							<option >Durango</option>
							<option >Guanajuato</option>
							<option >Guerrero</option>
							<option >Hidalgo</option>
							<option >Jalisco</option>
							<option >M&eacute;xico</option>
							<option >Michoacán de Ocampo</option>
							<option >Morelos</option>
							<option >Nayarit</option>
							<option >Nuevo Le&oacute;n</option>
							<option >Oaxaca</option>
							<option >Puebla</option>
							<option >Quer&eacute;taro</option>
							<option >Quintana Roo</option>
							<option >San Luis Potos&iacute;</option>
							<option >Sinaloa</option>
							<option >Sonora</option>
							<option >Tabasco</option>
							<option >Tamaulipas</option>
							<option >Tlaxcala</option>
							<option >Veracruz de Ignacio de la Llave</option>
							<option >Yucat&aacute;n</option>
							<option >Zacatecas</option>
							<option >INTERNACIONAL</option>
							
						</select>		
						
					</div>
					<div class="form-group">
						<label for="especialidad">Especialidad</label>
						<input class="form-control"    name="especialidad">
					</div>
					<div class="form-group">
						<label for="correo">Correo</label>
						<input class="form-control" type="email"  name="correo" required >			
					</div>
					<div class="form-group">
						<label for="domicilio">Domicilio:</label>
						<textarea class="form-control"  name="domicilio" ></textarea>
					</div>
					<div class="form-group">
						<label for="">Datos Extra</label>
						<textarea class="form-control"  name="datos_extra" ></textarea>
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
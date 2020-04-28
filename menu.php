


<nav class="navbar navbar-expand-sm bg-dark navbar-dark mb-2 na ">
	
	<a class="navbar-brand" href="#">
		<img hidden src="../img/logo_small.jpg" class="" width="40px">
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="collapsibleNavbar">
		<ul class="navbar-nav mr-auto">
			<?php if($_COOKIE["permiso_usuarios"] == "administrador" ){?>
				<li class="nav-item" hidden>
					<a class="nav-link" href="../cursos/index.php">
						<i class="fas fa-dollar-sign"></i> Cursos
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../catalogos/vendedores.php">
						<i class="fas fa-user-tie"></i> Vendedores
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../clientes">
						<i class="fas fa-users"></i> Clientes
					</a>
				</li>
				<li class="nav-item ">
					<a class="nav-link" href="../usuarios/usuarios.php">
						<i class="fas fa-user"></i> Administradores
					</a>
				</li>
				<li class="nav-item ">
					<a class="nav-link" href="../reportes/historial.php">
						<i class="fas fa-chart-bar"></i> Reportes
					</a>
				</li>
				<li hidden class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-chart-bar"></i> Reportes
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="../reportes/comisiones.php">Comisiones</a>
						<a class="dropdown-item" href="../reportes/cuentas_por_cobrar.php">Cuentas Por Cobrar</a>
					</div>
				</li>
				<?php
				}
				elseif($_COOKIE["permiso_usuarios"] == "vendedor"){?>
				<li class="nav-item">
					<a class="nav-link" href="../prospectos/index.php">
						<i class="fas fa-user"></i> Prospectos
					</a>
				</li>
				<?php	
				}
			?>
			
		</ul>
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="#1">
					<i class="fas fa-user"></i>	<?php echo $_COOKIE["nombre_usuarios"]?>
					<input type="hidden" id="cookie_id_usuarios" value="<?php echo $_COOKIE["id_usuarios"]?>">
					<input type="hidden" id="cookie_nombre_usuarios" value="<?php echo $_COOKIE["nombre_usuarios"]?>">
					<input type="hidden" id="cookie_permiso_usuarios" value="<?php echo $_COOKIE["permiso_usuarios"]?>">
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../login/logout.php">
					<i class="fas fa-sign-out-alt"></i>	Salir
				</a>
			</li>
		</ul>
	</div> 
</nav>


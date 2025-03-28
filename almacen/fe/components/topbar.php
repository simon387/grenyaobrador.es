<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

	<!-- Sidebar Toggle (Topbar) -->
	<button id="sidebarToggleTop-custom" class="btn btn-link rounded-circle mr-3">
		<em class="fa fa-bars"></em>
	</button>

	<div id="form-search" class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
		<div class="input-group">
			<input id="input-search" type="text" class="form-control bg-light border-0 small" placeholder="Buscar..."
			       aria-label="Search" aria-describedby="basic-addon2">
			<div class="input-group-append">
				<button id="btn-search" class="btn btn-primary" type="button">
					<em class="fas fa-search fa-sm"></em>
				</button>
			</div>
		</div>
	</div>

	<!-- Topbar Navbar -->
	<ul class="navbar-nav ml-auto">

		<!-- Nav Item - Alerts -->
		<li class="d-none d-sm-block nav-item dropdown no-arrow mx-1">
			<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
			   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<em class="fas fa-bell fa-fw"></em>
				<!-- Counter - Alerts -->
			</a>
			<!-- Dropdown - Alerts -->
			<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
			     aria-labelledby="alertsDropdown">
				<h6 class="dropdown-header">
					Alerts Center
				</h6>
				<a class="dropdown-item d-flex align-items-center" href="#">
					<div class="mr-3">
						<div class="icon-circle bg-primary">
							<em class="fas fa-file-alt text-white"></em>
						</div>
					</div>
					<div>
						<div class="small text-gray-500">December 12, 2020</div>
						<span class="font-weight-bold">Neuva version!</span>
					</div>
				</a>
				<a class="dropdown-item d-flex align-items-center" href="#">
					<div class="mr-3">
						<div class="icon-circle bg-success">
							<em class="fas fa-donate text-white"></em>
						</div>
					</div>
					<div>
						<div class="small text-gray-500">December 7, 2020</div>
						Neuva version!
					</div>
				</a>
				<a class="dropdown-item d-flex align-items-center" href="#">
					<div class="mr-3">
						<div class="icon-circle bg-warning">
							<em class="fas fa-exclamation-triangle text-white"></em>
						</div>
					</div>
					<div>
						<div class="small text-gray-500">December 2, 2020</div>
						Neuva version!
					</div>
				</a>
				<a class="dropdown-item text-center small text-gray-500" href="#">Mostrar todas las Alertas</a>
			</div>
		</li>

		<!-- Nav Item - Messages -->
		<li class="d-none d-sm-block nav-item dropdown no-arrow mx-1">
			<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
			   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<em class="fas fa-envelope fa-fw"></em>
				<!-- Counter - Messages -->
			</a>
			<!-- Dropdown - Messages -->
			<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
			     aria-labelledby="messagesDropdown">
				<h6 class="dropdown-header">
					Message Center
				</h6>
				<a class="dropdown-item d-flex align-items-center" href="#">
					<div class="dropdown-list-image mr-3">
						<img class="rounded-circle" src="//<?= $bs ?>grenyaobrador.es/almacen/fe/img/undraw_profile_1.svg"
						     alt="">
						<div class="status-indicator bg-success"></div>
					</div>
					<div class="font-weight-bold">
						<div class="text-truncate">Hola!</div>
						<div class="small text-gray-500">Valeria Paola · 58m</div>
					</div>
				</a>
				<a class="dropdown-item d-flex align-items-center" href="#">
					<div class="dropdown-list-image mr-3">
						<img class="rounded-circle" src="//<?= $bs ?>grenyaobrador.es/almacen/fe/img/undraw_profile_2.svg"
						     alt="">
						<div class="status-indicator"></div>
					</div>
					<div>
						<div class="text-truncate">I have the photos that you ordered last month, how
							would you like them sent to you?</div>
						<div class="small text-gray-500">Jae Chun · 1d</div>
					</div>
				</a>
				<a class="dropdown-item d-flex align-items-center" href="#">
					<div class="dropdown-list-image mr-3">
						<img class="rounded-circle" src="//<?= $bs ?>grenyaobrador.es/almacen/fe/img/undraw_profile_3.svg"
						     alt="">
						<div class="status-indicator bg-warning"></div>
					</div>
					<div>
						<div class="text-truncate">Last month's report looks great, I am very happy with
							the progress so far, keep up the good work!</div>
						<div class="small text-gray-500">Morgan Alvarez · 2d</div>
					</div>
				</a>
				<a class="dropdown-item d-flex align-items-center" href="#">
					<div class="dropdown-list-image mr-3">
						<img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
						<div class="status-indicator bg-success"></div>
					</div>
					<div>
						<div class="text-truncate">Am I a good boy? The reason I ask is because someone
							told me that people say this to all dogs, even if they aren't good...</div>
						<div class="small text-gray-500">Chicken the Dog · 2w</div>
					</div>
				</a>
				<a class="dropdown-item text-center small text-gray-500" href="#">Leer más Mensajes</a>
			</div>
		</li>

		<li class="d-none d-sm-block nav-item dropdown no-arrow mx-1">
			<a class="nav-link" href="//<?= $bs ?>grenyaobrador.es/almacen/fe/index.php" role="button" aria-haspopup="true" aria-expanded="false">
				<em class="fas fa-home fa-fw"></em>
			</a>
		</li>

		<div class="topbar-divider d-none d-sm-block"></div>

		<!-- Nav Item - User Information -->
		<li class="nav-item dropdown no-arrow">
			<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
			   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username']?></span>
				<img class="img-profile rounded-circle" alt="" src="//<?= $bs ?>grenyaobrador.es/almacen/fe/img/undraw_profile.svg">
			</a>
			<!-- Dropdown - User Information -->
			<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
			     aria-labelledby="userDropdown">
				<a class="dropdown-item" href="#">
					<em class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></em>
					Profile
				</a>
				<a class="dropdown-item" href="#">
					<em class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></em>
					Settings
				</a>
				<a class="dropdown-item" href="#">
					<em class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></em>
					Activity Log
				</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
					<em class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></em>
					Cerrar sesión
				</a>
			</div>
		</li>
	</ul>
</nav>

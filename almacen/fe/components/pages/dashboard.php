<div class="container-fluid">

	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">
			Almacén
		</h1>
		<div>
			<button class="btn btn-info btn-icon-split btn-sm" id="btn-prev-page">
				<span class="icon text-white-50">
					<em class="fas fa-arrow-left"></em>
				</span>
				<span class="text">Período Anterior</span>
			</button>
			<button disabled class="btn btn-info btn-icon-split btn-sm" id="btn-next-page">
				<span class="icon text-white-50">
					<em class="fas fa-arrow-right"></em>
				</span>
				<span class="text">Período Siguiente</span>
			</button>
			<button class="btn btn-primary btn-icon-split btn-sm" id="btn-new-page">
				<span class="icon text-white-50">
					<em class="fas fa-plus"></em>
				</span>
				<span class="text">Nuevo período</span>
			</button>
		</div>
	</div>

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Período Almacén desde <span id="period-from"></span> hasta <span id="period-to"></span>
				 - Productos del proveedor: <span id="supplier-selected"></span>
			</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTableDashboard" aria-describedby="table">
					<thead>
					<tr>
						<th scope="row" class="col" data-field="name">Producto</th>
						<th scope="row" class="col" data-field="unit">Unidad</th>
						<th scope="row" class="col" data-field="note">Note</th>
						<th scope="row" class="col" data-field="deposit">Entrada</th>
						<th scope="row" class="col" data-field="outFlow0">Salida Plaça</th>
						<th scope="row" class="col" data-field="outFlow1">Salida Comarea</th>
						<th scope="row" class="col" data-field="left">Cuanto Quedan</th>
						<th scope="row" class="col" data-field="lastOperation">Última Edición</th>
					</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>

	<nav aria-label="...">
		<ul id="main-paginator" class="pagination pagination-sm">
		</ul>
	</nav>
</div>

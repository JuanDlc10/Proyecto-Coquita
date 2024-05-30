<?php

use config\Config;

$config = new Config();
?>

<div class="bg-custom">
	<div class="container py-5">
		<div class="row d-flex justify-content-center align-items-center">
			<div class="col col-xl-10">
				<div class="card border border-3 rounded-end">
					<div class="row g-0">
						<div class="col-md-12">
							<div class="card-body p-3 p-lg-4 text-black" style="background-color: black;">
								<h2 class="fw-normal mb-3 pb-3 text-center text-purple-700" style="letter-spacing: 1px;">Editar Producto</h2>
								<form id="form" action="<?= $config->redireccion('editar') ?>" method="POST" enctype="multipart/form-data">
									<div class="row">
										<div class="col-6">
											<label for="nombre" class="form-label text-purple-700">Nombre del Producto</label>
											<input type="text" class="form-control" name="nombre" value="<?= $datos['nombre'] ?>">
											<input type="text" class="form-control" name="id" value="<?= $datos['id_producto'] ?>" hidden>
										</div>
										<div class="col-6">
											<label for="marca" class="form-label text-purple-700">Marca</label>
											<input type="text" class="form-control" name="marca" value="<?= $datos['marca'] ?>">
										</div>
									</div>
									<div class="row">
										<div class="col-6">
											<label for="precio" class="form-label text-purple-700">Precio</label>
											<input type="number" class="form-control" name="precio" value="<?= $datos['precio'] ?>">
										</div>
										<div class="col-6">
											<label for="cantidad" class="form-label text-purple-700">Cantidad</label>
											<input type="number" class="form-control" name="cantidad" value="<?= $datos['cantidad'] ?>">
										</div>
									</div>
									<div class="mb-3">
										<label for="imagen" class="form-label text-purple-700">Imagen</label>
										<input type="file" class="form-control" name="imagen" accept="image/*" value="">
										<input type="text" class="form-control" name="imagenOld" accept="image/*" value="<?= $datos['imagen'] ?>" hidden>
									</div>
									<div class="text-center">
										<button data-mdb-button-init data-mdb-ripple-init class="btn btn btn-outline-purple" type="button" onclick="validarProducto()">Actualizar</button>
										<a class="btn btn btn-outline-purple" href="<?= $config->redireccion('inicio') ?>">regresar</a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
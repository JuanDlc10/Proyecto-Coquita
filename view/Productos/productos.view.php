<?php

use config\Config;

$config = new Config();

?>

<div class="bg-custom">
	<div class="container py-2">
		<div class="row d-flex justify-content-center align-items-center">
			<div class="col col-xl-10">
				<div class="card border border-3 rounded-end">
					<div class="row g-0">
						<div class="col-md-12">
							<div class="card-body p-3 p-lg-4 text-black" style="background-color: black;">
								<h2 class="fw-normal mb-3 pb-3 text-center text-purple-700" style="letter-spacing: 1px;">Productos</h2>
								<div class="d-flex justify-content-between pd-3">
									<a href="<?= $config->redireccion('agregar') ?>" class="btn btn-outline-purple">Agregar</a>
									<a class="btn btn-outline-purple" href="<?= $config->redireccion('logout') ?>">Salir</a>
								</div>
								<div class="row">
									<?php
									foreach ($datos as $producto) {
									?>
										<div class="col-md-4 mb-4 mt-4">
											<div class="card card-custom h-100 text-center">
												<img src="/public/img/productos/<?= $producto['imagen'] ?>" class="card-img-top" alt="<?= $producto['nombre'] ?>" style="height: 200px; object-fit: cover;">
												<div class="card-body">
													<h5 class="text-purple-700">Nombre: <?= $producto['nombre'] ?></h5>
													<p class="text-purple-700">Marca: <?= $producto['marca'] ?></p>
													<p class="text-purple-700">Precio: $<?= $producto['precio'] ?></p>
													<p class="text-purple-700">Precio: <?= $producto['cantidad'] ?></p>
												</div>
												<div class="card-footer card-footer-custom d-flex justify-content-around">
													<a href="<?= $config->redireccion('editarProducto') ?>/<?= $producto['id_producto'] ?>" class="btn btn-outline-purple">Editar</a>
													<a href="/eliminarProducto/<?= $producto['id_producto'] ?>" class="btn btn-outline-purple">Eliminar</a>
												</div>
											</div>
										</div>
									<?php
									}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
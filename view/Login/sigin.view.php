<?php

use config\Config;

$config = new Config();

?>
<section class="vh-100" style="background-color: #7D2181;">
	<div class="container py-5" style="height: 100%;">
		<div class="row d-flex justify-content-center align-items-center h-100">
			<div class="col col-xl-8">
				<div class="card border border-3 rounded-end">
					<div class="row g-0">
						<div class="col-md-6 col-lg-5 d-none d-md-block">
							<img src="../../public/img/bc50ec51066776946d64eed30dbd888e.jpg" alt="login" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height: 100%;" />
						</div>
						<div class="col-md-6 col-lg-7 d-flex align-items-center" style="background-color: black;">
							<div class="card-body p-3 p-lg-4 text-black">

								<form id="form" action="<?= $config->redireccion("validarRegistro") ?>" method="POST">
									<div class="d-flex align-items-center mb-3 pb-1">
										<img src="https://i.pinimg.com/originals/ca/7c/ac/ca7cace2560546d184386240d9b7f334.jpg" alt="" style="height: 40%; width:100%">
									</div>
									<h5 class="fw-normal mb-3 pb-3 text-purple-300 text-center" style="letter-spacing: 1px;">Registrar</h5>

									<div data-mdb-input-init class="form-outline mb-4">
										<input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="example@gmail.com" />
										<label class="form-label text-purple-300" for="email">Correo</label>
									</div>

									<div data-mdb-input-init class="form-outline mb-4">
										<input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="******" />
										<label class="form-label text-purple-300" for="password">Contraseña</label>
									</div>

									<div class="pt-1 mb-4 d-flex justify-content-end">
										<button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-dark btn-lg btn-block text-purple-300" type="button" onclick="validarLogin()">Registrar</button>
									</div>
									<p class="mb-4 text-purple-300 ">Tienes cuenta? <a href="<?= $config->redireccion('') ?>" class="text-purple-300">Iniciar sesión aqui</a></p>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
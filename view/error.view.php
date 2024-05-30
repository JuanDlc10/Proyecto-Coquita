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

                                <form id="registroForm" action="<?= $config->redireccion("validarRegistro") ?>" method="POST">
                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <img src="https://i.pinimg.com/originals/ca/7c/ac/ca7cace2560546d184386240d9b7f334.jpg" alt="" style="height: 40%; width:100%">
                                    </div>
                                    <h1 class="fw-normal mb-3 pb-3 text-purple-300 text-center" style="letter-spacing: 1px;">Error 404 page not found.</h1>
                                    <div class="d-flex justify-content-center">
                                        <a class="btn btn-outline-dark text-purple-300" href="<?= $config->redireccion('') ?>">Regresar</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
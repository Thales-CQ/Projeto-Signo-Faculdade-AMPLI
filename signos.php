<?php

include_once 'layouts/header.php'; 
$xml = simplexml_load_file("signos.xml");

?>


<div class="container py-5">

    <div class="text-center mb-5">

        <h1 class="fw-bold">
            Signos do Zodíaco
        </h1>

        <p class="text-muted">
            Consulte os signos e suas descrições
        </p>

    </div>

    <div class="row g-4">

        <?php foreach ($xml as $signo): ?>

            <div class="col-md-6 col-lg-4">

                <div class="card h-100 shadow-sm">

                    <div class="text-center pt-4">

                        <img src="assets/imgs/signos/<?= $signo->imagem ?>"
                         class="img-fluid"
                         style="width: 100px; height: 100px; object-fit: contain;"
                         alt="<?= $signo->signoNome ?>">
                        
            

                    </div>

                    <div class="card-body text-center">

                        <h3 class="card-title fw-bold">
                            <?= $signo->signoNome ?>
                        </h3>

                        <p class="text-muted">
                            <?= $signo->dataInicio ?> -
                            <?= $signo->dataFim ?>
                        </p>

                        <p class="card-text">
                            <?= $signo->descricao ?>
                        </p>

                    </div>

                </div>

            </div>

        <?php endforeach; ?>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>


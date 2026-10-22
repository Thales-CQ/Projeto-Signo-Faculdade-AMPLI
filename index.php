<?php
   include_once 'layouts/header.php'; 
?>

<main class="container py-5">

    <div class="text-center">
        <h1 class="display-5 fw-bold">
            Descubra o seu signo
        </h1>
        <p class="lead">
            Informe sua data de nascimento e descubra qual é o seu signo do zodíaco.
        </p>
    </div>

  
<div class="row justify-content-center mt-4">
    <div class="col-12 col-sm-8 col-md-6 col-lg-4">
        <div class="card formulario-card">
            <div class="card-body p-4">

                <form id="signo-form" method="POST">

                    <div class="mb-4">
                        <label for="data_nascimento" class="form-label">
                            Data de nascimento
                        </label>

                        <input
                            type="date"
                            class="form-control input-data"
                            id="data_nascimento"
                            name="data_nascimento"
                            required
                        >
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-descobrir">
                            Descobrir signo
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>



    <!-- RESULTADO -->
    <div class="row justify-content-center mt-4">
        <div class="col-md-8 col-lg-6" id="resultado-signo"></div>
    </div>

</main>

<script>
document.getElementById('signo-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch('show_zodiac_sign.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('resultado-signo').innerHTML = data;
    })
    .catch(error => {
        console.error('Erro ao buscar o signo:', error);
    });
});
</script>

<?php
    include_once 'layouts/footer.php';
?>
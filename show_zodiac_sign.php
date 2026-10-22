<?php
if (!isset($_POST['data_nascimento']) || empty($_POST['data_nascimento'])) {
    exit;
}

$data_nascimento = $_POST['data_nascimento'];
$signos = simplexml_load_file("signos.xml");

$data = DateTime::createFromFormat('Y-m-d', $data_nascimento);

$dia = (int) $data->format('d');
$mes = (int) $data->format('m');
$signo_encontrado = null;
foreach ($signos->signo as $signo) {

    $inicio = explode('/', $signo->dataInicio);
    $fim = explode('/', $signo->dataFim);

    $mesInicio = (int) $inicio[1];
    $diaInicio = (int) $inicio[0];

    $mesFim = (int) $fim[1];
    $diaFim = (int) $fim[0];

    $dataAtual = $mes * 100 + $dia;
    $dataInicio = $mesInicio * 100 + $diaInicio;
    $dataFim = $mesFim * 100 + $diaFim;

    if ($dataInicio <= $dataFim) {

        if ($dataAtual >= $dataInicio && $dataAtual <= $dataFim) {
            $signo_encontrado = $signo;
            break;
        }

    } else {

        if ($dataAtual >= $dataInicio || $dataAtual <= $dataFim) {
            $signo_encontrado = $signo;
            break;
        }
    }
}

?>

<?php if ($signo_encontrado): ?>

    <div class="card shadow-sm text-center text-white" style="background: linear-gradient(180deg, #5b62a0 0%, #2f2a6b 100%); border: none;">
        <div class="card-body p-5">
            <h1 class="display-3 fw-normal mb-3" style="letter-spacing: 4px;">
                <?= $signo_encontrado->signoNome ?>
            </h1>

            <?php if (!empty($signo_encontrado->imagem)): ?>
                <p class="img-text">
                    <img src="assets/imgs/signos/<?= $signo_encontrado->imagem ?>"
                    class="img-fluid"
                    style="width: 100px; height: 100px; object-fit: contain;"
                    alt="<?= $signo_encontrado->signoNome ?>">
                </p>
            <?php endif; ?>

            <p class="lead opacity-75 mt-4" style="letter-spacing: 2px;">
                <?= $signo_encontrado->descricao ?>
            </p>
        </div>
    </div>

<?php else: ?>

    <div class="card shadow-sm text-center">
        <div class="card-body p-4">
            <h4 class="fw-bold mb-2">
                Signo não encontrado
            </h4>
            <p class="text-muted m-0">
                Não foi possível encontrar um signo para a data informada.
            </p>
        </div>
    </div>

<?php endif; ?>
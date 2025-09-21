<?php
// Función que genera la serie Fibonacci
function generarFibonacci($n) {
    $fibonacci = [];

    if ($n <= 0) {
        return $fibonacci;
    }

    $fibonacci[] = 0;
    if ($n == 1) return $fibonacci;

    $fibonacci[] = 1;
    for ($i = 2; $i < $n; $i++) {
        $fibonacci[] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
    }

    return $fibonacci;
}

// Función que imprime el resultado 
function mostrarFibonacci($serie) {
    if (empty($serie)) {
        return '<div class="alert alert-warning">No se pudo generar la serie.</div>';
    }

    $html = '<table class="table table-striped table-bordered mt-3">';
    $html .= '<thead class="table-dark"><tr><th>#</th><th>Valor</th></tr></thead><tbody>';

    foreach ($serie as $i => $valor) {
        $html .= "<tr><td>" . ($i + 1) . "</td><td>$valor</td></tr>";
    }

    $html .= '</tbody></table>';
    return $html;
}


$resultado = [];
if (isset($_POST['numero'])) {
    $n = intval($_POST['numero']);
    $resultado = generarFibonacci($n);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Serie Fibonacci con Funciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>Generador de Fibonacci</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="numero" class="form-label">Ingrese un número:</label>
                                <input type="number" class="form-control" id="numero" name="numero" min="1" required>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Generar</button>
                        </form>

                        <?php
                        if (!empty($resultado)) {
                            echo mostrarFibonacci($resultado);
                        } elseif (isset($_POST['numero']) && $n <= 0) {
                            echo '<div class="alert alert-danger mt-3">Ingrese un número mayor que 0</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
// Función que determina si un número es primo
function esPrimo($num) {
    if ($num <= 1) return false;
    if ($num == 2) return true;
    if ($num % 2 == 0) return false;

    // Solo comprobamos hasta la raíz cuadrada del número
    for ($i = 3; $i <= sqrt($num); $i += 2) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

// Función para mostrar resultado
function mostrarPrimo($numero, $resultado) {
    $mensaje = $resultado 
        ? "El número <strong>$numero</strong> es <span class='text-success'>PRIMO ✅</span>" 
        : "El número <strong>$numero</strong> <span class='text-danger'>NO es primo ❌</span>";

    return "<div class='alert alert-info mt-3 text-center'>$mensaje</div>";
}

$resultado = null;
$numeroIngresado = null;
if (isset($_POST['numero'])) {
    $numeroIngresado = intval($_POST['numero']);
    $resultado = esPrimo($numeroIngresado);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Número Primo con Funciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>Verificador de Números Primos</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="numero" class="form-label">Ingrese un número:</label>
                                <input type="number" class="form-control" id="numero" name="numero" required>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Verificar</button>
                        </form>

                        <?php
                        if ($resultado !== null) {
                            echo mostrarPrimo($numeroIngresado, $resultado);
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

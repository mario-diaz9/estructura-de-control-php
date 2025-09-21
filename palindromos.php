<?php
// Función que determina si una cadena es palíndromo
function esPalindromo($texto) {
    // Normalizamos el texto: minúsculas y quitamos espacios y caracteres no alfanuméricos
    $textoLimpio = preg_replace('/[^a-z0-9]/i', '', strtolower($texto));
    $reverso = strrev($textoLimpio);

    return $textoLimpio === $reverso;
}

// Función para mostrar resultado 
function mostrarPalindromo($cadena, $resultado) {
    $mensaje = $resultado 
        ? "La cadena <strong>\"$cadena\"</strong> es un <span class='text-success'>PALÍNDROMO ✅</span>" 
        : "La cadena <strong>\"$cadena\"</strong> <span class='text-danger'>NO es palíndromo ❌</span>";

    return "<div class='alert alert-info mt-3 text-center'>$mensaje</div>";
}

$resultado = null;
$textoIngresado = null;
if (isset($_POST['texto'])) {
    $textoIngresado = trim($_POST['texto']);
    $resultado = esPalindromo($textoIngresado);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Palíndromo con Funciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg rounded-3">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>Verificador de Palíndromos</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="texto" class="form-label">Ingrese una palabra o frase:</label>
                                <input type="text" class="form-control" id="texto" name="texto" required>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Verificar</button>
                        </form>

                        <?php
                        if ($resultado !== null) {
                            echo mostrarPalindromo($textoIngresado, $resultado);
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


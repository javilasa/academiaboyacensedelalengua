<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: index.php");
    exit;
}

// Cargar y decodificar el archivo contenidos.json para obtener la estructura
$contenidosFile = './data/contenidos.json';
$contenidosStructure = json_decode(file_get_contents($contenidosFile), true);

// Obtener parámetros de la URL
$type = $_GET['type'] ?? null;
$action = $_GET['action'] ?? null;
$index = $_GET['index'] ?? null;

if (!$type || !$action) {
    die("Faltan parámetros.");
}

// Determinar la estructura del tipo de contenido
$selectedContentStructure = null;
foreach ($contenidosStructure as $contenido) {
    if (array_key_exists($type, $contenido)) {
        $selectedContentStructure = $contenido[$type];
        break;
    }
}

if (!$selectedContentStructure) {
    die("Tipo de contenido no encontrado en contenidos.json.");
}

// Ruta al archivo de datos específico
$dataFile = './data/' . $type . '.json';

// Verificar si el archivo existe
if (!file_exists($dataFile)) {
    // Si no existe, crear el archivo con un contenido JSON básico
    $initialData = []; // Puedes modificar esto según lo que necesites
    file_put_contents($dataFile, json_encode($initialData, JSON_PRETTY_PRINT));
    echo "El archivo de datos para '$type' no existía, así que se ha creado uno nuevo.";
}

// Cargar el archivo de datos (miembros.json, publicaciones.json, etc.)
$contentData = json_decode(file_get_contents($dataFile), true);

if ($action === 'add_entry' || ($action === 'edit_entry' && $index !== null)) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $newEntry = [];
        foreach ($selectedContentStructure as $field => $fieldType) {
            if ($fieldType === 'imagen' || $fieldType === 'archivo') {
                if (isset($_FILES[$field]) && $_FILES[$field]['error'] == UPLOAD_ERR_OK) {
                    // Determinar la ruta de destino
                    $targetDir = ($fieldType === 'imagen') ? './assets/images/' . $type . '/' : './assets/files/' . $type . '/';

                    // Crear el directorio si no existe
                    if (!file_exists($targetDir)) {
                        mkdir($targetDir, 0777, true);
                    }

                    // Definir el archivo de destino
                    $targetFile = $targetDir . basename($_FILES[$field]["name"]);
                    // Mover el archivo subido a la carpeta de destino
                    move_uploaded_file($_FILES[$field]["tmp_name"], $targetFile);
                    
                    // Guardar la ruta completa en el nuevo registro
                    $newEntry[$field] = $targetFile;  // Aquí se guarda la ruta completa
                } else {
                    // Si no se sube un nuevo archivo, mantener el valor existente
                    $newEntry[$field] = $_POST[$field] ?? ($action === 'edit_entry' ? $contentData[$index][$field] : '');
                }
            } else {
                $newEntry[$field] = $_POST[$field] ?? '';
            }
        }

        if ($action === 'add_entry') {
            $contentData[] = $newEntry;
        } elseif ($action === 'edit_entry') {
            $contentData[$index] = $newEntry;
        }

        // Guardar el contenido actualizado en el archivo JSON
        file_put_contents($dataFile, json_encode($contentData, JSON_PRETTY_PRINT));

        // Redirigir de vuelta al Dashboard con el tipo seleccionado
        header("Location: dashboard.php?type=$type");
        exit;
    }

    // Si estamos editando, cargar los valores actuales del contenido
    $currentEntry = ($action === 'edit_entry') ? $contentData[$index] : [];

    // Mostrar el formulario
    ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Gestión de <?php echo ucfirst($type); ?></title>
        <link rel="stylesheet" type="text/css" href="./assets/css/admin_styles.css"> 
    </head>
    <body>
        <h2>Gestión de <?php echo ucfirst($type); ?></h2>
        <form method="post" enctype="multipart/form-data">
            <?php foreach ($selectedContentStructure as $field => $fieldType): ?>
                <label for="<?php echo $field; ?>"><?php echo ucfirst($field); ?></label><br>
                <?php if ($fieldType == 'texto'): ?>
                    <input type="text" name="<?php echo $field; ?>" value="<?php echo $currentEntry[$field] ?? ''; ?>"><br><br>
                <?php elseif ($fieldType == 'texto_largo'): ?>
                    <textarea name="<?php echo $field; ?>"><?php echo $currentEntry[$field] ?? ''; ?></textarea><br><br>
                <?php elseif ($fieldType == 'imagen'): ?>
                    <input type="file" name="<?php echo $field; ?>"><br>
                    <?php if (!empty($currentEntry[$field])): ?>
                        <img src="<?php echo $currentEntry[$field]; ?>" alt="Imagen actual" width="100"><br>
                        <p>Imagen actual: <?php echo basename($currentEntry[$field]); ?></p>
                        <input type="hidden" name="<?php echo $field; ?>" value="<?php echo $currentEntry[$field]; ?>">
                    <?php endif; ?>
                    <br>
                <?php elseif ($fieldType == 'archivo'): ?>
                    <input type="file" name="<?php echo $field; ?>"><br>
                    <?php if (!empty($currentEntry[$field])): ?>
                        <a href="<?php echo $currentEntry[$field]; ?>" target="_blank">Ver archivo actual</a><br>
                        <p>Archivo actual: <?php echo basename($currentEntry[$field]); ?></p>
                        <input type="hidden" name="<?php echo $field; ?>" value="<?php echo $currentEntry[$field]; ?>">
                    <?php endif; ?>
                    <br>
                <?php endif; ?>
            <?php endforeach; ?>
            <input type="submit" value="Guardar">
        </form>
        <p><a class="btn-link" href="dashboard.php?type=<?php echo $type; ?>">Volver al Dashboard</a></p>
    </body>
</html>
    <?php
}
?>

<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: index.php");
    exit;
}

$contenidosFile = './data/contenidos.json';
$contenidos = json_decode(file_get_contents($contenidosFile), true);

$type = $_GET['type'] ?? '';
$currentDataFile = './data/' . $type . '.json';

if (!empty($type) && file_exists($currentDataFile)) {
    $currentData = json_decode(file_get_contents($currentDataFile), true);
} else {
    $currentData = [];
}

// Obtener la estructura del tipo de contenido seleccionado
$currentTypeStructure = null;
foreach ($contenidos as $contentType) {
    if (isset($contentType[$type])) {
        $currentTypeStructure = $contentType[$type];
        break;
    }
}

// Manejar el formulario de adición/edición
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newEntry = [];
    foreach ($currentTypeStructure as $fieldName => $fieldType) {
        if ($fieldType == 'imagen' || $fieldType == 'archivo') {
            if (isset($_FILES[$fieldName]) && $_FILES[$fieldName]['error'] === UPLOAD_ERR_OK) {
                $fileName = basename($_FILES[$fieldName]['name']);
                $uploadDir = 'uploads/';
                $uploadFile = $uploadDir . $fileName;

                if (move_uploaded_file($_FILES[$fieldName]['tmp_name'], $uploadFile)) {
                    $newEntry[$fieldName] = $uploadFile;
                }
            }
        } else {
            $newEntry[$fieldName] = $_POST[$fieldName] ?? '';
        }
    }

    $currentData[] = $newEntry;
    file_put_contents($currentDataFile, json_encode($currentData));
    header("Location: dashboard.php?type=$type");
    exit;
}

// Función para mover elementos dentro del JSON
function move_entry(&$data, $fromIndex, $toIndex) {
    if ($toIndex >= 0 && $toIndex < count($data)) {
        $entry = $data[$fromIndex];
        array_splice($data, $fromIndex, 1);
        array_splice($data, $toIndex, 0, [$entry]);
    }
}

$action = $_GET['action'] ?? '';
$index = $_GET['index'] ?? '';

if ($action === 'move_up') {
    move_entry($currentData, $index, $index - 1);
    file_put_contents($currentDataFile, json_encode($currentData));
    header("Location: dashboard.php?type=$type");
    exit;
} elseif ($action === 'move_down') {
    move_entry($currentData, $index, $index + 1);
    file_put_contents($currentDataFile, json_encode($currentData));
    header("Location: dashboard.php?type=$type");
    exit;
} elseif ($action === 'delete_entry') {
    if (!empty($currentTypeStructure)) {
        foreach ($currentTypeStructure as $fieldName => $fieldType) {
            if (($fieldType == 'imagen' || $fieldType == 'archivo') && file_exists($currentData[$index][$fieldName])) {
                unlink($currentData[$index][$fieldName]);
            }
        }
    }

    unset($currentData[$index]);
    file_put_contents($currentDataFile, json_encode(array_values($currentData)));
    header("Location: dashboard.php?type=$type");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestión de <?php echo ucfirst($type); ?></title>
    <link rel="stylesheet" type="text/css" href="./assets/css/admin_styles.css"> 
</head>
<body>
    <h2>Dashboard</h2>
    <h3>Selecciona el tipo de contenido que deseas gestionar:</h3>
    <ul>
        <?php foreach ($contenidos as $contentType): ?>
            <?php foreach ($contentType as $typeName => $fields): ?>
                <li><a href="dashboard.php?type=<?php echo urlencode($typeName); ?>"><?php echo ucfirst($typeName); ?></a></li>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </ul>

    <p><a class="action-link" href="logout.php">Cerrar sesión</a></p> <!-- Enlace para cerrar sesión -->

    <h2>Gestión de <?php echo ucfirst($type); ?></h2>

    <h3><a class="btn-link" href="cms.php?type=<?php echo $type; ?>&action=add_entry">Agregar contenido a <?php echo ucfirst($type); ?></a></h3> <!-- Enlace para agregar contenido -->

    <?php if (count($currentData) > 0): ?>
 
        <h3>Lista de <?php echo ucfirst($type); ?></h3>
        <table border="1">
            <tr>
                <?php foreach (array_keys($currentTypeStructure) as $fieldName): ?>
                    <th><?php echo ucfirst($fieldName); ?></th>
                <?php endforeach; ?>
                <th>Acciones</th>
            </tr>
            <?php foreach ($currentData as $index => $entry): ?>
                <tr>
                    <?php foreach ($currentTypeStructure as $fieldName => $fieldType): ?>
                        <td>
                            <?php if ($fieldType == 'imagen' || $fieldType == 'archivo'): ?>
                                <?php echo htmlspecialchars(basename($entry[$fieldName])); ?>
                            <?php else: ?>
                                <?php echo htmlspecialchars($entry[$fieldName]); ?>
                            <?php endif; ?>
                        </td>
                    <?php endforeach; ?>
                    <td>
                        <?php if ($index > 0): ?>
                            <a href="dashboard.php?type=<?php echo $type; ?>&action=move_up&index=<?php echo $index; ?>">↑ Mover Arriba</a> |
                        <?php endif; ?>
                        <?php if ($index < count($currentData) - 1): ?>
                            <a href="dashboard.php?type=<?php echo $type; ?>&action=move_down&index=<?php echo $index; ?>">↓ Mover Abajo</a> |
                        <?php endif; ?>
                        <a href="cms.php?type=<?php echo $type; ?>&action=edit_entry&index=<?php echo $index; ?>">Editar</a> |
                        <a href="dashboard.php?type=<?php echo $type; ?>&action=delete_entry&index=<?php echo $index; ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este <?php echo $type; ?>?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <p><a class="btn-link" href="dashboard.php">Volver al Dashboard</a></p>
    <?php endif; ?>
</body>
</html>

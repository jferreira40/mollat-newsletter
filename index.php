<?php
session_start();
$_SESSION['test'] = 'test';

if ($_SERVER['SERVER_NAME'] === 'localhost' || $_SERVER['SERVER_NAME'] === 'www.localhost') {
    $BASE_DIR = 'localhost:8888';
} else $BASE_DIR = 'https://'.$_SERVER['SERVER_NAME'];

// On génère une constante contenant le chemin vers la racine publique du projet
define('ROOT', 'http://'.str_replace('index.php','',$BASE_DIR.$_SERVER['SCRIPT_NAME']));

// On sépare les paramètres et on les met dans le tableau $params
$params = explode('/', $_GET['p']);

// Si au moins 1 paramètre existe
if($params[0] != "") {
    // On sauvegarde le 1er paramètre dans $controller en mettant sa 1ère lettre en majuscule
    $controller = ucfirst($params[0]).'Controller';

    // On sauvegarde le 2ème paramètre dans $action si il existe, sinon index
    $action = isset($params[1]) ? $params[1] : 'index';

    // On appelle le contrôleur
    require_once('Controller/'.$controller.'.php');

    // On instancie le contrôleur
    $controller = new $controller();

    if (method_exists($controller, $action)){
        // On supprime les 2 premiers paramètres
        unset($params[0]);
        unset($params[1]);
        $Content = call_user_func_array([$controller,$action], $params);;
        $_SESSION['data'] = extract($Content['data']);
    } else {
        http_response_code(404);
        echo "La page recherchée n'existe pas";
    }
} else {
    // Ici aucun paramètre n'est défini
    // On appelle le contrôleur par défaut
    /* require_once(ROOT.'Controller/Main.php');

    // On instancie le contrôleur
    $controller = new Main(); */

    // On appelle la méthode index
    $Content = [
        'file' => ('View/pages/home.php'),
        'data' => []
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Administration - Mollat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<!--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo ROOT ?>assets/css/sidebars.css">
    <link rel="stylesheet" type="text/css" href="<?php echo ROOT ?>assets/css/styles.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo ROOT ?>assets/css/editor.css" />
    <script src="<?php echo ROOT ?>assets/js/sidebars.js"></script>

    <!-- GrapesJS import -->
    <link rel="stylesheet" href="https://unpkg.com/grapesjs/dist/css/grapes.min.css">
    <script src="https://unpkg.com/grapesjs"></script>
    <script src="<?php echo ROOT ?>assets/grapesjs/modules/grapesjs-mjml.min.js"></script>
</head>

<body>
    <div class="fluid-container">
        <?php include 'View/components/header.php' ?>
        <main class="d-flex">
            <?php include 'View/components/sidebar.php' ?>
            <?php include $Content['file'] ?>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="<?php echo ROOT ?>assets/grapesjs/editor.js"></script>
</body>
</html>

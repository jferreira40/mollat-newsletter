<?php
session_start();

include_once '_env.php';

if ($_SERVER['SERVER_NAME'] === 'localhost' || $_SERVER['SERVER_NAME'] === 'www.localhost' || isset($HOST)) {
    $BASE_DIR = "$HOST";
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
    if (file_exists('Controller/'.$controller.'.php')) {
        // On instancie le contrôleur
        require_once('Controller/'.$controller.'.php');
        $controller = new $controller();

        if (method_exists($controller, $action)){
            unset($params[0]);
            unset($params[1]);
            $Content = call_user_func_array([$controller,$action], $params);
            $_SESSION['data'] = extract($Content['data']);
        } else {
            http_response_code(404);
            echo "La page recherchée n'existe pas";
        }
    } else {
        $Content = [
            'file' => ('View/pages/not_found.php'),
            'data' => []
        ];
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
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Administration - Mollat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />-->
    <link rel="stylesheet" href="<?php echo ROOT ?>assets/css/sidebars.css">
    <link rel="stylesheet" type="text/css" href="<?php echo ROOT ?>assets/css/styles.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo ROOT ?>assets/css/editor.css" />
    <link rel="shortcut icon" type="image/jpg" href="<?php echo ROOT ?>assets/images/favicon.ico"/>
    <script src="<?php echo ROOT ?>assets/js/sidebars.js"></script>

    <!-- GrapesJS import -->
    <link rel="stylesheet" href="https://unpkg.com/grapesjs/dist/css/grapes.min.css">
    <script src="https://unpkg.com/grapesjs"></script>
    <script src="<?php echo ROOT ?>assets/grapesjs/modules/grapesjs-mjml/dist/grapesjs-mjml.min.js"></script>
    <script src="<?php echo ROOT ?>assets/grapesjs/modules/grapesjs-preset-webpage/dist/grapesjs-preset-webpage.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo ROOT ?>assets/css/fa-fix.css" />
</head>

<body>
    <div class="fluid-container">
        <?php include 'View/components/header.php' ?>
        <main class="d-flex">
            <?php include 'View/components/sidebar.php' ?>
            <?php include $Content['file'] ?>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="<?php echo ROOT ?>assets/grapesjs/mocked-data.js"></script>
    <script src="<?php echo ROOT ?>assets/grapesjs/mocked-events.js"></script>
    <script src="<?php echo ROOT ?>assets/grapesjs/mocked-folders.js"></script>
    <script src="<?php echo ROOT ?>assets/grapesjs/editor.js"></script>
    <script src="<?php echo ROOT ?>assets/grapesjs/PageEditor.js"></script>
</body>
</html>

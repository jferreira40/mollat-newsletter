<?php
if ($_SERVER['SERVER_NAME'] === 'localhost' || $_SERVER['SERVER_NAME'] === 'www.localhost') {
    $BASE_DIR = 'http://www.localhost:8888' . $_SERVER['REQUEST_URI'];
}
else $BASE_DIR = 'https://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

function active($currect_page){
    $url_array =  explode('/', $_SERVER['REQUEST_URI']);
    $url = $url_array[2];
    if(in_array($url, $currect_page)) echo 'active';
    else echo 'text-white';
}
?>

<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 260px;">
    <a href="<?php echo ROOT ?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <img src="https://avatars.githubusercontent.com/u/23724953?s=200&v=4" alt="" width="32" height="32" class="rounded-circle mr-2">
        <div class="d-flex flex-column">
            <strong>ecv@mollat-adm.com</strong>
            <div class="text-green">
                <span class="text-green">🟢 online</span>
            </div>
        </div>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="<?php echo ROOT ?>" class="nav-link <?php active(['']); ?>" aria-current="page">
                <i class="fas fa-home"></i>&nbsp;
                Accueil
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
                <i class="fas fa-users"></i>&nbsp;
                Gestion des comptes
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
                <i class="fas fa-image"></i>&nbsp;
                Médias
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
                <i class="fas fa-pen-square"></i>&nbsp;
                Gestion éditoriale
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
                <i class="fas fa-pager"></i>&nbsp;
                Gestion des pages
            </a>
        </li>
        <li class="ml-4">
            <div class="dropdown">
                <a href="#" class="nav-link <?php active(['newsletter', 'templates', 'journal']) ?> d-flex
                align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownNews" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-newspaper"></i>&nbsp;
                    Newsletters
                </a>
                <ul class="dropdown-menu bg-dark text-small shadow" aria-labelledby="dropdownNews">
                    <li><a class="dropdown-item text-white <?php active(['newsletter']); ?>" href="<?php echo ROOT ?>newsletter">Gestion</a></li>
                    <li><a class="dropdown-item text-white <?php active(['templates']); ?>" href="<?php echo ROOT ?>templates">Templates</a></li>
                    <li><a class="dropdown-item text-white <?php active(['journal']); ?>" href="<?php echo ROOT ?>journal">Journal d'envoi</a></li>
                </ul>
            </div>
        </li>
        <li class="ml-4">
            <div class="dropdown">
                <a href="#" class="nav-link <?php active(['pages']) ?> d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownOthers" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-list-alt"></i>&nbsp;
                    Autres
                </a>
                <ul class="dropdown-menu bg-dark text-small shadow" aria-labelledby="dropdownOthers">
                    <li><a class="dropdown-item text-white" href="#">Pages statiques</a></li>
                    <li><a class="dropdown-item text-white <?php active(['pages']); ?>" href="<?php echo ROOT ?>pages">Pages éphémères</a></li>
                    <li><a class="dropdown-item text-white" href="#">Personnalisation</a></li>
                    <li><a class="dropdown-item text-white" href="#">Surcharge Electre</a></li>
                    <li><a class="dropdown-item text-white" href="#">Ajouter une couverture</a></li>
                </ul>
            </div>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
                <i class="fas fa-shopping-cart"></i>&nbsp;
                Affiliation
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
                <i class="fas fa-chart-line"></i>&nbsp;
                Analytics
            </a>
        </li>
    </ul>
</div>

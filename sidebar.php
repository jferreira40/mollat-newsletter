<?php

function active($currect_page){
    $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
    $url = end($url_array);
    if($currect_page == $url) echo 'active';
    else echo 'text-white';
}
?>

<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 260px;">
    <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <img src="https://avatars.githubusercontent.com/u/23724953?s=200&v=4" alt="" width="32" height="32" class="rounded-circle me-2">
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
            <a href="index.php" class="nav-link <?php active('index.php');?>" aria-current="page">
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
        <li>
            <a href="newsletter.php" class="nav-link text-white <?php active('newsletter.php');?>">
                <i class="fas fa-newspaper"></i>&nbsp;
                Newsletter
            </a>
        </li>
        <li class="ml-4">
            <div class="dropdown">
                <a href="#" class="nav-link d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownOthers" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-list-alt"></i>&nbsp;
                    Autres
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownOthers">
                    <li><a class="dropdown-item" href="#">Pages statiques</a></li>
                    <li><a class="dropdown-item" href="#">Pages éphémères</a></li>
                    <li><a class="dropdown-item" href="#">Personnalisation</a></li>
                    <li><a class="dropdown-item" href="#">Surcharge Electre</a></li>
                    <li><a class="dropdown-item" href="#">Ajouter une couverture</a></li>
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

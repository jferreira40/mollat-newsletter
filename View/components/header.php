<?php
if ($_SERVER['SERVER_NAME'] === 'localhost' || $_SERVER['SERVER_NAME'] === 'www.localhost') {
    $BASE_DIR = 'http://www.localhost:8888' . $_SERVER['REQUEST_URI'];
}
else $BASE_DIR = 'https://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

?>

<header class="d-flex flex-wrap bg-white justify-content-center py-3 border-bottom">
    <a href="<?php echo $BASE_DIR ?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
        <span class="fs-4"><b>Mollat</b>Adm</span>
    </a>
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a href="#" class="d-flex align-items-center text-bleu-mollat text-decoration-none">
                <img src="https://avatars.githubusercontent.com/u/23724953?s=200&v=4" alt="" width="32" height="32" class="rounded-circle border border-dark border-1 me-2">
                <strong>ecv@mollat-adm.com</strong>
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
            </a>
        </li>
        <li class="nav-item">
            <button type="button" class="btn btn-settings btn-outline-mollat no-border">
                <i class="fas fa-cogs"></i>
            </button>
        </li>
    </ul>
</header>

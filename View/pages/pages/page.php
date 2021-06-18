<div class="content d-flex flex-column w-100 p-4">
    <a href="<?php echo ROOT ?>pages" class="text-decoration-none mb-3">
        <i class="fas fa-arrow-left"></i> Retour
    </a>
    <?php if(isset($page) && $page['id']) : ?>
        <h2>Éditer la page éphémère</h2>
        <form role="form">
            <div class="d-flex flex-column mt-4">
                <div class="input-group w-25 input-group-md mb-3">
                    <span class="input-group-text" id="input_page_title">Nom</span>
                    <input
                        type="text"
                        name="page_title"
                        id="page_title"
                        placeholder="<?php echo $page['title'] ?>" value="<?php echo $page['title'] ?>"
                        class="form-control"
                        aria-label="Titre du template"
                        aria-describedby="input_page_title">
                </div>
                <div class="input-group w-25 input-group-md mb-3">
                    <span class="input-group-text" id="input_page_url">URL</span>
                    <input
                        type="text"
                        name="page_url"
                        id="page_url"
                        placeholder="<?php echo $page['url'] ?>" value="<?php echo $page['url'] ?>"
                        class="form-control"
                        aria-label="URL de la page"
                        aria-describedby="input_page_url">
                </div>
            </div>
            <div id="gjs_page">
                <?php echo $page['description'] ?>
            </div>
            <div class="col-12 mt-2 text-end">
                <button id="save_page" type="submit" class="btn btn-success">Modifier</button>
            </div>
        </form>
    <?php else : ?>
        <h2>Créer une nouvelle page éphémère</h2>
        <form role="form">
            <div class="d-flex flex-column mt-4">
                <div class="input-group w-25 input-group-md mb-3">
                    <span class="input-group-text" id="input_page_title">Nom</span>
                    <input
                        type="text"
                        name="page_title"
                        id="page_title"
                        placeholder="Nom du template"
                        class="form-control"
                        aria-label="Titre du template"
                        aria-describedby="input_page_title">
                </div>
                <div class="input-group w-25 input-group-md mb-3">
                    <span class="input-group-text" id="input_page_url">URL</span>
                    <input
                        type="text"
                        name="page_url"
                        id="page_url"
                        placeholder="URL de la page"
                        class="form-control"
                        aria-label="URL de la page"
                        aria-describedby="input_page_url">
                </div>
            </div>
            <div id="gjs_page">
                <h2>Nouvelle page</h2>
            </div>
            <div class="col-12 mt-2 text-end">
                <button id="save_new_page" type="submit" class="btn btn-success">Enregistrer</button>
            </div>
        </form>
    <?php endif; ?>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        <?php if(isset($page) && $page['id']) : ?>
        document.getElementById('save_page').addEventListener('click', (e) => {
            e.preventDefault()
            const rootPath = <?php echo json_encode(ROOT) ?>;
            const pageID = <?php echo $page['id'] ?>;
            const pageTitle = document.getElementById('page_title').value
            const pageURL = document.getElementById('page_url').value
            const pageDescription = PageEditor.getHtml()

            let formData = new FormData();
            formData.append('title', pageTitle);
            formData.append('description', pageDescription);
            formData.append('url', pageURL);

            fetch(`${rootPath}pages/update/${pageID}`, {
                body: formData,
                method: "post"
            })
                .then((response) => response.json())
                .then((res) => window.location.reload(false));
        });
        <?php else : ?>
        document.getElementById('save_new_page').addEventListener('click', (e) => {
            e.preventDefault()
            const rootPath = <?php echo json_encode(ROOT) ?>;
            const pageTitle = document.getElementById('page_title').value
            const pageURL = document.getElementById('page_url').value
            const pageDescription = PageEditor.getHtml()

            let formData = new FormData();
            formData.append('title', pageTitle);
            formData.append('description', pageDescription);
            formData.append('url', pageURL);

            fetch(`${rootPath}pages/store`, {
                body: formData,
                method: "post"
            })
                .then((response) => response.json())
                .then((res) => window.location.href=rootPath+"pages/show/"+res.data);
        });
        <?php endif ?>
        window.onbeforeunload = function() {
            return;
        };
    });
    window.onbeforeunload = function() {
        return;
    };
</script>

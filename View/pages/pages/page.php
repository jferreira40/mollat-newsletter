<div class="content d-flex flex-column w-100 p-4">
    <a href="<?php echo ROOT ?>pages" class="text-decoration-none mb-3">
        <i class="fas fa-arrow-left"></i> Retour
    </a>
    <?php if(isset($page) && $page['id']) : ?>
        <h2>Éditer la page éphémère</h2>
        <form role="form">
            <div class="d-flex flex-row mb-4">
                <div class="input-group w-25 input-group-md mb-3">
                    <span class="input-group-text" id="input_page_name">Nom</span>
                    <input
                        type="text"
                        name="page_name"
                        id="page_name"
                        placeholder="Nom de la page" value="<?php echo $page['name'] ?>"
                        class="form-control"
                        aria-label="Nom de la page"
                        aria-describedby="input_page_name">
                </div>&nbsp;&nbsp;
                <div class="input-group w-25 input-group-md mb-3">
                    <span class="input-group-text" id="input_page_url">URL</span>
                    <input
                        type="text"
                        name="page_url"
                        id="page_url"
                        placeholder="URL de la page" value="<?php echo $page['url'] ?>"
                        class="form-control"
                        aria-label="URL de la page"
                        aria-describedby="input_page_url">
                </div>
            </div>
            <h4>SEO</h4>
            <div class="d-flex flex-row">
                <div class="input-group w-25 input-group-md mb-3">
                    <span class="input-group-text" id="input_page_title">Title</span>
                    <input
                        type="text"
                        name="page_title"
                        id="page_title"
                        placeholder="Balise title de la page" value="<?php echo $page['title'] ?>"
                        class="form-control"
                        aria-label="Balise title de la page"
                        aria-describedby="input_page_title">
                </div>
            </div>
            <div class="input-group w-25 input-group-md mb-3">
                <span class="input-group-text" id="input_page_description">Description</span>
                <textarea
                    name="page_description"
                    id="page_description"
                    placeholder="<?php echo $page['description'] ?>"
                    class="form-control"
                    aria-label="Meta description de la page"
                    aria-describedby="input_page_description"><?php echo $page['description'] ?></textarea>
            </div>
            <div class="col-12 mb-2 text-right">
                <button id="save_page" type="submit" class="btn btn-success">Enregistrer</button>
            </div>
            <div id="gjs_page">
                <?php echo $page['content'] ?>
            </div>
        </form>
    <?php else : ?>
        <h2>Créer une nouvelle page éphémère</h2>
        <form role="form">
            <div class="d-flex flex-row mb-4">
                <div class="input-group w-25 input-group-md mb-3">
                    <span class="input-group-text" id="input_page_name">Nom</span>
                    <input
                        type="text"
                        name="page_name"
                        id="page_name"
                        placeholder="Nom de la page"
                        class="form-control"
                        aria-label="Nom de la page"
                        aria-describedby="input_page_name">
                </div>&nbsp;&nbsp;
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
            <h4>SEO</h4>
            <div class="d-flex flex-row">
                <div class="input-group w-25 input-group-md mb-3">
                    <span class="input-group-text" id="input_page_title">Title</span>
                    <input
                        type="text"
                        name="page_title"
                        id="page_title"
                        placeholder="Balise title de la page"
                        class="form-control"
                        aria-label="Balise title de la page"
                        aria-describedby="input_page_title">
                </div>
            </div>
            <div class="input-group w-25 input-group-md mb-3">
                <span class="input-group-text" id="input_page_description">Description</span>
                <textarea
                    name="page_description"
                    id="page_description"
                    placeholder="Meta description de la page"
                    class="form-control"
                    aria-label="Meta description de la page"
                    aria-describedby="input_page_description"></textarea>
            </div>
            <div id="gjs_page">
                <h2>Nouvelle page</h2>
            </div>
            <div class="col-12 mt-2 text-right">
                <button id="save_new_page" type="submit" class="btn btn-success">Enregistrer</button>
            </div>
        </form>
    <?php endif; ?>
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" style="position: fixed; bottom: 1rem; left: 1rem; z-index: 9">
        <div class="toast-header" style="background-color: #218838; color: #fff">
            <img src="<?php echo ROOT ?>assets/images/favicon.ico" class="rounded mr-2" alt="Mollat" style="width: 18px">
            <strong class="mr-auto">
                La page a bien été crée / modifiée !
            </strong>
            <small class="text-muted"></small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        <?php if(isset($page) && $page['id']) : ?>
        document.getElementById('save_page').addEventListener('click', (e) => {
            e.preventDefault()
            const rootPath = <?php echo json_encode(ROOT) ?>;
            const pageID = <?php echo $page['id'] ?>;
            const pageName = document.getElementById('page_name').value
            const pageTitle = document.getElementById('page_title').value
            const pageDescription = document.getElementById('page_description').value
            const pageURL = document.getElementById('page_url').value
            const pageContent = PageEditor.getHtml()

            if (pageName.trim().length < 1 ||
                pageContent.trim().length < 1
            ) {
                return alert('Merci de renseigner tous les champs.')
            }

            let formData = new FormData();
            formData.append('name', pageName);
            formData.append('title', pageTitle);
            formData.append('description', pageDescription);
            formData.append('content', pageContent);
            formData.append('url', pageURL);

            fetch(`${rootPath}pages/update/${pageID}`, {
                body: formData,
                method: "post"
            })
                .then((response) => response.json())
                .then((res) => {
                    $('.toast').toast({delay: 2000})
                    $('.toast').toast('show')
                    setTimeout(() => {
                        window.location.reload(false)
                    }, 2100)
                });
        });
        <?php else : ?>
        document.getElementById('save_new_page').addEventListener('click', (e) => {
            e.preventDefault()
            const rootPath = <?php echo json_encode(ROOT) ?>;
            const pageName = document.getElementById('page_name').value
            const pageTitle = document.getElementById('page_title').value
            const pageDescription = document.getElementById('page_description').value
            const pageURL = document.getElementById('page_url').value
            const pageContent = PageEditor.getHtml()

            if (pageName.trim().length < 1 ||
                pageContent.trim().length < 1
            ) {
                return alert('Merci de renseigner tous les champs.')
            }

            let formData = new FormData();
            formData.append('name', pageName);
            formData.append('title', pageTitle);
            formData.append('description', pageDescription);
            formData.append('content', pageContent);
            formData.append('url', pageURL);

            fetch(`${rootPath}pages/store`, {
                body: formData,
                method: "post"
            })
                .then((response) => response.json())
                .then((res) => {
                    $('.toast').toast({delay: 2000})
                    $('.toast').toast('show')
                    setTimeout(() => {
                        window.location.href = rootPath + "pages/show/" + res.data
                    }, 2100)
                });
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

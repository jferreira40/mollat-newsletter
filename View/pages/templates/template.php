<div class="content d-flex flex-column w-100 p-4">
    <a href="<?php echo ROOT ?>templates" class="text-decoration-none mb-3">
        <i class="fas fa-arrow-left"></i> Retour
    </a>
    <?php if(isset($template) && $template['content']) : ?>
        <h2>Éditer le template</h2>
        <form role="form">
            <div class="d-flex flex-column mt-4">
                <div class="input-group w-25 input-group-md mb-3">
                    <span class="input-group-text" id="input_temp_name">Nom</span>
                    <input
                            type="text"
                            name="temp_name"
                            id="temp_name"
                            placeholder="<?php echo $template['name'] ?>" value="<?php echo $template['name'] ?>"
                            class="form-control"
                            aria-label="Titre du template"
                            aria-describedby="input_temp_name">
                </div>
            </div>
            <div class="col-12 mt-2 text-right">
                <button id="save_template" type="submit" class="btn btn-success">Modifier</button>
            </div>
            <div class="alert alert-danger mt-5 mb-2" role="alert">
                Pour tout ajout d'images, les images doivent déjà être en ligne.
            </div>
            <div id="gjs">
                <?php echo $template['content'] ?>
            </div>
        </form>
    <?php else : ?>
        <h2>Créer un nouveau template</h2>
        <form role="form">
            <div class="d-flex flex-column mt-4">
                <div class="input-group w-25 input-group-md mb-3">
                    <span class="input-group-text" id="input_temp_name">Nom</span>
                    <input
                            type="text"
                            name="temp_name"
                            id="temp_name"
                            placeholder="Nom du template"
                            class="form-control"
                            aria-label="Titre du template"
                            aria-describedby="input_temp_name">
                </div>
            </div>
            <div class="col-12 mt-2 text-right">
                <button id="save_new_template" type="submit" class="btn btn-success">Enregistrer</button>
            </div>
            <div class="alert alert-danger mt-5 mb-2" role="alert">
                Pour tout ajout d'images, les images doivent déjà être en ligne.
            </div>
            <div id="gjs">
                <mjml><mj-body><mj-section><mj-column>
                    <mj-text>Nouveau template</mj-text>
                </mj-column></mj-section></mj-body></mjml>
            </div>

        </form>
    <?php endif; ?>
</div>
<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" style="position: fixed; bottom: 1rem; left: 1rem; z-index: 9">
    <div class="toast-header" style="background-color: #218838; color: #fff">
        <img src="<?php echo ROOT ?>assets/images/favicon.ico" class="rounded mr-2" alt="Mollat" style="width: 18px">
        <strong class="mr-auto">
            Le template a bien été crée / modifié !
        </strong>
        <small class="text-muted"></small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        <?php if(isset($template) && $template['content']) : ?>
        document.getElementById('save_template').addEventListener('click', (e) => {
            e.preventDefault()
            const rootPath = <?php echo json_encode(ROOT) ?>;
            const templateID = <?php echo $template['id'] ?>;
            const templateName = document.getElementById('temp_name').value
            const templateContent = editor.getHtml()

            if (templateName.trim().length < 1 ||
                templateContent.trim().length < 1
            ) {
                return alert('Merci de renseigner tous les champs.')
            }

            let formData = new FormData();
            formData.append('name', templateName);
            formData.append('content', templateContent);

            fetch(`${rootPath}templates/update/${templateID}`, {
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
        document.getElementById('save_new_template').addEventListener('click', (e) => {
            e.preventDefault()
            const rootPath = <?php echo json_encode(ROOT) ?>;
            const templateName = document.getElementById('temp_name').value
            const templateContent = editor.getHtml()

            if (templateName.trim().length < 1 ||
                templateContent.trim().length < 1
            ) {
                return alert('Merci de renseigner tous les champs.')
            }

            let formData = new FormData();
            formData.append('name', templateName);
            formData.append('content', templateContent);

            fetch(`${rootPath}templates/store`, {
                body: formData,
                method: "post"
            })
                .then((response) => response.json())
                .then((res) => {
                    $('.toast').toast({delay: 2000})
                    $('.toast').toast('show')
                    setTimeout(() => {
                        window.location.href = rootPath + "templates/show/" + res.data
                    }, 2100)
                });
        });
        <?php endif ?>
    });
</script>

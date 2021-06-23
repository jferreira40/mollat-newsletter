<div class="content d-flex flex-column w-100 p-4">
    <a href="<?php echo ROOT ?>newsletter" class="text-decoration-none mb-3">
        <i class="fas fa-arrow-left"></i> Retour
    </a>
    <?php if(isset($news) && $news['content']) : ?>
        <h2>Éditer la newsletter</h2>
        <form role="form">
            <div class="d-flex flex-column mt-4">
                <div class="input-group w-25 input-group-md mb-3">
                    <span class="input-group-text" id="input_news_title">Titre</span>
                    <input
                        type="text"
                        id="news_title"
                        name="news_title"
                        placeholder="Titre de la newsletter" value="<?php echo $news['title'] ?>"
                        class="form-control"
                        aria-label="Titre de la news"
                        aria-describedby="input_news_title">
                </div>&nbsp;&nbsp;
                <div class="input-group w-50 input-group-md mb-3">
                    <span class="input-group-text" id="input_news_template">Modèle</span>
                    <select name="news_template" id="news_template" class="form-select" aria-label="Choix d'un template" aria-describedby="input_news_template">
                        <option value="0" selected>Aucun template choisi</option>
                        <?php foreach ($templates as $template): ?>
                            <option value="<?php echo $template['id'] ?>"><?php echo $template['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button id="apply_template" class="btn btn-warning">Appliquer</button>
                </div>
            </div>
            <div class="col-12 mt-2 text-right">
                <button id="save_newsletter" type="submit" class="btn btn-success">Modifier</button>
            </div>
            <div class="alert alert-warning mt-5 mb-2" role="alert">
                Chaque nouvelle image doit être insérée avec une URl suivant le format: https://www.site.com/mon-image
            </div>
            <div id="gjs">
                <?php echo $news['content'] ?>
                <style><?php echo $news['style'] ?></style>
            </div>
        </form>
    <?php else : ?>
        <h2>Créer une nouvelle newsletter</h2>
        <form role="form">
            <div class="d-flex flex-column mt-4">
                <div class="input-group w-25 input-group-md mb-3">
                    <span class="input-group-text" id="input_news_title">Titre</span>
                    <input
                        type="text"
                        name="news_title"
                        id="news_title"
                        placeholder="Titre de la newsletter"
                        class="form-control"
                        aria-label="Titre de la news"
                        aria-describedby="input_news_title">
                </div>&nbsp;&nbsp;
                <div class="input-group w-50 input-group-md mb-3">
                    <span class="input-group-text" id="input_news_template">Template</span>
                    <select name="news_template" id="news_template" class="form-select" aria-label="Choix d'un template" aria-describedby="input_news_template">
                        <option value="0" selected>Aucun template choisi</option>
                        <?php foreach ($templates as $template): ?>
                            <option value="<?php echo $template['id'] ?>"><?php echo $template['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button id="apply_template" class="btn btn-warning">Appliquer</button>
                </div>
            </div>
            <div class="col-12 mt-2 text-right">
                <button id="save_new_newsletter" type="submit" class="btn btn-success">Enregistrer</button>
            </div>
            <div class="alert alert-warning mt-5 mb-2" role="alert">
                Chaque nouvelle image doit être insérée avec une URl suivant le format: https://www.site.com/mon-image
            </div>
            <div id="gjs">
                <mjml><mj-body><mj-section><mj-column>
                    <mj-text>Nouvelle newsletter</mj-text>
                </mj-column></mj-section></mj-body></mjml>
            </div>
        </form>
    <?php endif; ?>
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" style="position: fixed; bottom: 1rem; left: 1rem; z-index: 9">
        <div class="toast-header" style="background-color: #218838; color: #fff">
            <img src="<?php echo ROOT ?>assets/images/favicon.ico" class="rounded mr-2" alt="Mollat" style="width: 18px">
            <strong class="mr-auto">
                La newsletter a bien été crée / modifiée !
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
    document.getElementById('apply_template').addEventListener('click', (e) => {
        e.preventDefault()
        const selectedTemplateID = document.getElementById('news_template').value
        if (selectedTemplateID != 0) {
            const templates = <?php echo json_encode($templates); ?>;
            const selectedTemplate = templates.filter(template => template.id == selectedTemplateID)[0]
            editor.setComponents(selectedTemplate.content+'<style>'+selectedTemplate.style+'</style>')
        } else alert('Merci de sélectionner un template.')
    });
    <?php if(isset($news) && $news['content']) : ?>
    document.getElementById('save_newsletter').addEventListener('click', async (e) => {
        e.preventDefault()
        const rootPath = <?php echo json_encode(ROOT) ?>;
        const newsID = <?php echo $news['id'] ?>;
        const newsTitle = document.getElementById('news_title').value
        const newsContent = editor.getHtml()
        const newsStyle = editor.getCss()

        if (newsTitle.trim().length < 1 ||
            newsContent.trim().length < 1
        ) {
            return alert('Merci de renseigner tous les champs.')
        }

        let formData = new FormData();
        formData.append('title', newsTitle);
        formData.append('content', newsContent);
        formData.append('style', newsStyle);

        fetch(`${rootPath}newsletter/update/${newsID}`, {
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
    document.getElementById('save_new_newsletter').addEventListener('click', (e) => {
        e.preventDefault()
        console.log('editor')
        const rootPath = <?php echo json_encode(ROOT) ?>;
        const newsTitle = document.getElementById('news_title').value
        const newsContent = editor.getHtml()
        const newsStyle = editor.getCss()

        if (newsTitle.trim().length < 1 ||
            newsContent.trim().length < 1
        ) {
            return alert('Merci de renseigner tous les champs.')
        }

        let formData = new FormData();
        formData.append('title', newsTitle);
        formData.append('content', newsContent);
        formData.append('style', newsStyle);

        fetch(`${rootPath}newsletter/store`, {
                body: formData,
                method: "post"
            })
            .then((response) => response.json())
            .then((res) => {
                $('.toast').toast({delay: 2000})
                $('.toast').toast('show')
                setTimeout(() => {
                    window.location.href = rootPath + "newsletter/show/" + res.data
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

<div class="content d-flex flex-column w-100 p-4">
    <a href="<?php echo ROOT ?>newsletter" class="text-decoration-none mb-3"><i class="fas fa-arrow-left"></i> Retour</a>
    <?php if(isset($news) && $news['content']) : ?>
        <h2>Éditer la newsletter</h2>
        <form role="form">
            <div class="d-flex flex-column mt-4">
                <div class="input-group w-25 input-group-md mb-3">
                    <span class="input-group-text" id="input_news_title">Titre</span>
                    <input
                        type="text"
                        name="news_title"
                        placeholder="<?php echo $news['title'] ?>" value="<?php echo $news['title'] ?>"
                        class="form-control"
                        aria-label="Titre de la news"
                        aria-describedby="input_news_title">
                </div>&nbsp;&nbsp;
                <div class="input-group w-25 input-group-md mb-3">
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
            <div id="gjs">
                <?php echo $news['content'] ?>
            </div>
            <div class="col-12 mt-2 text-end">
                <button id="save_newsletter" type="submit" class="btn btn-success">Modifier</button>
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
                        placeholder="Titre de la newsletter"
                        class="form-control"
                        aria-label="Titre de la news"
                        aria-describedby="input_news_title">
                </div>&nbsp;&nbsp;
                <div class="input-group w-25 input-group-md mb-3">
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
            <div id="gjs">
                <mjml><mj-body><mj-section><mj-column>
                    <mj-text>Nouvelle newsletter</mj-text>
                </mj-column></mj-section></mj-body></mjml>
            </div>
            <div class="col-12 mt-2 text-end">
                <button id="save_newsletter" type="submit" class="btn btn-success">Enregistrer</button>
            </div>
        </form>
    <?php endif; ?>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById('apply_template').addEventListener('click', (e) => {
        e.preventDefault()
        const selectedTemplateID = document.getElementById('news_template').value
        if (selectedTemplateID != 0) {
            const templates = <?php echo json_encode($templates); ?>;
            const selectedTemplate = templates.filter(template => template.id == selectedTemplateID)[0]
            editor.setComponents(selectedTemplate.content)
        } else alert('Merci de sélectionner un template.')
    });
    document.getElementById('save_newsletter').addEventListener('click', (e) => {
        e.preventDefault()
        alert('Update Newsletter')
    });
});
</script>

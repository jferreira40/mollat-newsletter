<div class="content d-flex flex-column w-100 p-4">
    <h2>Gestion des pages éphémères</h2>
    <div class="mt-4">
        <a href="<?php echo ROOT ?>pages/create" class="btn btn-info float-right"><i class="fas fa-plus mr-2"></i>  Nouvelle page éphémère</a>
    </div>
    <div class="listNews mt-2">
        <table class="table bg-white">
            <thead>
            <th>ID</th>
            <th>Titre</th>
            <th>URL</th>
            <th>SEO (title)</th>
            <th>SEO (description)</th>
            <th></th>
            </thead>

            <tbody>
            <?php
            foreach ($pages as $page) {
                $link_edit = ROOT.'pages/show/'.$page['id'];
                $link_replicate = ROOT.'pages/replicate/'.$page['id'];
                $link_destroy = ROOT.'pages/destroy/'.$page['id'];
                echo "<tr>";
                echo "<td>".$page['id']."</td>";
                echo "<td>".$page['name']."</td>";
                echo "<td>".$page['url']."</td>";
                echo "<td>".$page['title']."</td>";
                echo "<td>".$page['description']."</td>";
                echo "<td class='text-end'><a href='$link_edit' class='btn'><i class='fas fa-pen-square'></i></a>";
                echo "<a href='$link_replicate' class='btn'><i class='fas fa-copy'></i></a>";
                echo "<a href='$link_destroy' class='btn'><i class='fas fa-trash'></i></a></td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

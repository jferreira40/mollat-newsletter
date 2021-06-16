<div class="content d-flex flex-column w-100 p-4">
    <h2>Gestion des templates</h2>
    <div class="mt-4">
        <button class="btn btn-info float-end"><i class="fas fa-plus mr-2"></i>  Nouveau template</button>
    </div>
    <div class="listNews mt-2">
        <table class="table table-light">
            <thead>
            <th>ID</th>
            <th>Nom</th>
            <th></th>
            <th></th>
            </thead>

            <tbody>
            <?php
            foreach ($templates as $template) {
                $link_edit = ROOT.'templates/show/'.$template['id'];
                $link_destroy = ROOT.'templates/destroy/'.$template['id'];
                echo "<tr>";
                echo "<td>$template[id]</td>";
                echo "<td>$template[name]</td>";
                echo "<td><a href='$link_edit' class='btn'><i class='fas fa-pen-square'></i></a></td>";
                echo "<td><a href='$link_destroy' class='btn'><i class='fas fa-trash'></i></></td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

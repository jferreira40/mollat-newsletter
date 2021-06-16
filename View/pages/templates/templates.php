<div class="content d-flex flex-column w-100 p-4">
    <h2>Gestion des templates</h2>
    <div class="listNews">
        <table class="table table-light">
            <thead>
            <th>ID</th>
            <th>Name</th>
            <th></th>
            <th></th>
            </thead>

            <tbody>
            <?php
            foreach ($templates as $template) {
                echo "<tr>";
                echo "<td>$template[id]</td>";
                echo "<td>$template[name]</td>";
                echo "<td><button class='btn'><i class='fas fa-pen-square'></i></button></td>";
                echo "<td><button class='btn'><i class='fas fa-trash'></i></button></td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

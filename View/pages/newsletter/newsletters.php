<div class="content d-flex flex-column w-100 p-4">
    <h2>Gestion des newsletters</h2>
    <div class="listNews">
        <table class="table table-light">
            <thead>
            <th>ID</th>
            <th>Title</th>
            <th></th>
            <th></th>
            </thead>

            <tbody>
            <?php
            foreach ($_POST['news'] as $newsletter) {
                echo "<tr>";
                echo "<td>$newsletter->id</td>";
                echo "<td>$newsletter->title</td>";
                echo "<td><button class='btn'><i class='fas fa-pen-square'></i></button></td>";
                echo "<td><button class='btn'><i class='fas fa-trash'></i></button></td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

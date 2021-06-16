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
            foreach ($news as $newsletter) {
                $link_edit = ROOT.'newsletter/show/'.$newsletter['id'];
                $link_destroy = ROOT.'newsletter/destroy/'.$newsletter['id'];
                echo "<tr>";
                echo "<td>".$newsletter['id']."</td>";
                echo "<td>".$newsletter['title']."</td>";
                echo "<td><a href='$link_edit' class='btn'><i class='fas fa-pen-square'></i></a></td>";
                echo "<td><a href='$link_destroy' class='btn'><i class='fas fa-trash'></i></a></td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

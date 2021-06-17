<div class="content d-flex flex-column w-100 p-4">
    <h2>Gestion des newsletters</h2>
    <div class="mt-4">
        <a href="<?php echo ROOT ?>newsletter/create" class="btn btn-info float-end"><i class="fas fa-plus mr-2"></i>  Nouvelle newsletter</a>
    </div>
    <div class="listNews mt-2">
        <table class="table table-light">
            <thead>
            <th>ID</th>
            <th>Titre</th>
            <th></th>
            <th></th>
            <th></th>
            </thead>

            <tbody>
            <?php
            foreach ($news as $newsletter) {
                $link_edit = ROOT.'newsletter/show/'.$newsletter['id'];
                $link_replicate = ROOT.'newsletter/replicate/'.$newsletter['id'];
                $link_destroy = ROOT.'newsletter/destroy/'.$newsletter['id'];
                echo "<tr>";
                echo "<td>".$newsletter['id']."</td>";
                echo "<td>".$newsletter['title']."</td>";
                echo "<td><a href='$link_edit' class='btn'><i class='fas fa-pen-square'></i></a></td>";
                echo "<td><a href='$link_replicate' class='btn'><i class='fas fa-copy'></i></a></td>";
                echo "<td><a href='$link_destroy' class='btn'><i class='fas fa-trash'></i></a></td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

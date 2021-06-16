<div class="content d-flex flex-column w-100 p-4">
    <h2>Gestion des newsletters</h2>
    <div class="mt-4">
        <button class="btn btn-info float-end"><i class="fas fa-plus mr-2"></i>  Nouvelle newsletter</button>
    </div>
    <div class="listNews mt-2">
        <table class="table table-light">
            <thead>
            <th>ID</th>
            <th>Titre</th>
            <th></th>
            <th></th>
            </thead>

            <tbody>
            <?php
            foreach ($news as $newsletter) {
                $link = ROOT.'newsletter/edit?id='.$newsletter['id'];
                echo "<tr>";
                echo "<td>".$newsletter['id']."</td>";
                echo "<td>".$newsletter['title']."</td>";
                echo "<td><a href='$link' class='btn'><i class='fas fa-pen-square'></i></a></td>";
                echo "<td><button class='btn'><i class='fas fa-trash'></i></button></td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<div class="content d-flex flex-column w-100 p-4">
    <h2>Gestion des newsletters</h2>
    <div class="listNews">
        <ul>
            <?php
            foreach ($news as $newsletter) {
                $link = ROOT.'newsletter/edit?id='.$newsletter['id'];
                echo "<li><a href='$link'>".$newsletter['title']."</a></li>";
            }
            ?>
        </ul>
    </div>
</div>

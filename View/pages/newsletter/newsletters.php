<div class="content d-flex flex-column w-100 p-4">
    <h2>Gestion des newsletters</h2>
    <div class="listNews">
        <ul>
            <?php
            foreach ($_POST['news'] as $newsletter) {
                echo "<li>$newsletter</li>";
            }
            ?>
        </ul>
    </div>
</div>

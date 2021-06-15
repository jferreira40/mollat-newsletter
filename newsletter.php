<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Administration Newsletter - Mollat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <script src="js/sidebars.js"></script>
    <link rel="stylesheet" href="css/sidebars.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="stylesheet" type="text/css" href="css/editor.css" />
    <script src="js/sidebars.js"></script>
    <!-- GrapesJS import -->
    <link rel="stylesheet" href="https://unpkg.com/grapesjs/dist/css/grapes.min.css">
    <script src="https://unpkg.com/grapesjs"></script>
    <script src="grapesjs/modules/grapesjs-mjml.min.js"></script>
</head>

<body>
    <div class="fluid-container">
        <?php include 'header.php' ?>
        <main class="d-flex">
            <?php include 'sidebar.php' ?>
            <div class="content d-flex flex-column w-100 p-4">
                <h2>Gestion des newsletters</h2>
                <div id="gjs">
                    <mjml>
                        <mj-body>
                            <!-- Your MJML body here -->
                            <mj-section>
                                <mj-column>
                                    <mj-text>My Company</mj-text>
                                </mj-column>
                            </mj-section>
                        </mj-body>
                    </mjml>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="js/editor.js"></script>
</body>
</html>

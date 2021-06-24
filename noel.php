<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mollat & Noël 2021</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/sidebars.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/noel.css" />
    <link rel="shortcut icon" type="image/jpg" href="./assets/images/favicon.ico"/>
    <script src="./assets/js/sidebars.js"></script>
    <script src="./assets/js/snowstorm.js"></script>

    <link rel="stylesheet" type="text/css" href="./assets/css/fa-fix.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script>
        //snowStorm.snowColor = '#99ccff';   // blue-ish snow!?
        snowStorm.snowColor = '#99ccff';   // blue-ish snow!?
        snowStorm.flakesMaxActive = 96;    // show more snow on screen at once
        snowStorm.useTwinkleEffect = true; // let the snow flicker in and out of view
        snowStorm.targetElement = 'snowID';
    </script>
</head>

<body>
<img class="bg_left" src="./assets/images/noel/mollat_bg_left.png" alt="Bg Mollat Left">
<img class="bg_top" src="./assets/images/noel/mollat_bg_top.png" alt="Bg Mollat Nav">
<div class="fluid-container intro-container">
    <div class="intro_bg bg-bleu-secondary"></div>
    <div class="intro-content">
        <h1 class="text-nazare title text-center">Une expérience de partage entre Mollat & Vous</h1>
        <br />
        <p class="intro_desc text-montserrat text-justify">Compilation de couvertures de bande dessinée déconstruites puis reconstruites. L'auteur cherche à révéler la tension entre figuration et abstraction. En rendant le motif presque absent</p>
        <br /><br />
        <p class="text-center">
            <button id="btn_discover_popup" class="btn btn_discover_popup text-uppercase">DÉCOUVRIR LE POPUP STORE</button>
        </p>
        <div class="given_book_taken">
            <p class="text-center text-nazare">Donnez un livre, repartez avec un autre !</p>
            <img src="./assets/images/noel/Fleche.svg" alt="fleche">
        </div>
    </div>
</div>
<div id="aim_container" class="fluid-container aim_container">
    <main id="discover_main" class="discover_main d-flex justify-content-end">
        <div class="text-intro" style="flex-basis: 60%">
            <h3 class="text-christmas text-bleu-primary subtitle mollat_subtitle">Made by Mollat</h3>
            <h2 class="text-nazare title">Un marché de noël excusif centré autour du livre</h2>
            <p style="width: 90%" class="text-justify">
                <br />
                Compilation de couvertures de bande dessinée déconstruites puis reconstruites. L'auteur cherche à révéler la tension entre figuration et abstraction. En rendant le motif presque absent...
            </p>
        </div>
        <div class="d-flex justify-content-center" style="flex-basis: 40%">
            <img src="./assets/images/noel/Boutique.svg" alt="Librairie Mollat" style="width: 100%">
        </div>
    </main>
    <div class="parcours_container">
        <div id="parcours_overflow" class="hidden"></div>
        <img id="chemin" src="./assets/images/noel/Chemin.svg" alt="Chemin">
        <img class="parcours_item" id="createurs" src="./assets/images/noel/Stand_createur.svg" alt="Stand Créateurs">
        <img class="parcours_item" id="vinchaud" src="./assets/images/noel/Stand_vin_chaud.svg" alt="Stand Vin Chaud">
        <img class="parcours_item" id="ecrivains" src="./assets/images/noel/Stand_ecrivain.svg" alt="Stand Ecrivains">
        <img class="parcours_item" id="mollatetvous" src="./assets/images/noel/Mollatetvous.svg" alt="Stand Mollat et Vous">
        <img class="parcours_item" id="ecrivains2" src="./assets/images/noel/Stand_ecrivain_2.svg" alt="Stand Ecrivains 2">
        <img class="parcours_item" id="concert" src="./assets/images/noel/Stand_concert.svg" alt="Stand Concert">
        <img class="parcours_item" id="echanges" src="./assets/images/noel/Stand_echanges.svg" alt="Stand Echanges">
    </div>
</div>
<img class="bg_right" src="./assets/images/noel/mollat_bg_right.png" alt="Bg Mollat Right">
<div class="modal fade" id="myModal"  tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header align-items-end">
                <div class="modal-title w-100">
                    <div class="d-flex justify-content-between">
                        <p class="stand_title text-nazare"></p>
                        <p class="stand_nb text-montserrat"></p>
                    </div>
                </div>
                <button class="close text-montserrat" data-dismiss="modal">
                    <img src="./assets/images/noel/close.svg" alt="Fermer">
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <p class="modal_c_title text-montserrat"></p>
                <p class="modal_c_subtitle text-montserrat"></p>
                <p class="modal_c_description text-montserrat"></p>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer justify-content-start">
                <button type="button" class="btn btn_discover" data-dismiss="modal">Découvrir</button>
            </div>
    </div>
</div>
</div>
<div id="snowID"></div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<script>
    //snowStorm.snowColor = '#99ccff';   // blue-ish snow!?
    snowStorm.snowColor = '#99ccff';   // blue-ish snow!?
    snowStorm.flakesMaxActive = 96;    // show more snow on screen at once
    snowStorm.useTwinkleEffect = true; // let the snow flicker in and out of view
    snowStorm.snowStick = false;
    snowStorm.targetElement = 'snowID';

    $('td:contains("•")').css({'background-color': 'red'})

    // dataset
    const dataParcours = [
        {
            'createurs': {
                anchor: 'createurs',
                title: "Tout le temps",
                stand_title: 'Stand créateur',
                stand_nb: "Stand 3",
                creator: "Nom créateur",
                description: "Daft Punk were a French electronic music duo formed in 1993 in Paris by Guy-​Manuel de Homem-Christo and Thomas Bangalter.",
                alert: '',
                position: {
                    right: '12vw',
                    left: ''
                }
            },
            'vinchaud': {
                anchor: 'vinchaud',
                title: "Tout le temps",
                stand_title: 'Vin chaud',
                stand_nb: "Stand 4",
                creator: "Nom créateur",
                description: "Daft Punk were a French electronic music duo formed in 1993 in Paris by Guy-​Manuel de Homem-Christo and Thomas Bangalter.",
                alert: 'Merci de sortir dehors boire votre vin chaud',
                position: {
                    right: '',
                    left: '32vw'
                }
            },
            'ecrivains': {
                anchor: 'ecrivains',
                title: "Tout le temps",
                stand_title: 'Stand écrivain',
                stand_nb: "Stand 2",
                creator: "Nom créateur",
                description: "Daft Punk were a French electronic music duo formed in 1993 in Paris by Guy-​Manuel de Homem-Christo and Thomas Bangalter.",
                alert: '',
                position: {
                    right: '',
                    left: '24vw'
                }
            },
            'ecrivains2': {
                anchor: 'ecrivains2',
                title: "Tout le temps",
                stand_title: 'Stand écrivain',
                stand_nb: "Stand 1",
                creator: "Nom créateur",
                description: "Daft Punk were a French electronic music duo formed in 1993 in Paris by Guy-​Manuel de Homem-Christo and Thomas Bangalter.",
                alert: '',
                position: {
                    right: '',
                    left: '12vw'
                }
            },
            'mollatetvous': {
                anchor: 'mollatetvous',
                title: "Tout le temps",
                stand_title: 'Mollat & Vous',
                stand_nb: "",
                creator: "",
                description: "Daft Punk were a French electronic music duo formed in 1993 in Paris by Guy-​Manuel de Homem-Christo and Thomas Bangalter. Daft Punk were a French electronic music duo formed in 1993 in Paris by Guy-​Manuel de Homem-Christo and Thomas Bangalter. Daft Punk were a French electronic music duo formed in 1993 in Paris by Guy-​Manuel de Homem-Christo and Thomas Bangalter. Daft Punk were a French electronic music duo formed in 1993 in Paris by Guy-​Manuel de Homem-Christo and Thomas Bangalter.",
                alert: '',
                position: {
                    right: '8vw',
                    left: ''
                }
            },
            'echanges': {
                anchor: 'echanges',
                title: "A la sortie",
                stand_title: 'Échange livre',
                stand_nb: "18:00",
                creator: "",
                description: "Daft Punk were a French electronic music duo formed in 1993 in Paris by Guy-​Manuel de Homem-Christo and Thomas Bangalter.",
                alert: '',
                position: {
                    right: '',
                    left: '4vw'
                }
            },
            'concert': {
                anchor: 'concert',
                title: "Daft Punk",
                stand_title: 'Concert Salle Ausone',
                stand_nb: "18:00",
                creator: "",
                description: "Daft Punk were a French electronic music duo formed in 1993 in Paris by Guy-​Manuel de Homem-Christo and Thomas Bangalter.",
                alert: '',
                position: {
                    right: '',
                    left: '8vw'
                }
            }
        }
    ]

    // ScrollTo
    const id = 'aim_container';
    const yourElement = document.getElementById(id);
    const y = yourElement.getBoundingClientRect().top + window.pageYOffset;
    document.getElementById('btn_discover_popup').addEventListener('click', () => {
        window.scrollTo({top: (y - 120), behavior: 'smooth'});
    })

    // Clic parcours events
    const els = document.getElementsByClassName("parcours_item");
    Array.prototype.forEach.call(els, function(item) {
        item.addEventListener('click', (el) => {
            if (el.target.classList.contains('active')) el.target.classList.remove('active')
            else el.target.classList.add('active')
            toggleOverlay()
            //toggleOverflow()

            const currentItem = dataParcours.map((data) =>
                data[el.target.id]
            )[0]

            if (currentItem.position.right !== '') $('#myModal .modal-dialog').css({'margin-right': currentItem.position.right})
            if (currentItem.position.left !== '') $('#myModal .modal-dialog').css({'margin-left': currentItem.position.left})
            $('#myModal .stand_title').html(currentItem.stand_title)
            $('#myModal .stand_nb').html(currentItem.stand_nb)
            $('#myModal .modal_c_title').html(currentItem.title)
            $('#myModal .modal_c_subtitle').html(currentItem.creator)
            $('#myModal .modal_c_description').html(currentItem.description)

            // Show modal
            // Modal config
            $('#myModal').modal({
                backdrop: false
            })
        })
    })

    const toggleOverlay = () => {
        const overlay = document.getElementById('parcours_overflow')
        //overlay.classList.add('hidden')
        overlay.classList.toggle('hidden')
    }
    const toggleOverflow = () => {
        const body = document.body
        body.classList.toggle('fixed_scroll')
    }
    const clearParcours = () => {
        Array.prototype.forEach.call(els, function(item) {
            item.classList.remove('active')
        })
    }
    const clearModal = () => {
        $('#myModal .modal-dialog').css({'margin-right': 'auto', 'margin-left': 'auto'})
        $('#myModal .stand_title').html('')
        $('#myModal .stand_nb').html('')
        $('#myModal .modal_c_title').html('')
        $('#myModal .modal_c_subtitle').html('')
        $('#myModal .modal_c_description').html('')
    }

    $('#myModal').on('hide.bs.modal', function (event) {
        clearParcours()
        toggleOverlay()
        setTimeout(() => {
            clearModal()
        }, 500)
        // toggleOverflow()
    })
</script>
</body>
</html>

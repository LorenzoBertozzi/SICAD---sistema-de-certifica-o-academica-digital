<?php
    include('../../controller/protect.php');
    include("../admin/includes.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SICAD - Sistema Academico de Certificação Digital</title>
    <link rel="icon" href="assets/miniatura.png">
    <link rel="stylesheet" href="css/style.css">

</head>
<body id="organizador-pessoas">
    <?php 
        echo $nav;
        echo $aside;
        echo $modal_meus_eventos;
    ?>

    <section id="main-section">
        <div id="profile-info">
            <img src="assets/user_icon.png" alt=avatar>
            <div>
                <h2>NOME - evento</h2>
                <a href="##">https://nome do evento .com.br</a> 
            </div>
        </div>
        <h1 style="font-size: 35px; color: #333; font-weight: 500;">Pessoas</h1>
        <div id="buttons-organizador-pessoas">
            <ul>
                <li>
                    <button> 
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" margin="0" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                        </svg>
                        Adicionar Pessoas
                    </button>
                </li>
                <li>
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                        </svg>
                        Notificar pessoas
                    </button>
                </li>
                <li>
                    <button id="button-acoes">
                        Ações
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down" viewBox="0 0 16 16">
                            <path d="M3.204 5h9.592L8 10.481zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659"/>
                        </svg>
                    </button>
                </li>
                <li style="float: right;">
                    <form action="search" method="post">
                        <input type="search" name="pesquisa" placeholder="Busque Por Nome ou E-mail">
                    </form>
                </li>
            </ul>
        </div>

        <div>
            <div class="card-pessoa">
                <img src="assets/user_icon.png" style="height: 80px; width: 80px;">                
                <div style="margin: 28px 0px;">
                    <p style="font-weight: bold;">Lorenzo Jordani Bertozzi</p>
                    <p>lorenzobertozzi847@gmail.com</p>
                    <p>marcadores</p>
                </div>
            </div>
            <div class="card-pessoa">
                <img src="assets/user_icon.png" style="height: 80px; width: 80px;">                
                <div style="margin: 28px 0px;">
                    <p style="font-weight: bold;">Lorenzo Jordani Bertozzi</p>
                    <p>lorenzobertozzi847@gmail.com</p>
                    <p>marcadores</p>
                </div>
            </div>
            <div class="card-pessoa">
                <img src="assets/user_icon.png" style="height: 80px; width: 80px;">                
                <div style="margin: 28px 0px;">
                    <p style="font-weight: bold;">Lorenzo Jordani Bertozzi</p>
                    <p>lorenzobertozzi847@gmail.com</p>
                    <p>marcadores</p>
                </div>
            </div>
            
        </div>
    
        
    </section>



    <script src="../admin/script.js"></script>
</body>
</html>

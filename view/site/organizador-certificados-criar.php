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
            <img src="assets/imagem-evento.png" alt=avatar>
            <div>
                <h2>NOME - evento</h2>
                <a href="##">https://nome do evento .com.br</a> 
            </div>
        </div>
        <h1 style="font-size: 35px; color: #333; font-weight: 500;">Certificados</h1>
        <div id="buttons-organizador-pessoas">
            <ul>
                <li>
                    <button style="width: 80px;"> 
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" margin="0" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                        </svg>
                        Criar
                    </button>
                </li>
                <li>
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                        </svg>
                        Envio por E-mail
                    </button>
                </li>
                <li>
                    <button style="width: 120px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                            <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0"/>
                            <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z"/>
                        </svg>
                        Configurações
                    </button>
                </li>
            </ul>
        </div>
            <h1 style="font-size: 30px; color: #333; font-weight: 500; margin-top: 30px; display: inline;">Criar Certificados</h1>
            <button>Adicionar Certificado</button>
            <hr>
        <div>
            <table style="width: 100%;">
                <tr style="text-align: left;">
                    <th>TITULO</th>
                    <th>VALOR</th>
                    <th>MODELO</th>
                    <th>ATRIBUTO</th>
                    <th>STATUS</th>
                    <th>OPÇÔES</th>
                </tr>
                <tr>
                    <td>Certificado de Participação</td>
                    <td>Gratuito</td>
                    <td>Criar Modelo</td>
                    <td>Todos os Incritos</td>
                    <td>Não Publicado</td>
                    <td><button>Publicar</button><button>Envio</button></td>
                </tr>
            </table>
        </div>  
    </section>
    <script src="../admin/script.js"></script>
</body>
</html>

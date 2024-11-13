<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <link rel="stylesheet" href="/src/css/style-main.css">
</head>
<body class="body-main">
    
    <!-- We include the nav for the navigation menu -->
    <?php include '..\vistas\navbar.php'; ?>

    <!-- Start of the main block for the questions and answers section -->
    <div class="card mb-4 mb-lg-0 m-4 p-2" id="faq-css">
        <div class="card-body p-0" id="faq-gap-css">
            <!-- Main title of the FAQ section -->
            <div class="titol_faq"><h1>Preguntes i Respostes</h1></div>
            <hr>

            <!-- Question 1 -->
            <div class="faq-question">
                <h3>Quin tipus d’esdeveniments s’organitzen al poble?</h3>
                <span class="arrow"><i class="bi bi-caret-right-fill"></i></span> <!-- Arrow indicating that the question can be expanded -->
            </div>
            <div class="faq-answer">
                <p>Són principalment esdeveniments a l’aire lliure, com fires d’agricultura, tallers de reciclatge o caminades ecològiques. Inclouen activitats comunitàries, com neteja d’espais naturals o tallers d’horts urbans.</p>
            </div>
            <hr>

            <!-- Question 2 -->
            <div class="faq-question">
                <h3>Quins són els temes centrals d’aquests esdeveniments?</h3>
                <span class="arrow"><i class="bi bi-caret-right-fill"></i></span> <!-- Arrow indicating that the question can be expanded -->
            </div>
            <div class="faq-answer">
                <p>Hi ha un enfocament específic en temes com la sostenibilitat, energies renovables, alimentació saludable o biodiversitat local.</p>
            </div>
            <hr>

            <!-- Question 3 -->
            <div class="faq-question">
                <h3>Quin perfil de persones assisteix a aquests esdeveniments?</h3>
                <span class="arrow"><i class="bi bi-caret-right-fill"></i></span> <!-- Arrow indicating that the question can be expanded -->
            </div>
            <div class="faq-answer">
                <p>Són esdeveniments familiars, per a turistes interessats en l’ecologia, o pensats per a residents del poble. Hi ha activitats dirigides a diferents grups, com infants, joves, adults o gent gran.</p>
            </div>
            <hr>

            <!-- Question 4 -->
            <div class="faq-question">
                <h3>Quina importància tenen les imatges i descripcions de cada esdeveniment?</h3>
                <span class="arrow"><i class="bi bi-caret-right-fill"></i></span> <!-- Arrow indicating that the question can be expanded -->
            </div>
            <div class="faq-answer">
                <p>Es mostren fotos d’esdeveniments anteriors, mapes de localització o il·lustracions.</p>
            </div>
        </div>
    </div>
    

    <!-- We include the footer with additional information -->
    <?php include '..\vistas\footer.php'; ?>

    <!-- We invoke the JS file for the FAQ page functionality -->
    <script src="../js/faq-preguntes.js"></script>

</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preguntes i respostes</title>
    <link rel="stylesheet" href="/src/css/style-main.css">
</head>
<body>
    
    <!-- Inclou el nav per al menú de navegació -->
    <?php include '..\vistas\navbar.php'; ?>

    <!-- Inici del bloc principal de la secció de preguntes i respostes -->
    <div class="card mb-4 mb-lg-0 m-4 p-2" id="faq-css">
        <div class="card-body p-0" id="faq-gap-css">
            <!-- Títol principal de la secció FAQ -->
            <div class="titol_faq"><h1>Preguntes i Respostes</h1></div>
            <hr>

            <!-- Pregunta 1 -->
            <div class="faq-question">
                <h3>Quin tipus d’esdeveniments s’organitzen al poble?</h3>
                <span class="arrow"><i class="bi bi-caret-right-fill"></i></span> <!-- Flecha que indica que la pregunta pot desplegar-se -->
            </div>
            <div class="faq-answer">
                <p>Són principalment esdeveniments a l’aire lliure, com fires d’agricultura, tallers de reciclatge o caminades ecològiques. Inclouen activitats comunitàries, com neteja d’espais naturals o tallers d’horts urbans.</p>
            </div>
            <hr>

            <!-- Pregunta 2 -->
            <div class="faq-question">
                <h3>Quins són els temes centrals d’aquests esdeveniments?</h3>
                <span class="arrow"><i class="bi bi-caret-right-fill"></i></span> <!-- Flecha que indica que la pregunta pot desplegar-se -->
            </div>
            <div class="faq-answer">
                <p>Hi ha un enfocament específic en temes com la sostenibilitat, energies renovables, alimentació saludable o biodiversitat local.</p>
            </div>
            <hr>

            <!-- Pregunta 3 -->
            <div class="faq-question">
                <h3>Quin perfil de persones assisteix a aquests esdeveniments?</h3>
                <span class="arrow"><i class="bi bi-caret-right-fill"></i></span> <!-- Flecha que indica que la pregunta pot desplegar-se -->
            </div>
            <div class="faq-answer">
                <p>Són esdeveniments familiars, per a turistes interessats en l’ecologia, o pensats per a residents del poble. Hi ha activitats dirigides a diferents grups, com infants, joves, adults o gent gran.</p>
            </div>
            <hr>

            <!-- Pregunta 4 -->
            <div class="faq-question">
                <h3>Quina importància tenen les imatges i descripcions de cada esdeveniment?</h3>
                <span class="arrow"><i class="bi bi-caret-right-fill"></i></span> <!-- Flecha que indica que la pregunta pot desplegar-se -->
            </div>
            <div class="faq-answer">
                <p>Es mostren fotos d’esdeveniments anteriors, mapes de localització o il·lustracions.</p>
            </div>
        </div>
    </div>
    

    <!-- Inclou el footer amb informació addicional -->
    <?php include '..\vistas\footer.php'; ?>

    <!-- Script per gestionar el desplegament de les respostes de les preguntes -->
    <script>
        // Afegim un esdeveniment 'click' a cada pregunta FAQ
        document.querySelectorAll('.faq-question').forEach(function(question) {
            question.addEventListener('click', function() {
                // Alternem la classe 'open' per mostrar o amagar la resposta associada a la pregunta
                this.classList.toggle('open');
            });
        });
    </script>
</body>
</html>

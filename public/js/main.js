// Espera a que todo el contenido de la página esté cargado antes de ejecutar el código.
document.addEventListener("DOMContentLoaded", () => {
    // Manejo del formulario de edición de perfil
    const profileEditForm = document.getElementById("profileEditForm");
    const password = document.getElementById("password");
    const confirmPassword = document.getElementById("confirmPassword");
    const newPassword = document.getElementById("newPassword");
    const confirmNewPassword = document.getElementById("confirmNewPassword");

    if (profileEditForm && password && confirmPassword && newPassword && confirmNewPassword) {
        profileEditForm.addEventListener("submit", function (event) {
            // Validación de las contraseñas
            if (password.value !== confirmPassword.value) {
                confirmPassword.setCustomValidity("Las contraseñas no coinciden.");
            } else {
                confirmPassword.setCustomValidity("");
            }

            if (newPassword.value !== confirmNewPassword.value) {
                confirmNewPassword.setCustomValidity("Las nuevas contraseñas no coinciden.");
            } else {
                confirmNewPassword.setCustomValidity("");
            }

            // Evitar el envío si el formulario es inválido
            if (!profileEditForm.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }

            profileEditForm.classList.add("was-validated");
        });

        // Limpiar el mensaje de error cuando las contraseñas coincidan
        confirmPassword.addEventListener("input", function () {
            if (password.value === confirmPassword.value) {
                confirmPassword.setCustomValidity("");
            } else {
                confirmPassword.setCustomValidity("Las contraseñas no coinciden.");
            }
        });

        confirmNewPassword.addEventListener("input", function () {
            if (newPassword.value === confirmNewPassword.value) {
                confirmNewPassword.setCustomValidity("");
            } else {
                confirmNewPassword.setCustomValidity("Las nuevas contraseñas no coinciden.");
            }
        });
    }

    // Manejo de la calificación con estrellas
    const stars = document.querySelectorAll(".rating-stars i");
    let currentRating = 0;

    function highlightStars(index) {
        stars.forEach((star, i) => {
            if (i <= index) {
                star.classList.remove("far");
                star.classList.add("fas");
            } else {
                star.classList.remove("fas");
                star.classList.add("far");
            }
        });
    }

    if (stars.length > 0) {
        stars.forEach((star, index) => {
            // Evento de pasar el cursor por encima de una estrella
            star.addEventListener("mouseover", () => highlightStars(index));

            // Evento de quitar el cursor de las estrellas, resalta solo las seleccionadas
            star.addEventListener("mouseout", () => highlightStars(currentRating - 1));

            // Evento de hacer clic en una estrella para fijar la calificación
            star.addEventListener("click", () => {
                currentRating = index + 1;
                const ratingValue = document.querySelector("#ratingValue");
                if (ratingValue) {
                    ratingValue.value = currentRating;
                }
                highlightStars(index);
            });
        });
    }

    // Función para previsualizar la imagen de perfil
    function previewImage(event) {
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function (e) {
            const img = document.getElementById("profilePicture");
            if (img) {
                img.src = e.target.result;
            }
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }

    // Asignar la función de previsualización de imagen al input de archivo
    const profileImageInput = document.getElementById("profileImageInput");
    if (profileImageInput) {
        profileImageInput.addEventListener("change", previewImage);
    }
});



/*JQUERY*/

$(document).ready(function() {
    function checkScreenSize() {
        if (window.matchMedia("(max-width: 768px)").matches) {
            $('.scroll-arrow').hide();
        } else {
            $('.scroll-arrow').show();
        }
    }

    // Execute on page load
    checkScreenSize();

    // Execute when the window is resized
    $(window).resize(function() {
        checkScreenSize();
    });
});

$(document).ready(function() {
function checkScreenSize() {
    if (window.matchMedia("(max-width: 768px)").matches) {
        $('.scroll-arrow').hide();
        $('.carousel-indicators').hide(); // Añadido para ocultar los indicadores
    } else {
        $('.scroll-arrow').show();
        $('.carousel-indicators').show(); // Añadido para mostrar los indicadores
    }
}

// Ejecutar al cargar la página
checkScreenSize();

// Ejecutar cuando se redimensione la ventana
$(window).resize(function() {
    checkScreenSize();
});
});

$(document).ready(function() {
// Funcionalidad del scroll y carousel
function checkScreenSize() {
if (window.matchMedia("(max-width: 768px)").matches) {
    $('.scroll-arrow').hide();
    $('.carousel-indicators').hide();
} else {
    $('.scroll-arrow').show();
    $('.carousel-indicators').show();
}
}

checkScreenSize();
$(window).resize(checkScreenSize);

// Funcionalidad del footer acordeón
$('.footer-section h5').on('click', function(e) {
if (window.matchMedia("(max-width: 768px)").matches) {
    const $section = $(this).parent();
    
    // No aplicar a la sección de redes sociales
    if (!$section.find('.social-icons').length) {
        e.preventDefault();
        
        // Cerrar todas las otras secciones
        $('.footer-section').not($section).removeClass('active');
        
        // Toggle la sección actual
        $section.toggleClass('active');
    }
}
});
});
console.log('Buscando eventos...');
$('#search').on('keyup', function() {
    console.log('Buscando eventos...');
    var query = $(this).val();
    $.ajax({
        url: 'index.php?r=filterevents',
        method: 'POST',
        data: { search: query },
        success: function(data) {
            if (data.redirect) {
                window.location.href = data.redirect;
            } else {
                $('#search-results').html(data);
            }
        }
    });
}); 

/*Filter evenets  by type */
document.addEventListener("DOMContentLoaded", () => {
    const filterButtons = document.querySelectorAll('.filterbutton button');
            fetchFilteredEvents(filter);
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            fetchFilteredEvents(filter);
        });
    });
            method: 'POST',
    function fetchFilteredEvents(filter) {
        $.ajax({
            url: 'index.php?r=filterevents',
            method: 'POST',
            data: { filter: filter },
            success: function(data) {
                $('#search-results').html(data);
            },
            error: function() {
                $('#search-results').html('<p>Error al cargar los eventos.</p>');
            }
        });
    }
});
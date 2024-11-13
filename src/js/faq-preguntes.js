// Add a 'click' event to each FAQ question
document.querySelectorAll('.faq-question').forEach(function(question) {
    question.addEventListener('click', function() {
        // Toggle the 'open' class to show or hide the answer associated with the question
        this.classList.toggle('open');
    });
});

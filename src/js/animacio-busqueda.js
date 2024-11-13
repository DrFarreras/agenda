$(document).ready(function() {
    $('#searchIcon').click(function(event) {
        event.preventDefault(); // Prevents the default behavior of the search button

        // Checks if the search box is hidden
        if ($('#searchBox').css('display') === 'none') {
            // Sets the search box with an initial width of 0 and displays it to the left of the icon
            $('#searchBox').css({
                width: '0px',  // Initial width 0
                height: '4vh', // Fixed height of 20px
                display: 'inline-block', // Shows the search box
                marginTop: '1vh', // Small vertical spacing
                marginRight: '10px', // Adds space between the search box and the icon
                float: 'left', // Positions the search box to the left of the icon
                opacity: 0 // Starts with opacity 0 (invisible)
            }).animate({
                width: '25vh',  // Final width of the search box
                opacity: 1,     // Transitions opacity to 1 (fully visible)
                borderRadius: '10vh'
            });
        } else {
            // If the search box is visible, reduces it and hides it
            $('#searchBox').animate({
                width: '0px', // Reduces the width to 0
                opacity: 0    // Reduces opacity to 0 (hidden)
            }, 400, function() {
                $(this).css('display', 'none'); // Hides the search box
            });
        }
    });
});

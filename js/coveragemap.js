// Get all list items
var listItems = document.querySelectorAll('li');

// Loop through each list item
for (var i = 0; i < listItems.length; i++) {
    // Add mouseover event listener
    listItems[i].addEventListener('mouseover', function() {
        // Change the src attribute of the image
        document.getElementById('covemap').src = 'img/coverage_map-' + this.id + '.png';
    });

    // Add mouseout event listener
    listItems[i].addEventListener('mouseout', function() {
        // Change the src attribute of the image back to the original
        document.getElementById('covemap').src = 'img/coverage_map.png';
    });
}
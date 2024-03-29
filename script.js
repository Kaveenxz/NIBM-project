// search bar

document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchInput");
    const itemsContainer = document.getElementById("items-container");

    searchInput.addEventListener("input", function () {
        const searchQuery = searchInput.value.toLowerCase();
        const allItems = itemsContainer.querySelectorAll(".arrivels");

        allItems.forEach(function (item) {
            const itemName = item.querySelector("h5").textContent.toLowerCase();
            if (itemName.includes(searchQuery)) {
                item.style.display = "block";
            } else {
                item.style.display = "none";
            }
        });
    });
});


// navbar elemenet changer

var currentPageUrl = window.location.href;

var navLinks = document.querySelectorAll('.nav-bar a');

navLinks.forEach(function(link) {
    if (link.href === currentPageUrl) {
        link.parentNode.classList.add('active');
    }
});


function addToCart(itemName, price, imageUrl, category) {
    var url = './php/addToCart.php';

    var data = new URLSearchParams();
    data.append('item_name', itemName);
    data.append('price', price);
    data.append('image_url', imageUrl);
    data.append('category', category);

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: data
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.text();
    })
    .then(responseText => {
        console.log(responseText);
        alert("Item added to cart Successfully!");
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error.message);
    });
}

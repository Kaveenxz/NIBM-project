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


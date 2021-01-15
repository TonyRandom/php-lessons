function initMap() {
    // The location of Uluru
    const home = { lat: 56.170236, lng: 40.4413472 };
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 16,
        center: home,
    });
    // The marker, positioned at Uluru
    const marker = new google.maps.Marker({
        position: home,
        map: map,
    });
}
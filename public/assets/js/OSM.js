var map = L.map('map').setView([48.86, 2.35], 5);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);
var myMarker;

function searchPlace() {
    var place = document.getElementById('street').value,
        city = document.getElementById("city").value,
        postal = document.getElementById("postal").value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            document.getElementById('coords').innerHTML =
                '<input type="hidden" id="lon" name="lon" value="' + myObj[0].lon + '">\n' +
                '<input type="hidden" id="lat" name="lat" value="' + myObj[0].lat + '">\n' +
                '<input type="hidden" id="adr" name="adress_presta" value="' + myObj[0].display_name + '">';
            initMarker([myObj[0].lat, myObj[0].lon], myObj[0].display_name);
        }
    };
    xmlhttp.open("GET", 'https://nominatim.openstreetmap.org/search?format=json&street=' + place + '&city=' + city + '&postalcode=' + postal, true);
    xmlhttp.send();
}

function placedMarker(coords, name) {
    L.marker(coords).addTo(map)
        .bindPopup(name)
}


function selectPlace() {
    var place = document.getElementById('street').value,
        city = document.getElementById('city').value,
        postal = document.getElementById("postal").value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            setPlace(myObj[0].lat, myObj[0].lon, myObj[0].display_name);
            addRadius([myObj[0].lat, myObj[0].lon], (document.getElementById('dist').value * 1000));
        }
    };
    xmlhttp.open("GET", 'https://nominatim.openstreetmap.org/search?format=json&street=' + place + '&city=' + city + '&postalcode=' + postal, true);
    xmlhttp.send();
}

function initMarker(coords, name) {
    map.setView(new L.LatLng(coords[0], coords[1]), 12);
    if (typeof (myMarker) === 'undefined') {
        myMarker = new L.marker(coords).addTo(map)
            .bindPopup(name)
            .openPopup();
    } else {
        myMarker
            .setLatLng(coords)
            .bindPopup(name)
    }
}

function knowPosition() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    }
}

function showPosition(position) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            setPlace(position.coords.latitude, position.coords.longitude, myObj.display_name);
            addRadius([position.coords.latitude, position.coords.longitude], (document.getElementById('dist').value * 1000));
        }
    };
    xmlhttp.open("GET", 'https://open.mapquestapi.com/nominatim/v1/reverse.php?key=hAjT08RhLAtcTZfZhbS0h6Ejevr4q7wG&format=json&lat=' + position.coords.latitude + '&lon=' + position.coords.longitude);
    xmlhttp.send();
}

var circle;

function addRadius(coords, range) {
    //10 pour 20km 8 pour 50km 11 pour 10km 12 pour 5km
    if (range == 5000) {
        map.setView(new L.LatLng(coords[0], coords[1]), 12);
    } else if (range == 10000) {
        map.setView(new L.LatLng(coords[0], coords[1]), 11);
    } else if (range == 20000) {
        map.setView(new L.LatLng(coords[0], coords[1]), 10);
    } else {
        map.setView(new L.LatLng(coords[0], coords[1]), 8);
    }
    if (typeof (circle) === 'undefined') {
        circle = new L.circle(coords, {
            color: 'black',
            fillColor: '#000000',
            fillOpacity: 0.1,
            radius: range
        }).addTo(map);
    } else {
        circle
            .setLatLng(coords)
            .setRadius(range)
    }
}

function setPlace(lat, lon, name) {
    document.getElementById('lat').value = lat;
    document.getElementById('lon').value = lon;
    document.getElementById('place').innerText = name;
}


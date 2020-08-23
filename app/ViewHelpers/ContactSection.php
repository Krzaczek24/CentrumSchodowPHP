<link rel="stylesheet" href="/public/extras/css/helpers/contactSection.css">

<div class="contact-section-main-container">
    <div class="contact-section-centering-block">
        <div class="contact-section-column">
            <h3 class="title">Rokitki</h3>
            <p>ul. Piękna 123</p>
            <p>tel. +48 123 45 67</p>
            <p>info@centrum-schodow.com.pl</p>
            <p>Godziny otwarcia:</p>
            <p>codziennie - od 8:00 do 16:00</p>
            <p>sobota niedziela - nieczynne</p>
        </div>
        <div class="contact-section-column">
            <h3 class="title">Przedstawiciel handlowy</h3>
            <p>woj. pomorskie i warmińsko-mazurskie</p>
            <p>Jędrzej Wyczling</p>
            <p>tel. 513 107 764</p>
        </div>
        <div class="contact-section-column">
            <h3 class="title">Formularz zapytaniowy</h3>
            <p>Jeśli potrzebujesz dokładnej wyceny swoich schodów, to tu znajdziesz formularz zapytaniowy.</p>
            <input type="button" class="contact-section-form-button" value="NAPISZ DO NAS"/>
            <p></p>
        </div>
    </div>
    <div id="map" class="contact-section-map-block"></div>
    <script>
        function initMap() {
            var rokitki = {
                lat: 54.079, 
                lng: 18.733
            };

            var map = new google.maps.Map(
                document.getElementById('map'), 
                {
                    zoom: 4, 
                    center: rokitki
                }
            );

            var marker = new google.maps.Marker({
                position: rokitki, 
                map: map
            });
        }
    </script>
    <script defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZk0KKQlqf5BVtus4LuzEbJMKndHOo_II&callback=initMap">
    </script>
</div>
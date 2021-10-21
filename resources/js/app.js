window.Loan = function () {
    return {
        initHomePage: function (selector, options = {}) {
            const $selector = $(selector);
            $selector.vectorMap({
                map: 'usa_en',
                backgroundColor: '#7961dd',
                color: '#ffffff',
                enableZoom: false,
                showTooltip: true,
                selectedColor: null,
                hoverColor: 'red',
                onRegionClick: function(event, code, region){
                    event.preventDefault();

                },
                ...options
            });
        },
        initDecaturPage: function (selector, addresses, state) {
            let geocoder;
            let map;
            const element = document.getElementById(selector);

            function initMap() {
                map = new google.maps.Map(element);
                map.setCenter({ lat: 41.878, lng: -87.629 });
                map.setZoom(6);
                geocoder = new google.maps.Geocoder();
                codeAddress(geocoder, state, true);

                addresses.forEach(address => {
                    codeAddress(geocoder, address);
                });
            }

            function codeAddress(geocoder, address, setCenter) {
                geocoder.geocode({address: address}, function(results, status) {
                    if (status === 'OK') {
                        if (setCenter) {
                            map.setCenter(results[0].geometry.location);
                        } else {
                            const marker = new google.maps.Marker({
                                map,
                                position: results[0].geometry.location,
                                title: results[0].formatted_address
                            });
                        }
                    } else {
                        window.alert('Geocode was not successful for the following reason: ' + status);
                    }
                });
            }

            setTimeout(() => initMap(), 1000);
        }
    }
}();

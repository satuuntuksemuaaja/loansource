window.Loan = function () {
    return {
        initVectorMap: function (selector, options = {}) {
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
        initGoogleMap: function (selector, sources, area, zoom = 6) {
            let map, geoCoder;
            const element = document.querySelector(selector);

            function init() {
                map = new google.maps.Map(element);
                map.setCenter({ lat: 41.878, lng: -87.629 });
                map.setZoom(zoom);

                geoCoder = new google.maps.Geocoder();

                codeAddress(geoCoder, {address: area, label: area}, true);

                sources.forEach(source => {
                    codeAddress(geoCoder, source);
                });
            }

            function codeAddress(geocoder, data, setCenter) {
                geocoder.geocode({address: data.address}, function(results, status) {
                    if (status === 'OK') {
                        if (setCenter) {
                            map.setCenter(results[0].geometry.location);
                        } else {
                            const marker = new google.maps.Marker({
                                map,
                                position: results[0].geometry.location,
                                title: results[0].formatted_address,
                                label: data.label
                            });
                        }
                    } else {
                        window.alert('Geocode was not successful for the following reason: ' + status);
                    }
                });
            }

            setTimeout(init, 1000);
        },
    }
}();

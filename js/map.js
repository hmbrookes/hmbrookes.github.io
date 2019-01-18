function myMap() {
			var myCenter = {lat: 55.9530282, lng: -3.1956276};
			
			var map = new google.maps.Map(document.getElementById('map'),{
				zoom: 11,
				center: myCenter,
				disableDefaultUI: true
			});
			
			var infowindow = null;
			
			google.maps.event.addListener(map, 'click', function() {
					if (infowindow) {
						infowindow.close();
					}
			});
			
			downloadUrl('http://www2.macs.hw.ac.uk/~hmb1/Group%20Project/markerxml.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var name = markerElem.getAttribute('name');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('latitude')),
                  parseFloat(markerElem.getAttribute('longitude')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));
			  
              var marker = new google.maps.Marker({
                map: map,
                position: point,
				title: name
              });
			  
			  google.maps.event.addListener(marker, 'click', function() {
					if (infowindow) {
						infowindow.close();
					}
					infowindow = new google.maps.InfoWindow();
					infowindow.setContent(name);
					infowindow.open(map,marker);
			  });
				
			});
            });
   
        



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
		}
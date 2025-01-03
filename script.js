document.getElementById('loadContent').addEventListener('click', function () {
    // Create an XMLHttpRequest object
    const xhr = new XMLHttpRequest();
  
    // Configure it: GET-request for the URL /bca.txt
    xhr.open('GET', 'bca.txt', true);
  
    // Set up a function to run when the request is complete
    xhr.onload = function () {
      if (xhr.status === 200) {
        // Successfully retrieved content
        document.getElementById('content').textContent = xhr.responseText;
      } else {
        // Handle error
        document.getElementById('content').textContent = 'Error loading content. Please try again.';
      }
    };
  
    // Send the request
    xhr.send();
  });


  document.getElementById('country').addEventListener('change', function () {
    const country = this.value;
    const cityDropdown = document.getElementById('city');
    
    // Clear previous city options
    cityDropdown.innerHTML = '<option value="">Select a city</option>';
    
    if (!country) return; // If no country selected, stop
    
    // Create an XMLHttpRequest object
    const xhr = new XMLHttpRequest();
  
    // Configure the request
    xhr.open('GET', `get_cities.php?country=${encodeURIComponent(country)}`, true);
  
    // Define what happens on successful data submission
    xhr.onload = function () {
      if (xhr.status === 200) {
        const cities = JSON.parse(xhr.responseText); // Parse JSON response
  
        // Populate city dropdown with fetched cities
        cities.forEach(city => {
          const option = document.createElement('option');
          option.value = city;
          option.textContent = city;
          cityDropdown.appendChild(option);
        });
      } else {
        alert('Error fetching cities. Please try again.');
      }
    };
  
    // Send the request
    xhr.send();
  });
  
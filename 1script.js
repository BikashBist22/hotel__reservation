fetch('reservation.php', {
    method: 'POST',
    body: formData
})
.then(response => {
    if (!response.ok) {
        console.error('Response:', response); // Log the response object
        throw new Error('Network response was not ok');
    }
    return response.json(); // Parse the JSON response
})
.then(data => {
    console.log('Data:', data); // Log the data object
    if (data.status === 'success') {
        // ...
    } else {
        // ...
    }
})
.catch(error => {
    console.error('Fetch Error:', error); // Log the specific fetch error
    console.error('Error message:', error.message); // Log the error message
    document.getElementById('response').innerHTML = 'There was a problem with your reservation. Please try again later.';
});
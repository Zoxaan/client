<?php
$conn = mysqli_connect("localhost", "root", "", "zoxan");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the medcart id from the POST data
    $medcartId = $_POST['id'];

    // Delete the medcart from the database
    $conn->query("DELETE FROM medcarts WHERE id='$medcartId'");

    // Return a success message
    echo "Success";
} else {
    // Return an error if the request method is not POST
    http_response_code(400);
    echo "Bad Request";
}
?>
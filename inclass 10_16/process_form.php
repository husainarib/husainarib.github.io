<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // get form values
    $position = $_POST["position"];
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $nationality = $_POST["nationality"];
    $dob = $_POST["DOB"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $education = $_POST["education"];
    $experience = $_POST["yearsExperience"];
    $personal_statement = $_POST["personalStatement"];
    $reference_name = $_POST["referenceName"];
    $reference_occupation = $_POST["referenceOccupation"];
    $reference_relationship = $_POST["referenceRelationship"];

    // vegetarian checkbox
    if (!isset($_POST["vegetarian"])) {
        $vegetarian = "No option selected";
    } else {
        $vegetarian = $_POST["vegetarian"];
    }

    // fruit selections
    if (isset($_POST["fruits"]) && is_array($_POST["fruits"])) {
        $fruits = implode(", ", $_POST["fruits"]);
    } else {
        $fruits = "No fruits selected";
    }


    // Display the  data
    echo "<h2>Form Submitted!</h2>";
    echo "<p>Position Applied For: $position</p>";
    echo "<p>Name: $name</p>";
    echo "<p>Gender: $gender</p>";
    echo "<p>Nationality: $nationality</p>";
    echo "<p>Date of Birth: $dob</p>";
    echo "<p>Address: $address</p>";
    echo "<p>Telephone Number: $phone</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Educational History: $education</p>";
    echo "<p>Years of Experience: $experience</p>";
    echo "<p>Personal Statement: $personal_statement</p>";
    echo "<p>Reference Name: $reference_name</p>";
    echo "<p>Reference Occupation: $reference_occupation</p>";
    echo "<p>Reference Relationship: $reference_relationship</p>";
    echo "<p>Vegetarian: $vegetarian</p>";
    echo "<p>Selected Fruits: $fruits</p>";
}
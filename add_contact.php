<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $firstName = $_POST["firstName"];
    $phoneNumber = $_POST["phoneNumber"];


    try {
        $sql = "INSERT INTO contacts (first_name, phone_number) VALUES (:first_name, :phone_number)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":first_name", $firstName);
        $stmt->bindParam(":phone_number", $phoneNumber);
        $stmt->execute();


        $response = array("success" => true);
        echo json_encode($response);
        exit;
    } catch (PDOException $e) {

        $response = array("success" => false);
        echo json_encode($response);
        exit;
    }
} else {

    $response = array("success" => false);
    echo json_encode($response);
    exit;
}
?>

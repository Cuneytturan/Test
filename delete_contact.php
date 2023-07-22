<?php

require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {

    $contactId = $_GET["id"];


    try {
        $sql = "DELETE FROM contacts WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$contactId]);
    } catch (PDOException $e) {
        die("Kişi silinirken bir hata oluştu: " . $e->getMessage());
    }


    header("Location: index.php");
    exit();
}
?>
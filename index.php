<!-- index.php -->

<?php

require_once "config.php";
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form App</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="add-contact">

            <h2>Добавить контакт</h2>
            <form id="addContactForm" action="add_contact.php" method="POST">
                <input type="text" id="firstName" name="firstName" placeholder="Имя" required>
                <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Телефон" required>
                <button type="submit">Добавить</button>
            </form>
        </div>
        </div>
        <div class="container-2">
        <div class="contact-list">
    <h2>Список контактов</h2>
    <ul id="contactList">
        <?php
        require_once "config.php";

        try {
            $sql = "SELECT * FROM contacts";
            $stmt = $db->query($sql);
            $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);


            foreach ($contacts as $contact) {
                echo "<li>";
                echo "<span>{$contact['first_name']} <a href='delete_contact.php?id={$contact['id']}'>x</a></span><br>";
                echo "<span>{$contact['phone_number']}</span>";
                echo "</li>";
            }
        } catch (PDOException $e) {
            die("Kişiler alınırken bir hata oluştu: " . $e->getMessage());
        }
        ?>
    </ul>
</div>
        </div>
    

    <script src="script.js"></script>
</body>
</html>

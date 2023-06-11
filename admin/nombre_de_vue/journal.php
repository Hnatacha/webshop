<?php include '../../backend/authentification.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Journal des activités</title>
</head>
<body>
    <h1>Journal des activités</h1>
    
    <?php
    session_start();

    // Vérification si des activités sont enregistrées dans la session
    if (isset($_SESSION['activity_log'])) {
        echo "<ul>";
        foreach ($_SESSION['activity_log'] as $activity) {
            echo "<li>" . $activity . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Aucune activité enregistrée.</p>";
    }
    ?>

</body>
</html>

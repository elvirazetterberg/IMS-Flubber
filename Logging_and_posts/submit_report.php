<?php
include "../DB_connect.php";
session_start();

if (isset($_SESSION['username']) && isset($_SESSION["id"])) {
    $userid = $_SESSION['id'];
}

$review_date = date("Y-m-d H:i:s");

if (isset($_POST['side_effects']) && is_array($_POST['side_effects'])) {
    $sideEffects = $_POST['side_effects'];
    $sideEffectsIntensities = $_POST['side_effects_intensity'];

    // Prepare the statement outside the loop
    $stmt = $link->prepare("INSERT INTO report (userid, side_effect, intensity, review_date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iids", $userid, $sideEffectId, $sideEffectInt, $review_date);

    // Iterate through side effects and their intensities simultaneously
    foreach ($sideEffects as $index => $sideEffectId) {
        $sideEffectInt = $sideEffectsIntensities[$index]; // Get corresponding intensity

        // Bind the current side effect ID and intensity from the loop
        $stmt->execute();
    }

    echo "Report submitted successfully!";
} else {
    echo "No side effects selected!";
}
?>

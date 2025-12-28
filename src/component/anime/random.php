<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/_config.php');

$maxAttempts = 5;
$attempt = 0;
$animeId = null;

while ($attempt < $maxAttempts) {
    $getAnime = file_get_contents("$zpi/random");
    $getAnime = json_decode($getAnime, true);

    if (
        isset($getAnime['success']) && $getAnime['success'] === true &&
        isset($getAnime['results']) &&
        (empty($getAnime['results']['adultContent']) || $getAnime['results']['adultContent'] === false)
    ) {
        $animeId = $getAnime['results']['id'];
        break; // Found safe anime
    }

    $attempt++;
}

if ($animeId !== null) {
    $newURL = "$websiteUrl/details/$animeId";
    header("Location: $newURL");
    exit;
} else {
    // Fallback if no safe anime found after X attempts
    header("Location: $websiteUrl/404");
    exit;
}
?>

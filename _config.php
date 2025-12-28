<?php 

$conn = new mysqli(
    getenv("DB_HOSTSEG") ?: "sql110.infinityfree.com",
    getenv("DB_USERSEG") ?: "if0_38841171",
    getenv("DB_PASSSEG") ?: "d0tta053anda",
    getenv("DB_NAMESEG") ?: "if0_38841171_hianimez"
);


if ($conn->connect_error) {
    error_log("Database connection failed: " . $conn->connect_error);
    die("Database connection failed.");
}

$websiteTitle = "Hianime";
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$websiteUrl = "{$protocol}://{$_SERVER['SERVER_NAME']}";
$websiteLogo = $websiteUrl . "/public/logo/logo.png";
$contactEmail = getenv("CONTACT_EMAIL") ?: "@gmail.com";

$version = "2.1";

$discord = "#";
$github = "#";
$telegram = "#";
$instagram = "#"; 

// all the api you need
$zpi = "https://animeapii.vercel.app/api"; //https://github.com/PacaHat/zen-api
//$proxy = $websiteUrl . "/src/ajax/proxy.php?url=";

//If you want faster loading speed
$proxy = "https://m3u8-api-two.vercel.app/api/v1/streamingProxy?url="; //https://github.com/MetaHat/m3u8-streaming-proxy


$banner = $websiteUrl . "/public/images/banner.png";

    
<?php
require_once '../../env.php'; // ajuste le chemin si besoin

header('Content-Type: application/json');

if (!isset($_GET['id'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing movie ID']);
    exit;
}

$movieId = intval($_GET['id']);
$apiKey = $_ENV['API_KEY'] ?? null;

if (!$apiKey) {
    http_response_code(500);
    echo json_encode(['error' => 'Missing API key']);
    exit;
}

$url = "https://api.themoviedb.org/3/movie/{$movieId}?api_key={$apiKey}&language=fr-FR";
$response = @file_get_contents($url);

if ($response === false) {
    http_response_code(500);
    echo json_encode(['error' => 'API request failed']);
    exit;
}

echo $response;

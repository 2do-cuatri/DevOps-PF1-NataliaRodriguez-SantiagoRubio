<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");
if ($_SERVER["REQUEST_METHOD"] === "OPTIONS") {
    http_response_code(200);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data["username"]) || !isset($data["password"])) {
        echo json_encode(["status" => "error", "message" => "Missing required fields"]);
        exit;
    }

    $username = trim($data["username"]);
    $password = trim($data["password"]);

    if (empty($username) || empty($password)) {
        echo json_encode(["status" => "error", "message" => "Username or password cannot be empty"]);
        exit;
    }

    if (strlen($password) < 6) {
        echo json_encode(["status" => "error", "message" => "Password must be at least 6 characters long"]);
        exit;
    }

    echo json_encode(["status" => "ok", "message" => "User data received successfully"]);
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}
?>
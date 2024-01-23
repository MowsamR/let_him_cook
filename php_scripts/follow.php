<?php
include "db_connection.php";

$response = ['success' => false];

if (isset($_POST['followerID'], $_POST['userID'])) {
    $followerId = $_POST['followerID'];
    $followedId = $_POST['userID'];

    $insert_query = "INSERT INTO followers (FollowedID, FollowerID) VALUES (?, ?);";
    
    if ($insert_stmt = $conn->prepare($insert_query)) {
        $insert_stmt->bind_param("ii", $followedId, $followerId);
        if ($insert_stmt->execute()) {
            $response['success'] = true;
        } else {
            $response['error'] = $insert_stmt->error;
        }
        $insert_stmt->close();
    } else {
        $response['error'] = $conn->error;
    }
} else {
    $response['error'] = 'Invalid or missing followerID parameter.';
}

echo json_encode($response);

$conn->close();
?>
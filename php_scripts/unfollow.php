<?php
include "db_connection.php";

$response = ['success' => false];

if (isset($_POST['followerID'])) {
    $followerId = (int)$_POST['followerID'];
    $followedId = (int)$_POST['userID'];

    $delete_query = "DELETE FROM followers WHERE FollowedID = ? AND FollowerID = ?;";

    if ($delete_stmt = $conn->prepare($delete_query)) {
        $delete_stmt->bind_param("ii", $followedId, $followerId);
        if ($delete_stmt->execute()) {
            $response['success'] = true;
        } else {
            $response['error'] = $delete_stmt->error;
        }
        $delete_stmt->close();
    } else {
        $response['error'] = $conn->error;
    }
} else {
    $response['error'] = 'Invalid or missing followerID parameter.';
}

echo json_encode($response);

$conn->close();
?>
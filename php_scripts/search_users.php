<?php 
    include 'db_connection.php'; 
    if(isset($_POST['search_user'])){
        $username_to_find = $_POST['user_to_find'];

        $query = "SELECT UserID, Username FROM user WHERE Username = ?;";
        if($stmt = $conn->prepare($query)){
            $stmt->bind_param("s", $username_to_find);
            
            if($stmt->execute()){
                $stmt->store_result();
                if ($stmt->num_rows() == 1){
                    $stmt->bind_result($id, $username);
                    $stmt->fetch();
                    
                }else{
                    echo "not found";
                }
            }
        
            $stmt->close();
        }
    }
?>
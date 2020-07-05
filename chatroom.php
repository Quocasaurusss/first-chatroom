<?php
    $connection = mysqli_connect('localhost', 'test', 'practice', 'chatroom');
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $insert_query = "INSERT INTO chat (message) values(";
        $insert_query .= "'" . $_POST['message'] . "'";
        $insert_query .= ")";
        $insert_result = mysqli_query($connection, $insert_query);
        header("Refresh:0");
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Room</title>
</head>
    <div style="border:3px black solid; display:block; margin:auto; height:400px; width:500px; background-color:beige">
        <div id="display" style="overflow:auto; height: 350px; width:100%;background-color:white">
        <?php
            
            $query = "SELECT *  FROM chat";
            $result = mysqli_query($connection, $query);
            while ($message = mysqli_fetch_assoc($result)) {
                echo "<p>".$message['message']."</p>";
            }


                
        
            mysqli_close($connection);

        ?>
        </div>
        <div id="message" style="height: 50px; width:100%;background-color:white">
            <form action="" method="post">
                <input type="text" name="message" value="" style="border:3px orange solid; display:block; margin:auto;width:460px">
            </form>
        </div>
    </div>
    <style>
        p {
            margin-left: 15px;
        }
    </style>;
<body>
    
</body>
</html>

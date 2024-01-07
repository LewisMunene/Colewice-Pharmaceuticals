<?php

    function queryExecute($conn, $sql) {
        
    if($conn->query($sql)===TRUE){
        echo"<br>";
        echo "Query Executed Successfully";
    }
    else{
        echo "Error".$sql."<br>".$conn->error;
        }
        $conn->close();
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      } 
?>
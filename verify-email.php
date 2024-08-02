<?php
    
    require'Login/includes/config.php';
    
    $getusername = $_GET['username'];
    
    $update = "UPDATE tbl_users SET Status = '2' WHERE EmailId = '$getusername' ";
    
    if(mysqli_query($conn, $update)){
        echo "<script>alert('Email Verified! Please login.');location.href = 'Login/index.php'</script>";
    }



?>
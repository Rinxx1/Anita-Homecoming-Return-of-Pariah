<?php
    
    require 'config.php';
    
    $userids = @$_POST["userid"];
    
    
    $checkdata = "SELECT FROM tbl_playerdata WHERE userid = '$userids' ";
    $resCheckData = mysqli_query($conn, $checkdata);
    
    //if(mysqli_num_rows($resCheckData) < 0){
    
        if (isset($_POST["userid"])) {
            
            $datas = $_POST["savedgame_lastSlotNum"];
            $userid = $_POST["userid"];
            $savedgame_summary = $_POST["savedgame_summary"];
            $savedgame_details = $_POST["savedgame_details"];
            $player_pos = $_POST["player_pos"];
            $player_items = $_POST["player_items"];
            $player_stats = $_POST["player_stats"];
            
            $insert = "INSERT INTO `tbl_playerdata` (`playerDataId`, `slot`, `userid`, `savedgame_summary`, `savedgame_details`, `player_position`, `player_items`, `player_stats`) VALUES (NULL, '$datas', '$userid', '$savedgame_summary', '$savedgame_details', '$player_pos', '$player_items', '$player_stats')";
            
            mysqli_query($conn, $insert);
            
            echo "0";
            
            exit();
            
        } else {
            
            echo "1";
            
            exit();
            
        }
        
    // }else{
        
    //     echo "2";
        
    //     exit();
        
    // }
    
   


?>
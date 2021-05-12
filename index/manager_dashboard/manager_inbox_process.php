<?php
include ('../session.php');
include ('../db_conn.php');
$output = '';
if($_POST['action'] == "show_messages"){
    $sender = addslashes($_POST['sender']);
    $receiver = addslashes($_POST['receiver']);
    $output .= '
    <button type="button" class="close float-right btn" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    <div class="form-group row">
    <label><b>Conversation between '.$sender.' and '.$receiver.'</b></label>
    </div>
    ';
    $message_host_query = "SELECT * FROM `message` WHERE (`sender`='$sender' OR `receiver` = '$sender') AND (`sender`='$receiver' OR `receiver` = '$receiver') ORDER BY sending_time";
    echo $message_host_query;
    $message_host_result = mysqli_query($conn, $message_host_query);
    if (is_array($message_host_result) || is_object($message_host_result)){
        foreach($message_host_result as $message_host){
            if($message_host['sender'] == $sender){
                $output .= '
                <div class="card text-white bg-secondary mb-3" style="width: 23rem; float: right;">
                <div class="card-body">
                    <p class="card-text"><b>'.$sender.': </b>'. $message_host["message_content"] .'</p>
                </div>
                </div>
                ';
            }else{
            // Case: sender == receiver_id   
                $output .= '
                <div class="card text-white bg-info mb-3" style="width: 23rem; float: left;">
                <div class="card-body">
                    <p class="card-text"><b>'.$receiver.': </b>'. $message_host["message_content"] .'</p>
                </div>
                </div>
                ';
            }
        }
    }
    echo $output;
    
//change the status to readed    
}elseif($_POST['action'] == "change_status"){
    $message_id = addslashes($_POST['message_id']);
    $query = "UPDATE `message` SET `message_status`='read' WHERE message_id='$message_id'";
    if ($conn->query($query)){
      echo "success";
    }else{
      echo "fail";
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

}else {
    echo "action not found";
}

?>
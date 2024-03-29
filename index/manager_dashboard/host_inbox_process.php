<?php
include ('../session.php');
include ('../db_conn.php');
$output = '';
if($_POST['action'] == "show_messages"){
    $host_id = addslashes($_POST['host_id']);
    $receiver_id = addslashes($_POST['receiver_id']);
    $output .= '
    <button type="button" class="close float-right btn" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    <div class="form-group row">
    <label for="get_receiver_id" class="col-sm-3 col-form-label"><b>Chat with: </b></label>
    <div class="col-sm-9">
      <input type="text" readonly class="form-control-plaintext" id="get_receiver_id" value="'. $receiver_id .'">
    </div>
    </div>
    ';
    $message_host_query = "SELECT * FROM `message` WHERE (`sender`='$host_id' OR `receiver` = '$host_id') AND (`sender`='$receiver_id' OR `receiver` = '$receiver_id') ORDER BY sending_time";
    $message_host_result = mysqli_query($conn, $message_host_query);
    if (is_array($message_host_result) || is_object($message_host_result)){
        foreach($message_host_result as $message_host){
            if($message_host['sender'] == $host_id){
                $output .= '
                <div class="card text-white bg-secondary mb-3" style="width: 23rem; float: right;">
                <div class="card-body">
                    <p class="card-text">'. $message_host["message_content"] .'</p>
                </div>
                </div>
                ';
            }else{
            // Case: sender == receiver_id   
                $output .= '
                <div class="card text-white bg-info mb-3" style="width: 23rem; float: left;">
                <div class="card-body">
                    <p class="card-text">'. $message_host["message_content"] .'</p>
                </div>
                </div>
                ';
            }
        }
    }
    echo $output;
}else
if($_POST['action'] == "insert_message"){
    $host_id = addslashes($_POST['host_id']);
    $contact_id = addslashes($_POST['contact_id']);
    $mes_content = addslashes($_POST['mes_content']);
    $mes_status = "unread";
    // $sending_time = date('Y-m-d H:i:s');;
    $insert_message_query = "INSERT INTO `message`(`sender`, `receiver`, `message_content`, `message_status`, `sending_time`) VALUES ('$host_id', '$contact_id', '$mes_content', '$mes_status', now())";
    if ($conn->query($insert_message_query)) {
        $output = '
        <div class="card text-white bg-secondary mb-3" style="width: 23rem; float: right;">
        <div class="card-body">
            <p class="card-text">'. $mes_content .'</p>
        </div>
        </div>
        ';
        echo $output;
    } else {
        echo 'fail';
    }
}else 
if($_POST['action'] == "contact_system_manager"){
    $client_id = addslashes($_POST['client_id']);
    $host_id = addslashes($_POST['host_id']);
    $mes_content = addslashes($_POST['mes_content']);
    $mes_status = "unread";
    // $sending_time = date('Y-m-d H:i:s');;
    $leave_message_query = "INSERT INTO `message`(`sender`, `receiver`, `message_content`, `message_status`, `sending_time`) VALUES ('$client_id', '$host_id', '$mes_content', '$mes_status', now())";
    if ($conn->query($leave_message_query)) {
        echo "success";
    }else {
        echo "fail";
    }
}else {
    echo "action not found";
}

?>
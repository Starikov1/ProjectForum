<?php
    session_start();
    $str = $_GET['argument'];
    $initialurl = "questionpage.php?gc=" . $_GET['u'];
    $pieces = explode("_", $str);
    $idquestion = $pieces[1];
    $idreply = $pieces[2];
    $operation = $pieces[0];
    if($operation == "up" || $operation == "down")
    {
        require_once("./classes/Estimate.class.php");
        $class = new Estimate();
        $class -> RatingAlter($idquestion, $idreply, $initialurl, $operation);
    }
    else if($operation == "del")
    {
        // Видалити пост
        require_once("./classes/DeleteThePosts.class.php");
        $cl = new DeleteThePosts();
        if($idreply == 0)
            $cl -> DelPage($idquestion);
        else
            $cl -> DelReply($idquestion, $idreply, $initialurl);
    }
    else if($operation == "commentary-button")
    {
        $textareatext = $_GET['text'];
        require_once("./classes/QuestionDisplay.class.php");
        $class = new QuestionDisplay();
        $class -> Comment($idquestion, $idreply, $textareatext, $initialurl);
    }
    else if($operation == "final")
    {
        require_once("./dbconnect/db.php");
        $q = "UPDATE replies_$idquestion SET reliability=true WHERE id=$idreply;";
        $conn -> query($q);
        require_once("./classes/Notification.class.php");
        $class = new Notification();
        $class -> FinalNotif($idquestion, $idreply);
        header("Location: $initialurl");
        exit;
    }
?>
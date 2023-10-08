<html>
<head>
    <link rel="stylesheet" type="text/css" href="./navigationpanel/navstyle.css" />
    <link rel="stylesheet" type="text/css" href="./pagestyles/common.css" />
    <title></title>
</head>
<body>
<?php 
    session_start();
    if(isset($_SESSION['id']))
    {
        require("./navigationpanel/logined.php");

        include_once("./classes/ReplyAsk.class.php");
        include_once("./classes/PostContent.class.php");
        $class1 = new PostContent();
        $class2 = new ReplyAsk();
        $textareatext = "";
        $tablename = "imagesoftheuser_" . $_SESSION['id'];
        
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if(isset($_POST['publish']))
            {
                $class2 -> GiveQuestion($_POST['titleask']);
            }
            else if(isset($_POST['addfile']))
            {
                $textareatext = $class1 -> ImagesList($tablename);
            }
        }
        else
            $class1 -> TableForPicturesOfTheAsker($tablename);
        ?>
    <div class="whole-content">
        <h1>Публікація питання може бути завершена тут.</h1>
        <form method="POST" action="makequestion.php" enctype="multipart/form-data">
            <input type="text" placeholder="Заголовок посту" name="titleask" id="titleask" onkeyup="saveValue(this);"/>
            <input type="file" value="Завантажувати файл треба тут" name="file" id="file" class="common-two"/>
            <input type="submit" name="addfile" value="Додати в статтю" class="common-two"/>
            <br>
            <textarea cols="150" rows="20" id="wholetext" name="wholetext" class="common"><?php echo htmlspecialchars($textareatext); ?></textarea>
            <input type="submit" name="publish" value="Опублікувати" class="common the-button"/>
        </form>
    </div>
        <?php
    }
    else
        echo "Ця сторінка недоступна для незареєстрованих користувачів.";
    ?>

<script type="text/javascript">
        document.getElementById("titleask").value = getSavedValue("titleask");  // set the value to this input
        /* Here you can add more inputs to set value. if it's saved */

        //Save the value function - save it to localStorage as (ID, VALUE)
        function saveValue(e){
            var id = e.id;  // get the sender's id to save it . 
            var val = e.value; // get the value. 
            localStorage.setItem(id, val);// Every time user writing something, the localStorage's value will override . 
        }

        //get the saved value function - return the value of "v" from localStorage. 
        function getSavedValue  (v){
            if (!localStorage.getItem(v)) {
                return "";// You can change this to your defualt value. 
            }
            return localStorage.getItem(v);
        }
</script>
</body>
</html>
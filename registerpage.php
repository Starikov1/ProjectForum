<html>
    <head>
        <title>The forum - the list of questions</title>
        <meta charset="unf-8">
        <link rel="stylesheet" type="text/css" href="./navigationpanel/navstyle.css" />
        <link rel="stylesheet" type="text/css" href="./pagestyles/common.css" />
        <link rel="stylesheet" type="text/css" href="./pagestyles/list_question.css" />

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
        href="https://fonts.googleapis.com/css2?family=Roboto&display=swap"
        rel="stylesheet"
        />
    </head>
    <body>
        <div class="whole-content">
            <h1>Реєстрація</h1>
            <form class="rl-form" method="POST" action="registerpage.php">
                <input type="text" class="textfield" placeholder="Email" name="email-r"/>
                <input type="text" class="textfield" placeholder="Username" name="usrname-r"/>
                <input type="password" class="textfield" placeholder="Password" name="pswd"/>
                <input type="checkbox" name="checkbox-r" style="display: inline-block"/><label style="display: inline-block">Приймаю умови користування даним програмним продуктом</label>
                <br><a>Умови користування програмним продуктом</a>
                <input type="submit" class="the-button" value="Зареєструватися"/>
            </form>
        </div>

        <?php
            include("./dbconnect/db.php");

            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                require "./classes/Account.class.php";
                $accountclass = new Account();
                if (isset($_POST['checkbox-r']))
                {
                    $checkbox = true;
                }
                else
                {
                    $checkbox = false;
                }
                $result = $accountclass -> RegisterPageSnippet($_POST['email-r'], $_POST['usrname-r'], $_POST['pswd'], $checkbox);
                if($result=="")
                {
                    echo "<script> " .
                    "alert('Очікуйте на повідомлення вислане за електронною адресою.');" .
                    "window.location.href='index.php';" .
                    "</script>";
                }
                else
                {
                    echo $result;
                }
            }
        ?>
    </body>
</html>
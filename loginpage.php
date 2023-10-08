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
            <h1>Увійти в обліковий запис</h1>
            <form class="rl-form" method="POST" action="loginpage.php">
                <input type="text" class="textfield" placeholder="Email" name="email-r"/>
                <input type="password" class="textfield" placeholder="Password" name="pass"/>
                <input type="submit" class="the-button" value="Увійти"/>
            </form>
        </div>

        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                require "./classes/Account.class.php";
                $acc = new Account();
                $email = $_POST["email-r"];
                $password = $_POST["pass"];
                $err = $acc -> Log_in($email, $password);
                if($err == "")
                {
                    header("location: index.php");
                    exit;
                }
                else
                    echo $err;
            }
        ?>
    </body>
</html>

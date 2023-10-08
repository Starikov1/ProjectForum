<html>
    <head>
        <title>The forum - the list of questions</title>
        <meta charset="unf-8">
        <link rel="stylesheet" type="text/css" href="./navigationpanel/navstyle.css" />
        <link rel="stylesheet" type="text/css" href="./pagestyles/common.css" />
        <link rel="stylesheet" type="text/css" href="./pagestyles/accountpage.css" />

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
        href="https://fonts.googleapis.com/css2?family=Roboto&display=swap"
        rel="stylesheet"
        />
    </head>
    <body>
        <?php
            session_start();
            if (isset($_SESSION['id']))
            {
                require("./navigationpanel/logined.php");
            }
            else
            {
                require("./navigationpanel/unregistered.php");
            }
        ?>
        <div class="whole-content">
            <h1>Сторінка обліквого запису</h1>
            <div class="userinfo">
                <span><strong>Нікнейм користувача:</strong>  <?php echo $_SESSION['uname']?></span>
                <span><strong>Рейтинг:</strong>  <?php echo $_SESSION['rating']?></span>
            </div>
            <form method="POST" action="accountpage.php">
                <input type="text" class="textfield margin-field" name="login" value="<?php echo $_SESSION['uname']?>"/>
                <input type="text" class="textfield margin-field" name="email" value="<?php echo $_SESSION['email']?>" readonly="readonly"/>
                <input type="password" class="textfield margin-field" name="pswd" value="<?php echo $_SESSION['pswd']?>"/>
                <input type="submit" class="the-button" value="Змінити" name="alter"/>
            </form>
            <form method="POST" action="accountpage.php">
                <input type="submit" class="the-button" value="Вийти з облікового запису" name="log-out"/>
            </form>
        </div>

        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                if(isset($_POST['log-out']))
                {
                    session_destroy();
                    header("Location: index.php");
                    exit;
                }
                else
                {
                    require "./classes/Account.class.php";
                    $accountclass = new Account();
                    $err = $accountclass -> ChangePageSnippet($_POST['login'], $_POST['pswd'], $_POST['email']);
                    echo "<br>" . $err;
                }
            }
        ?>
    </body>
</html>
<html>
    <head>
        <title>The forum - the list of questions</title>
        <meta charset="unf-8">
        <link rel="stylesheet" type="text/css" href="./pagestyles/common.css" />

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
        href="https://fonts.googleapis.com/css2?family=Roboto&display=swap"
        rel="stylesheet"
        />
    </head>
    <body>
        <!--<p><strong>Обліковий запис зареєстрований остаточно.</strong></p>
        <p><strong>Реєстраційні дані акаунту змінені успішно.</strong></p>-->
        <?php
            require "./classes/Account.class.php";
            $accountclass = new Account();
            $accountclass -> AcceptanceOfVariables();
            /*
                AcceptanceId()
                AcceptanceRegistration($id) або AcceptanceChange($id)

                У URL адресу даної сторінки входять такі $_GET змінні, як:
                d - дата + id у зашифрованому вигляді
                f - попередня сторінка. Якщо значення f = true, то попередньою є сторінка реєстрації. 
                Інакше, якщо це значення - false, то попередньою є сторінка профілю. 
                Залежно від змінної f, відображаються різні написи та виконуються різні алгоритми. 
            */
        ?>

        <a href="loginpage.php">Увійти</a>
    </body>
</html>
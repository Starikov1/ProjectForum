<html>
    <head>
        <title>The forum - the list of questions</title>
        <meta charset="unf-8">
        <link rel="stylesheet" type="text/css" href="./navigationpanel/navstyle.css" />
        <link rel="stylesheet" type="text/css" href="./pagestyles/common.css" />
        <link rel="stylesheet" type="text/css" href="./pagestyles/notificationspage.css" />

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
        if(!isset($_SESSION))
        {
            require("./navigationpanel/unregistered.php");
        }
        else
        {
            require("./navigationpanel/logined.php");
        }
        
        ?>
        <div class="whole-content">
            <!-- 
                Заголовок
            -->

            <h1>Список непрочитаних сповіщень вашого облікового запису</h1>
            <?php
                require_once("./classes/Notification.class.php");
                $c = new Notification();
                $c -> Display();
            ?>
            <!--<div class="node-area">
                <div class="node">
                    <a><h2>One of users answers on your question: "Better way to set distance between flexbox items"</h2></a>
                    <div class="node-area-others">
                        <span>Date: 7PM. 10/12/2022</span>
                    </div>
                </div>
            </div>
    -->
        </div>
    </body>
</html>
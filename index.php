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
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                if(isset($_POST['filter']))
                {
                    $name = $_POST['filter-name'];
                    $title = $_POST['title'];
                    header("Location: index.php?title=$title&name=$name");
                    exit;
                }
            }
        ?>
        <div class="whole-content">
            <h1>Список питань на форумі</h1>
            <!-- 
                За замовчуванням відображаються найпопулярніші питання, тобто питання з найвищим рейтингом.
                Фільтр включає в себе теги, дату та нікнейм користувача, який задавав питання.
                Також наявне текстове поле для пошуку по назві.
            -->
            <!-- 
                Всі сторінки мають центровку контенту в main.
                Кнопки мають той самий колір тексту та фону при наведенні та без нього, як і в панелі навігації.
            -->
            <!--
                Під засобами пошуку розташовуються ноди.
                Нод преставляє собою div з питанням, тегами, датою та нікнеймом питальника.
             -->
            <form>
                <div class="filter-area-search">
                    <input type="text" name="title" class="searchbox"/>
                    <input type="submit" name="filter" class="the-button" value="Пошук питання"/>
                </div>
                <div class="filter-area">
                    <input type="text" name="filter-name" placeholder="Ім'я"/>
                    <!--<input type="text" name="filter-tag" id="tags-search" placeholder="Теги"/>
                    <select name="filter-date" id="date">
                        <option value="lastday">Останній день</option>
                        <option value="lastmonth">Останній місяць</option>
                        <option value="lastyear">Останній рік</option>
                    </select>-->
                </div>
            </form>
            <!-- for asker-->
            <div class="for-asker">
                <a href="makequestion.php"><input type="button" class="the-button" value="Задати питання"/></a>
            </div>

            <?php
                
            require_once("./classes/ListAsks.class.php");
            $class = new ListAsks();
            $class -> Search();
            ?>

            <!---->
            <!--<div class="node-area">
                <div class="node">
                    <a><h2>Better way to set distance between flexbox items</h2></a>
                    <div class="tag-list">
                        <a>html</a>
                        <a>css</a>
                    </div>
                    <div class="node-area-others">
                        <span>Date: 7PM. 10/12/2022</span>
                        <span>User: Usrname1</span>
                    </div>
                </div>
            </div>-->
        </div>
    </body>
</html>
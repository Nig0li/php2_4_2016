<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Админ-панель</title>

    <script src="https://code.jquery.com/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<h1>Новости дня:</h1>

<button class="btn"><a href="/index.php">Выйти из админ-панели</a></button><br><br>

<!-- РЕДАКТИРОВАНИЕ Добавить новость -->
<div class="panel-group" id="collapse-group">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#collapse-group" href="#el1">Добавить новость</a>
            </h4>
        </div>
        <div id="el1" class="panel-collapse collapse">
            <div class="panel-body">

                <!-- ФОРМА добавления -->
                <form action="/index.php?ctrl=AdminPanel&action=Edit" method="post">
                    <input type="hidden" name="id">
                    Заголовок <br>
                    <input type="text" name="title"><br>
                    Содержание <br>
                    <textarea name="text"></textarea><br>
                    Автор <br>
                    <input type="text" name="author"><br><br>
                    <input type="submit" value="Посмотреть">
                </form>
                <br>
            </div>
        </div>
    </div>
</div>

<!-- Вывод всех новостей -->
<?php foreach ($news as $txt) : ?>
    <div class="panel panel-default">
        <div class="panel-heading">

            <!-- Заголовок новости -->
            <?php if (!empty($txt->title)) : ?>
                <?php echo $txt->title; ?>
            <?php else : ?>
                -= Без заголовка =-
            <?php endif; ?>
        </div>
        <div class="panel-body">

            <!-- Содержание новости -->
            <p><?php echo $txt->text; ?></p>

            <!-- Автор новости -->
            <p>
                автор
                <?php if (!empty($txt->author)) :
                    echo $txt->author->name;
                endif; ?>
            </p>

            <!-- РЕДАКТИРОВАНИЕ Удалить новость -->
            <button class="btn btn-inverse">
                <a href="/index.php?ctrl=AdminPanel&action=Delete&id=<?php echo $txt->id; ?>">Удалить</a>
            </button>

            <!-- РЕДАКТИРОВАНИЕ Обновить новость -->
            <button class="btn btn-muted" data-toggle="collapse" data-target="#id<?php echo $txt->id; ?>">Обновить
            </button>
            <div id="id<?php echo $txt->id; ?>" class="collapse">

                <!-- ФОРМА обновления -->
                <form action="/index.php?ctrl=AdminPanel&action=Edit" method="post">
                    <input type="hidden" name="id" value="<?php echo $txt->id; ?>">
                    Заголовок <br>
                    <input type="text" name="title" value="<?php echo $txt->title; ?>"><br>
                    Содержание <br>
                    <textarea name="text"></textarea><br>
                    Автор <br>
                    <input type="text" name="author"
                           value="<?php if (!empty($txt->author)) :
                                            echo $txt->author->name;
                                        endif; ?>"><br><br>
                    <input type="submit" value="Посмотреть">
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>

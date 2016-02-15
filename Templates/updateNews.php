<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Обновить новость</title>

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

<!-- РЕДАКТИРОВАНИЕ Обновить новость -->
<div class="panel-group" id="collapse-group">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#collapse-group" href="#el1">Обновить новость</a>
            </h4>
        </div>
        <div id="el1" class="panel-collapse collapse in">
            <div class="panel-body">

                <!-- ФОРМА - предварительный просмотр -->

                <form action="/index.php?ctrl=AdminPanel&action=Edit" method="post">
                    <input type="hidden" name="id" value="<?php echo $article->id; ?>">
                    Заголовок <br>
                    <input type="text" name="title" value="<?php echo $article->title; ?>"><br>
                    Содержание <br>
                    <textarea name="text"></textarea><br>
                    Автор <br>
                    <input type="text" name="author" value="<?php echo $article->author; ?>"><br><br>
                    <input class="btn" type="submit" name="update" value="Посмотреть">
                    <button class="btn"><a href="/index.php?ctrl=AdminPanel">Обратно</a></button>
                </form>
                <br>
                <?php if (false != $article) : ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo $article->title; ?>
                        </div>
                        <div class="panel-body">
                            <p><?php echo $article->text; ?></p>
                            <p>
                                автор
                                <?php echo $article->author; ?>
                            </p>
                        </div>
                    </div>
                <?php endif; ?>
                <br>

                <!-- ФОРМА сохранение новости -->
                <form action="/index.php?ctrl=AdminPanel&action=Save" method="post">
                    <input type="hidden" name="id" value="<?php echo $article->id; ?>">
                    <input type="hidden" name="title" value="<?php echo $article->title; ?>">
                    <input type="hidden" name="text" value="<?php echo $article->text; ?>">
                    <input type="hidden" name="author" value="<?php echo $article->author; ?>">
                    <input class="btn" type="submit" name="save" value="Сохранить">
                </form>

            </div>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>

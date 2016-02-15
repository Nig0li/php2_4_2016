<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Сайт</title>

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

<button class="btn"><a href="/index.php?ctrl=AdminPanel">Админ-панель</a></button>
<br><br>

<?php foreach ($news as $txt) : ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php if (!empty($txt->title)) : ?>
                <a href="/index.php?ctrl=News&action=Art&id=<?php echo $txt->id; ?>">
                    <?php echo $txt->title; ?>
                </a>
            <?php else : ?>
                -= Без заголовка =-
            <?php endif; ?>
        </div>
        <div class="panel-body">
            <p><?php echo $txt->text; ?></p>
            <p>
                автор
                <?php if (!empty($txt->author)) :
                echo $txt->author->name;
                endif; ?>
            </p>
        </div>
    </div>
<?php endforeach; ?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
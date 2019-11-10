<!DOCTYPE html>
<html>
<head>
    <title>Binary Search</title>
    <link rel="stylesheet" href="styles/normalize.css">
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

    <div class="container">
        <div id="root">
            <form action="file.php" method="post">
                <label for="title">Название файла</label>
                <input type="text" name="title" class="form-control"><br>
                <label for="max_number">Максимальное число для ключа/значения</label>
                <input type="number" name="max_number" class="form-control"><br>
                <label for="key_value">Значение ключа</label>
                <input type="number" name="key_value" class="form-control"><br>
                <input type="submit" id="submit" class="btn btn-primary">
            </form>
        </div>
    </div>

    <script src="scripts/jquery.js"></script>
    <script src="scripts/app.js"></script>

</body>
</html>
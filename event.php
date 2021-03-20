<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создать событие</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="container">
        <form action="config/div.php" method="post">
            <select name="subject" id="">
                <option value="conert">Концерт</option>
                <option value="art-galery">Арт галерея</option>
                <option value="party">Дискотека века</option>
            </select>
            <input type="text" placeholder="Название" name="title">
            <textarea name="descrioption" id="" cols="30" rows="10" placehold="Описание"></textarea>
            <label for="crowdfunding">Краудфандинг</label>
            <input type="checkbox" name="crowdfunding" id="">
            <input type="submit" value="Создать">
        </form>
    </div>
</body>
</html>
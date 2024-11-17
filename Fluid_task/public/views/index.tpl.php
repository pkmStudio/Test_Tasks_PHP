<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <style type="text/css">
        body {
            font-size: 16px;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        form {
            margin: 0 auto;
            border: 1px solid greenyellow;
            -webkit-border-radius: 20px;
            -moz-border-radius: 20px;
            border-radius: 20px;
            padding: 20px;
            width: 400px;
            display: flex;
            flex-direction: column;
            gap: 30px;
        }
        button {
            padding: 15px 20px;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            background-color: darkgreen;
            color: #f0f0f0;
            align-self: start;
        }
    </style>

    <form method="post" enctype="multipart/form-data">
        <p>Я формочка, да не красивая, за то рабочая :)</p>
        <input class="form-control" id="file" type="file" name="file">
        <label for="file">Enter your text file</label>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
</body>
</html>

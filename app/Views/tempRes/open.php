<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Office</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        .wrap {
            /* display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center; */
            /* height: 100vh; */
            /* width: 80vw; */
            /* overflow: scroll; */
        }
        .wrap .formBox input {
            font-size: 28px;
            height: 40px;
        }
        .wrap .result {
            padding-top: 50px;
            overflow: auto;
        }
        .wrap .formBox {
            padding: 50px;
            /* flex-grow: 1; */
            /* overflow: scroll; */
        }
    </style>
</head>
<body>
    <div class="wrap">
        <div class="formBox">
            <form action="<?= base_url("voffice")?>" method="post">
                Pesquisa: <input type="text" name="q" id="q">
                <input type="submit" value="Go!">
            </form>
            <div class="result">
                <?php foreach($result as $field => $value): ?>
                <p>
                    <?= $field ?>: <strong><?= $value ?></strong>
                </p>
                <?php endforeach; ?>
               
            </div>
        </div>
        
    </div>
    
</body>
</html>
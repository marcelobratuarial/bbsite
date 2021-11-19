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
            <form action="<?= base_url("voffice/find")?>" method="get">
                Pesquisa: <input type="text" name="q" id="q">
                <input type="submit" value="Go!">
            </form>
            <?php if(isset($result)) :?>
            <div class="result">
                <?php //print_r($result); ?>
                <table>
                    <thead>
                        <?php foreach($fields as $f) : ?>
                            <th><?= $f ?></th>
                        <?php endforeach ?>
                    </thead>
                    <tbody>
                        <?php foreach($result as $res) : ?>
                            <tr>
                                <td>
                                    <a href="<?= base_url("voffice/open/".$res["IDCodigo"]) ?>"> <?= $res["SolicitanteEmpresa"]; ?></a>
                                </td>
                                <td>
                                    <?= $res["EmailEmpresa"]; ?>
                                </td>
                                <td>
                                    <?= $res["Nome"]; ?>
                                </td>
                                <td>
                                    <?= $res["NomeResponsavelCartao"]; ?>
                                </td>
                                <td>
                                    <?= $res["CidadeRetirada"]; ?>
                                </td>
                                <td>
                                    <?= $res["Email"]; ?>
                                </td>
                                <td>
                                    <?= $res["Placa"]; ?>
                                </td>
                                <td>
                                    <?= $res["DataSolicitacao"]; ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                
               
            </div>
            <?php endif ?>
        </div>
        
    </div>
    
</body>
</html>
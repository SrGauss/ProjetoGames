<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Venom.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="Style.css">

    <title>Cadastro</title>

    <style>
        body{
            background-image: linear-gradient(to right, rgb(0, 0, 0, 0) -50%, RGB(23, 26, 33) 40%, rgb(0, 0, 0) 150%), url("steam-games-870x489.jpg");
        background-position: center;
        }

        label{
            color: white;
            position: relative;
            top: -3px;
        }

        .Cadastro{
            position: absolute;
            top: 83%;
            left: 50%;
            transform: translate(-50%, -120%);
            font-size: 20px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            letter-spacing: 2.5px;
        }
        .Cadastro #jogo{
            height: 30px;
            width: 300px;
            font-size: 17px;
            filter: drop-shadow(1px 1px 1px black);
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        .Cadastro .Env{
            position: absolute;
            top: 120%;
            left: 50%;
            transform: translate(-50%, -50%);
            height: 34.5px;
            width: 120px;
            font: 17px  Verdana, Geneva, Tahoma, sans-serif;
            filter: drop-shadow(1px 1px 1px black);
            letter-spacing: 1.5px;
        }

        .Back{
            position: absolute;
            z-index: 6;
            top: 85%;
            left: -9.5%;
            transform: translate(-50%, -50%);
            width: 13em;
            height: 2em;
            background-color: #2a475e;
            font-size: 26px;
            transform: scaleX(-1);
            transform: skew(-25deg);
            transition: all 0.3s ease;
            color: white;
            text-shadow: 1px 1px 1px black;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .Back:hover{
            left: -8%;
            cursor: pointer
        }
        .Back p{
        position: relative;
            color: white;
            filter: drop-shadow(1px 1px 1px black);
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 27px;
            top: 5%;
            left: 64.5%;
            transform: translate(-50%, -73%);
            letter-spacing: 2.5px;
        }

        .desc{
            height: 120px;
            width: 300px;
            font-size: 17px;
            filter: drop-shadow(1px 1px 1px black);
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            text-wrap: wrap;
            clear: left;
            resize: none;
        }

        .imgs{
            position: relative;
            font-size: 13.5px;
            filter: drop-shadow(1px 1px 1px black);
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .imgs-file-name{
            color: white;
        }

    </style>
    
</head>
<body>
    
    <?php
        session_start();

        if(empty($_SESSION['User'])){
            echo "<script>alert('erro')</script>";
            header("location: index.php",true,301);
            exit();
        }else{
        
           echo "<header class='RR'><p class='bi bi-person-circle'> ".$_SESSION['User']."</p></header>";


           //conexao banco de dandos
           if (isset($_POST["jogo"])) {
        
           $hostname = "127.0.0.1";
           $user = "root";
           $senha = "root";
           $bd = "votacaodosgames";

           $conexao = new mysqli($hostname,$user,$senha,$bd);

           if ($conexao->connect_errno) {
            echo "Erro na conexão: " . $conexao->connect_error;
        } else {
            $jogo = $conexao->real_escape_string($_POST["jogo"]);
            $desc = $conexao->real_escape_string(nl2br($_POST["desc"]));

            // Definir o diretório para salvar as imagens
            $diretorio = "uploads/";

            // Verificar se o diretório existe, se não, criar
            if (!is_dir($diretorio)) {
                mkdir($diretorio, 0777, true);
            }

            // Verificar se as imagens foram enviadas
            if (isset($_FILES["image1"]) && isset($_FILES["image2"])) {

                // Caminho das imagens
                $nome_imagem1 = $diretorio . basename($_FILES["image1"]["name"]);
                $nome_imagem2 = $diretorio . basename($_FILES["image2"]["name"]);

                // Mover as imagens para o diretório
                $upload1 = move_uploaded_file($_FILES["image1"]["tmp_name"], $nome_imagem1);
                $upload2 = move_uploaded_file($_FILES["image2"]["tmp_name"], $nome_imagem2);

                if ($jogo != "") {
                    $sql1 = "SELECT `nomeJogos` FROM `jogos` WHERE `nomeJogos`='".$jogo."';";
                    $result1 = $conexao->query($sql1);

                    if ($result1->num_rows == 0) {
                        if ($upload1 && $upload2) {
                            $sql = "INSERT INTO `jogos`(`nomeJogos`,`NomeCriador`,`descricao`,`image1`,`image2`) VALUES ('".$jogo."', '".$_SESSION['User']."', '".$desc."', '".$nome_imagem1."', '".$nome_imagem2."');";
                            $resultado = $conexao->query($sql);

                            if ($resultado) {
                                echo "<script>alert('Jogo cadastrado com sucesso!');</script>";
                            } else {
                                echo "<script>alert('Erro ao cadastrar o jogo.');</script>";
                            }
                        } else {
                            echo "<script>alert('Erro ao fazer o upload das imagens.');</script>";
                        }
                    } else {
                        echo '<script>alert("Jogo já cadastrado");</script>';
                    }
                } else {
                    echo "Nome do jogo está vazio.";
                }
            } else {
                echo "Erro: Nenhuma imagem foi enviada.";
            }

            $conexao->close();
        }
    }
}
?>

<form class="Cadastro" action="jogosNew.php" enctype="multipart/form-data" method="post">
        <label for="jogo">Insira o Nome do Jogo:</label><br>
        <input type="text" name="jogo" id="jogo">
        <br><br>
        <label for="desc">Insira a descrição:</label><br>
        <textarea class="desc" name="desc" maxlength="700" cols="23" rows="4" id="desc" wrap="hard"></textarea> <!--usar esse código para pegar o valor: $desc = nl2br($_POST['desc']); -->
        <br><br>
        <label for="desc">Insira as imagens:</label><br>
        <input class="imgs" type="file" accept="image/png, image/jpeg" name="image1" id="image1"/><br>
        <input class="imgs" type="file" accept="image/png, image/jpeg" name="image2" id="image2"/>
        <input onclick="Confirma()" class="Env" type="submit" value="Enviar">
</form>



    <a href="sair.php" class="Exit"><button>Sair</button></a>

    <a href="cadastroJogos.php"><button class="Back">
    <p>Voltar</p>
    </button></a>


    <script>
function Confirma() {
  var txt;
  if (confirm("Confira se o nome do jogo foi digitado corretamente")) {
    txt = "You pressed OK!";
    console.log("Ok Funcionando");
  } else {
    txt = "You pressed Cancel!";
    console.log("Cancel Funcionando");
  }
  document.getElementById("demo").innerHTML = txt;
}
</script>

</body>
</html>
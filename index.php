<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="" type="image/x-icon">

        <title>Login</title>

    <style>

      body{
        background-image: linear-gradient(to right, rgb(0, 0, 0, 8) 30%, rgb(0, 0, 0, 0)), url("unnamed.jpg");
        background-position: center;
        font-family: "Motiva Sans",Arial,Helvetica,sans-serif;
      }
        
        .login-card {
  width: 290px;
  padding: 90px;
  border: 1px solid #1b2838;
  border-radius: 10px;
  background-color: #171a21;
  box-shadow: 2px 2px 10px #333;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-140%, -50%);
}

.card-header {
  text-align: center;
  margin-bottom: 180px
}

.card-header .log {
  margin: 0;
  font-size: 30px;
  color: white;
  position: absolute;
}

.form-group {
  margin-bottom: 14px;
  position: relative;
  top: -30px;
}

label {
  font-size: 18px;
  margin-bottom: 5px;
  color: #c0c0c0;
}

input[type="text"], input[type="password"] {
  width: 100%;
  padding: 13px 20px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  transition: 0.5s;
  position: relative;
  top: -50px;
}

input[type="submit"] {
  width: 100%;
  background-color: #66c0f4;
  color: white;
  padding: 18px 20px;
  margin: 7px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  position: relative;
  top: -40px;
}

#A{
  width: 50%;
  background-color: #66c0f4;
  color: white;
  padding: 12px 7px;
  margin: 1px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  position: relative;
}

.sla{
  margin: 0;
  font-size: 24px;
  color: white;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, 750%);
}

input[type="submit"]:hover {
  background-color: #85cdf8;
  transition: all ease 0.2s;
}

        
    </style>

    </head>
    <body>

<div class="login-card">
    <div class="card-header">
        <div class="log">Iniciar Sessão</div>
    </div>
    <form action="valores.php" method="post">
            <div class="form-group">
            <label style="position:relative;top:-55px;" for="username">Email / Usuário:</label>
            <input  required="" name="user" id="user" type="text">
            </div>
            <div class="form-group">
            <label style="position:relative;top:-55px;" for="password">Senha:</label>
            <input required="" name="Password" id="Password" type="password">
            </div>
            <div class="form-group">
            <input value="Enviar" type="submit">
            </div>
    </form>
    <p class="sla">Primeira vez aqui?</p>
    <center><a style="position:relative;top:55px;" href="CadastroUser.php"><button id="A">Cadastrar usuario</button></a></center>

</div>
                
    </body>
</html>
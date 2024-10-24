<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="" type="image/x-icon">
        <link rel="stylesheet" href="IndexStyle.css">


        <title>Login</title>

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
                <input type="checkbox" onclick="showSenha()">
            </div>
            <div class="form-group">
            <input value="Enviar" type="submit">
            </div>
    </form>
    <p class="sla">Primeira vez aqui?</p>
    <center><a style="position:relative;top:55px;" href="CadastroUser.php"><button id="A">Cadastrar usuario</button></a></center>

    <?php
session_start();
if (isset($_SESSION['login_error'])) {
    echo "<p class='erro' style='color:red;'>" . $_SESSION['login_error'] . "</p>";
    unset($_SESSION['login_error']);
}
?>

  <script>
    function showSenha() {
  var x = document.getElementById("Password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
  </script>
    
</div>
                
    </body>
</html>

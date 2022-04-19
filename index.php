<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <title>Cadastro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>

.content {
    width: 300px;
    min-height: 560px;
    margin: 0px auto;
    position: relative;
}

h1, h3 {
    font-size: 20px;
    color: #066a75;
    padding: 2px 0 10px 0;
    font-family: Arial, sans-serif;
    font-weight: bold;
    text-align: center;
    padding-bottom: 15px;
}

h1:after, h3:after {
    content: ' ';
    display: block;
    width: 100%;
    height: 2px;
    margin-top: 10px;
    background: -webkit-linear-gradient(left, rgba(147, 184, 189, 0) 0%, rgba(147, 184, 189, 0.8) 20%, rgba(147, 184, 189, 1) 53%, rgba(147, 184, 189, 0.8) 79%, rgba(147, 184, 189, 0) 100%);
    background: linear-gradient(left, rgba(147, 184, 189, 0) 0%, rgba(147, 184, 189, 0.8) 20%, rgba(147, 184, 189, 1) 53%, rgba(147, 184, 189, 0.8) 79%, rgba(147, 184, 189, 0) 100%);
}

.content p:first-child {
    margin: 0px;
}

label {
    color: #405c60;
    position: relative;
}

input {
    width: 300px;
    margin-top: 4px;
    padding: 5px;
    border: 1px solid #b2b2b2;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    -webkit-box-shadow: 0px 1px 4px 0px rgba(168, 168, 168, 0.6) inset;
}

input[type="submit"] {
    width: 300px;
 
    background: rgb(61, 157, 179);
    padding: 5px;
    color: #fff;
    font-size: 14px;
    border: 1px solid #fff;
    margin-bottom: 3px;
    text-shadow: 0 1px 1px #333;
    -webkit-border-radius: 5px;
    border-radius: 5px;
}

#cadastro {
    position: absolute;
    top: 10px;
    width: 105%;
    padding: 18px;
    margin: 0 0 35px 0;
    background: #f7f7f7;
    border: 1px solid rgba(147, 184, 189, 0.8);
    border-radius: 5px;
    -webkit-animation-duration: 0.5s;
    -webkit-animation-timing-function: ease;
    -webkit-animation-fill-mode: both;
    animation-duration: 0.5s;
    animation-timing-function: ease;
    animation-fill-mode: both;
}

    </style>

</head>

<body>
    <div class="container">
        <a class="links" id="paracadastro"></a>

        <div class="content">


            <div id="cadastro">
                <form method="post" action="" class="forms">
                    <h1>Cadastro</h1>

                    <p>
                        <label for="nome">Nome</label>
                        <input id="nome" name="nome"type="text" />
                    
                        <label for="cidade">Cidade</label>
                        <input id="cidade" name="cidade"type="text" />
                    
                        <label for="salHora">Salário por hora</label>
                        <input id="salHora" name="salHora"type="number" min="0" />

                        <label for="horasTrab">Horas trabalhadas</label>
                        <input id="horasTrab" name="horasTrab"type="number" min="0" />

                        <label for="aumento">Aumento: </label><br>
                         <input id="aumento" name="aumento" type="number" min="0"><br><br>
                    </p> 

                        <input type="submit" value="Cadastrar" name="btnCadastrar">
                        <input type="submit" value="Calcular salário" name="btnCalcular">
                        <input type="submit" value="Mostrar dados" name="btnMostrar">
                        <input type="submit" value="Aumento salarial" name="btnAumentar">

                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php 
    require_once "funcionario.php";
    $funcionario = new Funcionario();
    
    if(isset($_POST["btnCadastrar"]) && !empty($_POST['nome']) && !empty($_POST['cidade']) && !empty($_POST['salHora'])
    && !empty($_POST['horasTrab']))
    {
        $funcionario->setNome($_POST['nome']);
        $funcionario->setCidade($_POST['cidade']);
        $funcionario->setSalHora($_POST['salHora']);
        $funcionario->setHorasTrab($_POST['horasTrab']);
        $funcionario->setSalarioFinal($funcionario->calcularSalario());

        echo "<h3>Usuário Cadastrado com sucesso</h3>";
    }else if(isset($_POST["btnCadastrar"])){
        echo "Preencha o nome!";
    }

    if(isset($_POST["btnCalcular"]))
    {
        $funcionario->setSalHora($_POST['salHora']);
        $funcionario->setHorasTrab($_POST['horasTrab']);
        $salario = $funcionario->calcularSalario();
        echo "<h3>Salário do Funcionário: <span>R$ $salario</span></h3>";
    }

    if(isset($_POST["btnMostrar"]))
    {
        $funcionario->setNome($_POST['nome']);
        $funcionario->setCidade($_POST['cidade']);
        $funcionario->setSalHora($_POST['salHora']);
        $funcionario->setHorasTrab($_POST['horasTrab']);
        $funcionario->setSalarioFinal($funcionario->calcularSalario());
        $dados = $funcionario->mostrarDados();
        echo "<h3>$dados<h3>";
    }

    if(isset($_POST["btnAumentar"]))
    {
        $funcionario->setSalHora($_POST['salHora']);
        $funcionario->setHorasTrab($_POST['horasTrab']);
        $funcionario->setSalarioFinal($funcionario->calcularSalario());
        $aumento = $funcionario->darAumento($_POST['aumento']);
        echo "<h3>Salário com aumento: <span>R$ $aumento</span><h3>";
    }

?>
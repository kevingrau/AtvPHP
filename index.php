<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <title>Cadastro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="funCss.css" />
</head>

<body>
    <div class="container">
        <a class="links" id="paracadastro"></a>

        <div class="content">


            <div id="cadastro">
                <form method="post" action="">
                    <h1>Cadastro</h1>

                    <p>
                        <label for="nome">Nome</label>
                        <input id="nome" name="nome" required="required" type="text" />
                    </p>

                    <p>
                        <label for="cidade">Cidade</label>
                        <input id="cidade" name="cidade" required="required" type="text" />
                    </p>

                    <p>
                        <label for="salHora">Salário por hora</label>
                        <input id="salHora" name="salHora" required="required" type="number" />
                    </p>

                    <p>
                        <label for="horasTrab">Horas trabalhadas</label>
                        <input id="horasTrab" name="horasTrab" required="required" type="number" />
                    </p>

                    <form action=""></form>
                    <p>
                        <input type="submit" class="btns" value="Cadastrar" name="btnCadastrar">
                        <input type="submit" class="btns" value="Calcular Salário" name="btnCalcular">
                        <input type="submit" class="btns" value="Mostrar Dados" name="btnMostrar">
                        <input type="submit" class="btns" value="Aumento Salarial" name="btnAumentar">
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php 
    require_once "Funcionario.php";
    $funcionario = new Funcionario();
    
    if(isset($_POST["btnCadastrar"]))
    {
        $funcionario->setNome($_POST['nome']);
        $funcionario->setCidade($_POST['cidade']);
        $funcionario->setSalHora($_POST['salHora']);
        $funcionario->setHorasTrab($_POST['horasTrab']);
        $funcionario->setSalarioFinal($funcionario->calcularSalario());

        echo "<div class='container'><h3>Usuário Cadastrado com sucesso</h3><div>";
    }

    if(isset($_POST["btnCalcular"]))
    {
        $funcionario->setSalHora($_POST['salHora']);
        $funcionario->setHorasTrab($_POST['horasTrab']);
        $salario = $funcionario->calcularSalario();
        echo "<div class='container'><h3>Salário do Funcionário: <span id='salarioColor'>R$ $salario</span></h3></div>";
    }

    if(isset($_POST["btnMostrar"]))
    {
        $funcionario->setNome($_POST['nome']);
        $funcionario->setCidade($_POST['cidade']);
        $funcionario->setSalHora($_POST['salHora']);
        $funcionario->setHorasTrab($_POST['horasTrab']);
        $funcionario->setSalarioFinal($funcionario->calcularSalario());
        $dados = $funcionario->mostrarDados();
        echo "<div class='container'><h3>$dados<h3><div>";
    }

    if(isset($_POST["btnAumentar"]))
    {
        $funcionario->setSalHora($_POST['salHora']);
        $funcionario->setHorasTrab($_POST['horasTrab']);
        $funcionario->setSalarioFinal($funcionario->calcularSalario());
        $aumento = $funcionario->darAumento($_POST['aumento']);
        echo "<div class='container'><h3>Salário com aumento: <span id='salarioColor'>R$ $aumento</span><h3><div>";
    }

?>
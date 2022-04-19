<?php 
class Funcionario
{
    private $nome;
    private $cidade;
    private $salHora;
    private $horasTrab;
    private  $salarioFinal;

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }
    
    public function getSalHora()
    {
        return $this->salHora;
    }

    public function setSalHora($salHora)
    {
        $this->salHora = $salHora;
    }

    public function getHorasTrab()
    {
        return $this->horasTrab;
    }

    public function setHorasTrab($horasTrab)
    {
        $this->horasTrab = $horasTrab;
    }

    public function getSalarioFinal()
    {
        return $this->salarioFinal;
    }

    public function setSalarioFinal($salarioFinal)
    {
        $this->salarioFinal = $salarioFinal;
    }

    public function calcularSalario()
    {
        return $this->horasTrab * $this->salHora * 30;
    }

    public function mostrarDados()
    {
        return "Nome: <span id='dados'>$this->nome</span> | Cidade: <span id='dados'>$this->cidade</span> | Salário por hora: <span id='dados'>$this->salHora</span> | Horas trabalhadas: <span id='dados'>$this->horasTrab</span> | Salário: <span id='dados'>R$ $this->salarioFinal</span>";
    }

    public function darAumento($aumento)
    {
        return $this->salarioFinal = $this->salarioFinal + $aumento;
    }
    
    

    
}

?>

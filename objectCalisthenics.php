<html>
<head><title>Object Calisthenics</title></head>
<body>
<?php
/*1 - Only One Level of Indentation Per Method 
Contexto onde deseja-se verificar a existência de um aluno no sistema.
Exemplo inadequado:*/
function verificar_aluno_conflitante($turma,$nome){
    if($turma=='turma do aluno'){
        if($nome=='nome do aluno')
        return TRUE;
        else
        return;
    }
}
//Exemplo adequado:
function verificar_aluno_adequado($turma,$nome){
    if($turma!='turma do aluno')
    return;
    if($nome!='nome do aluno')
    return;
    return TRUE;
}
/*2 – Don’t Use the ELSE Keyword
Contexto onde o sistema informa se a senha enviada pelo usuário está certa.
Exemplo inadequado:*/
function retornar_mensagem_conflitante($senha){
    if($senha=='senha')
    echo 'Você acertou a senha!';
    else
    echo 'Você errou a senha!';
}
//Exemplo adequado:
function retornar_mensagem_adequado($senha){
    if($senha==='senha'){
        echo 'Você acertou a senha!';
        return;
    }
    echo 'Você errou a senha!';
}
/*3 - Wrap All Primitives and Strings
Contexto onde o usuário deseja ver a área de alguma figura geométrica escolhida por ele, onde ele também escolhe o tamanho da figura.
Exemplo inadequado:*/
class CalculadoraAreaConflitante{
    private $escolha;
    private $base;
    private $altura;
    private $raio;
    public function __construct($base,$altura,$raio){
        $this->base=$base;
        $this->altura=$altura;
        $this->raio=$raio;
    }
    public function setEscolha($escolha){
        $this->escolha=$escolha;
    }
    public function calcular_area_triangulo(){
        return ($this->base * $this->altura) / 2;
    }
    public function calcular_area_quadrado(){
        return $this->base * $this->altura;
    }
    public function calcular_area_circulo(){
        return pi() * pow($this->raio,2);
    }
    public function mostrar_resultado(){
        if($this->escolha==1){
            echo $this->calcular_area_triangulo();
            return;
        }
        if($this->escolha==2){
            echo $this->calcular_area_quadrado();
            return;
        }
        if($this->escolha==3){
            echo $this->calcular_area_circulo();
            return;
        }
        echo 'Esta opção não existe!';
    }
}
//Exemplo adequado:
class Triangulo{
    private $base;
    private $altura;
    public function __construct($base,$altura){
        $this->base=$base;
        $this->altura=$altura;
    }
    public function calcular_area_triangulo(){
        return ($this->base * $this->altura) / 2;
    }
}
class Quadrado{
    private $base;
    private $altura;
    public function __construct($base,$altura){
        $this->base=$base;
        $this->altura=$altura;
    }
    public function calcular_area_quadrado(){
        return $this->base * $this->altura;
    }
}
class Circulo{
    private $raio;
    public function __construct($raio){
        $this->raio=$raio;
    }
    public function calcular_area_circulo(){
        return pi() * pow($this->raio,2);
    }
}
class CalculadoraAreaAdequado{
    private $escolha;
    private $circulo;
    private $quadrado;
    private $triangulo;
    public function __construct($base,$altura,$raio){
        $this->circulo=new Circulo($raio);
        $this->quadrado=new Quadrado($base,$altura);
        $this->triangulo=new Triangulo($base,$altura);
    }
    public function setEscolha($escolha){
        $this->escolha=$escolha;
    }
    public function mostrar_resultado(){
        if($this->escolha==1){
            echo $this->triangulo->calcular_area_triangulo();
            return;
        }
        if($this->escolha==2){
            echo $this->quadrado->calcular_area_quadrado();
            return;
        }
        if($this->escolha==3){
            echo $this->circulo->calcular_area_circulo();
            return;
        }
        echo 'Esta opção não existe!';
    }
}
/*4 – First Class Collections
Exemplo inadequado:*/
class Curso{
private $nome;
private $cargaHoraria;
}
class Aluno{
private $nome;
private $ra;
private $cursos=array();
}
//Exemplo adequado:
class Curso{
    private $nome;
    private $cargaHoraria;
}
class ColecaoCurso{
    private $cursos=array();
    public function __construct(){

    }
}
class Aluno{
    private $nome;
    private $ra;
    private $colecaoCurso=new ColecaoCurso();
}
/*5 – One Dot Per Line
Exemplo inadequado:*/
class Classe1 {
    public $atributo1;
    public function __construct(){

    }
    public function mostra_atributo(){
        echo $this->atributo1;
    }
}
class Classe2 {
    public $atributo2=new Classe1();
}
//Exemplo adequado:
abstract class Classe3{
    public $atributo1;
    public function __construct(){

    }
    public function mostra_representation(){
        echo $this->atributo1;
    }
}
class Classe4 extends Classe3{
    private $atributo3;
    private $atributo4;
}
/*6 – Don’t Abbreviate 
Exemplo inadequado:*/
class Con{
    private $num;
    private $sal;
    public function tir_ext(){
        echo $this->sal;
    }
}
//Exemplo adequado:
class Conta{
    private $numero;
    private $saldo;
    public function tirar_exttrato(){
        echo $this->saldo;
    }
}
/*7 – Keep All Entities Small 
Exemplo inadequado:*/
class EntidadeConflitante{
    private $escolha;
    private $base;
    private $altura;
    private $raio;
    public function __construct($base,$altura,$raio){
        $this->base=$base;
        $this->altura=$altura;
        $this->raio=$raio;
    }
    public function setEscolha($escolha){
        $this->escolha=$escolha;
    }
    public function calcular_area_triangulo(){
        return ($this->base * $this->altura) / 2;
    }
    public function calcular_area_quadrado(){
        return $this->base * $this->altura;
    }
    public function calcular_area_circulo(){
        return pi() * pow($this->raio,2);
    }
    public function mostrar_resultado(){
        if($this->escolha==1){
            echo $this->calcular_area_triangulo();
            return;
        }
        if($this->escolha==2){
            echo $this->calcular_area_quadrado();
            return;
        }
        if($this->escolha==3){
            echo $this->calcular_area_circulo();
            return;
        }
        echo 'Esta opção não existe!';
    }
}
//Exemplo adequado:
class Triangulo{
    private $base;
    private $altura;
    public function __construct($base,$altura){
        $this->base=$base;
        $this->altura=$altura;
    }
    public function calcular_area_triangulo(){
        return ($this->base * $this->altura) / 2;
    }
}
class Quadrado{
    private $base;
    private $altura;
    public function __construct($base,$altura){
        $this->base=$base;
        $this->altura=$altura;
    }
    public function calcular_area_quadrado(){
        return $this->base * $this->altura;
    }
}
class Circulo{
    private $raio;
    public function __construct($raio){
        $this->raio=$raio;
    }
    public function calcular_area_circulo(){
        return pi() * pow($this->raio,2);
    }
}
class EntidadeAdequado{
    private $escolha;
    private $circulo;
    private $quadrado;
    private $triangulo;
    public function __construct($base,$altura,$raio){
        $this->circulo=new Circulo($raio);
        $this->quadrado=new Quadrado($base,$altura);
        $this->triangulo=new Triangulo($base,$altura);
    }
    public function setEscolha($escolha){
        $this->escolha=$escolha;
    }
    public function mostrar_resultado(){
        if($this->escolha==1){
            echo $this->triangulo->calcular_area_triangulo();
            return;
        }
        if($this->escolha==2){
            echo $this->quadrado->calcular_area_quadrado();
            return;
        }
        if($this->escolha==3){
            echo $this->circulo->calcular_area_circulo();
            return;
        }
        echo 'Esta opção não existe!';
    }
}
/*8 – No Classes With Than Two Instance Variables
Exemplo inadequado:*/
class Aluno{
    private $nome;
    private $ra;
    private $etapa;
}
//Exemplo adequado:
class Aluno{
    private $nome;
    private $ra;
}
/*9 – No Getters/Setters/Properties
Exemplo inadequado:*/
class BuyerConflitante{
    protected $name;
    protected $purchases;

    public function getName() {/**/}
    public function setName($name) {/**/}

    public function getPurchases() {/**/}
    public function setPurchases($purchases) {/**/}
}
//Exemplo adequado:
class BuyerAdequado{
    protected $name;
    protected $purchases;

    public function addNewPurchase()
    {
        $this->purchases++;
    }
}
?></body>
</html>
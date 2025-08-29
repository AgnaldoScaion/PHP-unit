<?php

use PHPUnit\Framework\TestCase;

use App\Calculator;

class CalculatorTest extends TestCase
{
  private $calculator;

  protected function setUp(): void
  {
    $this->calculator = new Calculator();
  }

  public function testSomar()
  {
    $a = 5;
    $b = 10;
    $esperado = 15;
    $resultado = $this->calculator->somar($a, $b);
    $this->assertEquals($esperado, $resultado);
  }
  public function testSomarNegativos()
  {
    $a = -5;
    $b = -10;
    $esperado = -15;
    $resultado = $this->calculator->somar($a, $b);
    $this->assertEquals($esperado, $resultado);
  }
  public function testSomarComZero()
  {
    $a = 0;
    $b = 10;
    $esperado = 10;
    $resultado = $this->calculator->somar($a, $b);
    $this->assertEquals($esperado, $resultado);
  }


  public function testSubtrair()
  {
    $a = 10;
    $b = 5;
    $esperado = 5;
    $resultado = $this->calculator->subtrair($a, $b);
    $this->assertEquals($esperado, $resultado);
  }
  public function testSubtrairNegativos()
  {
    $a = -5;
    $b = -10;
    $esperado = 5;
    $resultado = $this->calculator->subtrair($a, $b);
    $this->assertEquals($esperado, $resultado);
  }
  public function testSubtrairMaiorMenor()
  {
    $a = 5;
    $b = 10;
    $esperado = -5;
    $resultado = $this->calculator->subtrair($a, $b);
    $this->assertEquals($esperado, $resultado);
  }


  public function testMultiplicar()
  {
    $a = 5;
    $b = 3;
    $esperado = 15;
    $resultado = $this->calculator->multiplicar($a, $b);
    $this->assertEquals($esperado, $resultado);
  }
  public function testMultiplicarComZero()
  {
    $a = 0;
    $b = 10;
    $esperado = 0;
    $resultado = $this->calculator->multiplicar($a, $b);
    $this->assertEquals($esperado, $resultado);
  }
  public function testMultiplicarNegativos()
  {
    $a = -5;
    $b = 3;
    $esperado = -15;
    $resultado = $this->calculator->multiplicar($a, $b);
    $this->assertEquals($esperado, $resultado);
  }



  public function testDividir()
  {
    $a = 10;
    $b = 2;
    $esperado = 5;
    $resultado = $this->calculator->dividir($a, $b);
    $this->assertEquals($esperado, $resultado);
  }
  public function testDividirDecimal()
  {
    $a = 5;
    $b = 2;
    $esperado = 2.5;
    $resultado = $this->calculator->dividir($a, $b);
    $this->assertEquals($esperado, $resultado);
  }
  public function testDividirPorZero()
  {
    $this->expectException(\InvalidArgumentException::class);
    $this->expectExceptionMessage("Divisão por zero não é permitida");
    $this->calculator->dividir(10, 0);
  }


  public function testPotencia()
  {
    $base = 2;
    $expoente = 3;
    $esperado = 8;
    $resultado = $this->calculator->potencia($base, $expoente);
    $this->assertEquals($esperado, $resultado);
  }
  public function testPotenciaComExpoenteZero()
  {
    $base = 5;
    $expoente = 0;
    $esperado = 1;
    $resultado = $this->calculator->potencia($base, $expoente);
    $this->assertEquals($esperado, $resultado);
  }
  public function testPotenciaComExpoenteNegativo()
  {
    $base = 2;
    $expoente = -2;
    $esperado = 0.25;
    $resultado = $this->calculator->potencia($base, $expoente);
    $this->assertEquals($esperado, $resultado);
  }



  public function testRaizQuadrada()
  {
    $numero = 16;
    $esperado = 4;
    $resultado = $this->calculator->raizQuadrada($numero);
    $this->assertEquals($esperado, $resultado);
  }
  public function testRaizQuadradaDeZero()
  {
    $numero = 0;
    $esperado = 0;
    $resultado = $this->calculator->raizQuadrada($numero);
    $this->assertEquals($esperado, $resultado);
  }
  public function testRaizQuadradaDeNegativo()
  {
    $this->expectException(\InvalidArgumentException::class);
    $this->expectExceptionMessage("Não é possível calcular raiz quadrada de número negativo");
    $this->calculator->raizQuadrada(-9);
  }


  public function testFatorialDeZero()
  {
    $numero = 0;
    $esperado = 1;
    $resultado = $this->calculator->fatorial($numero);
    $this->assertEquals($esperado, $resultado);
  }
  public function testFatorialDeUm()
  {
    $numero = 1;
    $esperado = 1;
    $resultado = $this->calculator->fatorial($numero);
    $this->assertEquals($esperado, $resultado);
  }
  public function testFatorial()
  {
    $numero = 5;
    $esperado = 120;
    $resultado = $this->calculator->fatorial($numero);
    $this->assertEquals($esperado, $resultado);
  }
  public function testFatorialDeNegativo()
  {
    $this->expectException(\InvalidArgumentException::class);
    $this->expectExceptionMessage("Fatorial não definido para números negativos");
    $this->calculator->fatorial(-5);
  }

  public function testEhPar()
  {
    $numeroPar = 4;
    $numeroImpar = 5;

    $this->assertTrue($this->calculator->ehPar($numeroPar));
    $this->assertFalse($this->calculator->ehPar($numeroImpar));
  }

  public function testEhImpar()
  {
    $numeroPar = 4;
    $numeroImpar = 5;

    $this->assertFalse($this->calculator->ehImpar($numeroPar));
    $this->assertTrue($this->calculator->ehImpar($numeroImpar));
  }
  public function testEhParComZero()
  {
    $numero = 0;
    $this->assertTrue($this->calculator->ehPar($numero));
  }
  public function testEhParComNegativo()
  {
    $numeroPar = -4;
    $numeroImpar = -5;
    $this->assertTrue($this->calculator->ehPar($numeroPar));
    $this->assertFalse($this->calculator->ehPar($numeroImpar));
  }
  public function testEhImparComNegativo()
  {
    $numeroPar = -4;
    $numeroImpar = -5;

    $this->assertFalse($this->calculator->ehImpar($numeroPar));
    $this->assertTrue($this->calculator->ehImpar($numeroImpar));
  }


  public function testMedia()
  {
    $numeros = [2, 4, 6, 8];
    $esperado = 5;
    $resultado = $this->calculator->media(numeros: $numeros);
    $this->assertEquals($esperado, $resultado);
  }
  public function testMediaComUmNumero()
  {
    $numeros = [10];
    $esperado = 10;
    $resultado = $this->calculator->media(numeros: $numeros);
    $this->assertEquals($esperado, $resultado);
  }
  public function testMediaArrayVazio()
  {
    $this->expectException(\InvalidArgumentException::class);
    $this->expectExceptionMessage("Array não pode estar vazio");
    $this->calculator->media([]);
  }
  public function testMediaComNegativos()
  {
    $numeros = [-2, -4, -6, -8];
    $esperado = -5;
    $resultado = $this->calculator->media(numeros: $numeros);
    $this->assertEquals($esperado, $resultado);
  }

  public function testMaiorNumero()
  {
    $numeros = [1, 3, 2, 5, 4];
    $esperado = 5;
    $resultado = $this->calculator->maiorNumero($numeros);
    $this->assertEquals($esperado, $resultado);
  }
  public function testMaiorNumeroComNegativos()
  {
    $numeros = [-1, -3, -2, -5, -4];
    $esperado = -1;
    $resultado = $this->calculator->maiorNumero($numeros);
    $this->assertEquals($esperado, $resultado);
  }
  public function testMaiorNumeroMisto()
  {
    $numeros = [-10, 0, 5, -3, 8, 2];
    $esperado = 8;
    $resultado = $this->calculator->maiorNumero($numeros);
    $this->assertEquals($esperado, $resultado);
  }
  public function testMaiorNumeroArrayVazio()
  {
    $this->expectException(\InvalidArgumentException::class);
    $this->expectExceptionMessage("Array não pode estar vazio");
    $this->calculator->maiorNumero([]);
  }
}

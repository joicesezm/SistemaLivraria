
<?php
 

 print  (" Olá Mundo");
const pi = 3.14159;
 $nome = "Melissa"; //String ou caractere
 $idade = 25; //inteira
 $altura = 1.60; // real
 $peso   = 55;
 $isCasado = false; // booleano 

 echo " Nome: " . $nome . " tem a idade de: " . $idade ;
 echo  " <br> tem a altura: " . $altura . " de peso: " 
            . $peso . " é casado: " . $isCasado;

   echo " <b> " . $nome . " </b> " ;       

   if ($idade < 18){
       echo " <br> é menor de idade";
   }elseif($idade>=19 and  $idade <= 60){
        echo " <br> é adulto ";
   }else{
        echo " <br> Sou idoso!";
   }
   $i=0;
   while ($i <= 10) 
   {
    echo " VALOR DE I: ". $i;
    $i++;
   }
   //do while
   $j = 100;
   do{
     echo " <br> Valor de : " . $j ;
     $j--;
   }while($j >= 0);

   for ($x = 0; $x <= 500; $x++){
          if ($x % 2 == 0){
               echo " <br> Sou Par! " . $x;
          }
          $x+= 10; //$x = $x + 10
   }
   //arrays são tipos de armazenamento de dados fixo
   $carros =
    array('Corsa', 'Vectra', 'Fusca', 'Mercedes', 'Uno');

   for ($i=0; $i < count($carros); $i++ ){
     echo " <br> Carro:  " . $carros[$i] . ' na posicao' . $i;
   }

    $frutas = array(
     'citrica' => array('limao', 'laranja', 'tangerina'),
     'vermelhas' => array('morango', 'maca', 'ameixa'),
     'verdes'    => array('abacate', 'uva', 'banana'), 
     'tropical'  => array('coco', ' maracuja', 'abacaxi')
    );
    //foreach é um loop para interage sobre arrays
    foreach ($frutas as $categorias => $elementos){
     echo "<br> Frutas $categorias "
             . implode(',', $elementos) . '<br>';
    }
    //switch 
    print("<br> Cardapio da semana:" .
           " 1 - Massas, 2 - Legumes, 3 - Carnes :::");
    $escolha = 1;
    switch($escolha){
     case 1:{
          print(' <br>voce escolheu se alimentar com massas');
          break;
     } 
     case 2: {
          print ('<br>Voce escolheu legumes');
          break;
     }
     case 3: {
          print ('<br>Voce escolheu Carnes');
          break;
     }
     default:
     echo ' voce não quer nada!';
    }
?>
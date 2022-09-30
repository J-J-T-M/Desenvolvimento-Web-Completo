<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso PHP</title>
</head>
<body>
    <?php
    function CalcularIRPF($salario){
        $IRPF = 0;
       if ( $salario <= 1903.98 ){ 
            print"Insento de imposto"; 
        } else if ( $salario >= 1903.99 && $salario <= 2826.65 ){
                $IRPF = $salario * 7.5/100;
            print"Aliquota de 7,5% $IRPF";
        } else if ( $salario >= 2826.66 && $salario <= 3751.05 ){
            $IRPF = $salario * 15/100;
            print"Aliquota de 15% $IRPF"; 
        } else if ( $salario >= 3751.06 && $salario <= 4664.68 ){
            $IRPF = $salario * 22.5/100;
            print"Aliquota de 22,5% $IRPF";
        }else{
            $IRPF = $salario * 27.5/100;
            echo"Aliquota de 27,5% $IRPF";
        }
            
         
        }
    CalcularIRPF(5000);
    



    ?>
    
 
    </body>
</html>
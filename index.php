<?php
    class VagaTargetSistemas {

        public function exe1(){
            $index = 13;
            $soma = 0;
            $k = 0;

            while($k < $index){
                $k++;
                $soma = $soma + $k;
                var_dump($soma);
            }

            // O valor final de $soma será 91
        }

        public function exe2(int $number){
            $fibonacci_anterior = 0;
            $fibonacci_atual = 1;

            if ($number == 0 || $number == 1) {
                echo "O número $number pertence a sequência de Fibonacci.\n";
                return;
            }

            while ($fibonacci_atual <= $number) {
                if ($fibonacci_atual == $number) {
                    echo "O número $number pertence a sequência de Fibonacci.\n";
                    return;
                }

                $temp = $fibonacci_atual;
                $fibonacciAtual = $fibonacci_atual + $fibonacci_anterior;
                $fibonacciAnterior = $temp;
            }

            var_dump('O número ' + $number + ' não pertence a sequencia de Fibonacci');
        }

        public function exe3(){
            $json_dados_faturamento = '{"empresa":"target Sistemas","mes":"Janeiro","ano":2025,"faturamento_diario":[{"dia":1,"faturamento":2500.5},{"dia":2,"faturamento":3100},{"dia":3,"faturamento":2800.75},{"dia":4,"faturamento":1500},{"dia":5,"faturamento":3200.25},{"dia":6,"faturamento":0},{"dia":7,"faturamento":0},{"dia":8,"faturamento":4500},{"dia":9,"faturamento":2900.4},{"dia":10,"faturamento":3100.75},{"dia":11,"faturamento":2300.3},{"dia":12,"faturamento":2800},{"dia":13,"faturamento":0},{"dia":14,"faturamento":0},{"dia":15,"faturamento":3400.6},{"dia":16,"faturamento":3600.45},{"dia":17,"faturamento":2900.25},{"dia":18,"faturamento":2700.8},{"dia":19,"faturamento":2500},{"dia":20,"faturamento":3100.2},{"dia":21,"faturamento":0},{"dia":22,"faturamento":0},{"dia":23,"faturamento":3900},{"dia":24,"faturamento":4200.1},{"dia":25,"faturamento":3100.3},{"dia":26,"faturamento":2700.5},{"dia":27,"faturamento":0},{"dia":28,"faturamento":0},{"dia":29,"faturamento":4500.75},{"dia":30,"faturamento":3800.6},{"dia":31,"faturamento":3900.8}]}';

            $faturamento_empresa = json_decode($json_dados_faturamento);

            if(!empty($faturamento_empresa['faturamento_diario'])){
                $menor_valor_faturado_diario = 0;
                $maior_valor_faturado_diario = 0;
                $faturamento_mensal = 0;

                foreach($faturamento_empresa['faturamento_diario'] as $faturamento){

                    if($menor_valor_faturado_diario > $faturamento['faturamento']){
                        $menor_valor_faturado_diario = $faturamento['faturamento'];
                    }

                    if($maior_valor_faturado_diario < $faturamento['faturamento']){
                        $maior_valor_faturado_diario = $faturamento['faturamento'];
                    }

                    if($faturamento['faturamento'] > 0){
                        $faturamento_mensal = $faturamento_mensal + $faturamento['faturamento'];
                        $qtde_dias = $faturamento['dia'];
                    }

                }

                $media_faturamento_diario = $faturamento_mensal / $qtde_dias;
                $contador_dias = 0;

                foreach($faturamento_empresa['faturamento_diario'] as $fatura){
                    if($fatura['faturamento'] > $media_faturamento_diario){
                        $contador_dias++;
                    }
                }

                var_dump('O menor valor faturado foi R$ ' + $menor_valor_faturado_diario + ' , o maior valor faturado foi de R$ ' + $maior_valor_faturado_diario + ' , a media de faturamento diario foi de R$ ' + $media_faturamento_diario);
            }

        }

        public function exe4(){
            $faturamento_sp = 67836.43;
            $faturamento_rj = 36678.66;
            $faturamento_mg = 29229.88;
            $faturamento_es = 27165.48;
            $faturamento_outros = 19849.53;

            $total_faturamento = $faturamento_sp + $faturamento_rj + $faturamento_mg + $faturamento_es + $faturamento_outros;
            $percent_sp = number_format( (($faturamento_sp * 100) / $total_faturamento),2,'.','' );
            $percent_rj = number_format( (($faturamento_rj * 100) / $total_faturamento),2,'.','' );
            $percent_mg = number_format( (($faturamento_mg * 100) / $total_faturamento),2,'.','' );
            $percent_es = number_format( (($faturamento_es * 100) / $total_faturamento),2,'.','' );
            $percent_outros = number_format( (($faturamento_outros * 100) / $total_faturamento),2,'.','' );

            var_dump('O percentual de SP foi de ' + $percent_sp + ' , o percentual de RJ foi de ' + $percent_rj +' , o percentual de MG foi de ' + $percent_mg + ' , o percentual de ES foi de ' + $percent_es + ' , e o percentual dos demais estados foram de ' + $percent_outros);
        }

        public function exe5(array $array, bool $key_antiga = false){
            $reverso = [];
    
            foreach (array_keys($array) as $key) {
                if ($key_antiga) {
                    $reverso = [$key => $array[$key]] + $reverso;
                } else {
                    $reverso[] = $array[$key];
                }
            }
            
            return $reverso;
        }
    }
?>

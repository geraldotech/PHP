<?php
$start_time = microtime(true); // Marca o início do processo

echo "<p>Iniciou em $start_time</p>";

// Simulação de um processo (10 segundos)
sleep(5);

$end_time = microtime(true);

echo "<p>Finalizou em $end_time</p>";

// Calcula o tempo total de execução em segundos
$total_execution_time = $end_time - $start_time;

// Converte o tempo para minutos
$total_execution_minutes = $total_execution_time / 60;

// Formata os valores
$tempo_fim_min = number_format($total_execution_minutes, 2, '.', '');
$tempo_fim_scs = number_format($total_execution_time, 4, '.', '');

// Exibe a mensagem com os tempos
echo "<p>$total_execution_time segundos</p>";
echo "<h2>Carga finalizada com sucesso! Tempo total: $tempo_fim_min minutos</h2>";
echo "<h2>Carga finalizada com sucesso! Tempo total: $tempo_fim_scs segundos</h2>";
?>

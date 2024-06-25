<?php

function encrypt($input)
{
    // Primeira passada: deslocar letras 3 posições para a direita na tabela ASCII
    $first_pass = '';
    for ($i = 0; $i < strlen($input); $i++) {
        $char = $input[$i];
        // Verificar se o $char passando e alfabéticos
        if (ctype_alpha($char)) {
            // Se for move tres posições da tabela ASCII
            $first_pass .= chr(ord($char) + 3);
        } else {
            $first_pass .= $char;
        }
    }

    // Segunda passada: inverter a linha
    $second_pass = strrev($first_pass);

    // Terceira passada: deslocar caracteres a partir da metade para a esquerda na tabela ASCII
    $half_length = intval(strlen($second_pass) / 2);
    $third_pass = '';
    for ($i = 0; $i < strlen($second_pass); $i++) {
        // Verificar se esta na metade da String
        if ($i >= $half_length) {
            $third_pass .= chr(ord($second_pass[$i]) - 1);
        } else {
            $third_pass .= $second_pass[$i];
        }
    }

    return $third_pass;
}

// Leitura da entrada
$input = fopen('php://stdin', 'r');
$output = fopen('php://stdout', 'w');

// Ler o número de linhas
$N = intval(trim(fgets($input)));

for ($i = 0; $i < $N; $i++) {
    $line = trim(fgets($input));
    $encrypted_line = encrypt($line);
    fwrite($output, $encrypted_line . "\n");
}

fclose($input);
fclose($output);

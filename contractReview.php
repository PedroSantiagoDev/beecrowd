<?php

function contractReview($input)
{
    list($digitToRemove, $number) = explode(' ', $input);
    $filteredNumber = str_replace($digitToRemove, '', $number);

    // Se o resultado estiver vazio, significa que o número é 0
    if ($filteredNumber === '') {
        return '0';
    }

    // Remove possíveis zeros à esquerda convertendo para um número inteiro e depois para string
    return strval(intval($filteredNumber));
}

// Leitura da entrada
$input = fopen('php://stdin', 'r');
$output = fopen('php://stdout', 'w');

while (true) {
    $line = trim(fgets($input));
    if ($line == '0 0') {
        break;
    }
    $contract_review_line = contractReview($line);
    fwrite($output, $contract_review_line . "\n");
}

fclose($input);
fclose($output);


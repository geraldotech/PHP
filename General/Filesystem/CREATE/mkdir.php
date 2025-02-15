<?php 
// Criar o diretório caso não exista e retorna o erro caso nao crie
if (!is_dir($logDir)) {
    if (!mkdir($logDir, 0777, true)) {
        echo "Erro ao criar o diretório: " . print_r(error_get_last(), true);
    } else {
        echo "Diretório criado com sucesso!";
    }
} 
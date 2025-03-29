#!/bin/bash

# Solicita a mensagem do commit
echo "Digite a mensagem do commit:"
read mensagem

# Adiciona os arquivos ao git
git add .

# Faz o commit com a mensagem fornecida
git commit -m "$mensagem"

# Realiza o push para o repositório remoto
git push

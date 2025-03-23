## Configuração de php.ini

- Como lozalicar o php.ini
- crie um:

```php
 <?php
phpinfo();
```

- verifique em `Loaded Configuration File`

### Aumentar tamanho do upload:
- upload_max_filesize = 20M

### se estiver no Docker com ubuntu:
- acessar o container: `gmapdev@DESKTOP-4GOEVQ2:~/docker/a2/src/sga$ docker exec -it apache2PHP8 bash` depois fazer o build novamente
![image](https://github.com/user-attachments/assets/37516fb8-7f66-470e-b300-24182888ee49)



### habilitar o .zip 
- descomentar: `extension=zip`

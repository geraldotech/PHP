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

```shell
root@5b99889b1ca7:/var/www/html# cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini
root@5b99889b1ca7:/var/www/html# vi /usr/local/etc/php/php.ini

# setup 
upload_max_filesize = 64M

# Reinicie o Apache
root@5b99889b1ca7:/var/www/html# apachectl -k restart
```



### habilitar o .zip 
- descomentar: `extension=zip`

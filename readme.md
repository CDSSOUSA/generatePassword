Gerador de senha
=======================

Simples gerador de senha.

## Composer
Para funcionamento, é necessário rodar o Composer para que sejam criados os arquivos responsáveis pelo autoload das classes.

Caso não tenha o Composer instalado, baixe pelo site oficial: [https://getcomposer.org/download](https://getcomposer.org/download/)

Para rodar o composer, basta acessar a pasta do projeto e executar o comando abaixo em seu terminal:
```shell
 composer install
```

## Utilização

Para usar este gerador basta seguir o exemplo abaixo:

```php
<?php 
require __DIR__.'/vendor/autoload.php';

//DEPENDÊNCIAS
use App\GeneratePassword;

//INSTÂNCIA
$password = new GeneratePassword();

/* CHAMADA DA FUNÇÃO PASSANDO OS PARAMENTOS;
   O METÓDO RECEBE OS PARAMENTOS: int size, bool upperCase, bool lowerCase, bool number e bool symbol,
   que define como será composta a senha
 */
echo $password->generate(50, true, true, true, true);
```
## Requisitos
- Necessário PHP 7.0 ou superior

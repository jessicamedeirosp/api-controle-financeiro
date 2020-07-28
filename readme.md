# CONFIGURAR PROJETO 

## REQUISITOS
* PHP >= 7.0
* XAMP ou similares
* Insomnia ou Postman (para testar as requisições)
**OBS:** O .htaccess e web.config (iis) são responsável pela url amigável

## LINUX
Caso utilize linux segue tutorial para configurar ambiente PHP 

https://netbeans.org/kb/docs/php/configure-php-environment-ubuntu_pt_BR.html 

## WINDOWS 
Caso utilize windows segue tutorial para configurar ambiente PHP

https://netbeans.org/kb/docs/php/configure-php-environment-windows_pt_BR.html

## EXECUTAR O PROJETO

1 - Clone o projeto
```
git clone https://github.com/jessicamedeirosp/api-controle-financeiro.git
```
2 - Importe o banco de dados
No PHPMYADMIN clique em importar e selecione o arquivo **jessmede_controle_financeiro.sql**
Ajuste a conexão no ConexaoModel.php 

3 - Configure o projeto no XAMPP ou IIS

4 - Utilize o Insomnia ou Postman para testar 



## CRIAR O BANCO DE DADOS
Utilize o arquivo **jessmede_controle_financeiro.sql** que está na raiz do projeto para criar o banco de dados na sua máquina ou no seu servidor.
Caso precise trocar os dados da conexão com o banco de dados está no ConexaoModel.php : 
```
$usuario = 'root';
$senha = '5@j4F#45';
self::$conexao = new \PDO('mysql:host=localhost;dbname=jessmede_controle_financeiro;',$usuario,$senha);
```

## URLs da API 

Para obter o extrato do cliente utilize a url abaixo e passe via POST o **CPF**:
```
 /extrato  
```
![Alt text](img/extrato.png)

Para obter o saldo do cliente utilize a url abaixo e passe via POST o **CPF**:
```
 /saldo  
```
![Alt text](img/saldo.png)

Para debitar do saldo do cliente utilize a url abaixo e passe via POST o **CPF** e **VALOR** (o valor pode ser passado posivo ou negativo ex. -100 ou 100) a ser debitado:
```
 /debito  
```
![Alt text](img/debito.png)

Para creditar no saldo do cliente utilize a url abaixo e passe via POST o **CPF** e **VALOR** (o valor pode ser passado posivo ou negativo ex. -100 ou 100) a ser creditado:
```
 /credito  
```
![Alt text](img/credito.png)

## URLs da API 
Para transferir um valor do saldo do cliente A para o cliente B utilize a url abaixo e passe via POST o **CPF** do cliente A e **CPF_DESTINATARIO** e **VALOR** a ser transferido:
```
 /transferencia  
```
![Alt text](img/transferencia.png)

**OBS:** Usar **FORM** para enviar os dados (Insomnia o Postman)
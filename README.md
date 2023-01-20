# Passo a Passo Para Rodar o Projeto
* Realizar o clone do projeto
* No terminal, realizar a instalação do npm com o `npm install` e atualizar com o `npm update`<br>
**Obs:** é necessário possuir o npm já instalado na máquina. Caso ainda não possue, acesse o site do [Node](https://nodejs.org/en/) e realize o download
* Realize a instalação e a atualização do composer no projeto, usando `composer install`e `composer update`
* Copie o arquivo `.env.example` como `.env` e confira se os dados do banco de dados do arquivo correspondem aos da sua máquina
* Insira as tabelas no banco, utilizando o comando `php artisan migrate`
* Adicione os dados necessários as tabelas ja criadas, com o `php artisan db:seed`
* Inicialize o servidor com o comando `php artisan serve`

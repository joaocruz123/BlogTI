## Sobre o Projeto

Este projeto é tem a finalidade de qualificar um integrante do time de desenvolvimento da AGV, como um Desenvolvedor WEB PHP FULL-STACK. Ele é um simple blog que possui uma aréa destinada  para o usuario postar artigos, gerenciar as categorias e os seus comentários.

## Backend
O projeto conta com um backend responsável por realizar toda a comunicação com o banco de dados, e uma API Restfull funcional.

- API RESTful - OK
- Conexão com Banco de dados relacional - OK

## Frontend
O Frontend do projeto apresenta os recursos de Responsividade e utiliza o recurso blade disponivel no Laravel.

- Responsivo - OK
- Integrado com a API. - OK


## Etapas

MVP

- Eu como autor gostaria de publicar um artigo no blog com título, imagem e descrição. - OK
- Eu como autor gostaria de editar um artigo já publicado. - OK
- Eu como autor gostaria de excluir um artigo. - OK
- Eu como autor gostaria de uma área exclusiva com autenticação para publicar, editar ou excluir um artigo. - OK
- Eu como usuário gostaria que a página inicial exiba os últimos artigos publicados em ordem decrescente com a imagem, título e um resumo do artigo. - OK
- Eu como usuário gostaria que quando clicar na imagem título ou resumo, ser redirecionado para uma página que contenha o artigo completo e seus comentários. - OK
- Eu como usuário gostaria de publicar um comentário anônimo (sem login). - OK

Backlog 

- Eu como usuário gostaria de publicar um comentário (com login). - OK
- Eu como autor gostaria de excluir um comentário na página de edição do artigo. - OK
- Eu como autor gostaria de exibir as datas de criação do artigo e a data da última atualização caso o mesmo for editado. - OK
- Eu como usuário gostaria de realizar uma pesquisa para filtrar os artigos publicados. - OK
- EnviarEu como autor gostaria de definir uma categoria para o meu artigo. - OK
- EnviarEu como usuário gostaria de exibir os artigos de uma determinada categoria. - OK
- EnviarEu como autor gostaria de incluir tags em um artigo. - Em andamento
- EnviarEu como usuário gostaria de exibir artigos de uma determinada tag. - Em andamento


## Requisitos do Projeto
- Laravel 5.6
- PHP >= 7.2.12
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- MariaDB


## Instalação

```
git clone https://github.com/milon/laravel-blog.git blog
cd blog
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
```
Acessar o sistema

- Usuário: admin@admin.com
- Senha: 123456

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

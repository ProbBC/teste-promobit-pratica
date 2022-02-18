# Desafio Promobit - Etapa Prática

O projeto foi desenvolvido com o framework CakePHP 4, PHP 7.4 e MySQL.

## Instalação com docker-compose

1. Clone este repositório

2. Rode na raiz do projeto:

```bash
docker-compose up -d
```
3. Na primeira vez, o container irá realizar a instalação das dependências do projeto (composer install) em background, isso pode demorar um pouco.

4. A aplicação estará disponibilizada em: http://localhost:2532

5. Acesse http://localhost:2532/users/add para adicionar um usuário.

6. Faça o login com o usuário criado e teste o sistema.

## Instalação manual

OBS: O CakePHP 4 funciona a partir do PHP 7.2 e necessita das extensões mbstring e intl.

O XAMPP já tem a extensão intl inclusa, mas é preciso descomentar a linha extension=php_intl.dll no arquivo php.ini e então, reiniciar o servidor através do painel de controle.

1. Clone este repositório
2. Rode na raiz do projeto:

```bash
composer install
```

3. Procure a seguinte linha de código no arquivo config/app_local.php e altere com as credenciais do banco de dados:

```php
'default' => [
    'host' => 'localhost',

    'username' => 'promobit',
    'password' => 'promobit',

    'database' => 'teste-promobit',
```

4. Rode as migrations para criar as tabelas do banco:

```bash
php bin/cake.php migrations migrate
```

5. Rode a aplicação em um servidor PHP de preferência ou através do servidor de desenvolvimento nativo do Cake:

```bash
php bin/cake.php server
```

6. O comando acima disponibiliza a aplicação em http://localhost:8765/.

7. Acesse http://localhost:8765/users/add para adicionar um usuário.

8. Faça o login com o usuário criado e teste o sistema.

## SQL do relatório de relevância de produtos

Alterei os nomes das tabelas para o plural, para melhor atender as convenções do framework utilizado.
O SQL utilizado com os nomes alterados:

```sql
SELECT tags.name AS tags, COUNT(products_tags.product_id) as qtd_produto
FROM tags
LEFT JOIN products_tags 
  ON tags.id = products_tags.tag_id
GROUP BY tags.name
ORDER BY qtd_produto DESC
```

SQL com os nomes originais:

```sql
SELECT tag.name AS tags, COUNT(product_tags.product_id) as qtd_produto
FROM tag
LEFT JOIN product_tag 
  ON tag.id = product_tag.tag_id
GROUP BY tag.name
ORDER BY qtd_produto DESC
```

<p align="center">
  <a href="https://nextjs.org">
    <picture>
      <source media="(prefers-color-scheme: dark)" srcset="https://aula-youtube1.s3.sa-east-1.amazonaws.com/b8227fc2721e4d7ca2e2561139be7ca2.png">
      <img src="https://aula-youtube1.s3.sa-east-1.amazonaws.com/b8227fc2721e4d7ca2e2561139be7ca2.png">
    </picture>
    <h1 align="center">Doc Admin Pro Api</h1>
  </a>
</p>

# Guia de Instalação do Projeto

## 1. Clonar o Repositório

Para começar, você precisará clonar o repositório do projeto. Abra o terminal e execute o seguinte comando:

```sh
git clone https://github.com/Josenilsonfariasx/DocAdminPro-api
```
## 2. Entrar na Raiz do Diretório
```sh
cd DocAdminPro-api 
```
## 3. Instalar as dependencias
```sh
composer install
```
## 4. Instalar o Imagick (se necessário)
Dependendo das dependências do seu servidor
```sh
pecl install imagick
```
## 5. Rodar o Build com Sail
Para construir e levantar os contêineres Docker com Sail, execute:
```sh
./vendor/bin/sail up --build
```
## 6. Executar as Migrações do Laravel
Depois que o ambiente estiver funcionando, execute as migrações para criar as tabelas do banco de dados:
```sh
./vendor/bin/sail artisan migrate
```
## 7. Executar o Seed
Para popular o banco de dados com dados iniciais, execute o seed
```sh
./vendor/bin/sail artisan db:seed
```
O seeder vai gerar um usuario com estes dados: 
```
{
  name: fabrica Info
  email: fabrica@example.com
  password: dataBase!31
}

```

---

## Voce pode vizualizar o sistema de filas do horizon no
```sh
localhost/horizon
```

## Documentação do Projeto
Uma API desenvolvida em Laravel 11, utilizando Docker para garantir uma configuração uniforme e independente de ambientes. A API permite a gestão de conteúdo extraído de PDFs por meio de OCR, armazenando o conteúdo no banco de dados para posterior pesquisa.

## Funcionalidades Principais:

1. **Utilização do Laravel Horizon para gerenciar filas e processar a leitura de PDFs por meio de OCR.**
2. **Armazenamento do conteúdo extraído no banco de dados para posterior pesquisa.**
3. **Utilização do banco de dados PostgreSQL, incluído em um container Docker.**
4. **Utilização de Seeder para cadastrar o usuário inicial do sistema.**
5. **Utilização de migrations Laravel para gerar relacionamentos entre as tabelas do banco de dados de forma estruturada.**
6. **Requisitos do Sistema:**
7. **Docker instalado no sistema operacional.**
8. **Composer instalado no sistema operacional.**

##  🔜 Melhorias futuras

1. **Documentação Detalhada da API: Criar uma documentação detalhada da API utilizando ferramentas como o Swagger ou o Postman, para facilitar o uso e a integração por parte dos desenvolvedores.**
2. **Implementação de Logs e Monitoramento: Adicionar logs detalhados para rastrear o comportamento da aplicação e implementar ferramentas de monitoramento para acompanhar o desempenho e identificar problemas em tempo real.**
3. **Implementação de Webhooks: Adicionar suporte para webhooks, permitindo que os usuários recebam notificações em tempo real sobre eventos importantes na aplicação**
4. **Utilização de um Servidor S3 da Amazon para salvar os documentos utilizados dos usuarios**

# Como nao deu tempo documentar todas as rotas, baixe o arquivo json do insomnia a baixo 
```sh
https://aula-youtube1.s3.sa-east-1.amazonaws.com/Insomnia_2024-05-24.json
```

## Autor
  <table>
    <tr>
      <td align="center">
        <a href="http://github.com/Josenilsonfariasx">
          <img src="https://i.imgur.com/SgdMMR7.png" width="100px;" alt="Foto de Tati Alves no GitHub"/><br>
          <sub>
            <b>Josenilson Farias</b>
          </sub>
        </a>
      </td>
    </tr>
  </table>
  
## :dart: Doc Admin Pro Api

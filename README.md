# Paytour-Teste

![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/mysql-4479A1.svg?style=for-the-badge&logo=mysql&logoColor=white)
![Docker](https://img.shields.io/badge/docker-%230db7ed.svg?style=for-the-badge&logo=docker&logoColor=white)
![Nginx](https://img.shields.io/badge/nginx-%23009639.svg?style=for-the-badge&logo=nginx&logoColor=white)

O projeto se trata de um formulário para cadastro e envio de currículos com os seguintes campos: Nome, e-mail, telefone, Cargo Desejado (Campo texto livre), Escolaridade (Campo select), observações, arquivo e data e hora do envio. Dessa forma, todos os campos do formulário foram validados, seguindo as observações.

## Requisitos
para rodar esse projeto você precisará apenas do Docker.

## Instalação

1. Clonar o repositório:

```
git clone https://github.com/johnata-matheus/paytour-teste.git
```

2. Na pasta do projeto, start a aplicação:

```
docker-compose up -d
```

3. Execute as migrations:

```
docker exec app-paytour php artisan migrate
```

## Endpoint 

1. O nginx está rodando na porta :8989
   
```
http://localhost:8989/user
```

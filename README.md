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

## Configuração

1. Crie um arquivo .env e dentro dele cole todo o arquivo do env.example.

2. Mude as variaveis de acesso ao banco:

```
DB_CONNECTION=mysql
DB_HOST=database
DB_PORT=3306
DB_DATABASE=paytour
DB_USERNAME=root
DB_PASSWORD=root
```
3. Coloque suas informações do smtp do gmail:
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=seu username
MAIL_PASSWORD=sua senha
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```
## Subir a aplicação

1. Na pasta do projeto, start a aplicação:

```
docker-compose up -d
```

2. Ajuste a permissão da pasta store:

```
docker exec app-paytour chmod -R 777 storage
```

3. Instale as depedências:

```
docker exec app-paytour composer install
```

5. Execute as migrations:

```
docker exec app-paytour php artisan migrate
```

6. Gere a key:
   
```
docker exec app-paytour php artisan key:generate
```

## Endpoint 

1. O nginx está rodando na porta :8989
   
```
http://localhost:8989/user
```

## Aplicação 

![image](https://github.com/johnata-matheus/paytour-teste/assets/105123252/46251dc0-7330-44a2-b595-046f4662043d)

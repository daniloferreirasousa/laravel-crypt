># <center>**🔐 Laravel Crypt 🔐**</center>
>
> Este repositório é para fins de estudos sobre Criptografia, exemplos que utilizam Cifras antigas e modernas serão implementadas no projeto.

### Cifras implementadas:

- Cifra de Vigenère
- Cifra de Vernam

---

## Instalação e uso

1. Copie o arquivo **.env.example** para **.env** com o seguinte comando no terminal

```css
cp .env.example .env
```

2. Defina as seguintes váriáveis do arquivo **.env** que foi criado com o comando acima


```json
APP_NAME=nome_do_seu_app
APP_URL=url_do_seu_app
APP_USER=nome
APP_UID=1000

DB_HOST=nome_da_imagem_do_banco
DB_DATABASE=nome_do_seu_banco
DB_USERNAME=nome_do_seu_usuario
DB_PASSWORD=sua_senha_do_banco

CACHE_DRIVE=redis
QUEUE_CONNECTION=redis
SESSION_DRIVE=redis

REDIS_HOST=redis
```

3. Agora que já temos as nossas variáveis de ambiente definidas, devemos criar o nosso container docker com o seguinte comando:

```css
docker-compose up -d
```

4. Após criado e executado o container da nossa aplicação, é necessário acessar via **bash** a imagem da aplicação, primeiro devemos verificar qual é o nome da nossa imagem app, e logo após acessá-la com os comandos abaixo:

```
docker ps

docker exec -it [nome-sua-app] bash
```

5. Quando tiver acessado sua imagem da aplicação digite o seguinte comando para instalar e atualizar todas as dependências da aplicação:

```
composer install
composer update -o --prefer-dist
```

6. Crie a chave da aplicação com o seguinte comando: 
```
php artisan key:generate
```

_Pronto, sua aplicação já está configurada e pronta para ser acessada._

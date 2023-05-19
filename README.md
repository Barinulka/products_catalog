# Чтобы запустить проект нужно:

1. Создать локальную копию репозитория
```
git clone https://github.com/Barinulka/products_catalog.git
```
2. В папке с проектом скопировать файл:
>.env.example.php

3. Импортировать БД из корня проекта
>products.sql

4. Переименовать .env.example.php в 
>.env.php

5. Заполнить данные для подключения к БД
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=products
DB_USERNAME=имя пользователя (mysql)
DB_PASSWORD=пароль пользователя (mysql)
```

6. Установить зависимости 
```
composer install
```

7. Сгенерируйте ключ шифрования приложения
```
php artisan key:generate
```

8. Установите зависимости NPM
```
npm install
```

9. Если подключена пустая БД, необходимо применить доступные миграции
```
php artisan migrate
```

10. Для OpenServer добавить в корневой каталог файл .htaccess c следующим содержимым:
```
RewriteEngine On
RewriteRule (.*) public/$1
``` 

11. Запустить vite
```
npm run dev
```
или сгенерировать (js/css) файлы
```
npm run build
```

11. Запустить сервер (если необходимо)
```
php artisan serve
```

12. Аккаунт админа
```
admin@admin.com
admin
```
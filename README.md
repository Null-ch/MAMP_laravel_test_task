<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
<p align="center"><a href="https://inamr.ru/" target="_blank"><img src="https://github.com/Null-ch/MAMP_laravel_test_task/assets/65172872/7db8465e-37cc-48b7-9e0b-3884cc7aeec7" width="400" alt="IAMR Logo"></a></p>


# ОПИСАНИЕ ПРОЕКТА

В данном проекте реализуется Тестовое задание на позицию Backend-разработчика (Junior):
- REST API;
- Административная часть сервиса;
- Управление содержимым с помощью WYSIWYG-редактора (<a href="https://summernote.org/" target="_blank">summernote</a>);
- Плагин для деактивации записей (toggle switch);
- Наполнение фиктивными данными (фабрики);
- Плагин для изменения порядка сортировки;

Данные хранятся в подключенной БД MySQL

# ИНСТАЛЯЦИЯ

Склонируйте проект в директорию с сервером:

`https://github.com/Null-ch/MAMP_laravel_test_task.git`

Затем, открыв из папки проекта консоль, введите команду для установки пакетов Laravel:

`composer update`

Создайте базу данных на сервере и заполните поля файла .env, находящийся в папке проекта по примеру:

`DB_CONNECTION=mysql`

`DB_HOST=127.0.0.1`

`DB_PORT=3306`

`DB_DATABASE=MAMP`

`DB_USERNAME=root`

`DB_PASSWORD=`

В открытой консоли директории проекта введите команду для генерации таблиц базы данных:

`php artisan migrate`

В открытой консоли директории проекта введите команду для генерации фейковых записей в базе данных:

`php artisan migrate --seed`

В той же консоли для запуска сайта по адресу `http://127.0.0.1:8000` введите команду:

`php artisan serve`

В новой консоли для запуска NodeJS и корректной работы введите команду:

`npm install`
`npm run dev`

В новой консоли для запуска и корректного отображения изображений введите команду:

`php artisan storage:link`

Откройте сайт в браузере по адресу  `http://localhost:8000`
## Задание
<details>
<summary> ТЗ </summary>
<img src="https://github.com/Null-ch/MAMP_laravel_test_task/assets/65172872/92845b63-b54d-4224-aca7-1c1bc8d9a5cf">
</details> 

## API:

'api/register', метод POST, передается:
'email';
'name';
'password' => (минимум 8 символов);
Возвращает данные о пользователе и bearer токен для авторизации

'api/login', метод POST, передается:
'email';
'password';

'api/v1/getPosts', метод POST, возвращает список событий
Передается параметр page (число). Если номер страницы не передан - возвращает 10 постов с первой страницы

'api/v1/getCategories', метод GET, возвращает все категории статей;

'api/v1/getPostsByCategory', метод POST, возвращает статьи по заданной категории
Передается параметр id (категории). Если id категории не был передан - возвращает 10 постов с первой страницы

'api/v1/getPostsBySlug', метод POST, возвращает статьи по заданному слагу
Передается параметр slug (категории). Если slug статьи не был передан - возвращает 10 постов с первой страницы

## Обзор наполнения

<summary> <h4> Главная </h4> </summary>
<img src="https://github.com/Null-ch/MAMP_laravel_test_task/assets/65172872/e851658d-e2cd-47a9-87d1-e87b3ba35371">

<summary> <h4> Раздел админ панели "Пользователи" </h4> </summary>

<img src="https://github.com/Null-ch/MAMP_laravel_test_task/assets/65172872/39e418e7-4e8a-4492-95ac-c2e5234cbc29">
<img src="https://github.com/Null-ch/MAMP_laravel_test_task/assets/65172872/763c77a9-b21e-4f52-b3f9-262a28258a89">
<img src="https://github.com/Null-ch/MAMP_laravel_test_task/assets/65172872/15ec51f5-c11b-48d8-b027-eb06e569981f">

<summary> <h4> Раздел админ панели "Категории" </h4> </summary>

<img src="https://github.com/Null-ch/MAMP_laravel_test_task/assets/65172872/17f26b32-35a5-4a1b-8384-e42719f41eff">
<img src="https://github.com/Null-ch/MAMP_laravel_test_task/assets/65172872/c4ffe2be-3fdc-4d6d-a98b-97ce9c37ebda">
<img src="https://github.com/Null-ch/MAMP_laravel_test_task/assets/65172872/08be09db-11f1-47cd-8699-1061f4afbb24">

<summary> <h4> Раздел админ панели "Статьи" </h4> </summary>

<img src="https://github.com/Null-ch/MAMP_laravel_test_task/assets/65172872/9b4c69d1-94ae-4a7b-9a41-c5b234049167">
<img src="https://github.com/Null-ch/MAMP_laravel_test_task/assets/65172872/62be18db-af9a-4591-9de9-fd47d0430288">
<img src="https://github.com/Null-ch/MAMP_laravel_test_task/assets/65172872/a31cb356-0ffd-47eb-9659-8f8a81e4b389">


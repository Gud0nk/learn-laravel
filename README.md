## 🛠️ Инструкция по модификации файла hosts для обхода региональных ограничений Packagist

> ⚠️ При возникновении сетевых тайм-аутов или блокировок со стороны CDN при выполнении команд ```composer create-project``` или ```composer install``` необходимо перенаправить трафик на валидные IP-адреса репозиториев в обход локальных DNS-серверов.

1. Откройте конфигурационный файл по пути: ```C:\Windows\System32\drivers\etc\hosts```
2. Вставьте подготовленный блок записей в конец файла:

```text
138.199.37.232  packagist.org
138.199.37.232  repo.packagist.org
```

---

## 🚀 Инициализация нового проекта Laravel

### 1. Актуализация пакетного менеджера

Обновление локального исполняемого файла Composer до последней стабильной версии (GA):

```bash
composer self-update
```

### 2. Инициализация каркаса приложения

Развертывание чистого скелета Laravel в текущую рабочую директорию:

```bash
composer create-project laravel/laravel .
```

### 3. Конфигурация API-слоя

Инсталляция и автоматическая настройка пакета аутентификации (Laravel Sanctum), а также генерация базовых маршрутов для работы в режиме Stateless API:

```bash
php artisan install:api
```

### 4. Экспорт конфигурации CORS

Публикация конфигурационного файла config/cors.php для управления политиками кросс-доменных запросов (Cross-Origin Resource Sharing):

```bash
php artisan config:publish cors
```

### 5. Инициализация символьной ссылки для Storage

Создание симлинка из публичной директории public/storage в изолированное хранилище storage/app/public для обеспечения контролируемого HTTP-доступа к медиафайлам:

```bash
php artisan storage:link
```

### 6. Маршрутизация веб-сервера (Apache)

Создание или перезапись файла конфигурации .htaccess в корневой директории для перенаправления входящего трафика на фронт-контроллер public/index.php:

```apache
RewriteEngine On
# Перенаправление всех входящих HTTP-запросов в публичную директорию public/
RewriteRule ^(.*)$ public/$1 [L]
```

---


## 📦 Развертывание существующего проекта из репозитория

### 1. Клонирование и инициализация зависимостей

Загрузка исходного кода из удаленного репозитория и установка backend-зависимостей согласно ```composer.lock```:

```bash
git clone https://github.com/Alomon/learn-laravel-13.git .
cd learn-laravel-13
composer install
```

### 2. Подготовка окружения и генерация апп-ключа

Создание локального файла конфигурации окружения и инициализация ключа шифрования (APP_KEY) для защиты сессий и персональных данных:

```bash
cp .env.example .env
php artisan key:generate
```

### 3. Миграция и сидирование базы данных

Выполнение базовых DDL-скриптов для построения структуры таблиц с параллельным наполнением справочников тестовыми или системными данными (Seeders):

```bash
php artisan migrate --seed
```

---

## 🗄️ Конфигурация подключения к СУБД (.env)

Параметры интеграции с базой данных MySQL (версии 8.4+) и глобальные настройки сессий в файле .env:

```env
# Параметры подключения к СУБД
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=learn-laravel-13
DB_USERNAME=root
DB_PASSWORD=

# Драйвер сессий (локальное файловое хранилище)
SESSION_DRIVER=file
```

---

## Стандартные методы ресурсного контроллера

Для создания такого контроллера используется команда:
```bash
php artisan make:controller PostController --resource
```

- index() — отображает список всех ресурсов (например, всех статей).
    - HTTP-метод: GET
    - URL: /posts
- create() — отображает HTML-форму для создания нового ресурса. 
    - HTTP-метод: GET
    - URL: /posts/create
- store() — сохраняет новый ресурс в базу данных после отправки формы.
    - HTTP-метод: POST
    - URL: /posts
- show($id) — отображает конкретный ресурс (например, одну статью).
    - HTTP-метод: GET
    - URL: /posts/{post}
- edit($id) — отображает HTML-форму для редактирования существующего ресурса.
    - HTTP-метод: GET
    - URL: /posts/{post}/edit
- update(Request $request, $id) — обновляет существующий ресурс в базе данных.
    - HTTP-метод: PUT или PATCH
    - URL: /posts/{post}
- destroy($id) — удаляет ресурс из базы данных.
    - HTTP-метод: DELETE
    - URL: /posts/{post}

## Стандартные методы для API-контроллеров

Если вы разрабатываете API, вам не нужны методы, возвращающие HTML-формы (create и edit). Для генерации API-контроллера без этих методов используется флаг --api:

```bash
php artisan make:controller PostController --api
```

## Регистрация в маршрутах (Routing)

Чтобы не прописывать путь для каждого метода вручную, в файле маршрутов используют одну строку:
- Для обычного веб-ресурса: ```Route::resource('posts', PostController::class);```
- Для API-ресурса: ```Route::apiResource('posts', PostController::class);```

## Правила именования в экосистеме Laravel

1. Модели и База данных
   - Модели: PascalCase, единственное число.
     - Правильно: ```Post```, ```UserProfile```, ```Category```.
   - Таблицы: snake_case, множественное число (Laravel автоматически ищет такую таблицу для модели).
     - Правильно: ```posts```, ```user_profiles```, ```categories```.
   - Поля таблиц (Колонки): snake_case.
     - Правильно: ```title```, ```is_published```, ```created_at```.
   - Внешние ключи (Foreign Keys): Имя модели в единственном числе + _id.
     - Правильно: ```user_id```, ```post_id```.
   - Промежуточные таблицы (Many-to-Many): Имена связанных моделей в единственном числе, в алфавитном порядке, через подчеркивание.
     - Правильно: ```category_post``` (а не ```post_category```).

2. Контроллеры и Маршруты
   - Контроллеры: PascalCase, единственное число + суффикс Controller.
     - Правильно: ```PostController```, ```OrderController```.
   - Методы контроллеров: camelCase, строго стандартные CRUD-имена (для ресурсных) или глаголы действия.
     - Правильно: ```index```, ```store```, ```calculateTotal```.
   - URL маршрутов: kebab-case, множественное число для ресурсов.
     - Правильно: ```/user-profiles```, ```/posts/{post}/comments```.
   - Имена маршрутов (Route Names): snake_case или dot.notation (предпочтительно для ресурсов).
     - Правильно: ```posts.index```, ```user_profiles.show```.

3. Отношения в моделях (Relationships)
   - Один к одному / Многие к одному (hasOne, belongsTo): camelCase, единственное число.
     - Правильно: ```public function author()```
   - Один ко многим / Многие ко многим (hasMany, belongsToMany): camelCase, множественное число.
     - Правильно: ```public function comments()```

4. Другие компоненты архитектуры
   - Form Requests (Валидация): Назначение + суффикс Request.
     - Правильно: ```StorePostRequest```, ```UpdateProfileRequest```.
   - API Resources (Трансформаторы): Название модели + суффикс Resource (или Collection).
     - Правильно: ```PostResource```, ```PostCollection```.
   - Миграции: Описание действия в snake_case.
     - Правильно: ```create_posts_table```, ```add_votes_to_posts_table```.
   - Переменные и свойства: camelCase.
     - Правильно: ```$blogPost```, ```$isAvailable```.

5. Расширение файлов
   - Все файлы шаблонов обязаны иметь двойное расширение: ```.blade.php``` (например, index.blade.php).
   - Имя самого файла пишется исключительно в snake_case или kebab-case и строчными буквами.
   - Правильно: ```show_active.blade.php``` или ```show-active.blade.php```.
   - Неправильно: ```showActive.blade.php```.

6. Структура папок (Ресурсный подход)
   - Папки внутри resources/views/ группируются по имени сущности (модели) во множественном числе и строчными буквами — точно так же, как называются таблицы в БД или URL маршрутов.
   - Внутри этой папки создаются файлы, названия которых строго соответствуют стандартным методам контроллера, для которых они предназначены:
     - resources/views/posts/index.blade.php — для метода index() (список постов).
     - resources/views/posts/create.blade.php — для метода create() (форма создания).
     - resources/views/posts/show.blade.php — для метода show() (страница одного поста).
     - resources/views/posts/edit.blade.php — для метода edit() (форма редактирования).

7. Служебные и общие папки
   - Для элементов интерфейса, которые используются в разных частях сайта, создаются отдельные директории:
     - layouts/ — для базовых каркасов страниц (шапок, подвалов, разметки HTML).
       - Пример: ```layouts/app.blade.php```, ```layouts/admin.blade.php```.
     - partials/ (или components/) — для мелких переиспользуемых блоков (кнопки, сайдбары, карточки товаров).
       - Пример: ```partials/sidebar.blade.php```, ```partials/footer.blade.php```.
     - errors/ — для страниц с ошибками HTTP (Laravel автоматически ищет их здесь).
       - Пример: ```errors/404.blade.php```, ```errors/500.blade.php```.


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Транский Андрей

Тестовое задания для кандидата на должность PHP Developer

## Задачи
Реализовать API для сайта-кинотеатра со следующей функциональностью:

Анонимные и авторизованные пользователи могут видеть список фильмов на страницах сайта и читать комментарии.
- ** DONE

Анонимные могут зарегистрироваться с емайлом и паролем
- ** DONE

Авторизация работает через JWT
- ** DONE

Авторизованные пользователи могут смотреть фильмы и оставлять комменты к фильмам.
- ** DONE

Админы могут обновлять контент на сайте.
- ** DONE

Сервис должен предоставлять HTTP API и принимать/отдавать запросы/ответы в формате JSON.
API методы
Регистрация пользователя
Получение JWT токена по логину и паролю
Получить список фильмов (доступно всем)
Детальная информация о фильме (доступно всем)
Получить список комментариев к фильму (доступно всем)
Написать комментарий к фильму (доступно авторизованным)
Создать, удалить и изменить фильм (доступно только админам)
- ** DONE


Требования к коду:
Язык разработки: PHP
Фреймворки и библиотеки можно использовать любые
- ** Laravel

Реляционная СУБД: MySQL или PostgreSQL
- ** MySQL

Весь код должен быть выложен на Github с Readme файлом с инструкцией по запуску и примерами запросов/ответов (можно в Readme curl запросы указать)
Таблицы должны накатываться миграциями. Некий набор начальных данных тоже должен накатываться миграцией.
- ** Миграции плюс Сидеры

Разработка интерфейса в браузере НЕ ТРЕБУЕТСЯ. Взаимодействие с АПИ предполагается через curl/Postman.
- ** DONE

Будем плюсом:

Использование docker и docker-compose для поднятия и развертывания dev-среды.
- ** DONE

Методы АПИ возвращают человеко-читабельные описания ошибок и соответствующие статус коды при их возникновении.
- ** DONE

Написаны unit/интеграционные тесты.

## Настройки
настройки находятся в файле .env
порт проекта 7000


## База данных
запуск миграций:
php artisan migrate

запуск сидеров:
php artisan db:seed

## Работа с роутами API

 [POST registration](http://localhost:7000/api/register). POST http://localhost:7000/api/register

    JSON:
    {
        "name": "Andriy",
        "email": "androy@foo.bar",
        "password": "123456"
    }
---
 [POST Login](http://localhost:7000/api/login). POST http://localhost:7000/api/login

    JSON:
    {
        "email": "androy@foo.bar",
        "password": "123456"
    }

- Токен в ответе "token": "eyJ0eXAiO....FGX0"
---

 [GET List of Movies](http://localhost:7000/api/movies). GET http://localhost:7000/api/movies

---

 [GET Get a Movie by ID](http://localhost:7000/api/movie/3). GET http://localhost:7000/api/movie/{id_movie}

---

 [GET Get Comments by MovieID](http://localhost:7000/api/comments/3). GET http://localhost:7000/api/comments/{id_movie}

---
 [POST Add Comment to the Movie](http://localhost:7000/api/comment). POST http://localhost:7000/api/comment

    JSON:
    {
        "id_user": 1,
        "id_movie": 4,
        "text_comment": "Супер фильм!"
    }


---
 [POST Add a Movie](http://localhost:7000/api/movie). POST http://localhost:7000/api/movie

    JSON:
    {
        "name_movie": "3 Idiots",
        "cover_url": "URL cover",
        "video": "video.mp4"
    }

---
 [PUT Edit the Movie](http://localhost:7000/api/movie/4). PUT http://localhost:7000/api/movie/{id_movie}

    JSON:
    {
        "name_movie": "Mr. Nobody",
        "cover_url": "URL cover new",
        "video": "video_new.mp4"
    }

---
 [DELETE Edit the Movie](http://localhost:7000/api/movie/4). DELETE http://localhost:7000/api/movie/{id_movie}


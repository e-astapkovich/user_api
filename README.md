# API для управления списком пользователей.
*Тестовое задание*

### Используемый стек технологий:
![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)
![SQLite](https://img.shields.io/badge/sqlite-%23777B5.svg?style=for-the-badge&logo=sqlite&logoColor=white)
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)

### Сборка и запуск проекта
Проект на Laravel
Для запуска проекта необходим PHP версии 8.3 и Composer.
1) Склонировать репозиторий.
2) Файл '.env.example' переименовать в '.env'. При необходимости, настроить его согласно окружению, в котором планируете развернуть проект.
3) Установить зависимости командой `composer install`
4) Выполнить команду `php artisan key:generate`
5) Запустить заполнение БД тестовыми данными: `php artisan migrate:fresh --seed`.
6) Запустить dev-сервер Laravel: `php artisan serve`.

# Feedbacker

## Установке

* Создать БД
* ```git clone https://github.com/aidanbek/feedbacker.git```
* ```cd feedbacker```
* ```npm i```
* ```npm run build```
* ```composer i```
* Создать файл .env и заполнить в нем данные подключения к БД
* ```php artisan migrate --seed```
* ```php artisan serve```
* Открыть в адресной строке ```http://127.0.0.1:8000/```
* Для запуска очередей ```php artisan queue:work```

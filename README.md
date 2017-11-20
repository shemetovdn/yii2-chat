yii2-chat
=================
  
Установка
------------------
```
В файле composer.json в корне вашего сайта 
параметр minimum-stability установить в dev
```
* Установка пакета с помощью Composer
```
composer require shemetovdn/yii2-chat
```

* Выполнить миграцию для создания нужных таблиц в базе данных (консоль):
```
yii migrate --migrationPath=@shemetovdn/chat/migrations --interactive=0
```
Использование
------------------ 
```
Раскомментировать в конфигурационном файле фреймворка urlManager
```

```
теперь чат доступен по ссылке http://YOURSITE/chat
```
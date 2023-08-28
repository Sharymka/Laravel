### 27/08/2023

Проблема с памятью была видимо следствием проблемы. Но тем не менее я обновил в файле "phpdocker/php-fpm/php-ini-overrides.ini" содержимое и добавил памяти


Я посмотрел логи запущенного php-fpm в докере и увидел там ошибки доступа к папке storage/logs...

Я дал доступ к папкам (совет нашел в интернете)

```shell
sudo chown -R $USER:www-data storage
sudo chown -R $USER:www-data bootstrap/cache
```

А так же поменял права доступа (775)

```shell
sudo chmod -R 775 storage
sudo chmod -R 775 bootstrap/cache
```

После чего перезагрузил php-fpm в докере.




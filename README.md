# Events Test

## Развертывание локальной версии проекта

<p>
    Для развертывания локальной версии проекта необходимо в корневой директории 
    проекта выполнить в консоли команду:
</p>

```shell script
    ./deployment/local/scripts/start.sh
```

<p>
    После этого Docker самостоятельно установит и свяжет все необходимые компоненты 
    приложения.
</p>

## Подключение к Docker-контейнеру с PHP-FPM

<p>
    Для подключения к консоли Docker-контейнера с PHP-FPM необходимо в корневой
    директории проекта выполнить в консоли команду:
</p>

```shell script
    ./deployment/local/scripts/php_fpm_bash.sh
```

## Просмотр документации API

<p>
    Для просмотра документации API необходимо в браузере открыть ссылку
    <a href="http://127.0.0.1:31080/dev-tools/docs">
        http://127.0.0.1:31080/dev-tools/docs
    </a>
</p>

## Тестовая учетная запись

<p>
    Для проверки корректности работы приложения создана тестовая учетная запись
    со следующими учетными данными:
    
    Email: admin@admin.com
    Пароль: password
</p>

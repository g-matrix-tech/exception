# Usage #

Это библиотека Exception-ов. Здесь есть уже готовый подробный ответ.
В тесте ошибки передается code, file, line, message.

```php
use Ms\Exception\BaseException;

throw new BaseException([
    'key' => 'value'
]);

throw new BaseException('value');
```

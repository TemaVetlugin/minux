

<h1>Запуск на локальном сервере</h1>
<p>
    Для запуска на локалке на устройстве должен быть установлен php 8.1+
</p>
<p> Запуск сервера производится командой php artisan serve из корневой директивы проекта, в терминале появится ссылка на локальный сервер. Также должна быть запущена команда npm install и npm run dev.
</p>

<h1>Хостинг</h1>
<p> Проект готов к хостингу. Так как сайт не предполагает под собой плотной нагрузки, проект рассчитан на загрузку на один домен (без саб доменов для бэка)</p>
<p>Для загрузки проекта необходимо создать бд на хостинге, изменить файл .env (скопировать данные env.example, вставить в .env, и заполнить пустые поля), загрузить все файлы на домен. Также необходимо произвести миграции в бд. Выполняется командой php artisan migrate, способ открытия терминала/ произведения миграций зависит от хостинга, возможно придется уточнить.</p>
<h3>Чтобы попасть в админку, необходимо прописать в поисковой строке: _Домен_/admin/_любой текст_. Затем залогиниться</h3>
<p>Для этого нужно создать в бд в таблице users нового пользователя. Заполнить поля name и email(запомнить email - это будет логином) в поле пароль вставить следующее сочитание: $2y$10$FGsQGPK/oOsPFsI/pfWh2O1r6xWZoKNz9xmISR5KZQXtFXjuya/U.      (с точкой, ес что). В дальнейшем вы сможете входить в админку вбивая поле емаил, а паролем будет 111</p>
<h2>Траблшутинг</h2>
При настройке домена необходимо удостовериться, что язык стоит 8.1+, иначе композер будет ругаться. Также в настройках домена может быть переадресация с http на https, если она есть, ее нужно включить.
<p>
Если не подгружаются стили, необходимо вытащить директорию public/build в корневую. Если не подгружаются картинки, то перенести директории images и storage из паблика в корневую.</p>
<p>Если при переходе на ссылки происходит 301/404 ошибка, необходимо в файл .htaccess корневой директории перенести код из htaccess.txt</p>
<p> При выводе ошибки типа: "There is no existing directory..." удалить все файлы из storage/logs/, а также файл bootstrap/cache/config.php</p>
<p> Необходимо проверить загрузку изображений из админки на примере скриншотов. Загружаемые изображения должны появляться в папке public/storage/screenshots</p>
<h1 align=center>Изучение технологии AJAX</h1>

<h2>Цель работы</h2>

Разработать и реализовать анонимный чат с возможностью создания каналов. В интерфейсе отображается список каналов, пользователь может либо подключиться к существующему каналу, либо создать новый. Сообщения доставляются пользователю без обновления страницы.


<h2 align=center>1. Пользовательский интерфейс</h2>

1. Запрос имени пользователя (chat.php):
<img src=images/2.png height=40% width=40%>
2. Главная страница (chat.php):
<br>
<img src=images/1.png height=70% width=70%>

<h2 align=center>2. Пользовательские сценарии работы</h2>

1. Пользователь зашёл на сайт и представился некоторым никнеймом
2. Пользователь выбрал чат из списка доступных или создал новый чат
3. Пользователь написал сообщение в выбранный чат

<h2 align=center>3. Хореография</h2>

<img src=images/31.png height=60% width=60%>
<img src=images/32.png height=60% width=60%>

<h2 align=center>4. Структура БД</h2>

Используется MySQL. Описание таблицы для хранения информации о чатах:<br><br>
<img src=images/4.png height=60% width=60%><br>
Описание таблицы для хранения сообщений конкретного чата:<br><br>
<img src=images/5.png height=60% width=60%>

<h2 align=center>5. Описание алгоритмов</h2>

1. Отправка сообщения: пользователь вводит сообщение, нажимает на кнопку, сообщение и имя пользователя заносятся в таблицу соответствующего чата
2. Создание чата: пользователь вводит название нового чата, нажимает на кнопку, название чата заносится в соответствующую таблицу и создаётся таблица для хранения сообщений этого чата

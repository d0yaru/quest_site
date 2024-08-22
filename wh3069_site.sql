-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 21 2022 г., 19:07
-- Версия сервера: 5.5.68-MariaDB
-- Версия PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `wh3069_site`
--

-- --------------------------------------------------------

--
-- Структура таблицы `commends`
--

CREATE TABLE IF NOT EXISTS `commends` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `server` varchar(32) NOT NULL,
  `skin_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `image` text NOT NULL,
  `commend` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `date`, `title`, `content`, `image`, `commend`, `status`) VALUES
(1, '2022-03-21 08:54:08', 'UnionLogs', '<center> <font size="4" style="text-shadow:black 0 0 5px"> 	<p style="text-align: center;">  			Что было изменено:<br> 			1. Переписал полностью скрипт (были ошибки с mysql_connect - из-за этого белый экран был)<br> 			2. Сделал как на оригинале авторизацию/регистрацию/восстановление (все на отдельной таблице user_logs)<br> 			3. Нашёл в нете слитые скриншоты официального сайта, сделал все так же<br> 			4. Добавил поиск по бизам/аккаунтам<br>  			Демо сайт: <a href="https://demo.hackchik.ru">demo.hackchik.ru</a><br> 			Данные для входа: admin ; admin<br> 			PS: Регистрация работает, можно регистрироватся!<br><br> 			 			UnionLogs by HackChik 	</p> </font>  	<details>	 		<summary class="primary-but">Регистрация</summary>	<br> 		<p><img src="https://hackchik.ru/public/images/photo/demounionlogs/reg/1.png" width="920" height="515"></p> 		<p><img src="https://hackchik.ru/public/images/photo/demounionlogs/reg/2.png" width="920" height="515"></p> 		<p><img src="https://hackchik.ru/public/images/photo/demounionlogs/reg/3.png" width="920" height="515"></p> 		<p><img src="https://hackchik.ru/public/images/photo/demounionlogs/reg/4.png" width="920" height="515"></p> 	</details> 	<details>	 		<summary class="primary-but">Авторизация</summary>	<br> 		<p><img src="https://hackchik.ru/public/images/photo/demounionlogs/log/1.png" width="920" height="515"></p> 		<p><img src="https://hackchik.ru/public/images/photo/demounionlogs/log/2.png" width="920" height="515"></p> 		<p><img src="https://hackchik.ru/public/images/photo/demounionlogs/log/3.png" width="920" height="515"></p> 	</details> 	<details>	 		<summary class="primary-but">Восстановление аккаунта</summary>	<br> 		<p><img src="https://hackchik.ru/public/images/photo/demounionlogs/rec/1.png" width="920" height="515"></p> 		<p><img src="https://hackchik.ru/public/images/photo/demounionlogs/rec/2.png" width="920" height="515"></p> 		<p><img src="https://hackchik.ru/public/images/photo/demounionlogs/rec/3.png" width="920" height="515"></p> 		<p><img src="https://hackchik.ru/public/images/photo/demounionlogs/rec/4.png" width="920" height="515"></p> 	</details> 	<details>	 		<summary class="primary-but">Другие скрины</summary>	<br> 		<p><img src="https://hackchik.ru/public/images/photo/demounionlogs/2.png" width="920" height="515"></p> 		<p><img src="https://hackchik.ru/public/images/photo/demounionlogs/3.png" width="920" height="515"></p> 		<p><img src="https://hackchik.ru/public/images/photo/demounionlogs/4.png" width="920" height="515"></p> 		<p><img src="https://hackchik.ru/public/images/photo/demounionlogs/5.png" width="920" height="515"></p> 		<p><img src="https://hackchik.ru/public/images/photo/demounionlogs/6.png" width="920" height="515"></p> 		<p><img src="https://hackchik.ru/public/images/photo/demounionlogs/7.png" width="920" height="515"></p> 		<p><img src="https://hackchik.ru/public/images/photo/demounionlogs/8.png" width="920" height="515"></p> 		<p><img src="https://hackchik.ru/public/images/photo/demounionlogs/9.png" width="920" height="515"></p> 		<p><img src="https://hackchik.ru/public/images/photo/demounionlogs/10.png" width="920" height="515"></p> 		<p><img src="https://hackchik.ru/public/images/photo/demounionlogs/11.png" width="920" height="515"></p> 	</details> 	<p><img src="https://hackchik.ru/public/images/photo/demounionlogs/1.png" width="1280" height="629"></p> 	<h2>Цена этого скрипта: <font style="color:red;">250руб</font></h2> </center>', 'https://hackchik.ru/public/images/photo/demounionlogs/1.png', 0, 1),
(2, '2022-03-22 06:39:15', 'Как настроить автодонат для SAMP с FREEKASSA', '<div data-videoid="NJM6p0G65MU" class="yt-video-container"><img src="https://i.ytimg.com/vi/NJM6p0G65MU/maxresdefault.jpg"><button></button></div>', 'https://i.ytimg.com/vi/NJM6p0G65MU/maxresdefault.jpg', 2, 1),
(3, '2022-03-22 06:40:00', 'Создал проект SAMP за 55 рублей', '<div data-videoid="2bz08gf8sEI" class="yt-video-container"><img src="https://i.ytimg.com/vi/2bz08gf8sEI/maxresdefault.jpg"><button></button></div>', 'https://i.ytimg.com/vi/2bz08gf8sEI/maxresdefault.jpg', 1, 1),
(4, '2022-03-23 12:32:55', 'Как пользоваться MULTY-TOOLS?', '<p>Хотите быстро получить готовый проэкт? Тогда выполните\nнесколько простых действий и наслаждайтесь!</p>\n\n<center><h2>Шаг 1</h2></center>\n<p>Первым делом нам понадобиться заказать VDS/VPS сервер и купить красивый домен. Я лично советую брать домен на - REG.RU, а сервер на FirstByte(но это не обязательно). Дальше делаем привязку домена к машине - как сделать? смотри ролик.</p>\n\n<center><h2>Шаг 2</h2></center>\n<p>Теперь скачаем приложение для ПК - WinSCP (Жмяк) (ФТП клиент). Он нам даст возможность подключится к машине. За одно посмотрите видео как настроить PuTTy в этом ФТП клиенте. А так можно отдельно скачать PuTTy (Жмяк) (прога для подключения к серверу)</p>\n\n<center><h2>Шаг 3</h2></center>\n<p>Открываем PuTTY. Указываем данные от нашего сервера(их хостер должен отправить на почту пример: ip root пароль). Подключитесь к своей машине по 22 порту. Авторизуйтесь(примечание: пароль не виден - и вставляется правой кнопкой мыши), после вставте эту команду в консоль.</p>\n\n<div data-videoid="iWuQ68jEcyY" class="yt-video-container"><img src="https://i.ytimg.com/vi/iWuQ68jEcyY/maxresdefault.jpg"><button></button></div>', 'https://i.ytimg.com/vi/iWuQ68jEcyY/maxresdefault.jpg', 10, 1),
(5, '2022-04-07 12:00:36', 'Arizona UCP NEW - Аукцион открыт!', '<p><h3>Сейчас я расскажу как будет происходить аукцион!</h3><p>\n\n<p>Для участия просто напишите мне в ЛС  за какую сумму готовы купить!\nЯ 9 апреля  напишу лидеру (1место) будет ли он покупать. На ответ даю 1 день!  Если он отказывается или не отвечает я перехожу ко 2-му месту и тд. </p>\n\n<li>Начальная цена 1.500рублей!</li>\n<li>Минимальная сумма для перебива ставки 10рублей!</li>\n<li>Скриншоты товара можно посмотреть тут -  vk.cc/ccr620</li>\n<li>Видео демонстрация - youtu.be/kTaj4LRri1E</li>\n<li>Демо сайт: arznew.hackchik.ru</li>\n\n<center><h3>=== СПИСОК АУКЦИОНЕРОВ ===</h3></center>\n\n<center>1. <a href="https://vk.com/officialqw3n" target="_blank">Аркадий Васильев</a> - 3.000рублей ( не факт что купит )</center>\n<center>2. <a href="https://vk.com/ic3peak7" target="_blank">Арсений Гусев</a> - 2.250рублей</center>\n<center>3. <a href="https://vk.com/bebrovich228x" target="_blank">Филипп Железнов</a> - 2.222рублей</center>\n<center>4. <a href="https://vk.com/vladsampovskiy" target="_blank">Ерсултан Файзуллаев</a> - 2.200рублей</center>\n<center>5. <a href="https://vk.com/id531100413" target="_blank">Иван Реутов</a> - 2.000рублей</center>\n<center>6. Свободно</center>\n<center>7. Свободно</center>\n<center>и тд</center>\n\n\n<p><b>КОНЕЦ АУКЦИОНА 9 АПРЕЛЯ</b></p>\n\n<div data-videoid="kTaj4LRri1E" class="yt-video-container"><img src="https://i.ytimg.com/vi/kTaj4LRri1E/maxresdefault.jpg"><button></button></div>', 'https://i.ytimg.com/vi/kTaj4LRri1E/maxresdefault.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `server_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `price` varchar(32) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `payment`
--

INSERT INTO `payment` (`id`, `username`, `server_id`, `type`, `price`, `date`, `status`) VALUES
(1, 'Dmitry_Wolf', 1, 0, '10', '2022-05-19 07:50:52', 0),
(2, 'Mr_Wolf', 1, 0, '10', '2022-05-19 07:51:10', 0),
(3, 'Mr_Wolf', 1, 0, '10', '2022-05-19 07:51:30', 0),
(4, 'Mr_Wolf', 1, 3, '100', '2022-05-19 16:52:22', 0),
(5, 'Mr_Wolf', 1, 2, '2499', '2022-05-19 16:52:40', 0),
(6, 'Mr_Wolf', 1, 1, '1499', '2022-05-19 16:52:46', 0),
(7, 'Mr_Wolf', 1, 4, '299', '2022-05-19 16:53:04', 0),
(8, 'Mr_Wolf', 1, 0, '10', '2022-05-19 16:53:32', 0),
(9, 'Mr_Wolf', 1, 0, '10', '2022-05-19 16:53:32', 0),
(10, 'Mr_Wolf', 1, 0, '10', '2022-05-19 16:53:32', 0),
(11, 'Mr_Wolf', 1, 0, '10', '2022-05-19 16:53:32', 0),
(12, 'Mr_Wolf', 1, 0, '10', '2022-05-19 16:53:32', 0),
(13, 'Mr_Wolf', 1, 0, '10', '2022-05-19 16:53:32', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `id` int(11) NOT NULL,
  `player_id` varchar(32) NOT NULL,
  `server` varchar(32) NOT NULL,
  `rating` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `rating`
--

INSERT INTO `rating` (`id`, `player_id`, `server`, `rating`, `date`) VALUES
(1, '', '', 5, '2022-03-27 07:38:12');

-- --------------------------------------------------------

--
-- Структура таблицы `servers`
--

CREATE TABLE IF NOT EXISTS `servers` (
  `id` int(11) NOT NULL,
  `server_name` varchar(32) NOT NULL,
  `server_ip` varchar(25) NOT NULL,
  `group_vk_url` varchar(32) NOT NULL,
  `db_host` varchar(16) NOT NULL,
  `db_user` varchar(32) NOT NULL,
  `db_password` varchar(32) NOT NULL,
  `db_name` varchar(16) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `servers`
--

INSERT INTO `servers` (`id`, `server_name`, `server_ip`, `group_vk_url`, `db_host`, `db_user`, `db_password`, `db_name`, `status`) VALUES
(1, 'Arizona RP 01', '141.95.234.21:1129\n', 'https://vk.com/samp_x_ru', '149.202.88.119', 'gs157249', 'CrYl8VybYxYE', 'gs157249', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `shop`
--

CREATE TABLE IF NOT EXISTS `shop` (
  `id` int(11) NOT NULL,
  `packet_type` int(11) NOT NULL,
  `packet_url` text NOT NULL,
  `packet_name` varchar(32) NOT NULL,
  `packet_sum` int(11) NOT NULL,
  `packet_economy` int(11) NOT NULL,
  `packet_admins` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shop`
--

INSERT INTO `shop` (`id`, `packet_type`, `packet_url`, `packet_name`, `packet_sum`, `packet_economy`, `packet_admins`, `price`, `status`) VALUES
(1, 1, '/public/img/shop/shop-packet-5.png', 'Нимб, киоск и лейка', 30000000, 30000000, 0, 1499, 1),
(2, 1, '/public/img/shop/shop-packet-1.png', 'Администратор 1 LVL', 30000000, 100000, 0, 2499, 1),
(3, 0, '/public/img/shop/cash-1.png', 'Тестовая покупка', 5000000, 1000000, 0, 100, 1),
(4, 2, '/public/img/shop/admin-3.png', 'Администратор 10 LVL', 0, 0, 10, 299, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `commends`
--
ALTER TABLE `commends`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `servers`
--
ALTER TABLE `servers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `commends`
--
ALTER TABLE `commends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `servers`
--
ALTER TABLE `servers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

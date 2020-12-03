-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 03 2020 г., 14:05
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `laravel_bd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `text`, `created_at`, `updated_at`, `user_id`, `image`) VALUES
(1, 'Гвианский арлекин', '<p>Знакомьтесь, Гвианский арлекин (Oreophrynella quelchii). Это крошечное (до 25 мм) земноводное из семейства настоящих жаб &nbsp;(Bufonidae). &nbsp;Обитает в Южной Америке на столовых горах Рорайма и Вэй-Ассипу (Венесуэла, Гайана и Бразилия) на высотах от 2 до 3 км. &nbsp;Где охотится на различных беспозвоночных.<br />\r\nЭти жабки обычно полностью черные, но часто встречаются особи с брюшком серого и желтого цвета. Из-за ареала обитания, утратили способность плавать. И им не нужна никакая вода для размножения. Самка откладывает яйца во влажную почву. &nbsp;Интересно, что это амфибии с прямым развитием &mdash; фаза головастика отсутствует, из яиц вылупляются уже сформированные жабки.<br />\r\nИз-за ограниченного ареала, вид находится в уязвимом положении.</p>', '2020-07-24 14:18:16', '2020-12-03 08:28:23', 1, 'J1j9FhP0KGI_1606991303.jpg'),
(4, 'Суринамская пипа', '<p>Суринамская пипа (Pipa pipa) - &nbsp;южноамериканская лягушка из семейства пиповых (Pipidae). Обитает в реках бассейна Амазонки. Сплющенная форма туловища и головы обусловлена тем, что пипа обитает на дне водоемов. &nbsp;Обычно растет до 12 см, известны особи длиной 20 см. &nbsp;Главной особенностью пипы является не ее приплюснутое тело, а уникальный способ размножения. В брачный период самец и самка демонстрируют брачный танец под водой. Они делают петли, во время каждой из которых самка откладывает 3-10 яиц, а самец их оплодотворяет. После каждой петли, самка ныряет вниз, где яйца падают ей на спину. И самец впечатывает их задними лапками в размягченную кожу спины самки. &nbsp;Таким образом, на спине укладываются от 40 до 150 яиц. Через 11-12 недель, появляются полностью сформировавшиеся молодые пипы длиной 20 мм. Затем самка линяет и готова жить самостоятельно до нового сезона размножения.</p>', '2020-07-25 20:59:22', '2020-12-01 08:35:05', 1, 'Тропа_1606817935.jpg'),
(5, 'Малайская рогатая лягушка', '<h3>Малайская рогатая лягушка (Megophrys nasuta). Не смотря на название, не родственник рогаток, так как принадлежит к другому семейству (рогатые чесночницы). Населяет влажные тропические леса в Тайланде, на Малайском полуострове, островах Борнео и Калимантан. Большую часть жизни эта крупная (до 12,5 см) лягушка живёт на земле, прячась среди листвы . В чем ей помогает схожесть с опавшим листом и характерные кожаные рожки защищающие глаза.&nbsp;<br />\r\nМалайская рогатая лягушка утратила способность плавать и к воде спускается лишь в период размножения, чтобы отложить икру.&nbsp;<br />\r\nМожет содержаться в неволе как питомец. Но из-за максимально флегматичного нрава и тусклой окраски, не очень популярна у любителей земноводных.</h3>', '2020-07-25 21:35:35', '2020-12-01 08:30:48', 1, 'лестница_1602171197.jpg'),
(6, 'Удав боа', '<p>Удав Боа &ndash; близкий родственник анаконды. Его можно найти в Южной и Центральной Америке. Удав Боа живет в различных средах обитания: пустынях, тропических лесах, саваннах и районах вблизи населенных пунктов. Он также может выживать на разных высотах над уровнем моря.</p>\r\n\r\n<p>Удав Боа известен как одна из самых красивых змей из-за своей красочной кожи с интересными узорами. Поэтому люди с древних времен отлавливали этих животных и использовали их кожу для изготовления одежды и украшений. Высокий спрос на кожу боа в прошлом привел к уменьшению числа удавов в дикой природе. Сегодня они помещены в список исчезающих животных.</p>\r\n\r\n<p>Удав Боа &ndash; очень большая змея. Он растет на протяжении всей жизни. Размер Боа составляет 2 фута в длину при рождении, но он может вырасти до 10-13 футов. Боа весит более 100 фунтов.</p>\r\n\r\n<p>Тело удава Боа может быть коричневым, желтым, красным, розоватым или зеленым в окраске. Его тело покрыто различными рисунками &ndash; линиями, кругами, алмазоподобными или овальными формами. Цвет и узор на теле Боа зависят от среды его обитания (они обеспечивают камуфляж, маскировку животного).</p>\r\n\r\n<p>У Боа очень развитые зубы. Они не используются для жевания. Зубы используются для ловли добычи. Организм Боа имеет тепловые рецепторы, которые используются для обнаружения теплокровной добычи. Помимо этого, удав использует &laquo;вкус&raquo; запаха, чтобы найти свою жертву. Анализатор вкуса запаха расположен на языке. Удав Боа является ночным животным (то есть активен в течение темного времени суток).</p>', '2020-07-28 12:21:27', '2020-12-01 07:58:33', 2, 'noimage.jpg'),
(9, 'Злая щитоспинка', '<h2>Злые щитоспинки иногда называются лягушками Баджита. По-научному Lepidobatrachus laevis. Щитоспинки представлены всего тремя видами: злые-щитоспинки, хищные-щитоспинки и коконные-щитоспинки. Все три вида отличаются друг от друга очень незначительно.</h2>\r\n\r\n<p>А где же обитает данный покемон? Марс? Юпитер? Сатурн? Нет, они живут в Южной Америке. Ареал их обитания достаточно небольшой и ограничивается северной Аргентиной, восточной Боливией и западным Парагваем. Живут во временных водоемах небольшой глубины, по сути, в лужах.</p>\r\n\r\n<p>В случае опасности, щитоспинка начинает открывать свою огромную пасть и демонстрирует два больших псевдозуба на нижней челюсти, которые и являются их основным оружием, после чего начинает пронзительно орать. Если это не помогло, то ты сам напросился и тебя скушают, либо просто больно укусят.</p>\r\n\r\n<p>Охотятся способом древним как мир. Сидят, имитируя камень, и ждут, пока рядом кто-то пройдет. После чего обычно глотают это что-то целиком, насаживая на свои клыки.</p>\r\n\r\n<p>Головастикам приходится развиваться быстро, из-за того, что водоемы высыхают за пару недель. Основной рацион маленьких головастиков составляют собственные братики и сестрички. Да, вы не ослышались, головастики едят друг друга, проглатывая родственников целиком. Уже через месяц мы имеем полноценных лягушатников размерами от 5 до 6 см. Каннибализм у них в крови.</p>\r\n\r\n<p>После окончания сезона дождей злые щитоспинки впадают в спячку. Для этого они зарываются в ил, при помощи тех самых сильных задних лап, и формируют плотный кокон из собственной линяющей кожи. Сурово, да? Этот кокон закрывает все отверстия, оставляя место только для ноздрей. Вот так они и спят до следующего сезона дождей, просыпаясь только тогда, когда вокруг их лужу уже затопило, а кокон размокнет. На свет выходят уже готовые размножаться, но сначала идут как следует покушать и съедают все, что находится в водоеме. В том числе и других щитоспинок</p>\r\n\r\n<p>Щитоспинок можно держать в качестве домашних питомцев, они достаточно неприхотливы. А если запереть в аквариуме несколько щитоспинок, то они устроят настоящую королевскую битву, пока не останется только одна. Опасная лягушка, но если живет, то ее метод жизни успешен!</p>', '2020-09-10 15:56:18', '2020-12-01 08:13:48', 3, 'Баджита-или-же-злая-щитоспинка_1606817626.jpeg');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `text`, `user_id`, `article_id`) VALUES
(3, 'Спасибо за статью!', 1, 9),
(4, 'Очень интересно и информативно!', 3, 9);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_07_24_143756_create_articles_table', 1),
(4, '2020_07_26_161533_create_shops_table', 2),
(5, '2020_07_28_143856_add_new_field_to_articles_user_id', 3),
(7, '2020_07_28_161212_add_main_image_to_articles', 4),
(9, '2020_07_29_153647_create_comments_table', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `shops`
--

CREATE TABLE `shops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anons` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `shops`
--

INSERT INTO `shops` (`id`, `title`, `anons`, `price`, `category`) VALUES
(1, 'Мужская кепка', 'Отличная кепка, которой будут рады все', 200, 'Hat'),
(2, 'Женская кепка', 'Отличная кепка, которой будут рады все', 400, 'Hat');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ноль Целковович', 'gleb-ruksha@rambler.ru', NULL, '$2y$10$XoV2MjfhS.oStdK5OjTEAug8bITKM2fdeBzziCHMU5/pmljq6e5Le', 'Ptpcho0fBfz1c032AeBUfNs5XJESfr1U9bfotD7stQUv8glCNaYMQ0UvY8dZ', '2020-07-27 17:55:31', '2020-07-27 17:55:31'),
(2, 'Gleb Ruksha', 'gleb-rusha@rambler.ru', NULL, '$2y$10$TdL9hVloPVNE1Q3BpJcmmeHdEfrRQqNjv.nPFrxLe/JdxpPGf1ZeK', 'rQOErniOwPbWY5gyv3MuJ88G9Yu3rJlLNK10A6aehCBXLKUXnEwlcct9dJK2', '2020-07-28 12:19:28', '2020-07-28 12:19:28'),
(3, 'Brole', 'glab-ruksha@rambler.ru', NULL, '$2y$10$uye53R2jsnOPs99Uk/Klquvv1VEnBn4xGmFsR/zohOg7FSI0eUeei', NULL, '2020-08-24 13:49:24', '2020-08-24 13:49:24'),
(4, 'Asd', 'glab-ruksha@raler.ru', NULL, '$2y$10$faHQn5fVC54pL6bF2Js25OhAlfHDxbGJwiWKy.sm2qMZS7r7eq6/a', NULL, '2020-08-31 10:47:04', '2020-08-31 10:47:04');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `shops`
--
ALTER TABLE `shops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

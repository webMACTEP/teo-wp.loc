<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wordpress' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'root' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '>bN3tpQZ)Z_Ofn Xj?<^ddRc+|qvbtzDLOv,5q0n ,y2c&(uIT&$vUnN/kUe$W}<' );
define( 'SECURE_AUTH_KEY',  'Nv/jiBPz~qvH#ux(6c->lZhqTne({Iu;arH$wFc1B{P~t!*v=6)UyGiXFn_3x8gf' );
define( 'LOGGED_IN_KEY',    'GmJp-{NH&yKZR|#)5s`{k:=K *O#U#HPgL.mgOOk@{O>G/jd9.n0tOD/Nc[(ust3' );
define( 'NONCE_KEY',        '#C|/.8]|tNl{T96PF:d R@,awd/PyY,y&E@*6X){GgP#@>?&3f:n-4<rV@CXYkGH' );
define( 'AUTH_SALT',        '=W,bQ!}<4C6IWUwiD]2V LoRY$CEk%y#Tl4h>$Fm#h$[cPTv.qEy0ngL-6&(HSQ2' );
define( 'SECURE_AUTH_SALT', 'jHhd3)1,{+|r8V6|<[<FtD`H=Rj~{}Qfx%K($Y@e&)gr&uS48It=V+YA{D^ws&[{' );
define( 'LOGGED_IN_SALT',   'UzP<RFCfumwqdB Bg8gF6L5{cj!z+cy0u<=8:U3YgRKX,rVsV|bIo&DK+~+61Y6F' );
define( 'NONCE_SALT',       '1gkiJ[bLxh`.sA*qy7&2B&89Dgcn9]0YuYRiVo63tt_x9/%EN=:$EG(k|>BJ+B][' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'teo_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );

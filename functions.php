<?php

add_action('wp_enqueue_scripts', 'add_my_custum_scripts_and_styles'); // подкл. через хук свой/кастомный файл стилей   и скриптов.

// рег меню через хук  after_setup_theme
add_action('after_setup_theme', 'theme_register_nav_menu');


function theme_register_nav_menu()
{
  register_nav_menu('header-soc', 'socials-menu-header');
  // header-soc -название для меню (ярлык) 
  // socials-menu-header -название  для  меню выводимое в админпанэли
}

function add_my_custum_scripts_and_styles()
{
  wp_enqueue_style('hr_style', get_template_directory_uri() . '/assets/css/style.min.css');

  // Убрал  встроенную версию  jquery 
  wp_deregister_script('jquery');
  // и подключил именно ту  верчию которая  была установлена в исходниках  версию взял из package.json
  wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js');
  // поставил в очередь
  wp_enqueue_script('jquery');

  // подключил основной файл скриптов  с зависимостью от  jquery ,  без указания версии  файла main.js, подключил в футере
  wp_enqueue_script('hr_script_main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'),  'in_footer'); //   хоть я и указал  TURE   всеравно  подключение не в футере  и когда указіваю   перед  true   настройку $ver(строка)  то скрипт вообще не подключаеться.
}

// add_theme_support();  Регистрирует поддержку новых возможностей темы в WordPress
add_theme_support('post-thumbnails'); // позволяет устанавливать миниатюру посту. 
add_theme_support('title-tag'); // создание метатега <title> через хук
add_theme_support('custom-logo'); // возможность загрузить картинку логотипа в админке

// start пробую добавить статус к   записи вакансий
add_theme_support('post-formats', array('status')); //  пробую добавить статус к  записи вакансий
// end пробую добавить статус к   записи вакансий


add_filter('upload_mimes', 'svg_upload_allow');

# Добавляет SVG в список разрешенных для загрузки файлов.
add_filter('upload_mimes', 'svg_upload_allow');

# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow($mimes)
{
  $mimes['svg']  = 'image/svg+xml';

  return $mimes;
}

add_filter('wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5);

# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type($data, $file, $filename, $mimes, $real_mime = '')
{

  // WP 5.1 +
  if (version_compare($GLOBALS['wp_version'], '5.1.0', '>='))
    $dosvg = in_array($real_mime, ['image/svg', 'image/svg+xml']);
  else
    $dosvg = ('.svg' === strtolower(substr($filename, -4)));

  // mime тип был обнулен, поправим его
  // а также проверим право пользователя
  if ($dosvg) {

    // разрешим
    if (current_user_can('manage_options')) {

      $data['ext']  = 'svg';
      $data['type'] = 'image/svg+xml';
    }
    // запретим
    else {
      $data['ext'] = $type_and_ext['type'] = false;
    }
  }

  return $data;
}

// крошки
function true_breadcrumbs()
{

  // получаем номер текущей страницы
  $page_num = (get_query_var('paged')) ? get_query_var('paged') : 1;

  $separator = ' <span></span> '; //  разделяем обычным слэшем, но можете чем угодно другим

  // если главная страница сайта
  if (is_front_page()) {

      echo 'Вы находитесь на главной странице';
    
  } else { // не главная

    echo '<li class="breadcrumbs__item"><a href="' . site_url() . '">Job Openings</a></li>';


    if (is_single()) { // записи

      the_category(', ');
      echo $separator;
      
    } elseif (is_page()) { // страницы WordPress 
      echo '<li class="breadcrumbs__item"><span>' . the_title() . '<span></li>';
     
    } elseif (is_category()) {

      single_cat_title();

    } elseif (is_404()) { // если страницы не существует

      echo 'Ошибка 404';
    }

    if (
      $page_num > 1
    ) { // номер текущей страницы
      echo ' (' . $page_num . '-я страница)';
    }
  }
}
// крошки

?>
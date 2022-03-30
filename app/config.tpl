<?php
    require_once 'Statuscodes.php';

    define('WEBSITE','');
    define('DS',DIRECTORY_SEPARATOR);
    define('HTTP_HOST','http://'.$_SERVER["HTTP_HOST"].'/Bighall/');
    define('STYLE',HTTP_HOST.'app/Style/');
    define('IMAGES',HTTP_HOST.'app/Images/');
    define('ICONS',HTTP_HOST.'app/Icons/');
    define('INCLUDE',HTTP_HOST.'app/Include/');
    define('SCRIPT',HTTP_HOST.'app/Script/');
    
    define('UPLOADS',HTTP_HOST.'app/Uploads/');
    define('UP_IMAGES',HTTP_HOST.'app/Uploads/Images/');
    define('UP_VIDEOS',HTTP_HOST.'app/Uploads/Videos/');
    define('UPLOAD_DIR', __DIR__ . DS .DS);
    define('VENDOR_DIR', __DIR__ . DS .DS);
    define('INCLUDE_DIR',__DIR__.DS.'Uploads'.DS.'Images'.DS);
    define('VIEW_DIR', __DIR__ . DS."View".DS);
    define('VENDER_DIR',__DIR__.DS.'vender'.DS);
    define('LAYOUT_DIR',VIEW_DIR.'Layout'.DS);
    define('COMPONENTS_DIR',VIEW_DIR.'components'.DS);
    define('ADMIN_MAIL_HOST','');
    define('ADMIN_MAIL','daruzair440@gmail.com');
    define('ADMIN_MAIL_PASS','');

    
    define('DB_NAME','bighall');
    define('DB_HOST','localhost:');
    define('DB_PORT','3306');
    define('DB_USER','root');
    define('DB_PASS','');

    require_once 'Configs/View_Config.tpl';
    require_once 'Configs/Controller_Config.tpl';
?>
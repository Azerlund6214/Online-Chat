<?php




    $debug_mode = true; // Выводить все переменные и не делать реальный редирект в конце
    #$debug_mode = false;



    include "config.php";


    require_once( "libs/db_controller_mysqli.php" );
    require_once( "libs/SF_CLASS.php" );


    #####

    if( ! isset($_POST['nickname']) )
        exit("Нет post параметра nickname");

    if( ! isset($_POST['message']) )
        exit("Нет post параметра message");

    $nickname = $_POST['nickname'];
    $message  = $_POST['message'];

    #####

    #TODO: тутбудет  куча проверок

    #####

    $DBC = new DB_Controller();
    $DBC -> Connect( $db_host, $db_user , $db_pass );
    $DBC -> Select_db( $db_name );
    //$DBC -> Get_error();

    //echo "<br>Подключились к бд";

    #####

    //exit("123");


    echo "<br>Получили сообщения из главной таблицы<hr color='red'>";

    $sql = "INSERT INTO Messages ( author_nickname ,   message  )
                        VALUES (     '$nickname'   ,  '$message'  )";
    $DBC -> Exec( $sql );
    $DBC -> Get_error();


    //exit("123");


    #####

	
?>
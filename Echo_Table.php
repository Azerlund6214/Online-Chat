<?php




    $debug_mode = true; // Выводить все переменные и не делать реальный редирект в конце
    #$debug_mode = false;


    $messages_limit = 20;


    include "config.php";


    require_once( "libs/db_controller_mysqli.php" );
    require_once( "libs/SF_CLASS.php" );


    #####

    //if( ! isset($_GET['url_for_mon']) )
    //    exit("Нет get параметра url_for_mon");



    #####

    $DBC = new DB_Controller();
    $DBC -> Connect( $db_host, $db_user , $db_pass );
    $DBC -> Select_db( $db_name );
    //$DBC -> Get_error();

    //echo "<br>Подключились к бд";

    #####

    //exit("123");



    $sql = "SELECT * FROM Messages ORDER BY id DESC LIMIT $messages_limit";
    $result = $DBC -> Query($sql , "all");
    //$DBC -> Get_error();
    //SF::PRINTER($result); exit;


    //echo "<br>Получили сообщения из главной таблицы<hr color='red'>";




    echo '  <link rel="stylesheet" type="text/css" href="table_style.css">
            <table border=2px class="result_table">
                <thead>
                    <tr >
                        <td><strong>Автор</strong></td>
                        <td><strong>Время</strong></td>
                        <td><strong>Сообщение</strong></td>
                    </tr>
                </thead>
                <tbody>
                ';


        foreach ( $result as $one_set )
        {
                echo "<tr>";

                echo 	"<td>". $one_set[1] ."</td>";
                echo 	"<td>". explode(" ", $one_set[2])[1] ."</td>";
                echo 	"<td>". $one_set[3] ."</td>";

                echo "</tr>";
        }


    echo    "</tbody>";
    echo "</table>";



    #####

	
?>
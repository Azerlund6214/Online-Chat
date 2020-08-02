<?php


    $messages_limit = 30;


    #####


    include "config.php";

    require_once( "libs/db_controller_mysqli.php" );
    require_once( "libs/SF_CLASS.php" );


    #####


    $DBC = new DB_Controller();
    $DBC -> Connect( $db_host, $db_user , $db_pass );
    $DBC -> Select_db( $db_name );
    //$DBC -> Get_error();

    $sql = "SELECT * FROM Messages ORDER BY id DESC LIMIT $messages_limit";
    $result = $DBC -> Query($sql , "all");


    #####


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
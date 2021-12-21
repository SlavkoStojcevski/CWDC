<?php
    $link=mysqli_connect("shareddb-v.hosting.stackcp.net","addcash4m2users-3134379931","653_!8n.wl)7","addcash4m2users-3134379931");
    mysqli_query($link,
                       "UPDATE `advertizers`
                        SET `password`='fun'
                        WHERE `email`='slavko_stojcevski@hotmail.com'
                        LIMIT 1");
    echo mysqli_fetch_array(
                            mysqli_query($link,
                                               "SELECT `password`
                                                FROM `advertizers`
                                                WHERE `id`=5"))
                                                               ['password'];
?>
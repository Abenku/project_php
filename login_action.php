<?php

    session_start();

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'php_project';

    $conn = mysqli_connect($host, $user, $password, $db);

    $id = $_POST['id'];
    $pw = $_POST['pw'];

    $query = "select * from user where email = '$id' and password = '$pw'";
    $result = $conn -> query($query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        if ($row['password'] == $pw) {   
            $_SESSION['userid'] = $id;
            if (isset($_SESSION['userid'])) {
    ?> <script>
                location.replace("./index.php");
        </script>
            <?php
            } else {
                echo "session failed";
            }
        } else {
            ?> <script>
                alert("아이디 또는 비밀번호를 확인해주세요.");
                history.back();
            </script>
        <?php
        }
    } else {
        ?> <script>
            alert("아이디 또는 비밀번호를 확인해주세요.");
            history.back();
        </script>
    <?php
    }
    ?>
<?php
    $id = $_POST["id"];
    // 받은 비번을 복호화
    $pass = $_POST["pass"];

    //echo "pass = $pass <br>";

    $sql = "select * from users where id='$id' and pass='$pass'";
    //                                        ' or 2>1 limit 2, 1 -- 
    
    echo "sql = $sql<br>";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result); 

    //if($id == "test" and $pass=="1111")
    if($data)
    {
        $_SESSION["kpcid"] = $id;
        $_SESSION["kpcname"] = $data["name"];
        $msg = "$data[name]"."님 반갑습니다."; 
    }else
    {
        $msg = "아이디와 비밀번호를 확인하세요.";
    }

    echo "
    <script>
        alert('$msg');
        location.href='index.php';
    </script>
    ";
?>
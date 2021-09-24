<?php
ini_set("display_errors", "On");
require_once "connect.php";

function add_user($dbh,$user){
    $sth = $dbh->prepare(
        "INSERT INTO test_table(id,name,age,gender) VALUES(:id,:name,:age,:gender)"
    );//SQL準備
    $sth->execute($user);
}
// for($i = 0;$i<100;$i++){
//     $age = mt_rand(0,100);
//     $gender = mt_rand(0,1) ? "male" : "female";
//     $id = "user" . $i . "id";
//     $name = "user" . $i;
//     $user = array(
//         ":id"=>$id,
//         ":name"=>$name,
//         ":age"=>$age,
//         ":gender"=>$gender,
//     );
//     add_user($dbh, $user);
// }

function fetch_and_show($dbh, $sql){
    $sth = $dbh->prepare($sql);
    $res = $sth->execute();
    echo "<br/>";
    if($res){
        $data = $sth->fetchAll(PDO::FETCH_ASSOC);
        foreach($data as $user){
            foreach($user as $key => $value){
                echo $key . ":" . $value . ", ";
            }
            echo "<br/>";
        }
    }
}


function showAll($dbh, $cond = ""){
    fetch_and_show($dbh, "SELECT * FROM test_table " . $cond);
}

function delete_user($dbh, $id){
    $sth = $dbh->prepare(
        "DELETE FROM test_table WHERE id = :id" 
    );
    $sth->execute([":id" => $id]);
}

// delete_user($dbh, "user0id");

// カウント
fetch_and_show($dbh,"SELECT COUNT(gender) FROM test_table WHERE gender = 'female'");

// 平均
fetch_and_show($dbh,"SELECT AVG(age) FROM test_table");

// 加算
fetch_and_show( $dbh,"SELECT SUM(age) FROM test_table");

// グルーピング
fetch_and_show( $dbh,"SELECT COUNT(gender) FROM test_table GROUP BY gender");

showAll($dbh, "WHERE age < 20");

$password = "password";
$hashed_password = hash("sha256", $password);
echo $hashed_password;

echo "<br/>";
$input = "Password";
$hashed_password = hash("sha256", $input);
echo $hashed_password;

?>
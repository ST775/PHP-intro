<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        function nl($str){
            return $str . "<br/>";
        }

        class Dog{
            private $name;
            public function __construct($name)
            {
                $this->name = $name;
            }
            
            public function sayHello(){
                echo nl("Hello my name is " . $this->name);
            }
        }

        ini_set("display_errors", "On");
        $str = "<h1>Hello World</h1>";
        echo $str;

        $contents = array("a","b","c");
        echo"<ul>";
        for($i = 0;$i<count($contents);$i++){
            echo "<li>". $contents[$i] ."</li>";
        }
        echo "</ul>";

        // 連想配列
        $array = array("HND"=>"羽田空港" , "NRT" =>"成田空港","KIX"=>"関西国際空港");
        echo nl($array["NRT"]);

        foreach($array as $key => $value){
            echo nl($key . " " . $value);
        }

        $dog = new Dog("poti");
        $dog->sayHello();
        // $dog->name = "inu";

        setcookie("submitted", 0);
        $submitted = $_COOKIE["submitted"];
        if($submitted != 1){
            echo "送信してください";
        }else{
            echo nl("ご協力ありがとうございました。");
        }

        if(!isset($_COOKIE["PHPSESSID"])){
            echo nl("訪問ありがとうございます");
            echo nl("セッションIDを発行します");
            session_start();
            echo nl("セッションIDを発行しました。ブラウザを更新してください");

        } else{
            echo nl("毎度ありがとうございます");
            echo "あなたのセッションIDは" . $_COOKIE["PHPSESSID"] . "です";
        }


    ?>

<form action="get.php" method="get">
    <label>名前:<input type="text" name="name"></label><br/>
    <label>性別:
            <input type="radio" name="gender" value="男性">男性
            <input type="radio" name="gender" value="女性">女性
    </label><br/>
    <label>血液型:
        <select name="blood">
            <option value="A">A</opiton>
            <option value="AB">AB</opiton>
            <option value="B">B</opiton>
            <option value="O">O</opiton>
        </select>
    </label><br/>
    <input type="submit" name="submitButton" value="送信">
</form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация пользователя</title>
</head>
<body>
<?php
$LOGIN = $_POST["login"];
$PASSWORD = $_POST["password"];

class user {
    public $name;
    public $surname;
    public $role;
    public $login;
    public $password;
    function __construct($name,$surname,$role,$login,$password)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->role = $role;
        $this->login = $login;
        $this->password = $password;
    }
};
class admin extends user {
    
    public function introduce (){
        echo "Здравствуйте, ".$this->role. "  " . $this->name. "  " . $this->surname. "  ". ", вам разрешено все на данном сайте";
    }
};
class manager extends user {

    public function introduce() {
        echo "Здравствуйте, ".$this->role. "  " . $this->name. "  " . $this->surname. "  ". ", вам разрешено взаимодействовать с аккаунтами клиентов";
    }
};
class client extends user {

    public function introduce (){
        echo "Здравствуйте ,".$this->role. "  " . $this->name. "  " . $this->surname. "  ". ", добро пожаловать на сайт!";;
    }
};

$arr = [
    ["name" => "Stiven" ,
        "surname" => "Hocking",
        "role" => "Admin",
        "login" => "Cool_Scientist",
        "password" => "black_hole69"],
    ["name" => "Margo" ,
        "surname" => "Robby",
        "role" => "Manager",
        "login" => "heartbreaker",
        "password" => "HotGirl>18"],
    ["name" => "Adolf" ,
        "surname" => "Nothitler",
        "role" => "Client",
        "login" => "artist",
        "password" => "viennaArtSchool"],

];

    if($LOGIN == $arr[0]["login"] and $PASSWORD == $arr[0]["password"]){
    
            $admin = new admin($arr[0]["name"], $arr[0]["surname"], $arr[0]["role"],$arr[0]["login"],$arr[0]["password"]);
            $admin->introduce($admin->role,$admin->name,$admin->surname);
    }
    else if($LOGIN == $arr[1]["login"] and $PASSWORD == $arr[1]["password"]){
            $manager = new manager($arr[1]["name"], $arr[1]["surname"], $arr[1]["role"],$arr[1]["login"],$arr[1]["password"]);
            $manager->introduce($manager->role,$manager->name,$manager->surname);
    }
    else if($LOGIN == $arr[2]["login"] and $PASSWORD == $arr[2]["password"]){
            $client = new client($arr[2]["name"], $arr[2]["surname"], $arr[2]["role"],$arr[2]["login"],$arr[2]["password"]);
            $client->introduce($client->role,$client->name,$client->surname);
    }
    else if($LOGIN == null and $PASSWORD == null){
        echo "Привет! Можешь логиниться!";
    }
    else{
        echo "Введены неверные данные!";
    }

?>
<form method="post">
    <p><input type="text" name="login" > Логин</p>
    <p><input type="text" name="password" > Пароль</p>
    <input type="submit" value="Ввести">
</form>
</body>
</html>
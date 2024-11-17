<?php

class Db
{
    private function getInstance()
    {
        return ['error' => 'подключение к базе отсутствует.'];
    }

    public function store() {
        $sql = "INSERT INTO words (word) VALUES(:word)";
//        bla bla bla ...

        return $this->getInstance();
    }
}


// При вызове любого метода "загрузки"
$db = new Db();
$conn = $db->store();
if(isset($conn['error'])) {
    $log = date('Y-m-d H:i:s') . ' Запись в лог - ' . $conn['error'];
    file_put_contents(__DIR__ . '/mysql.log', $log . PHP_EOL, FILE_APPEND);
};

echo $conn['error'];
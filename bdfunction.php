<?php

 function connectDatabase()
{
    $dsn = 'mysql:host=localhost;dbname=angrobit';  // Data Source Name
    $username = 'angrobit';                          // Имя пользователя базы данных
    $password = 'uJ6eW0qS9t';                      // Пароль пользователя

    try {
        // Создаем PDO объект
        $pdo = new PDO($dsn, $username, $password);
        // Устанавливаем режим ошибок для PDO
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo "Ошибка при соединении: " . $e->getMessage();
        return null;
    }
}

 function updateRecord($table, $data, $whereClause)
{
    $pdo = connectDatabase();
    if ($pdo === null) {
        return; // Прерываем выполнение в случае ошибки соединения
    }

    // Строим SQL запрос на основе данных
    $columns = array_keys($data);
    $set = implode(", ", array_map(function($col) {
        return "$col = :$col";  // Создаем плейсхолдеры вида `column = :column`
    }, $columns));

    $sql = "UPDATE $table SET $set WHERE $whereClause";

    // Подготавливаем запрос
    $stmt = $pdo->prepare($sql);

    // Привязываем значения
    foreach ($data as $key => $value) {
        $stmt->bindValue(":$key", $value);
    }

    // Выполняем запрос
    if ($stmt->execute()) {
        echo "Запись успешно обновлена!";
    } else {
        echo "Ошибка при обновлении записи.";
    }
}
 function selectRecords($table, $columns = '*', $whereClause = '')
{
    $pdo = connectDatabase();
    if ($pdo === null) {
        return []; // Возвращаем пустой массив в случае ошибки соединения
    }

    $sql = "SELECT $columns FROM $table $whereClause";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

 function insertRecord($table, $data)
{
    $pdo = connectDatabase();
    if ($pdo === null) {
        return; // Прерываем выполнение в случае ошибки соединения
    }

    // Строим SQL запрос на основе данных
    $columns = implode(", ", array_keys($data));
    $placeholders = implode(", ", array_map(function($key) {
        return ":$key"; // Создаем плейсхолдеры вида `:column`
    }, array_keys($data)));

    $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";

    // Подготавливаем запрос
    $stmt = $pdo->prepare($sql);

    // Привязываем значения
    foreach ($data as $key => $value) {
        $stmt->bindValue(":$key", $value);
    }

    // Выполняем запрос
    if ($stmt->execute()) {
        echo "Запись успешно добавлена!";
    } else {
        echo "Ошибка при добавлении записи.";
    }
}

?>
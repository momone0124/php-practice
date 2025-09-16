<?php
require_once('config.php');

// PDOクラスのインスタンス化
function connectPdo()
{
    try {
        return new PDO(DSN, DB_USER, DB_PASSWORD);
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }
}

// 新規作成処理
function createTodoData($todoText)
{
    $dbh = connectPdo();
    $sql = 'INSERT INTO todos (content) VALUES (:todoText)';//編集
    $stmt = $dbh->prepare($sql); //追記
    $stmt->bindValue(':todoText', $todoText, PDO::PARAM_STR); //追記
    $stmt->execute(); //追記
}

// 更新処理
function updateTodoData($post)
{
    $dbh = connectPdo();
    $sql = 'UPDATE todos SET content = :todoText WHERE id = :id';
    $stmt = $dbh->prepare($sql); //編集
    $stmt->bindValue(':todoText', $post['content'], PDO::PARAM_STR); //編集
    $stmt->bindValue(':id', (int) $post['id'], PDO::PARAM_INT); //編集
    $stmt->execute(); //編集
}


function getTodoTextById($id)
{
    $dbh = connectPdo();
    $sql = 'SELECT * FROM todos WHERE deleted_at IS NULL AND id = :id';//削除されてないTODOをIDで取得
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id',(int)$id, PDO::PARAM_INT); //プレースホルダーに値をバインド
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);//追記
    return $data['content'];
}

// 削除処理（論理削除）
function deleteTodoData($id)
{
    $dbh = connectPdo();
    $now = date('Y-m-d H:i:s');
    $sql = 'UPDATE todos SET deleted_at = :deleted_at WHERE id = :id';
    $stmt = $dbh->prepare($sql);//編集
    $stmt->bindValue(':deleted_at', $now, PDO::PARAM_STR);//追記
    $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);//追記
    $stmt->execute();
}

function getAllRecords()
{
    $dbh = connectPdo();
    $sql = 'SELECT * FROM todos WHERE deleted_at IS NULL';
    return $dbh->query($sql)->fetchAll();
}


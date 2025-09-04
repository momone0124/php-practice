<?php
// Q1 tic-tac問題
echo "１から１００までのカウントを開始します\n\n";//カウント開始のメッセージを表示

//1から100まで繰り返すループ
for($i =1; $i <=100; $i++) {
    if($i % 4 == 0 && $i % 5 == 0) {
        //4の倍数かつ５の倍数
        echo "tic-tac\n";
    } elseif ($i % 4 == 0) {
        //4の倍数
        echo "tic\n";
    } elseif ($i % 5 == 0) {
        //5の倍数
        echo "tac\n";
    } else {
        //上記以外
        echo $i . "\n";
    }
}

// Q2 多次元連想配列

//複数人の個人情報（名前、メール、電話）を多次元連想配列で定義
$personalInfos = [
    [
        'name' => 'Aさん',
        'mail' => 'aaa@mail.com',
        'tel'  => '09011112222'
    ],
    [
        'name' => 'Bさん',
        'mail' => 'bbb@mail.com',
        'tel'  => '08033334444'
    ],
    [
        'name' => 'Cさん',
        'mail' => 'ccc@mail.com',
        'tel'  => '09055556666'
    ],
];
// 配列の中身を確認
var_dump($personalInfos);

//問題１
//2番目の人の名前と電話番号を表示
echo $personalInfos[1]['name'] . 'の電話番号は' . $personalInfos[1]['tel'] . 'です' . "\n";

//問題２
//番号をつけて、各人のメールと電話番号を一人ずつ表示
$number = 1;

//$personarlInfosの各要素（1人分の情報）を$infoに代入してループ
foreach($personalInfos as $info) {
    echo $number . '番目の' . $info['name'] . 'のメールアドレスは' . $info['mail'] . 'で、電話番号は' . $info['tel'] . "です。\n";
    $number++; //カウンターを１ずつ増やす
}

//問題３
//年齢リストを別の配列として定義（インデックスの順番が$personalInfosと対応）
$ageList = [25,30,18];

//それぞれの人の情報にageを追加する
foreach ($personalInfos as $key => &$info) {
    $info['age'] = $ageList[$key]; //ageListの同じインデックスの年齢を代入
}

var_dump($personalInfos);

// Q3 オブジェクト-1

//Studentクラスを定義
class Student
{
    public $studentId;
    public $studentName;

//コンストラクタ（オブジェクト生成時にIDと名前を受け取る）
    public function __construct($id, $name)
    {
        $this->studentId = $id;
        $this->studentName = $name;
    }

//attendメソッド（出席したことを表示）
    public function attend()
    {
        echo '授業に出席しました。'  ."\n";
    }
}

//Studentクラスのオブジェクトを作成
$student1 = new Student(120,'山田');

echo '学籍番号' . $student1->studentId . '番の生徒は' . $student1->studentName  . 'です。';



// Q4 オブジェクト-2

//Student2クラスを定義
class Student2
{
    public $studentId;
    public $studentName;

    public function __construct($id, $name)
    {
        $this->studentId = $id;
        $this->studentName = $name;
    }
//attendメソッド（授業科目を指定して出席表示する）
    public function attend($subject)
    {
        echo $this->studentName . 'は' . $subject .  'の授業に出席しました。学籍番号:' . $this->studentId . "\n";
    }
}

//Student2クラスのオブジェクト生成
$yamada = new Student2(120,'山田');

//attendメソッドを呼び出して出席情報を表示
$yamada->attend('PHP');


// Q5 定義済みクラス

//問題１

//DateTimeクラスを使って現在の日付から１か月前の日付を取得して表示（例：2025-08-04)
$date = new DateTime('-1 month');
echo $date->format('Y-m-d') . "\n";

//問題２

//1992年4月25日から今日までの経過日数を計算して表示
$today = new DateTime(); 
$past = new DateTime('1992-04-25');
$diff = $today->diff($past);
echo 'あの日から' . $diff->days . '日経過しました。' . "\n";


?>
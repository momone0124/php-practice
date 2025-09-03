<?php
// Q1 tic-tac問題
echo "１から１００までのカウントを開始します\n\n";

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
echo $personalInfos[1]['name'] . 'の電話番号は' . $personalInfos[1]['tel'] . 'です';

//問題２
$number = 1;

foreach($personalInfos as $info) {
    echo $number . '番目の' . $info['name'] . 'のメールアドレスは' . $info['mail'] . 'で、電話番号は' . $info['tel'] . "です。\n";
    $number++; //カウンターを１ずつ増やす
}

//問題３

$ageList = [25,30,18];

foreach ($personalInfos as $key => &$onfo) {
    $personalInfos[$key]['age'] = $ageList[$key]; //同じインデックスを使って対応する年齢を追加
}

var_dump($personalInfos);

// Q3 オブジェクト-1

class Student
{
    public $studentId;
    public $studentName;

    public function __construct($id, $name)
    {
        $this->studentId = $id;
        $this->studentName = $name;
    }

    public function attend()
    {
        echo '授業に出席しました。';
    }
}

//Studentクラスのオブジェクトを作成
$student1 = new Student(120,'山田');

echo '学籍番号' . $student1->studentid . '番の生徒は' . $student1->studentName  . 'です。';



// Q4 オブジェクト-2

class Student
{
    public $studentId;
    public $studentName;

    public function __construct($id, $name)
    {
        $this->studentId = $id;
        $this->studentName = $name;
    }
//attendメソッドを書き換える
    public function attend($subject)
    {
        echo $this->studentName . 'は' . $subject .  'の授業に出席しました。学籍番号:' . $this->studentId;
    }
}

//オブジェクト生成
$yamada = new Student(120,'山田');

//メソッド呼び出し
$yamada->attend('PHP');


// Q5 定義済みクラス

//問題１
//現在の日付から１か月前の日付を取得
$date = new DateTime('-1 month');
//出力（フォーマット：YYYY-MM-DD)
echo $date->format('Y-m-d');

//問題２
$today = new DateTime(); //現在の日付
//過去の日付（例:1992年4月25日）
$past = new DateTime('1992-04-25');
//日付の差を計算
$diff = $today->diff($past);
//総日数を取得して表示
echo 'あの日から' . $diff->days . '日経過しました。';


?>
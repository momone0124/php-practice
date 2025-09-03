<?php
// Q1 変数と文字列

$name = '戸田';
echo '私の名前は' . $name . 'です。';

// Q2 四則演算

$num = 5 * 4;
echo $num . "\n";
echo ($num/2);

// Q3 日付操作

date_default_timezone_set('Asia/Tokyo');
echo '現在時刻は、' . date('Y-m-d H:i:s'). 'です。';


// Q4 条件分岐-1 if文

$device = 'mac';

if($device =='windows') {
    echo'使用OSは、windowsです。';
} else {
    if ($device == 'mac') {
        echo '使用OSは、macです。';
    } else {
        echo 'どちらでもありません。';
    }
}


// Q5 条件分岐-2 三項演算子

$age = 25;
$message = ($age <18) ? '未成年です。' : '成人です。';

echo $message;


// Q6 配列

$kanto = ['東京都','神奈川県','埼玉県','栃木県','千葉県','茨城県','群馬県',];

echo $kanto[3] . 'と' . $kanto[4] . 'は関東地方の都道府県です。';


// Q7 連想配列-1
$kanto = [
    '東京都' => '新宿区',
    '神奈川県' => '横浜市',
    '千葉県' => '千葉市',
    '埼玉県' => 'さいたま市',
    '栃木県' => '宇都宮市',
    '群馬県' => '前橋市',
    '茨城県' => '水戸市'
];

foreach ($kanto as $ken => $capital) {
    echo $capital . "\n";
}

// Q8 連想配列-2

$kanto = [
    '東京都' => '新宿区',
    '神奈川県' => '横浜市',
    '千葉県' => '千葉市',
    '埼玉県' => 'さいたま市',
    '栃木県' => '宇都宮市',
    '群馬県' => '前橋市',
    '茨城県' => '水戸市'
];

foreach ($kanto as $ken => $capital) {
    if ($ken == '埼玉県') {
        echo $ken . 'の県庁所在地は、' . $capital . 'です。';
    }
}


// Q9 連想配列-3

//関東の都・県と県庁所在地＋関東以外の都道府県を連想配列で作成
$prefectures = [
    '東京都' => '新宿区',
    '神奈川県' => '横浜市',
    '千葉県' => '千葉市',
    '埼玉県' => 'さいたま市',
    '栃木県' => '宇都宮市',
    '群馬県' => '前橋市',
    '茨城県' => '水戸市'
    ]; 

//あとから関東以外を追加
$prefectures['大阪府'] = '大阪市';
$prefectures['愛知県'] = '名古屋市';

//関東の都・県を配列に格納（判定用）
$kanto = ['東京都','神奈川県','埼玉県','栃木県','千葉県','茨城県','群馬県',];

//連想配列をループ
foreach ($prefectures as $ken => $capital) {
    if (in_array($ken,$kantoList)) { //関東地方の場合
        echo $ken . 'の県庁所在地は、' . $capital . 'です。' . "\n";
    }   else { //関東地方以外の場合
        echo $ken . 'は関東地方ではありません。' . "\n";
    }
}


// Q10 関数-1

//hello関数を定義
function hello($name) {
    return $name .'さん、こんにちは。';
}

//関数を呼び出して文章を2つ表示
echo hello('金谷') . "\n";
echo hello('安藤') . "\n";


// Q11 関数-2

//税込み価格を計算する関数を定義
function calcTaxInPrice($price) {
    return $price * 1.1;
}

//税抜き価格を定義
$price = 1000;

//関数を使って税込み価格を計算
$taxInPrice = calcTaxInPrice($price);

//結果を表示
echo $price . '円の商品の税込み価格は' . $taxInPrice . '円です。';


// Q12 関数とif文

//数字を奇数か偶数か判別する関数を定義
function  distinguishNum($num) {
    if ($num % 2 === 0) {
        return $num . 'は偶数です。';
    } else {
        return $num . 'は奇数です。';
    }
}

//関数を使って判別
echo distinguishNum(11);
echo "\n"; //改行
echo distinguishNum(24);



// Q13 関数とswitch文

//成績を評価する関数を定義
function evaluateGrade($grade) {
    switch($grade) {
        case'A':
        case'B':
            return'合格です。';
        case'C':
            return'合格ですが追加課題があります。';
        case'D':
            return'不合格です';
        default:
            return'判定不明です。講師に問い合わせてください。';
    }

}

//関数を実行して結果を表示
echo evaluateGrade('A');
echo "\n";//改行
echo evaluateGrade('E');


?>
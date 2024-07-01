<?php
if (!isset($_SESSION)) {
	session_start();
}

ob_start();


ini_set('date.timezone', 'Asia/Taipei');



// 後台懶得改成用class的方式
if($_SERVER['HTTP_HOST'] == "127.0.0.1" || $_SERVER['HTTP_HOST'] == "localhost"){
    define("HOSTNAME", "localhost");
    define("DATABASE", "wufeng");
    define("USERNAME", "root");
    define("PASSWORD", "1234");
}else{
    define("HOSTNAME", "localhost");
    define("DATABASE", "wufeng");
    define("USERNAME", "root");
    define("PASSWORD", "");
}


try {
    $dsn = "mysql:host=". HOSTNAME .";dbname=". DATABASE .";charset=utf8";
    $conn = new PDO($dsn, USERNAME , PASSWORD);
} catch (PDOException $e){
    die("Error: " . $e->getMessage() . "\n");
}


// 前台用包好的class比較方便 (可能吧....)
require(__DIR__ . "/PDO.class.php");
$DB = new Db(HOSTNAME, DATABASE, USERNAME, PASSWORD);


// 後台有些地方會用到
$selfPage = basename($_SERVER['PHP_SELF']);

function checkV($d) {
    return (isset($_REQUEST[$d])) ? $_REQUEST[$d] : NULL;
}

function moneyFormat($data, $n = 0) {
    $data1 = number_format(substr($data, 0, strrpos($data, ".") == 0 ? strlen($data) : strrpos($data, ".")));
    $data2 = substr(strrchr($data, "."), 1);
    if ($data2 == 0) {
        $data3 = "";
    } else {
        if (strlen($data2) > $n) {
            $data3 = substr($data2, 0, $n);
        } else {
            $data3 = $data2;
        }

        $data3 = "." . $data3;
    }
    return $data1;
}

function generate_slug($str) {
  // 將字符串轉換為小寫
  $slug = strtolower($str);
  // 替換空格為短橫線
  $slug = preg_replace('/\s+/', '-', $slug);
  // 替換點為底線
  $slug = str_replace('.', '_', $slug);
  // 移除非字母數字、短橫線、下划線和非中文字符
  $slug = preg_replace('/[^\p{Han}a-z0-9-_]/iu', '', $slug);
  // 移除多餘的短橫線
  $slug = preg_replace('/-+/', '-', $slug);
  // 移除首尾的短橫線
  $slug = trim($slug, '-');

  return $slug;
}

?>
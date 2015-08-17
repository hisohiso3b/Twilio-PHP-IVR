<!--
-  Twilio-PHP-IVR System
-->

<?php
    header("content-type: text/xml");
?>
<Response>

  <!--
  -  IVR System
  -->

<?PHP if (empty($_POST["Digits"])) { ?>

  <Gather numDigits="1" timeout="120">

<Say language="ja-jp">
  報告したい地域をダイヤルして下さい。

  1,神指町大字黒川。2,五日町、八日町。3,緑町。4,材木町。5,城西町。</Say>

    </Gather>

<?PHP } elseif ($_POST["Digits"] == "1") { ?>
    <Say language="ja-jp">神指町大字黒川を選択しました。</Say>
<?PHP save_post(1);} elseif ($_POST["Digits"] == "2") { ?>
    <Say language="ja-jp">五日町、八日町を選択しました。</Say>
<?PHP save_post(2);} elseif ($_POST["Digits"] == "3") {?>
    <Say language="ja-jp">緑町を選択しました。</Say>
<?PHP save_post(3);} elseif ($_POST["Digits"] == "4") { ?>
    <Say language="ja-jp">材木町を選択しました。</Say>
<?PHP save_post(4);} elseif ($_POST["Digits"] == "5") {?>
    <Say language="ja-jp">城西町を選択しました。</Say>
<?PHP save_post(5);} else { ?>
    <Say language="ja-jp">入力は1から5までです。</Say>
<?PHP } ?>

<!--
-  報告された番号をその場でPOST_URLへPOSTで送信
-->
<?php
function save_post($num)
{
  $url = 'POST_URL';

$data = array(
      'number' => $num
);
$options = array('http' => array(
    'method' => 'POST',
    'content' => http_build_query($data),
));
$contents = file_get_contents($url, false, stream_context_create($options));
  if($contents){ ?>
<Say language="ja-jp">報告に成功しました。</Say>
<?php
  }else{ ?>
  <Say language="ja-jp">報告に失敗しました。時間を置いて再度お試し下さい。</Say>
<?php
  }
}
?>

</Response>

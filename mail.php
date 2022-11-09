<?php
// フォームのボタンが押されたら
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // フォームから送信されたデータを各変数に格納
    $companyname = $_POST['companyname'];
    $username = $_POST['username'];
    $position = $_POST['position'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $address = $_POST['address'];
    $request = $_POST['request'];
    $site = $_POST['site-kind'];
    $page = $_POST['page'];
    $design = $_POST['design'];
    $delivery = $_POST['delivery'];
    $budget = $_POST['budget'];
    $detail = $_POST['detail'];
    $nda = $_POST['nda'];
    $zoom = $_POST['zoom'];
    $candidate1_1 = $_POST['candidate1-1'];
    $candidate1_2 = $_POST['candidate1-2'];
    $candidate1_3 = $_POST['candidate1-3'];
    $candidate2_1 = $_POST['candidate2-1'];
    $candidate2_2 = $_POST['candidate2-2'];
    $candidate2_3 = $_POST['candidate2-3'];
    $candidate3_1 = $_POST['candidate3-1'];
    $candidate3_2 = $_POST['candidate3-2'];
    $candidate3_3 = $_POST['candidate3-3'];
    $confirm = $_POST['confirm'];
}

// 送信ボタンが押されたら
if (isset($_POST["submit"])) {
    // 送信ボタンが押された時に動作する処理をここに記述する
    $body = "star-kid LP からのお問い合わせ\n";
    $body .= "御社名 : {$companyname}\n";
    $body .= "ご担当者名 : {$username}\n";
    if (!empty($position)) {
        $body .= "役職 : {$position}\n";
    }
    $body .= "メールアドレス : {$email}\n";
    $body .= "電話番号 : {$tel}\n";
    if (!empty($address)) {
        $body .= "住所 : {$address}\n";
    }
    $body .= "ご依頼内容 : {$request}\n";
    $body .= "サイトの種類 : {$site}\n";
    if (!empty($page)) {
        $body .= "ページ数 : {$page}\n";
    }
    if (!empty($design)) {
        $body .= "デザイン／仕様等のご提供可能日 : {$design}\n";
    }
    if (!empty($delivery)) {
        $body .= "ご希望の納品日 : {$delivery}\n";
    }
    if (!empty($budget)) {
        $body .= "ご予算 : {$budget}\n";
    }
    if (!empty($detail)) {
        $body .= "案件詳細 : {$detail}\n";
    }
    $body .= "NDA 契約 : {$nda}\n";
    $body .= "zoom : {$zoom}\n";
    if ($zoom == "有") {
        $body .= "第一候補日 {$candidate1_1}年 {$candidate1_2}月 {$candidate1_3}日\n";
        $body .= "第二候補日 {$candidate2_1}年 {$candidate2_2}月 {$candidate2_3}日\n";
        $body .= "第三候補日 {$candidate3_1}年 {$candidate3_2}月 {$candidate3_3}日\n";
    }

    $to = "yudishino0826@gmail.com";
    $to2 = "contact@star-kid.jp";
    $subject = "[star-kid LP]お問合せがありました";

    $fromname = "star-kid LP";

    $from = "https://star-kid.jp/lp";


    $headers = "From:" . mb_encode_mimeheader($fromname) . "<{$from}>";

    /*送信処理 日本語をメールで送る場合のおまじない */
    mb_language("Japanese");
    mb_internal_encoding('UTF-8');

    mb_send_mail($to, $subject, $body, $headers);
    mb_send_mail($to2, $subject, $body, $headers);
    // mb_send_mail($to2, $subject, $body, $headers);

    header("Location: " . "https://www.s-tech-programming.com/starkid/thanks.html");
    exit;
    /*------------------------------------*/
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="star-kidについて">
    <meta property="og:title" content="star-kid">
    <meta property="og:url" content="https://star-kid.jp/">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="ja_JP">
    <meta property="og:site_name" content="star-kid">
    <title>STARKID</title>
    <link rel="stylesheet" href="/starkid/css/reset.min.css" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="/starkid/css/style.min.css" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="/starkid/css/first.min.css">
    <link rel="icon" href="favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700;900&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
    <style>
        .head {
            background: rgb(0 130 234 / 50%);
        }
    </style>
</head>

<body>
    <header class="head">
        <?php
         echo (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
         echo basename(dirname($_SERVER['SCRIPT_NAME']));
         ?>

        <div class="head__inner">
            <a class="logo head__logo" href="/starkid/"><img src="/starkid/images/svg/logo.svg" alt="starkid" width="120" height="32"></a>
            <div class="cta head-cta">
                <a href="#contact" class="head-cta__item mail">
                    <i class="fa-solid fa-envelope"></i>
                    <p>
                        <span class="db">お問い合わせ</span>
                        <span class="db pc">ご相談</span>
                    </p>
                    <img class="pc" src="/starkid/images/svg/zoom.svg" alt="zoom対応" width="58" height="50">
                </a>
                <a href="tel:0353083773" class="head-cta__item tel pc">
                    <p class="txtS">お電話でのお問い合わせ</p>
                    <p class="tel__number">03-5308-3773</p>
                    <p class="txtXS">受付時間10 : 00～19 : 00（土日祝定休）</p>
                </a>
            </div>
        </div>
        <!-- /.head__inner -->
    </header>
    <main class="main">
        <div class="bgc-gray pt100">
            <div class="contact content" id="contact">
                <div class="lv2-head__wrap inview" data-ttl="contact">
                    <h2 class="lv2-head">お問い合わせフォーム
                    </h2>
                </div>
                <form action="/starkid/mail.php" class="form" method="POST" name="form">
                    <input type="hidden" name="companyname" value="<?php echo $companyname; ?>">
                    <input type="hidden" name="username" value="<?php echo $username; ?>">
                    <input type="hidden" name="position" value="<?php echo $position; ?>">
                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                    <input type="hidden" name="tel" value="<?php echo $tel; ?>">
                    <input type="hidden" name="address" value="<?php echo $address; ?>">
                    <input type="hidden" name="request" value="<?php echo $request; ?>">
                    <input type="hidden" name="site" value="<?php echo $site; ?>">
                    <input type="hidden" name="page" value="<?php echo $page; ?>">
                    <input type="hidden" name="design" value="<?php echo $design; ?>">
                    <input type="hidden" name="delivery" value="<?php echo $delivery; ?>">
                    <input type="hidden" name="budget" value="<?php echo $budget; ?>">
                    <input type="hidden" name="detail" value="<?php echo $detail; ?>">
                    <input type="hidden" name="nda" value="<?php echo $nda; ?>">
                    <input type="hidden" name="zoom" value="<?php echo $zoom; ?>">
                    <input type="hidden" name="candidate1_1" value="<?php echo $candidate1_1; ?>">
                    <input type="hidden" name="candidate1_2" value="<?php echo $candidate1_2; ?>">
                    <input type="hidden" name="candidate1_3" value="<?php echo $candidate1_3; ?>">
                    <input type="hidden" name="candidate2_1" value="<?php echo $candidate2_1; ?>">
                    <input type="hidden" name="candidate2_2" value="<?php echo $candidate2_2; ?>">
                    <input type="hidden" name="candidate2_3" value="<?php echo $candidate2_3; ?>">
                    <input type="hidden" name="candidate3_1" value="<?php echo $candidate3_1; ?>">
                    <input type="hidden" name="candidate3_2" value="<?php echo $candidate3_2; ?>">
                    <input type="hidden" name="candidate3_3" value="<?php echo $candidate3_3; ?>">
                    <input type="hidden" name="confirm" value="<?php echo $confirm; ?>">
                    <div class="form__list inview">
                        <dl>
                            <dt class="required">御社名</dt>
                            <dd>
                                <p><?php echo $companyname; ?></p>
                            </dd>
                        </dl>
                        <dl>
                            <dt class="required">ご担当者名</dt>
                            <dd>
                                <p><?php echo $username; ?></p>
                            </dd>
                        </dl>
                        <dl>
                            <dt>役職</dt>
                            <dd>
                                <p><?php echo $position; ?></p>
                            </dd>
                        </dl>
                        <dl>
                            <dt class="required">メールアドレス</dt>
                            <dd>
                                <p><?php echo $email; ?></p>
                            </dd>
                        </dl>
                        <dl>
                            <dt class="required">電話番号</dt>
                            <dd>
                                <p><?php echo $tel; ?></p>
                            </dd>
                        </dl>
                        <dl>
                            <dt>住所</dt>
                            <dd>
                                <p><?php echo $address; ?></p>
                            </dd>
                        </dl>
                        <h3>案件に関するご質問</h3>
                        <dl>
                            <dt class="required">ご依頼内容</dt>
                            <dd>
                                <p><?php echo $request; ?></p>
                            </dd>
                        </dl>
                        <dl>
                            <dt>サイトの種類</dt>
                            <dd>
                                <p><?php echo $site; ?></p>
                            </dd>
                        </dl>
                        <dl>
                            <dt>ページ数</dt>
                            <dd>
                                <p><?php echo $page; ?></p>
                            </dd>
                        </dl>
                        <dl>
                            <dt>デザイン／仕様等の<br>
                                ご提供可能日</dt>
                            <dd>
                                <p><?php echo $design; ?></p>
                            </dd>
                        </dl>
                        <dl>
                            <dt>ご希望の納品日</dt>
                            <dd>
                                <p><?php echo $delivery; ?></p>
                            </dd>
                        </dl>
                        <dl>
                            <dt>ご予算</dt>
                            <dd>
                                <p><?php echo $budget; ?></p>
                            </dd>
                        </dl>
                        <dl>
                            <dt>案件詳細</dt>
                            <dd>
                                <p><?php echo $detail; ?></p>
                            </dd>
                        </dl>
                        <dl>
                            <dt class="pcPt1rem">NDA 契約</dt>
                            <dd>
                                <p><?php echo $nda; ?></p>
                            </dd>
                        </dl>
                        <dl>
                            <dt class="pcPt1rem">ZOOM での打ち合わせ</dt>
                            <dd>
                                <p><?php echo $zoom; ?></p>
                                <?php
                                if ($zoom == "有") {
                                    echo "<p>第一候補日 {$candidate1_1}年 {$candidate1_2}月 {$candidate1_3}日</p>";
                                    echo "<p>第二候補日 {$candidate2_1}年 {$candidate2_2}月 {$candidate2_3}日</p>";
                                    echo "<p>第三候補日 {$candidate3_1}年 {$candidate3_2}月 {$candidate3_3}日</p>";
                                }
                                ?>
                            </dd>
                        </dl>
                    </div>
                    <div class="txtAlignC">
                        <input type="button" value="内容を修正する" class="btn btn--arrow-right inview" onclick="history.back(-1)">
                        <button type="submit" name="submit" class="btn btn--arrow-right inview mt2r">送信する</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.contact -->
    </main>
    <footer class="footer">
        <div class="footer__inner">
            <div class="footer__body">
                <a class="logo footer__logo" href="/starkid/"><img src="/starkid/images/svg/logo.svg" alt="starkid" width="145" height="50">
                </a>
                <p class="footer__txt">株式会社 株式会社スターキッド</p>
                <p class="footer__txt">〒151-0071 東京都渋谷区本町1-7-5 初代村上ビル10F</p>
            </div>
            <div class="footer__tel">
                <p><a href="tel:03-5308-3773">03-5308-3773</a></p>
                <p class="txtS">受付（平日）10:00~18:00</p>
            </div>
            <div class="footer__aboutUs">
                <a href="/about_us/">ABOUT US</a>
            </div>
        </div>
        <p class="footer__copy">&copy;2007-2022 star-kid.</p>
        <!-- /.footer__inner -->
        <div id="js-pagetop">
            <a href="#"></a>
        </div>
    </footer>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous" defer></script>
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/77dc7fa7fe.js" crossorigin="anonymous" defer></script>
    <!-- myscript -->
    <script src="/starkid/js/script.min.js" defer></script>
</body>

</html>
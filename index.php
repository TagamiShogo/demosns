<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>マルチ掲示板</title>
    </head>
    <body>
        <?php 
        mb_internal_encoding("utf8");
        $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","mysql");
        $stmt_demo = $pdo->query("select * from demosns");
        $stmt_pad = $pdo->query("select * from padsns");
        $stmt_pc = $pdo->query("select * from pcsns");
        ?>

        <header>
            <div class="logo">Three Board.</div>
        </header>
        <main>  
    <!-- POST FORM -->            
            <div class="post-main">
                <form method="post" action="insert.php">
                    <div>
                        <label>ユーザネーム：</label><br>
                        <div class="input-area">
                        <input type="text" class="text" size="150" name="username" placeholder="あなたのお名前" required>
                        </div>
                    </div>
                    <div>
                        <label>どこに投稿？：</label>
                        <p class="input-area">
                            <input type="radio" name="board" value="A" checked> スマホ
                            <input type="radio" name="board" value="B"> タブレット
                            <input type="radio" name="board" value="C"> PC
                        </p>
                    </div>

                    <div>
                        <label>投稿：</label><br>
                        <div class="input-area">
                        <textarea type="text" class="text" cols="150" rows="7" name="post"　placeholder="いいたいこと" required ></textarea>
                        </div>
                    </div>
                    <input type="submit"  class="square_btn" width="224" height="64" alt="送信する" value="送信する">

                </form>
            </div>
    <!-- iPhone -->
        <div class="iphone-wrapper">
            <div class="spbody">
                <div class="partsbd">
                    <div class="partshd">
                        <div class="partsspe"></div>
                        <div class="partscam"></div>
                    </div>
                    <div class="partsvw">
                        <?php
                        while($row1 = $stmt_demo->fetch()){

                        echo "<div class='post'>";
                        echo $row1['post'];
                        echo "<div class='username'>posted by".$row1['username']."</div>";
                        echo "</div>";
                        }
                        ?>
                    </div>
                    <div class="partsbtn"></div>
                </div>
            </div>
        </div>

    <!-- iPad -->
        <div class="pad-wrapper">
            <div class="padbody">
                <div class="partsvw">
                        <?php
                        while($row2 = $stmt_pad->fetch()){

                        echo "<div class='post'>";
                        echo $row2['post'];
                        echo "<div class='username'>posted by".$row2['username']."</div>";
                        echo "</div>";
                        }
                        ?>
                </div>
                <div class="partsbtn"></div>
            </div> 
        </div>
    <!-- PC -->
        <div class="pc-wrapper">
            <div class="pcbody">
                <div class="partshd">
                    <div class="partsvw">
                        <div class="partsliquid">
                        <?php
                        while($row3 = $stmt_pc->fetch()){
                        echo "<div class='post'>";
                        echo $row3['post'];
                        echo "<div class='username'>posted by".$row3['username']."</div>";
                        echo "</div>";
                        }
                        ?>
                        </div>
                    </div>
                    <div class="partsicon">PC</div>
                </div>
            <div class="partsft">
                <div class="parts1"></div>
                <div class="parts2"></div>
                <div class="parts3"></div>
            </div>
            </div>
        </div>
        </main>
    </body>
</html>
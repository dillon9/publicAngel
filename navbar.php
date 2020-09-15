<link rel="stylesheet" type="text/css" href="css/navbar_styles.css">
<div class="nav">
	<div class="inner">
	<ul>
        <li>
            <a href="index.php">home</a>
            <ul>
                <li><a href="2019.php">2019 games</a></li>
                <li><a href="2019l.php">2019 leaderboard</a></li>
                <li><a href="2020.php">2020 games</a></li>
                <li><a href="2020l.php">2020 leaderboard</a></li>
            </ul>
        </li>
        <li>
            <a href="easy.php">lemon</a>
            <ul>
                <li><a href="easy.php">easy 1</a></li>
                <li><a href="easy2.php">easy 2</a></li>
                <li><a href="easy3.php?windows8=good">easy 3</a></li>
            </ul>
        </li>
        <li>
            <a href="medium.php">squeezy</a>
            <ul>
                <li><a href="medium.php">medium 1</a></li>
                <li><a href="medium2.php">medium 2</a></li>
                <li><a href="medium3.php">medium 3</a></li>
            </ul>
        </li>
        <li>
            <a href="hard.php">a lot difficult</a>
            <ul>
                <li><a href="hard.php">hard 1</a></li>
                <li><a href="hard2.php">hard 2</a></li>
                <li><a href="hard3.php">hard 3</a></li>
            </ul>
        </li>
        <li>
            <a>
                <?php 
                
                if(isset($_SESSION["id"])){ 
                    $x = "hello, " . substr($_SESSION["users"], 0, 12);
                    echo '<a href = "account.php">'.$x.'</a>';

                }
                elseif(!(isset($_SESSION["id"]))) 
                    echo '<a href="login.php">login</a>';
            ?>
        </a>
            <ul>
                <li><a>
                <?php 
                if(isset($_SESSION["id"])){ 
                    echo '<a href="logout.php">logout</a>';
                }
                elseif(!(isset($_SESSION["id"]))) 
                    echo '<a href="newAccount.php">create account</a>';
            ?>
            </a></li>
            </ul>

        </li>
	</ul>
</div>
<br style="clear:both">

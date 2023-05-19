<?php
session_start();
?>

<html>
    <head>
        <title>PHP Quizer</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <div class="container">
                <p>PHP Quizer</p>
            </div>
        </header>
        <main>
            <div class="container">
                <h2> your result</h2>
                <p> congratulation you have completed this test succesfully. </p>
                <p> your <strong>score </strong>is <?php echo $_SESSION['score']; ?></p>
                <?php unset ($_SESSION['score']);?>
            </div>
            

        </main>
    </body>
</html>
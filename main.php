<?php
include 'connection.php';
$query = "SELECT * FROM questions";
$total_questions = mysqli_num_rows(mysqli_query($connection,$query));
?>
<html>
    <head>
        <title>  PHP Quizer</title>
        <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <p> PHP Quizer</p>
        </div>  
    <header>
        
    <main>
        <div clean="container">
            <h2> test your PHP knowledge</h2>
            <p>
                this is a multiple choice quiz to test your PHP knowledge
            </p>
            <ul>
                    <li><strong>number of  questions</strong><?php echo $total_questions; ?></li>
                    <li><strong>type</strong>multiple choice<li>
                    <li><strong>estimated time<strong> <?php echo $total_questions*1.5; ?><li>
            </ul>

            <a href="question.php?n=1" class="start">start quiz</a>
        </div>    
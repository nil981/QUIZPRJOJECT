<?php
     include 'connection.php';
     session_start();
     //set question number
     $number = $_GET['n'];

     //query for the question
     $query ="SELECT * FROM questions WHERE question_number  = $number";
     
     // GET the question
     $result =mysqli_query ($connection,$query);
     $question = mysqli_fetch_assoc($result);

     //GET choices
     $query = "SELECT * FROM options WHERE question_number = $number";
     $choices = mysqli_query($connection,$query);

     // GET total questions
     $query ="SELECT * FROM questions";
     $total_questions = mysqli_num_rows(mysqli_query($connection,$query))

     ?>
<html>
    <head>
        <title>
            PHP Quizer
        </title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        
    <header>
        <div class="container">
            <p>PHP Quizer<p>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="current"> question <?php echo $number; ?> of <?php echo $total_questions; ?></div>
            <p class ="question"><?php echo $question['question_text']; ?></p>
          <form method="POST" action="process.php">
             <ul class="choicess">
                <?php while ($row=mysqli_fetch_assoc($choices)){ ?>
                    <li><input type="radio" name="choices" value="<?php echo $row ['id']; ?>"> <?php echo $row ['coption']; ?></li>
                    <?php  }  ?>

    
             </ul>
             <input type="hidden" name="number" value="<?php echo $number; ?>">
             <input type="submit" name="submit" value="submit">
          </form>
        </div>
    </main>
    </body>
</html>
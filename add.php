<?php include 'connection.php';
if (isset($_POST['submit'])){
    $question_number = $_POST['question_number'];
    $question_text  = $_POST['question_text'];
    $correct_choice = $_POST['correct_choice'];
    //choice array
    $choice = array();
    $choice[1]  = $_POST['choice1'];
    $choice[2]  = $_POST['choice2'];
    $choice[3]  = $_POST['choice3'];
    $choice[4]  = $_POST['choice4'];


    //first query for question table

    $query = "INSERT INTO questions (";
    $query .= "question_number,  question_text )";
    $query .= "VALUES (";
    $query .=" '{$question_number}',' {$question_text}' ";
    $query .= ")"; 

    $result = mysqli_query ($connection,$query);

    //validate first query 
    if($result) {
        foreach ($choice as $option => $value){
            if($value != "") {
                if($correct_choice == $option){
                    $is_correct = 1;
                }else{
                    $is_correct =0;
                }

                //second query for choices table
                $query = "INSERT INTO options (";
                $query .= "question_number, is_correct,coption )";
                $query .= "VALUES (";
                $query .=" '{$question_number}',' {$is_correct}',' {$value}' )";
                 
                $insert_row = mysqli_query($connection,$query);

                // validate insertion of choices

                if ($insert_row) {
                    continue;
                }else{
                    die("2nd query for choices could not be executed");
                }

                
                        
                    
            }
        }
            $message ="question has been added successfuly";
    }
}

    


     $query = "SELECT * FROM questions";
    $questions = mysqli_query ($connection,$query);
    $total  = mysqli_num_rows ($questions);
    $next = $total +1;

    ?>

<html>
    <head>
        <title>PHP Quizer </title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <header>
            <div class="container">
                <p>PHP Quizer </p>
            </div>
        </header>
        
      <main>
          <div class="container">
            <h2> add a question<h2>
                <?php if(isset($message)){
                    echo "<h4>"  . $message . "</h4>";
                } ?>
                
            
            <form method="POST" action="add.php">
                <p>
                    <label >question number</label>
                    <input type="number" name="question_number" value="<?php echo $next; ?>">
                </p>
                    
                 
                 <p>
                    <label >question text</label>
                    <input type="text" name="question_text">

                 </P>  

                 <p>
                    <label >choice 1</label>
                    <input type="text" name="choice1">
                 </p>
                 <p>
                    <label >choice 2</label>
                    <input type="text" name="choice2">
                 </p>
                 <p>
                    <label >choice 3</label>
                    <input type="text" name="choice3">
                 </p>
                 <p>
                    <label >choice 4</label>
                    <input type="text" name="choice4">
                 </p>
                 <p>
                    <label >correct option number</label>
                    <input type="number" name="correct_choice">
                 </p>
                 <input type="submit" name="submit" value="submit">


</form>
</div>





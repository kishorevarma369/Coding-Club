<?php include('includes/header.php'); ?>
<?php
function process_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if(!isset($_SESSION['user_id'])) header('Location: '.'/index.php');

include('includes/dbcon.php');
$pid=0;
if(isset($_GET['pid']))
{
    $pid=(int)($_GET['pid']);
}
$pid=$pid*10;
$sql="select qname,points from questions limit $pid,10";
$res=mysqli_query($dbcon,$sql);

/*
 todo
 page numbers

*/


if($res)
{
}else{
    mysqli_close($dbcon);
    header('Location: '.'/questions.php');
} 
?>
    <div class="container">
        <div class="questions-container">
            <h1>Question</h1>
            <div class="question-content-container">
                <?php 
                    while($row=mysqli_fetch_assoc($res)) 
                    { 
                ?>
                        <div class="question-row">
                            <h2><?php echo $row['qname'];?></h2>
                            <div class="question-options">
                                <p>points: <?php echo $row['points'];?></p>
                                <a class="myb" href="/question.php?qname='<?php echo $row['qname'];?>'">view</a>
                            </div>
                        </div>

                <?php
                    }
                ?>
            </div>
        </div>
        <!-- <div class="question-stats-container">
                <h2>Question Stats</h2> 
                <div>
                    <span>Submission Count : 50</span>
                </div>
                <div>
                    <span>Author : Kishore Varma</span>
                </div>
                
        </div> -->
    </div>
<?php 
mysqli_close($dbcon);
include('includes/footer.php'); ?>
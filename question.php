<?php include('includes/header.php'); ?>
<?php
function process_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$qid=0;
if(!isset($_SESSION['user_id'])) header('Location: '.'/index.php');
if(isset($_GET['qname']))
{
    include('includes/dbcon.php');
    $qname=process_input($_GET['qname']);
    $sql="SELECT * from questions where qname=$qname";
    if($res=mysqli_query($dbcon,$sql))
    {
        $row=mysqli_fetch_assoc($res);
        $qname=$row['qname'];
        $qid=$row['qid'];
        $qcontent=$row['qcontent'];
        $points=$row['points'];
        $given_by=$row['given_by'];
        $sql="SELECT username from users where user_id=$given_by";
        $fail=false;
        if($res=mysqli_query($dbcon,$sql)){
            $row=mysqli_fetch_assoc($res);
            $given_by=$row['username'];
        }else $fail=true;
        mysqli_close($dbcon);
    }
    else
    {
        mysqli_close($dbcon);
        header('Location: '.'/question-error.php');
    }
    
}else  header('Location: '.'/question-error.php');
?>
    <div class="container">
    <div class="question-container">
            <div class="question-content-container">
                <h1><?php echo $qname;?></h1>
                <p>
                    <?php echo $qcontent; ?>
                </p>
                <textarea name="" id="code-area" rows="30"></textarea>
                <button class="myb">Submit</button>
                <div id="result-container">

                </div>
            </div>
            <div class="question-stats-container">
                <h2>Question Stats</h2> 
                <div>
                    <span>Submission Count : -</span>
                </div>
                <div>
                    <span>Points : <?php echo $points;?></span>
                </div>
                <div>
                    <span>Author : <?php echo $given_by;?></span>
                </div>
                
            </div>
            
        </div>
    </div>
    <script>
        var code=$('#code-area')[0];
        var result_container=$('#result-container')[0];
        $('.myb').click(function(){
            result_container.innerHTML='';
            $.post('submit-solution.php',{'code':code.value,'qid':<?php echo $qid;?>},function(res){
                console.log(res);
                result_container.innerHTML=res;
            })
        })
    </script>
<?php include('includes/footer.php'); ?>
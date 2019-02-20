<?php
include_once('includes/session.php');
function process_input($data) {
    $data=addslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if(!isset($_SESSION['user_id'])) header('Location: '.'/');
include_once('includes/dbcon.php');
$tests=$_POST['tests'];
$qname=process_input($_POST['qname']);
$qcontent=process_input($_POST['qcontent']);
$given_by=$_SESSION['user_id'];
$sql="INSERT INTO `questions` VALUES (NULL,'$qname','$qcontent',$given_by,0)";
if($res=mysqli_query($dbcon,$sql))
{
    $sql="SELECT qid from questions where qname='$qname'";
    if($res=mysqli_query($dbcon,$sql))
    {
        $qid=mysqli_fetch_assoc($res)['qid'];
        foreach($tests as $test)
        {
            $ip=process_input($test['input']);
            $op=process_input($test['output']);
            $score=(int)$test['score'];
            $sql="INSERT INTO `tests` values(NULL,$qid,'$ip','$op',$score)";
            if($res=mysqli_query($dbcon,$sql))
            {
                
            }
            else $_SESSION['error']='failed to add one or more test cases';
        }
        $sql="UPDATE `questions` SET `points` = (SELECT sum(points) from tests where qid=$qid) WHERE `questions`.`qid` = $qid";
        if(!mysqli_query($dbcon,$sql)) $_SESSION['error']='failed calculate points to the question';
    }
    else $_SESSION['error']='failed to add test cases to question';
}
else $_SESSION['error']='failed to add question';
mysqli_close($dbcon);
echo $_SESSION['error'];
?>
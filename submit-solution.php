<?php
include_once('api/oop-compiler.php');
include_once('includes/session.php');

if(!isset($_SESSION['user_id']))
{
    echo 'You need to login to submit a solution';
    exit;
}
function isvalid($ques,$dbcon)
{
    $ques=(int)$ques;
    $sql="select * from questions where qid=$ques";
    if(($res=mysqli_query($dbcon,$sql)))
    {
        if($row=mysqli_fetch_assoc($res)) return true;
    }
    return false;
}
function get_tests($ques,$dbcon)
{
    $sql="select * from tests where qid=$ques";
    if(($res=mysqli_query($dbcon,$sql)))
    {
        $test_arr=array();
        $i=0;
        while($row=mysqli_fetch_assoc($res))
        {
            $test_arr[$i]=array();
            $test_arr[$i]['input']=$row['input'];
            $test_arr[$i]['output']=$row['output'];
            $test_arr[$i]['points']=$row['points'];
            $i++;
        }
        return $test_arr;
    }
    return array();
}
include_once('includes/dbcon.php');
if(isset($_POST['code'])&&isset($_POST['qid'])&&isvalid($_POST['qid'],$dbcon))
{
    $t=new compiler();
    $t->create_file($_POST['code']);
    $test_arr=get_tests($_POST['qid'],$dbcon);
    $test_res=array();
    $total_points=0;
    $points=0;
    $i=0;
    $passed=0;
    $failed=0;
    if(($res=$t->compile())=="Success"){
        foreach($test_arr as $test)
        {
            $test_res[$i]=array();
            if($output=($t->run_program($test['input'])))
            {
                // if(check($test['input'],$test_output))
                if(true)
                {
                    $test_res[$i]['points']=$test['points'];
                    $test_res[$i]['yes']=1;
                    $passed++;
                }
                else
                {
                    $test_res[$i]['points']=0;
                    $test_res[$i]['yes']=0;
                    $failed++;
                }
            }
            $total_points+=$test_res[$i]['points'];
            $i++;
        }
    }
    //echo json_encode($test_res)." ".$total_points;
    $test_size=sizeof($test_arr);
    echo "$passed/$test_size Test cases Passed . You got $total_points";
    $t->close();
}
else
{
    exit;
}


// // $code="#include<stdio.h>

// // int main()
// // {
// //     int *p=0;
// //     printf(\"%d\",*p);
// //     return 0;
// // }";

// $t->create_file($code);
// if(($res=$t->compile())=="Success"){
//     echo $t->run_program('');
// }
// else echo $res;
// $t->close();
?>
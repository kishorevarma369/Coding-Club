<?php
$input="";
$output="";
$tmp="./tmp/";
$file_ext=".c";
$exec_ext=".exe";
$c_output="";
$ret_out=new \stdClass();
$compiler="gcc";
$compile_cmd="";
$execute_cmd="";

function setoptions()
{
    global $tmp,$compile_cmd,$compiler,$fname,$exec_fname,$error_fname,$file_base_name,$input_fname,$output_fname,$execute_cmd;
    $compile_cmd = "cd $tmp && $compiler $fname -o $exec_fname 2> $error_fname" ;
    $execute_cmd="cd tmp && start \"$file_base_name\" /B $exec_fname < $input_fname > $output_fname & timeout /t 1 & Taskkill /im $exec_fname /f";
        
}

include ('basic_compiler.php');

?>
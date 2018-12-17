<?php

$code="#include<stdio.h>

int main()
{
	//your code
	return 0;
}
";

$input="";
$output="";
$tmp="./tmp/";
$file_ext=".c";
$exec_ext=".exe";
$c_output="";
$ret_out=new \stdClass();
$file_base_name="";

if(isset($_POST['submit']))
{
    $file_base_name = pathinfo(tempnam($tmp, ""))['filename'];

    //create file name and corresponding input file name

    $fname = $file_base_name.$file_ext;
    $input_fname = $file_base_name.'.input';

    //create files XYZ.c and XYZ.input

    $file_handle = fopen($tmp.$fname, "w");
    $input_handle = fopen($tmp.$input_fname, "w");

    //write code to XYZ.c and input to XYZ.input

    $c_code=$_POST['c_code'];
    fwrite($file_handle,$c_code);
    
    $c_input=$_POST['c_input'];
    fwrite($input_handle,$c_input);
    
    fclose($file_handle);
    fclose($input_handle);


    $exec_fname = $file_base_name.$exec_ext;
    $error_fname = $file_base_name.".err";

    $compile_cmd = "cd tmp && gcc $fname -o $exec_fname 2> $error_fname" ;
    system($compile_cmd);
    if(filesize($tmp.$error_fname)>0)
    {
        $error_handle=fopen($tmp.$error_fname,"r");
        $ret_out->error=fread($error_handle,filesize($tmp.$error_fname));
        fclose($error_handle);
    }
    else
    {
        $output_fname = $file_base_name.'.output';
        $execute_cmd="cd tmp && start \"$file_base_name\" /B $exec_fname < $input_fname > $output_fname & timeout /t 1 & Taskkill /im $exec_fname /f";
        //echo $execute_cmd;
        $exec_res=exec($execute_cmd);
        
        if(!$exec_res)
        {
            $output_handle=fopen($tmp.$output_fname,"r");
            $output_file_size=filesize($tmp.$output_fname);
            if($output_file_size>0) $c_output=fread($output_handle,$output_file_size);
            $ret_out->output=$c_output;
            fclose($output_handle);
        }
        else $ret_out->TLE='Time Limit Exceeded';
        unlink($tmp.$output_fname);
        unlink($tmp.$exec_fname);
    }
    unlink($tmp.$error_fname);
    unlink($tmp.$fname);
    unlink($tmp.$input_fname);
    unlink($tmp.$file_base_name.".tmp");

    echo json_encode($ret_out);
}
?>
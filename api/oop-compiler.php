
<?php

class compiler{
    var $file_name;
    // define("tmp","./tmp/");
    var $tmp="./tmp/";
    var $compiled=false;
    function create_file($code)
    {
        $tmpfile=tempnam($this->tmp, "");
        $this->file_name=pathinfo($tmpfile)['filename'];
        unlink($tmpfile);
        $file_resource=fopen($this->tmp.$this->file_name.".cpp","w");
        fwrite($file_resource,$code);
        fclose($file_resource);
    }
    function compile()
    {
        $compile_cmd = "cd tmp && g++ $this->file_name.cpp -o $this->file_name.exe 2> $this->file_name.err" ;
        system($compile_cmd);
        if(filesize($this->tmp.$this->file_name.".err")>0)
        {
            $error_handle=fopen($this->tmp.$this->file_name.".err","r");
            $error=fread($error_handle,filesize($this->tmp.$this->file_name.".err"));
            fclose($error_handle);
            unlink($this->tmp.$this->file_name.".err");
            return $error;
        }
        $this->compiled=true;
        if(file_exists($this->tmp.$this->file_name.".err")) unlink($this->tmp.$this->file_name.".err");
        return "Success";
    }
    function run_program($test_input)
    {
        $file_resource=fopen($this->tmp.$this->file_name.".input","w");
        fwrite($file_resource,$test_input);
        fclose($file_resource);
        $execute_cmd = "cd tmp && start \"$this->file_name\" /B $this->file_name.exe < $this->file_name.input > $this->file_name.output & timeout /t 0.1 & Taskkill /im $this->file_name.exe /f" ;
        $exec_res=exec($execute_cmd);
        unlink($this->tmp.$this->file_name.".input");
        if(!$exec_res)
        {
            $output_handle=fopen($this->tmp.$this->file_name.".output","r");
            $output_file_size=filesize($this->tmp.$this->file_name.".output");
            if($output_file_size>0) $retval=fread($output_handle,$output_file_size);
            else $retval="Run time Error";
            fclose($output_handle);
            unlink($this->tmp.$this->file_name.".output");
            return $retval;
        }
        unlink($this->tmp.$this->file_name.".output");
        return $exec_res;
    }
    function close()
    {
        if($this->compiled) 
        {
            error_reporting(E_ALL ^ E_WARNING);
            while(file_exists($this->tmp.$this->file_name.".exe")){
                try{
                    unlink($this->tmp.$this->file_name.".exe");
                }
                catch(Exception $e){
                    sleep(1);
                }
            }
            // while(unlink($this->tmp.$this->file_name.".exe"));
        }
        unlink($this->tmp.$this->file_name.".cpp");
    }
}


// $t=new compiler();
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
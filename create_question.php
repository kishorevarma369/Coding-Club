<?php include('includes/header.php'); ?>
<?php
if(!isset($_SESSION['user_id'])) header('Location: '.'/index.php');
?>
    <div class="container form-container">
        <h1>Create a Question</h1>
        <form>
            <br><br>
            <div class="form-row">
                <span>Question Name</span>
                <input type="text" name="qname" placeholder="Enter your Question Name">
            </div>
            <br><br>
            <div class="form-row">
                <span>Question Content</span>
                <textarea name="qcontent" rows="30" placeholder="Enter Question Content"></textarea>
            </div>
            <h2>Tests : </h2>
            <div id="test-cases">
                <div class="form-row tests">
                    <span>Test Case</span>
                    <textarea name="test_input" rows="10" placeholder="Enter test input"></textarea>
                    <textarea name="test_output" rows="10" placeholder="Enter test output"></textarea>
                    <div class="score-div">
                        <span>Score</span>
                        <input type="number" name="score" value=0>
                        <input type="button" onclick="return delete_tests(this)" name="delete" value="Delete Test Case">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <input type="button" onclick="return add_tests()"value="Add Test Case">    
            </div>
            <br><br>
            <div class="form-row">
                <input type="submit" onclick="return submit_question()" name="submit" value="submit">    
            </div>
            <br><br>
        </form>
        <script>
            test_cases=$('#test-cases');
            function add_tests()
            {
                test_cases.append($( '<div class="form-row tests"><span>Test Case </span><textarea name="test_input" rows="10" placeholder="Enter test input"></textarea><textarea name="test_output" rows="10" placeholder="Enter test output"></textarea><div class="score-div"><span>Score</span><input type="number" name="score" value=0><input type="button" name="delete" onclick="return delete_tests(this)" value="Delete Test Case"></div></div>' ))
                return false;
            }
            function delete_tests(e)
            {
                e.parentElement.parentElement.classList.toggle('delete-test');
                $('.delete-test').remove();
                return false;
            }
            function make_array(){
                test_array=Array();
                var mytest,myinput,t=test_cases.children();
                console.log(t);
                for(var i=0;i<t.length;i++)
                {
                    mytest=t[i];
                    // console.log(mytest);
                    myinput=mytest.children[1].value;
                    myoutput=mytest.children[2].value;
                    myscore=mytest.children[3].children[1].value;
                    test_array[i]={'input':myinput,'output':myoutput,'score':myscore};
                    // console.log({'input':myinput,'output':myoutput,'score':myscore});
                }
                return test_array;
            }
            function submit_question()
            {
                var ques=$('.form-row');
                var qname=ques[0].children[1].value;
                var qcontent=ques[1].children[1].value;
                var o={'qname':qname,'qcontent':qcontent,'tests':make_array()}
                console.log(o);
                $.post('/submit_question.php',o,function(res){
                    console.log(res);
                });
                return false;
            }

        </script>
    </div>
<?php include('includes/footer.php'); ?>
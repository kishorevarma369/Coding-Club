<li><a href="/">Home</a></li>
<?php 
if(isset($_SESSION['user_id']))
{ 
    echo '<li><a href="create.php">Create</a></li>';
    echo '<li><a href="logout.php">Logout</a></li>';
}
else
{
echo '<li>Contact</li>
      <li>About</li>'; 
}
?>
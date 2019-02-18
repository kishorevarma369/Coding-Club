<li><a href="/">Home</a></li>
<?php 
if(isset($_SESSION['user_id']))
{ 
    echo '<li><a href="create/">Create</a></li>';
    echo '<li><a href="logout.php">Logout</a></li>';
}
else
{
echo '<li>Contact</li>
      <li>About</li>'; 
}
?>
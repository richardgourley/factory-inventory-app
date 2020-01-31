<?php session_start(); ?>

<?php if( isset( $_SESSION['USERNAME'] ) ): ?>
<h3>Welcome back <?php echo htmlentities( $_SESSION['USERNAME'], ENT_QUOTES ); ?></h3>
<?php endif; ?>

<?php if( isset( $_SESSION['PRIVELIGES'] ) && $_SESSION['PRIVELIGES'] === '1' ): ?>
<ul>
    <li><a href="../index.php">Home</a></li>
    <li><a href="viewAll.php">View all products</a></li>
    <li><a href="addNew.php">Add new product</a></li>
    <li><a href="edit.php">Edit a product</a></li>
    <li><a href="search.php">Search</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul>
<?php elseif( isset( $_SESSION['PRIVELIGES'] ) && $_SESSION['PRIVELIGES'] === '2' ): ?>
<ul>
    <li><a href="../index.php">Home</a></li>
    <li><a href="viewAll.php">View all products</a></li>
    <li><a href="search.php">Search</a></li>
    <li><a href="logout.php">Logout</a></li>
</ul> 
<?php else: ?>
<p>You are not currently logged in.</p>
<ul>
    <li><a href="../index.php">Home</a></li>
    <li><a href="login.php">Login</a></li>
</ul>
<?php endif; ?>
    
    




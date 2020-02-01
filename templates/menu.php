<?php if( isset( $_SESSION['USERNAME'] ) ): ?>
<h3>Welcome back <?php echo htmlentities( $_SESSION['USERNAME'], ENT_QUOTES ); ?></h3>
<?php endif; ?>

<?php if( isset( $_SESSION['PRIVELIGES'] ) && $_SESSION['PRIVELIGES'] === '1' ): ?>
<ul>
    <li><a href="<?php echo SITE_URL . '/index.php'; ?>">Home</a></li>
    <li><a href="<?php echo SITE_URL . '/templates/viewAll.php'; ?>">View all products</a></li>
    <li><a href="<?php echo SITE_URL . '/templates/addNew.php'; ?>">Add new product</a></li>
    <li><a href="<?php echo SITE_URL . '/templates/edit.php'; ?>">Edit a product</a></li>
    <li><a href="<?php echo SITE_URL . '/templates/search.php'; ?>">Search</a></li>
    <li><a href="<?php echo SITE_URL . '/templates/logout.php'; ?>">Logout</a></li>
</ul>
<?php elseif( isset( $_SESSION['PRIVELIGES'] ) && $_SESSION['PRIVELIGES'] === '2' ): ?>
<ul>
    <li><a href="<?php echo SITE_URL . '/index.php'; ?>">Home</a></li>
    <li><a href="<?php echo SITE_URL . '/templates/viewAll.php'; ?>">View all products</a></li>
    <li><a href="<?php echo SITE_URL . '/templates/search.php'; ?>">Search</a></li>
    <li><a href="<?php echo SITE_URL . '/templates/logout.php'; ?>">Logout</a></li>
</ul> 
<?php else: ?>
<p>You are not currently logged in.</p>
<ul>
    <li><a href="<?php echo SITE_URL . '/index.php'; ?>">Home</a></li>
    <li><a href="<?php echo SITE_URL . '/templates/login.php'; ?>">Login</a></li>
</ul>
<?php endif; ?>
    
    




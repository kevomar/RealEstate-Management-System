<style>
.collapse a {
    text-indent: 10px;
}

nav#sidebar {
    background-color: white;
}
</style>

<nav id="sidebar" class='mx-lt-5 bg-dark'>

    <div class="sidebar-list">
        <?php //if($_SESSION['login_type'] == 1): ?>
        <a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i
                    class="fa fa-users "></i></span> User Info</a>
        <a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i
                    class="fa fa-tachometer-alt "></i></span> Dashboard</a>
        <a href="index.php?page=tenants" class="nav-item nav-tenants"><span class='icon-field'><i
                    class="fa fa-user-friends "></i></span> Tenants</a>
        <a href="index.php?page=houses" class="nav-item nav-houses"><span class='icon-field'><i
                    class="fa fa-home "></i></span> Property</a>
        <!-- In the hyper link add the links -->
        <a href="index.php?" class="nav-item nav-invoices"><span class='icon-field'><i
                    class="fa fa-file-invoice "></i></span> Payments</a>
        <a href="index.php?" class="nav-item nav-reports"><span class='icon-field'><i
                    class="fa fa-list-alt "></i></span> Reviews</a>
        <a href="index.php?" class="nav-item nav-reports"><span class='icon-field'><i
                    class="fa fa-list-alt "></i></span> Maintenance</a>
        <?php //endif; ?>
    </div>

</nav>
<script>
$('.nav_collapse').click(function() {
    console.log($(this).attr('href'))
    $($(this).attr('href')).collapse()
})
$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
<?php
defined("BASEPATH") or exit ("No direct scripts allowed");?>
<nav class="submit">           
            <a href="<?php echo site_url("user/logout"); ?>" class="btn btn-secondary" id="logoutBtn">LOGOUT</a>
</nav>
<div class="container-fluid"> 
    <div class = "row">
        <div class="">           
            <h1>Welcome <?php echo $user->first_name ?></h1>
        </div>
    </div>
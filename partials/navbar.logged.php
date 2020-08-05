<?php require_once "functions.php"; ?>

<ul class="navbar-nav ml-auto">
    <!--Ovde sam koristio sliku za zelenu ikonicu online
    <li class="nav-item mt-2"><img src="img/LoginImg.jpg" alt="" style="width:11px; height:11px;"></li>
    -->
    <li class="nav-item"><a href="new.add.view.php" class = "nav-link"><button type="btn" class="btn-success">Postavi oglas</button></a></li>
    <!--<li class="nav-item mt-2"><span class="onlineIcon" style="height: 15px; width: 15px; background-color: #7CFC00; border-radius: 80%; color: #7CFC00;">on</span></li>-->
    <li class="nav-item"><a href="user.add.php" class="nav-link"><?php echo $_SESSION['ime']; ?></a></li>
    <li class="nav-item"><a href="logout.php" class="nav-link">Izloguj se</a></li>
</ul>



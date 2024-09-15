<?php
session_start();
if (isset($_SESSION["dpname"]) && $_SESSION["dpname"] == "") {
    $_SESSION["dpname"] = "../logo.jpg";
}
?>

<!-- Overlay -->
<div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-4 rounded shadow-lg relative">
        <span class="absolute top-2 right-2 text-gray-500 text-2xl cursor-pointer" onclick="this.parentElement.parentElement.style.display='none';">&times;</span>
        <div class="userdp mb-4">
            <a href="<?php require 'domainlink.php'; echo "Images/userdp/".$_SESSION["dpname"]; ?>">
                <img src="<?php require 'domainlink.php'; echo "Images/userdp/".$_SESSION["dpname"]; ?>" class="w-full rounded-lg">
            </a>
        </div>
        <div class="username text-xl font-semibold text-gray-800 mb-4">
            <?php echo $_SESSION['fname'].' '.$_SESSION['lname']; ?>
        </div>
        <a class="block text-center bg-blue-500 text-white py-2 rounded mb-2 hover:bg-blue-600" href="<?php require 'domainlink.php'; ?>Login/accountInfoUpd.php">Account Info</a>
        <a class="block text-center bg-red-500 text-white py-2 rounded hover:bg-red-600" href="<?php require 'domainlink.php'; ?>logoutphp.php">Logout</a>
    </div>
</div>

<div id="overlay2" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-4 rounded shadow-lg relative">
        <span class="absolute top-2 right-2 text-gray-500 text-2xl cursor-pointer" onclick="this.parentElement.parentElement.style.display='none';">&times;</span>
        <div class="userdp mb-4">
            <a href="<?php require 'domainlink.php'; ?>Images/logo.jpg">
                <img src="<?php require 'domainlink.php'; ?>Images/logo.jpg" class="w-full rounded-lg">
            </a>
        </div>
        <div class="username text-xl font-semibold text-gray-600 mb-4">EduCareCottage</div>
        <a class="block text-center bg-blue-500 text-white py-2 rounded hover:bg-blue-600" href="<?php require 'domainlink.php'; ?>login.php">Login</a>
    </div>
</div>

<!-- Header -->
<a href="#fortop">
    <div id="top" class="fixed top-0 right-0 m-4 p-2 bg-gray-800 text-white rounded-lg cursor-pointer">Top&uarr;</div>
</a>

<h1 id="fortop">
    <a href="<?php require 'domainlink.php'; ?>index.php" id="head1">
        <img src="<?php require 'domainlink.php'; ?>Images/ecchome.jpg" class="w-full">
    </a>
    <a href="<?php require 'domainlink.php'; ?>index.php" id="head2">
        <img src="<?php require 'domainlink.php'; ?>Images/ecchomemobile.jpg" class="w-full">
    </a>
</h1>

<!-- Search Section -->
<script>
    function active() {
        var sb = document.getElementById("searchbox");
        if (sb.value == "Search here......") {
            sb.value = "";
            sb.placeholder = "Search here......";
        }
    }

    function inactive() {
        var sb = document.getElementById("searchbox");
        if (sb.value == "") {
            sb.placeholder = "";
            sb.value = "Search here......";
        }
    }
</script>

<!-- Language and Login/Logout -->
<div class="flex justify-between items-center p-4 bg-gray-100">
    <span id="lang" class="cursor-pointer text-blue-500 hover:underline" onclick="getElementById('googletrans').style.display='block'; this.style.display='none';">Language</span>
    <div id="googletrans" class="hidden">
        <span id="langcross" class="cursor-pointer text-gray-500" onclick="getElementById('lang').style.display='block'; this.parentElement.style.display='none';">&times;</span>
    </div>
    <div>
        <span id="spanlogin" class="cursor-pointer text-blue-500 hover:underline" onclick="getElementById('overlay2').style.display='block';">Login</span>
        <span id="spanlogout" class="cursor-pointer text-red-500 hover:underline hidden" onclick="getElementById('overlay').style.display='block';">Logout</span>
    </div>
</div>

<!-- Search Form -->
<form id="search" method="GET" action="<?php require 'domainlink.php'; ?>search.php" class="flex items-center p-4 bg-white shadow-md">
    <input id="searchbox" name="q" type="text" class="border border-gray-300 rounded p-2 w-full" value="Search here......" onmouseover="active();" onmouseout="inactive();">
    <button name="click2srch" class="bg-blue-500 text-white p-2 rounded ml-2" type="submit">Search</button>
</form>

<hr class="my-4">

<!-- PHP for session login/logout display -->
<?php
if (!isset($_SESSION['fname'])) {
    echo '<script>document.getElementById("spanlogout").style.display = "none";</script>';
    echo '<script>document.getElementById("spanlogin").style.display = "inline";</script>';
} else {
    echo '<script>document.getElementById("spanlogout").style.display = "inline";</script>';
    echo '<script>document.getElementById("spanlogin").style.display = "none";</script>';
}
?>

<!-- Menu -->
<div id="menu" class="bg-gray-800 text-white p-4">
    <ul id="nav1" class="flex flex-wrap justify-around">
        <a href="<?php require 'domainlink.php'; ?>index.php"><li id="open1" class="py-2 px-4 hover:bg-gray-700">Home</li></a>
        <?php 
        if (!isset($_SESSION["fname"])) {
            echo '<a href="';
            require 'domainlink.php';
            echo 'Login/createAccount.php"><li id="open2" class="py-2 px-4 hover:bg-gray-700">SignUp</li></a>';
        }
        ?>
        <a href="<?php require 'domainlink.php'; ?>contactUs.php"><li id="open3" class="py-2 px-4 hover:bg-gray-700">Contact Us</li></a>
        <form method="POST" action="<?php require 'domainlink.php'; ?>Indexes/phasesIndex.php">
            <button name="code" type="submit" class="w-full"><li class="py-2 px-4 hover:bg-gray-700">Indexes</li></button>
        </form>
        <a href="<?php require 'domainlink.php'; ?>aboutUs.php"><li id="open7" class="py-2 px-4 hover:bg-gray-700">About Us</li></a>
        <a href="<?php require 'domainlink.php'; ?>help.php"><li id="open8" class="py-2 px-4 hover:bg-gray-700">Help</li></a>
    </ul>

    <div id="down" class="cursor-pointer text-center py-2 mt-4 bg-gray-700 hover:bg-gray-600" onclick="down()"> &darr; </div>

    <ul id="nav2" class="mt-4 text-center">
        <b id="uc" class="text-lg">Upcoming Courses</b>
        <br><br>
        <li>English Lang.</li>
        <li>Hindi Lang.</li>
        <li>Drawing</li>
        <li>Craft</li>
        <li>Social Science</li>
    </ul>

    <div id="up" class="cursor-pointer text-center py-2 mt-4 bg-gray-700 hover:bg-gray-600" onclick="up()"> &darr; </div>
</div>

<script src="<?php require 'domainlink.php'; ?>JS/masterPageJS.js"></script>

<!-- Main Content -->
<div id="maincontent" class="p-6 bg-gray-100">

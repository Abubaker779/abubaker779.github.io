<!-- <?php
session_start();
require 'sslinks.php';

if (isset($_POST['smrcmnt'])) {
    $smrcmnt = $_POST['smrcmnt'];
}
if (isset($_POST['gotoprvspg'])) {
    $gotoprvspg = $_POST['gotoprvspg'];
}
if (isset($_POST['cmntliked'])) {
    $cmntliked = $_POST['cmntliked'];
}
if (isset($_POST['cmntdisliked'])) {
    $cmntdisliked = $_POST['cmntdisliked'];
}
$con = mysqli_connect('localhost','qvlukzwm','engineer009','qvlukzwm_eccuserdb');
$eccuserdb = mysqli_select_db($con, 'qvlukzwm_eccuserdb');
$domainaddress = "https://www.educarecottage.in";

// Comment Like/Dislike Logic is the same as before...

?> -->

<div id="comment" class="bg-white p-6 rounded-lg shadow-md mb-6">
    <form action="" method="POST">
        <table class="w-full">
            <tr>
                <td class="font-bold underline"> Comment: </td>
                <td>
                    <textarea rows="4" cols="20" name="comment" placeholder="Comment here..." class="border border-gray-300 rounded-lg w-full p-2 focus:outline-none focus:border-blue-500"></textarea><br>
                    <button name="cmntbtn" id="cmntbtn" class="mt-3 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out" type="submit" onclick="this.setAttribute('value','comment');">Submit</button>
                </td>
            </tr>
        </table>
    </form>
</div>

<hr class="my-4">

<div id="allcomments">
    <?php
    $cmntshowquery = mysqli_query($con, "SELECT * FROM comment WHERE pagelink='$pagelink' AND pageucode='$pageucode'") or die("Comment Show query FAILED.");
    $cmntrows = mysqli_num_rows($cmntshowquery);

    $j = 0;
    while ($cmnts[$j] = mysqli_fetch_array($cmntshowquery)) {
        // Comment time formatting logic remains the same
        $j++;
    }

    $loop = 20;

    if (isset($smrcmnt) && $smrcmnt == 1000) {
        echo '<script>document.getElementById("maincontent").style.display="none";</script>';
        $loop = ($cmntrows > 999) ? 1000 : $cmntrows;
    } else if (isset($smrcmnt) && $smrcmnt == 100) {
        echo '<script>document.getElementById("maincontent").style.display="none";</script>';
        $loop = ($cmntrows > 100) ? 100 : $cmntrows;
    } else {
        $loop = ($cmntrows > 20) ? 20 : $cmntrows;
    }

    $i = $j;
    $SESSIONID = isset($_SESSION['id']) ? $_SESSION['id'] : "";
    $SESSIONDP = isset($_SESSION['dpname']) ? $_SESSION['dpname'] : "";

    while ($loop > 0) {
        $i--;

        $commentClass = ($cmnts[$i]['userinfoid'] == $SESSIONID) ? "bg-gray-100" : "bg-white";
        echo '<div class="p-4 mb-4 rounded-lg shadow '.$commentClass.'">
                <div class="flex items-center mb-2">
                    <img class="w-10 h-10 rounded-full" src="'.$domainlink.'Images/userdp/'.$cmnts[$i]["dpname"].'" alt="User DP">
                    <span class="ml-3 text-lg font-bold">'.$cmnts[$i]["name"].'</span>
                </div>
                <div class="flex items-center space-x-2">
                    <form method="POST" action="" class="flex items-center">
                        <button class="focus:outline-none" type="submit" name="cmntliked" onclick="this.setAttribute(\'value\',\''.$cmnts[$i]['commentid'].','.$SESSIONID.','.$cmnts[$i]['cmntlike'].'\');">
                            <img src="'.$domainlink.'Images/Icons/like.png" class="w-6 h-6 hover:opacity-75 transition-opacity duration-150">
                        </button>
                    </form>
                    <span class="text-sm text-gray-600">'.$cmnts[$i]["cmntlike"].'</span>
                    <form method="POST" action="" class="flex items-center">
                        <button class="focus:outline-none" type="submit" name="cmntdisliked" onclick="this.setAttribute(\'value\',\''.$cmnts[$i]['commentid'].','.$SESSIONID.','.$cmnts[$i]['cmntdislike'].'\');">
                            <img src="'.$domainlink.'Images/Icons/dislike.png" class="w-6 h-6 hover:opacity-75 transition-opacity duration-150">
                        </button>
                    </form>
                    <span class="text-sm text-gray-600">'.$cmnts[$i]["cmntdislike"].'</span>
                    <span class="ml-auto text-gray-500">'.$cmnts[$i]["cmnttime"].'</span>
                </div>
                <div class="mt-2 text-gray-700">'.$cmnts[$i]["comment"].'</div>
            </div>';

        $loop--;
    }
    ?>

    <hr class="my-4">

    <?php if ($cmntrows > 10 && $smrcmnt != 100) { ?>
        <form method="POST" action="">
            <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out" type="submit" name="smrcmnt" onclick="this.setAttribute('value','100');">See more comments...</button>
        </form>
    <?php } else if (isset($smrcmnt) && $smrcmnt == 100 && $cmntrows > 100) { ?>
        <form method="POST" action="">
            <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out" type="submit" name="smrcmnt" onclick="this.setAttribute('value','1000');">See More comments...</button>
        </form>
    <?php }
    if (isset($smrcmnt) && $smrcmnt > 99) { ?>
        <form method="POST" action="<?php echo $domainaddress.$pagelink; ?>">
            <button class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out" type="submit" name="gotoprvspg" onclick="this.setAttribute('value','gotoprvspg');">Go to Main page...</button>
        </form>
    <?php } ?>
</div>

<script>
    document.getElementById("cmntbtn").style.marginTop = "5px";
</script>

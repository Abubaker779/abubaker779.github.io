<?php

/* $pagelink = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";
$pagelink .= $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
*/

session_start();
$_SESSION['pagelink'] = $_SERVER['REQUEST_URI'];

if (isset($huicode) && $huicode !== "") {
    $pageucode = $huicode;
} else if (isset($hudicode) && $hudicode !== "") {
    $pageucode = $hudicode;
} else if (isset($chucode) && $chucode !== "") {
    $pageucode = $chucode;
} else {
    $pageucode = "";
}
$_SESSION['pageucode'] = $pageucode;

?>

<!-- COMMENT SECTION -->
<div id="footer" class="bg-gray-100 p-8 mt-8">
    <iframe class="w-full rounded-lg shadow-md mb-4" id="cmntftr" src="<?php require 'domainlink.php'; ?>cmntftr.php" frameborder="0" scrolling="no" onload="resizeIframe(this)"></iframe>
    <script>
        function resizeIframe(obj) {
            obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 'px';
        }
    </script>

    <!-- Online Counter -->
    <div class="text-center">
        <script type="text/javascript" src="//widget.supercounters.com/ssl/online_i.js"></script>
        <script type="text/javascript">sc_online_i(1698664,"ffffff","e61c1c");</script>
        <br>
        <noscript>
            <a href="https://www.supercounters.com/">free online counter</a>
        </noscript>
    </div>
</div>

<!-- FOOTER SECTION -->
<div id="footer" class="bg-gray-800 text-white py-10 mt-10">
    <table id="classtable" class="w-full text-center text-lg border-collapse border border-gray-600">
        <tr class="border border-gray-600">
            <td><a href="<?php require 'domainlink.php'; ?>Indexes/phasesIndex.php" class="hover:text-blue-400">Class 1</a></td>
            <td><a href="<?php require 'domainlink.php'; ?>Indexes/phasesIndex.php" class="hover:text-blue-400">Class 2</a></td>
        </tr>
        <tr class="border border-gray-600">
            <td><a href="<?php require 'domainlink.php'; ?>Indexes/phasesIndex.php" class="hover:text-blue-400">Class 3</a></td>
            <td><a href="<?php require 'domainlink.php'; ?>Indexes/phasesIndex.php" class="hover:text-blue-400">Class 4</a></td>
        </tr>
        <tr class="border border-gray-600">
            <td><a href="<?php require 'domainlink.php'; ?>Indexes/phasesIndex.php" class="hover:text-blue-400">Class 5</a></td>
            <td><a href="<?php require 'domainlink.php'; ?>Indexes/phasesIndex.php" class="hover:text-blue-400">Class 6</a></td>
        </tr>
        <tr class="border border-gray-600">
            <td><a href="<?php require 'domainlink.php'; ?>Indexes/phasesIndex.php" class="hover:text-blue-400">Class 7</a></td>
            <td><a href="<?php require 'domainlink.php'; ?>Indexes/phasesIndex.php" class="hover:text-blue-400">Class 8</a></td>
        </tr>
        <tr class="border border-gray-600">
            <td><a href="<?php require 'domainlink.php'; ?>Indexes/phasesIndex.php" class="hover:text-blue-400">Class 9</a></td>
            <td><a href="<?php require 'domainlink.php'; ?>Indexes/phasesIndex.php" class="hover:text-blue-400">Class 10</a></td>
        </tr>
        <tr class="border border-gray-600">
            <td><a href="<?php require 'domainlink.php'; ?>Indexes/phasesIndex.php" class="hover:text-blue-400">Class 11</a></td>
            <td><a href="<?php require 'domainlink.php'; ?>Indexes/phasesIndex.php" class="hover:text-blue-400">Class 12</a></td>
        </tr>
    </table>

    <!-- Join Us Section -->
    <h3 class="text-2xl mt-6 text-center">Join Us:</h3>
    <div id="icons" class="flex justify-center space-x-4 mt-4">
        <a href="https://m.facebook.com/pages/category/Education-Website/Educare-Cottage-103635971588485/">
            <img src="<?php require 'domainlink.php'; ?>Images/Icons/facebook.png" class="w-8 h-8">
        </a>
        <a href="https://m.youtube.com/channel/UC5nGUNbIyd9gn79yYxnIreA">
            <img src="<?php require 'domainlink.php'; ?>Images/Icons/youtube.png" class="w-8 h-8">
        </a>
    </div>

    <div class="text-center mt-6">
        <span id="copyright">&copy; 2020 </span>
        <span id="reserved">&reg; ECC Community</span>
    </div>
</div>

<!-- SCRIPTS SECTION -->
<script>
    function googleTranslateInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en'
        }, 'googletrans');
    }
</script>
<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateInit"></script>

<?php
if (!isset($_SESSION['fname'])) {
    echo '<script>document.getElementsByTagName("video").style.display = "none";</script>';
} else {
    echo '<script>document.getElementsByTagName("video").style.display = "block";</script>';
}
?>

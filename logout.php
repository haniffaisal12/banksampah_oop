<?php
session_start();
Session_destroy();
echo "<script>alert('Anda Telah Logout Dari Aplikasi!')</script>";
echo "<meta http-equiv='refresh' content='1; url=login.php'>";

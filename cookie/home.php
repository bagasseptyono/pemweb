<?php

if ($_COOKIE) {
    echo "anda sudah login dengan ".$_COOKIE['nama'];
}
else {
    echo "Belum login";
}
?>
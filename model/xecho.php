<?php

    function xssafe($data, $encoding = 'UTF-8') {
        return htmlspecialchars($data, ENT_QUOTES | ENT_HTML401, $encoding);
    }
    function xecho($data) {
        echo xssafe($data);
    }
?>
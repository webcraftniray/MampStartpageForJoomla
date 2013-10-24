<!DOCTYPE HTML>
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

        <link rel="stylesheet" href="isotope.css" />
        <script src="jquery.isotope.min.js"></script>
        <script src="uikit.min.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>MAMP Sites</title>
        <style type="text/css">
            .title {
                font-size:18px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <h1>Localhost Joomla sites</h1>
        <button class="uk-button" data-uk-modal="{target:'#modal'}">Credits</button>
        <div id="modal" class="uk-modal">
            <div class="uk-modal-dialog">
                <a class="uk-modal-close uk-close" href=""></a>
                <h3>By Ray Lawlor @ <a href="http://www.zoomodsplus.com" target="_blank"> ZooModsPlus.com</a></h3>
                <p>This addon uses:</p>
                <p>The wonderful <a href="http://www.getuikit.com/" target="_blank">UIKit</a> by <a href="http://www.yootheme.com/" target="_blank">YooTheme.</a></p>
                <p>The <a href="http://isotope.metafizzy.co/index.html" target="_blank">Isotope</a> filtering JQuery addon.</p>
                <p>Many, many thanks to these wonderful developers!</p>
            </div>
        </div>



        <section id="options" >

            <div class="uk-text-center uk-margin-bottom" data-uk-button-radio="">

                <ul id="filters" class="option-set clearfix uk-button-group" data-option-key="filter">
                    <li><a href="#filter" data-option-value="*" class="uk-button uk-active">show all</a></li>
                    <?php
                    foreach (range('a', 'z') as $char) {
                        echo '<li><a data-option-value=".' . $char . '" class="uk-button" href="#filter">' . $char . '</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </section>
        <br />
        <div id="container" class="uk-grid">

            <?php
            $dir = getcwd();
            if ($handle = opendir($dir)) {
                while (false !== ($entry = readdir($handle))) {
                    if ($entry == is_dir($entry)) {
                        if ($entry !== '..') {
                            if ($entry !== '.') {
                                ?>
                                <div class="uk-width-1-4  element <?php echo strtolower(substr($entry, 0, 1)); ?>">
                                    <div class="uk-panel uk-panel-box"><strong class="title"><?php echo $entry; ?></strong>
                                        <a href="<?php echo $entry; ?>"><i class="uk-icon-picture  uk-icon-medium"></i></a>
                                        <a href="<?php echo $entry; ?>/administrator">  |   <i class="uk-icon-edit uk-icon-medium"></i></a>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    }
                }
                closedir($handle);
            }
            ?>
        </div>
        <script src="jquery-1.10.2.min.js"></script>
        <script src="uikit.min.js"></script>
        <script src="jquery.isotope.min.js"></script>
        <script>
            $(function(){
      
                var $container = $('#container');

                $container.isotope({
                    itemSelector : '.element'
                });
      
      
                var $optionSets = $('#options .option-set'),
                $optionLinks = $optionSets.find('a');

                $optionLinks.click(function(){
                    var $this = $(this);
                    // don't proceed if already selected
                    if ( $this.hasClass('selected') ) {
                        return false;
                    }
                    var $optionSet = $this.parents('.option-set');
                    $optionSet.find('.uk-active').removeClass('uk-active');
                    $this.addClass('uk-active');
  
                    // make option object dynamically, i.e. { filter: '.my-filter-class' }
                    var options = {},
                    key = $optionSet.attr('data-option-key'),
                    value = $this.attr('data-option-value');
                    // parse 'false' as false boolean
                    value = value === 'false' ? false : value;
                    options[ key ] = value;
                    if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
                        // changes in layout modes need extra logic
                        changeLayoutMode( $this, options )
                    } else {
                        // otherwise, apply new options
                        $container.isotope( options );
                    }
        
                    return false;
                });

      
            });
        </script>
    </body>
</html>

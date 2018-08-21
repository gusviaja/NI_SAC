<?php

function checkDir($Dir){
            if (file_exists($Dir) && is_dir($Dir)):
                return true;
            
            else:
                return false;
            endif;
        }

        
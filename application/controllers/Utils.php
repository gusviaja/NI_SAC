<?php

class Utils extends CI_Controller
{

        public function exec()
        {
                $this->load->library('migration');
                // echo 'vou migrar';die();

                if ($this->migration->current() === FALSE)
                {
                        show_error($this->migration->error_string());
                }
        }

}
<?php 
        $link = $this->uri->segment(3);
        if ($link=="print-item") {
        $this->load->view("pages/print-item");
    }
?>
<?php

    echo anchor(base_url().'admin', 'Admin Page');
    echo "</br>";
    echo anchor(base_url().'admin/projects/listing', 'List Project');
    echo (' | ');
    echo anchor(base_url().'admin/projects/add', 'Add Project');
    echo "</br>";
    echo anchor(base_url().'admin/logout', 'Log out');
    echo "</br>";
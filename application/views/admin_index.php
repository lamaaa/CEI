<div class="navigation">
    <?php
    // nav bar
    echo anchor(base_url().'admin', 'Admin Page');
    echo "</br>";
    echo anchor(base_url().'admin/projects', 'Project Management');
    echo " | ";
    echo anchor(base_url().'admin/articles', 'Article Management');
    echo " | ";
    echo anchor(base_url().'admin/files', 'File Management');
    echo "</br>";
    echo anchor(base_url().'admin/logout', 'Log out');
    echo "</br>";
    ?>
</div>
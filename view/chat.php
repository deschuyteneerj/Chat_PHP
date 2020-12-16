<?php ob_start(); ?>
    <div id="page">

        <section class="content">
            <!-- On affiche chaque entrée une à une -->
            <?php foreach ($chat as $key=>$msg){ ?>

                <div class="content__item" id="<?= $msg['id'] ?>">
                    <h3><?= $users[$key]['username']; ?></h3>
                    <p><?= $msg['message']; ?></p>
                </div>

            <?php } ?>
        </section>
    </div>
    
<?php
$content = ob_get_clean();
require('template.php'); ?>
<section class="perfil-info">
    <div style="max-width: 1280px;" class="container">
        <div class="w30">
            <h2>Bem-vindo <?php echo $_SESSION['nome_membro'] ?></h2>
            <div class="container-img">
                <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $_SESSION['img_membro']; ?>" alt="">
            </div><!--container-img-->
            <div class="lista-amigos">
                <?php
                    $amigos = \models\membrosModel::listarAmigos();
                ?>
                <h3><i class="fa fa-users"></i> Minhas amizades(<?php echo count($amigos); ?>)</h3>
                <?php 
                    foreach ($amigos as $key => $value) {
                    $membro = \models\membrosModel::getMembroById($value);
                ?>
                <div class="img-single-amigo">
                    <div style="background-image:url('<?php echo INCLUDE_PATH_PAINEL.'uploads/'.$membro['imagem']; ?>');" class="img-single-amigo-wraper"></div>
                </div><!--img-single-amigo-->
                <?php } ?>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</section>

<section class="feed">
    <div style="max-width: 1280px;" class="container">
        <div class="w70">
            <h2 class="title">O que está pensando hoje?</h2>
            <form method="post" action="">
                <textarea name="mensagem" placeholder="Sua Mensagem..."></textarea>
                <input type="submit" name="feed_post" value="Enviar!">
            </form>
            <!--feed-->
            <br>
            <?php
                $postsFeed = \MySql::conectar()->prepare("SELECT * FROM `tb_site.feed` ORDER BY id DESC");
                $postsFeed->execute();
                $postsFeed = $postsFeed->fetchAll();
                foreach ($postsFeed as $key => $value) {
                    $membro = \models\membrosModel::getMembroById($value['membro_id']);
            ?>
            <div class="post-single-user">
                <div class="img-user-post">
                    <img src="<?php echo INCLUDE_PATH_PAINEL.'uploads/' ?><?php echo $membro['imagem']; ?>" alt="">
                </div>
                <div class="post-user-single">
                    <p><?php echo $membro['nome']; ?></p>
                    <p><?php echo $value['post']; ?></p>
                </div><!--post-user-single-->
                <div class="clear"></div>
            </div>
            <?php } ?>
        </div>
    </div><!--container-->
</section>

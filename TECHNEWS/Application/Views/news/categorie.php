<div class="row">
    <!--colleft-->
    <div class="col-md-8 col-sm-12">

        <?php if(!empty($articles)) : ?>

            <div class="box-caption">

                <span><?= $this->getAction() ?></span>
            </div>
            <!--list-news-cate-->

        <?php foreach ($articles as $categories):?>
            <div class="list-news-cate">
                <article class="news-cate-item">
                    <div class="row">
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <a href="#">
                                <img alt="" src="<?= $categories->getFULLIMAGEARTICLE()?>">
                            </a>
                        </div>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <h3><a href="#"><?= $categories->getTITREARTICLE()?></a></h3>
                            <div class="meta-post">
                                <a href="#">
                                    <?= $categories->getAUTEUROBJ()->getNOMCOMPLETAUTEUR();?>
                                </a>
                                <em></em>
                                <span>
                                        <time datetime="<?= $categories->getDATECREATIONARTICLE() ?>"></time>
                                    </span>
                            </div>
                           <?= $categories->getACCROCHEARTICLE() ?>
                        </div>
                    </div>
                </article>
            </div>
        <?php endforeach;?>

    <?php else : ?>
            <div class="alert alert-danger">
                <strong>Aucune publication pour le moment</strong>
            </div>
        <?php endif; ?>




        <!--<div class="paging">
            <a href="#">Prev</a>
            <a href="#" class="current">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">Next</a>
        </div> -->
    </div>

    <?php include PATH_SIDEBAR;?>
</div>

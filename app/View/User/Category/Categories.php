<@Page>
<link href="<?= STYLE?>Category.css" rel="stylesheet" />
<main>
    <div class="con-heading-one">
        <h1>Categories</h1>
    </div>
    <div class="main-container">
        <?php
            $Cat=new \app\Model\Categories\Category();
            $Cat->GetCategoriesForHome();
        ?>
    </div>
</main>
<@Page>
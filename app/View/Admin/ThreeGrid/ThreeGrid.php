<@Page>
<div class="admin-category-page">
    <div class="container">
        <div class="add">
            <h1>ThreeGrid List</h1>
            <button class="btn btn-outline-primary open-popup">Upload ThreeGrid</button>
        </div>
    </div>
    <div class="form-container">
        <form id="submit"  class="addForm" action="<?=HTTP_HOST?>admin/ThreeGrid" method="post">
            <input id="endpoint" type="hidden" value="0">
            <input id="id" name="id" class="j_Field" type="hidden" value="0">
            <div class="row close-popup" >
                <h3>Upload ThreeGrid</h3>
                <div class="close">×</div>
            </div>
            <div class="row mt-2" >
                <input id="name" required name="Name" class="j_Field form-field" type="text" placeholder="Enter ThreeGrid name">
            </div>
            <div class="row mt-2">
                <select id="Pro_id_1" required name="Pro_id_1" class="j_Field form-field mr-1" >
                    <option value="">Select Pro 1</option>
                    <?php
                    $CatModel=new \app\Model\Products\Product();
                    $CatModel->get();
                    while ($CatModel->next()){
                        ?>
                        <option value="<?=$CatModel->id?>"><?=$CatModel->Name?></option>
                        <?php
                    }
                    ?>
                </select>
                <select id="Pro_id_2" required name="Pro_id_2" class="j_Field form-field " >
                    <option value="">Select Pro 2</option>
                    <?php
                    $CatModel=new \app\Model\Products\Product();
                    $CatModel->get();
                    while ($CatModel->next()){
                        ?>
                        <option value="<?=$CatModel->id?>"><?=$CatModel->Name?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="row mt-2">
                <select id="Pro_id_3" required name="Pro_id_3" class="j_Field form-field mr-1" >
                    <option value="">Select Pro 3</option>
                    <?php
                    $CatModel=new \app\Model\Products\Product();
                    $CatModel->get();
                    while ($CatModel->next()){
                        ?>
                        <option value="<?=$CatModel->id?>"><?=$CatModel->Name?></option>
                        <?php
                    }
                    ?>
                </select>
                <select id="Catid" required name="Catid" class="j_Field form-field " >
                    <option value="">Select Category</option>
                    <?php
                    $CatModel=new \app\Model\Categories\Category();
                    $CatModel->get();
                    while ($CatModel->next()){
                        ?>
                        <option value="<?=$CatModel->id?>"><?=$CatModel->Name?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="row mt-2" >
                <textarea id="description" required name="Description" class="j_Field form-field" placeholder="Enter Category Description">

                </textarea>
            </div>
            <div class="row mt-2">
                <input class="btn btn-outline-primary mr-5" type="submit" value="Submit">
                <input class="btn btn-outline-danger " type="reset" value="Reset">
            </div>
        </form>
    </div>
    <section class="container table-con mt-3 mb-3">

        <div class="table-header">Categories</div>
        <div  class="table">
            <div class="thead">
                <div class="tr">
                    <div>Id</div>
                    <div>Name</div>
                    <div>Product 1</div>
                    <div>Product 2</div>
                    <div>Product 3</div>
                    <div>Description</div>
                    <div>Category</div>
                    <div>Update | Delete</div>
                </div>
            </div>
            <div dataurl="<?=HTTP_HOST?>admin/ThreeGrid" id="data-shower" onscroll="getdataBulkOnScroll(this)" class="tbody">

            </div>

        </div>
    </section>
</div>
<script defer src="<?=SCRIPT?>Category.js"></script>
<@Page>
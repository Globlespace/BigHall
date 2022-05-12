<@Page>
<div class="admin-category-page">
    <div class="container">
        <div class="add">
            <h1>Products List</h1>
            <button class="btn btn-outline-primary open-popup">Add Product</button>
        </div>
    </div>
    <div class="form-container">
        <form id="submit" class="addForm" action="<?=HTTP_HOST?>admin/Products" method="post">
            <input id="endpoint" type="hidden" value="0">
            <input id="id" name="id" class="j_Field" type="hidden" value="0">
            <div class="row close-popup" >
                <h3>Add Product</h3>
                <div class="close">×</div>
            </div>
            <div class="row mt-2" >
                <input id="name" required name="Product" class="j_Field form-field mr-1" type="text" placeholder="Enter Product Name">
                <input id="uri" required name="Uri"  class="j_Field form-field" type="text" readonly="readonly" placeholder="Product Uri">
            </div>
            <div class="row mt-2" >
                <input id="tags" required name="Tags" class="j_Field form-field mr-1" type="text" placeholder="Enter Product Tags">
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
            <div class="row " >
                <div class="tip">
                    Separate Tags With comma (,)
                </div>
            </div>
            <div class="row mt-2" >
                <textarea id="description" required name="Description" class="j_Field form-field" placeholder="Enter Product Description"></textarea>
            </div>
            <div class="row mt-2" >
                <textarea id="detail" required name="Details" class="j_Field form-field" placeholder="Enter Product Details"></textarea>
            </div>

            <div class="row mt-2">
                <input class="btn btn-outline-primary mr-5" type="submit" value="Submit">
                <input class="btn btn-outline-danger " type="reset" value="Reset">
            </div>

        </form>
    </div>
    <section class="container table-con mt-3 mb-3">
        <div class="warning mt-1 mb-1">
            <i class="fa fa-warning"></i>
            Warning! If You Delete Any Product All Product Types And Product Images Will Be Deleted Under That Product!
        </div>
        <div class="table-header">Products</div>
        <div  class="table">
            <div class="thead">
                <div class="tr">
                    <div>Id</div>
                    <div>Name</div>
                    <div>Slug</div>
                    <div>Description</div>
                    <div>Detail</div>
                    <div>Category</div>
                    <div>Tags</div>
                    <div>Update | Delete</div>
                </div>
            </div>
            <div dataurl="<?=HTTP_HOST?>admin/Products" id="data-shower" onscroll="getdataBulkOnScroll(this)" class="tbody">

            </div>

        </div>
    </section>
</div>
<@Page>
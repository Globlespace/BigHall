<@Page>
    <div class="admin-category-page">
        <div class="container">
            <div class="add">
                <h1>Categories List</h1>
                <button class="btn btn-outline-primary open-popup">Add Category</button>
            </div>
        </div>
        <div class="form-container">
            <form id="submit"  class="addForm" action="<?=HTTP_HOST?>admin/Categories" method="post">
                <input id="endpoint" type="hidden" value="0">
                <input id="id" name="id" class="j_Field" type="hidden" value="0">
                <div class="row close-popup" >
                    <h3>Add Categories</h3>
                    <div class="close">×</div>
                </div>
                <div class="row mt-2" >
                    <input id="name" required name="Category" class="j_Field form-field mr-1" type="text" placeholder="Enter Category name">
                    <input id="uri" required name="Uri"  class="j_Field form-field" type="text" readonly="readonly" placeholder="Category Uri">
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
            <div class="warning mt-1 mb-1">
                <i class="fa fa-warning"></i>
                Warning! If You Delete Any Category  All Products, Product Types And Product Images Will Be Deleted Under That Category!
            </div>
            <div class="table-header">Categories</div>
            <div  class="table">
                <div class="thead">
                    <div class="tr">
                        <div>Id</div>
                        <div>Name</div>
                        <div>Slug</div>
                        <div>Description</div>
                        <div>Update | Delete</div>
                    </div>
                </div>
                <div dataurl="<?=HTTP_HOST?>admin/Categories" id="data-shower" onscroll="getdataBulkOnScroll(this)" class="tbody">

                </div>

            </div>
        </section>
    </div>
<script defer src="<?=SCRIPT?>Category.js"></script>
<@Page>
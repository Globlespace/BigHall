<@Page>
<div class="admin-category-page">
    <div class="container">
        <div class="add">
            <h1>ProductTypes List</h1>
            <button class="btn btn-outline-primary open-popup">Add ProductType</button>
        </div>
    </div>
    <div class="form-container">
        <form id="submit" onsubmit="return SubmitData(this);" class="addForm" action="<?=HTTP_HOST?>admin/ProductTypes" method="post">
            <input id="endpoint" type="hidden" value="0">
            <div class="row close-popup" >
                <h3>Add ProductType</h3>
                <div class="close">×</div>
            </div>
            <div class="row mt-2" >
                <input id="ProductType" required name="ProductType" class="j_Field form-field" type="text" placeholder="Enter ProductType name">
            </div>
            <div class="row mt-2" >
                <input id="price" required name="Price"  class="j_Field form-field" type="text"  placeholder="Enter ProductType Price">
            </div>
            <div class="row mt-2" >
                <input id="Offer" required name="Offer" class="j_Field form-field" type="text" placeholder="Enter ProductType Offer">
            </div>
            <div class="row mt-2" >
                <input id="Qty" required name="Qty"  class="j_Field form-field" min="0" type="number" placeholder="ProductType Qty">
            </div>
            <div class="row mt-2">
                <input id="Product" required name="Product"  class="j_Field form-field" type="text" placeholder="Chose Product">
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
            Warning! If You Delete Any Category  All Sub Categories, Products And Product Images Will Be Deleted Under That Category
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
            <div dataurl="<?=HTTP_HOST?>admin/ProductTypes" id="data-shower" onscroll="getdataBulkOnScroll(this)" class="tbody">

            </div>

        </div>
    </section>

</div>
<@Page>
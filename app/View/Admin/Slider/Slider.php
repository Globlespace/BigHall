<@Page>
<div class="admin-category-page">
    <div class="container">
        <div class="add">
            <h1>Slider List</h1>
            <button class="btn btn-outline-primary open-popup">Upload Slider</button>
        </div>
    </div>
    <div class="form-container">
        <form id="ProImageSubmit" onsubmit="return SubmitDataWithFile(this);" class="addForm2" action="<?=HTTP_HOST?>admin/Slider" method="post">
            <input id="endpoint" type="hidden" value="0">
            <input id="id" name="id" class="j_Field" type="hidden" value="0">
            <div class="row close-popup" >
                <h3>Upload Slider</h3>
                <div class="close">×</div>
            </div>
            <div class="row mt-2">
                <div class="Image-picker">
                    <img id="image_prv" src="<?= IMAGES?>img-1.JPG">
                    <input id="Image" required name="Image" class="" type="file" >
                </div>
               <div>
                   <input id="Name" required name="Name" placeholder="Name" class="j_Field form-field " type="text" >

                   <select id="ProId" required  name="ProId" class="j_Field form-field mt-2" >
                       <option value="">Select Product</option>
                       <?php
                       $ProTypeModel=new \app\Model\Products\Product();
                       $ProTypeModel->get();
                       while ($ProTypeModel->next()){
                           ?>
                           <option value="<?=$ProTypeModel->id?>"><?=$ProTypeModel->Name?></option>
                           <?php
                       }
                       ?>
                   </select>
               </div>
            </div>
            <div class="row mt-2">
                <input class="btn btn-outline-primary mr-5" type="submit" value="Upload">
                <input class="btn btn-outline-danger " type="reset" value="Reset">
            </div>

        </form>
    </div>
    <section class="container table-con mt-3 mb-3">

        <div class="table-header">Slider Images</div>
        <div  class="table">
            <div class="thead">
                <div class="tr">
                    <div>Id</div>
                    <div>Image</div>
                    <div>Name</div>
                    <div>Product</div>
                    <div>Update | Delete</div>
                </div>
            </div>
            <div dataurl="<?=HTTP_HOST?>admin/Slider" id="data-shower" onscroll="getdataBulkOnScroll(this)" class="tbody">

            </div>

        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="<?=SCRIPT?>ProImages.js"></script>

</div>
<@Page>
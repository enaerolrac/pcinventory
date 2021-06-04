<?php
defined("BASEPATH") or exit ("No direct scripts allowed");?>

<nav class="submit">    
            <div>
            <a href="<?php echo site_url("user/logout"); ?>" class="btn btn-secondary" id="logoutBtn">Logout</a>
            <a href="<?php echo site_url("user/addprod"); ?>" class="btn btn-primary" id="addprodBtn" data-target="#Modal_Add" data-toggle="modal"><i class="fa fa-plus"></i>ADD</a>
            </div>
</nav>
<div>
<div class="container-fluid">   
        <div class="col-lg-12 mx-auto">
            <table class="content-table" id="mydata" >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Product Brand</th>
                        <th>Qty on hand</th>
                        <th>Price</th>
                        <th style="text-align:;">Actions</th>
                        
                    </tr>
                    </thead>
                            <tbody id="listProducts">
                    </tbody>
              </table>
          </div>
    	</div>
<!-- <label for="searchingProduct"></label>
            <div class="input-group">
                <div class="input-group-append">
                    <i class="fas fa-search"></i>
                </div>
                <input class= "form-control" type="text" placeholder="search a product..." id="searchProduct" style="position: right;">
            </div> -->


<!-- MODAL ADD -->
      <form id="saveProdForm" method="post">
            <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label"></label>
                            <div class="col-md-10">
                              <input type="text" name="id" id="id" class="form-control" placeholder="" readonly hidden>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Product_ID</label>
                            <div class="col-md-10">
                              <input type="text" name="product_id" id="product_id" class="form-control" placeholder="Product ID" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Product Name</label>
                            <div class="col-md-10">
                              <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Product Name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Product Brand</label>
                            <div class="col-md-10">
                              <input type="text" name="product_brand" id="product_brand" class="form-control" placeholder="Product Brand" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Quantity on Hand</label>
                            <div class="col-md-10">
                              <input type="text" name="qtyonhand" id="qtyonhand" class="form-control" placeholder="Quantity on Hand"required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Price</label>
                            <div class="col-md-10">
                              <input type="text" name="price" id="price" class="form-control" placeholder="Price" required>
                            </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="btn_save" class="btn btn-primary" value="Save">Save</button>
                  </div>
                </div>
              </div>
            </div>
        </form>
<!--END MODAL ADD-->

<!--DELETE MODAL-->
       <form >
            <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                       <strong>Are you sure to delete this record?</strong>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="product_id_delete" id="product_id_delete" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
                  </div>
                </div>
              </div>
            </div>
      </form>
<!--DELETE MODAL END-->

<!--EDIT MODAL-->
      <form id="updateProdForm" method="POST">
          <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
              <div class="modal-dialog model-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModelLabel">Edit Product</h5>
                        </button>
                    </div>    
                    <div class="modal-body">                        
                              <div class="form-group row">
                                  <label class="col-md-4 col-form-label">Product Id</label>
                                    <div class="col-md-8">
                                      <input type="text" name="product_id_edit" id="product_id_edit" class="form-control" placeholder="Product Id">
                                    </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-4 col-form-label">Product Name</label>
                                  <div class="col-md-8">
                                    <input type="text" name="product_name_edit" id="product_name_edit" class="form-control" placeholder="Product Name">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-4 col-form-label">Product Brand</label>
                                  <div class="col-md-8">
                                    <input type="text" name="brand_edit" id="brand_edit" class="form-control" placeholder="Brand">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-4 col-form-label">Quantity on hand</label>
                                  <div class="col-md-8">
                                    <input type="text" name="qtyonhand_edit" id="qtyonhand_edit" class="form-control" placeholder="Quantity on hand">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-4 col-form-label">Price</label>
                                  <div class="col-md-8">
                                    <input type="text" name="price_edit" id="price_edit" class="form-control" placeholder="Price">
                                  </div>
                              </div>
                        </div>
                        <div class="modal-footer">
                        <input type="hidden" name="eid" id="eid" class="form-control">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit"  id="btn_update" class="btn btn-primary">Update</button>
                        </div> 
                  </div>
              </div>
          </div>
      </form>



<!--EDIT END-->
   
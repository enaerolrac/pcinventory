$(document).ready(function(){
    show_product(); //call function show all product
     
    // $('#mydata').dataTable();
      
    //function show all product
    //#region 
    function show_product(){
        $.ajax({
            url: 'product-loadprod',
            async: false,
            dataType: 'JSON',
            success: function(data){
                var html = '';
                var i;
                for (i=0; i<data.length; i++){
                    html += 
                    '<tr id"'+data[i].id+'">'+
                        '<td>'+data[i].id+'</td>'+
                        '<td>'+data[i].product_id+'</td>'+
                        '<td>'+data[i].product_name+'</td>'+
                        '<td>'+data[i].product_brand+'</td>'+
                        '<td>'+data[i].qtyonhand+'</td>'+
                        '<td>'+data[i].price+'</td>'+
                        '<td style="text-align:right;">'+
                        '<a href="" class="btn btn-info btn-m editRecord " data-id="'+data[i].id+'" data-pid="'+data[i].product_id+'" data-name="'+data[i].product_name+'" data-brand="'+data[i].product_brand+'" data-qty="'+data[i].qtyonhand+'" data-price="'+data[i].price+'">Edit</a>'+''+
						'<a href="" class="btn btn-danger btn-m deleteRecord" data-id="'+data[i].id+'"><i class="fas fa-trash">Delete</a>'+
						'</td>'+
                    '</tr>' ;
                }
                $('#listProducts').html(html);
            }
    
        });
    }
    //#endregion

    //#region SAVE
            $(document).on("submit", "#saveProdForm", function(event){
                event.preventDefault();

                $.ajax({
                    url:window.site_url.concat("productlist/save"),
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    dataType: "JSON",
                    success: function(res) {
                        if(res.status) {
                            Swal.fire({
                                title:"Success",
                                icon:"success"
                            });
                            $("#saveProdForm").trigger("reset");
                            $("Modal_Add").modal("hide");
                            show_product();
                        } else {
                            Swal.fire({
                                title: "Failed",
                                icon: "failed"
                            });
                        }
                    }
                });
            });
        //#endregion


    //#region DELETE
            //get data for delete record
        $('#listProducts').on('click','.deleteRecord',function(event){
            event.preventDefault();
            var id = $(this).data('id');
             
            $('#Modal_Delete').modal('show');
            $('[name="product_id_delete"]').val(id);
        });
 
         $('#btn_delete').on('click',function(){
            var id = $('#product_id_delete').val();
            $.ajax({
                type : "POST",
                url  : window.site_url.concat('productlist/delete'),
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    Swal.fire({
                        title:"Success",
                        icon:"success"
                    });
                    $('[name="product_id_delete"]').val("");
                    
                    $('#Modal_Delete').modal('hide');
                    show_product();
                }
            });
            return false;
        });
        //#endregion



    //#region EDIT
        $(document).on('click', '.editRecord', function(event){
        event.preventDefault();
            var id = $(this).data('id');
            var product_id = $(this).data('product_id');
            var product_name = $(this).data('product_name');
            var product_brand = $(this).data('product_brand');
            var qtyonhand = $(this).data('qtyonhand');
            var price = $(this).data('price');

            $('#Modal_Edit').modal('show');
            $('[name="eid"]').val(id);
            $('[name="product_id_edit"]').val(product_id);
            $('[name="product_name_edit"]').val(product_name);
            $('[name="brand_edit"]').val(product_brand);
            $('[name="qtyonhand_edit"]').val(qtyonhand);
            $('[name="price_edit"]').val(price);
        });

        $('#btn_update').on('click',function(){       
            var id              = $('#product_id_edit').val();
            var product_id      = $('#product_id_edit').val();
            var product_name    = $('#product_name_edit').val();
            var product_brand   = $('#brand_edit').val();
            var qtyonhand       = $('#qtyonhand_edit').val();
            var price           = $('#price_edit').val();
        
            $.ajax({
                url:window.site_url.concat("productlist/update"),
                type:"POST",
                dataType: "JSON",
                data: {id: id, product_id: product_id, product_name:product_name, product_brand:product_brand, qtyonhand: qtyonhand, price: price},
                success: function(data){
                    $('[name="eid"]').val("");
                    $('[name="product_id_edit"]').val("");
                    $('[name="product_name_edit"]').val("");
                    $('[name="brand_edit"]').val("")
                    $('[name="qtyonhand_edit"]').val("");
                    $('[name="price_edit"]').val("");
                    $('#Modal_Edit').modal("hide");
                    show_product();
                    }
                });
                return false;
            });
        //#endregion
});





























// $('#listProducts').on('click', '.editRecord', function(event){
//     event.preventDefault();
//     var id = $(this).data('id');
//     var product_id = $(this).data('product_id');
//     var product_name = $(this).data('product_name');
//     var product_brand = $(this).data('product_brand');
//     var qtyonhand = $(this).data('qtyonhand');
//     var price = $(this).data('price');

//     $('#Modal_Edit').modal('show');
//     $('[name="eid"]').val(id);
//     $('[name="product_id_edit"]').val(product_id);
//     $('[name="product_name_edit"]').val(product_name);
//     $('[name="brand_edit"]').val(product_brand);
//     $('[name="qtyonhand_edit"]').val(qtyonhand);
//     $('[name="price_edit"]').val(price);

//     $('#btn_update').on('submit', function(){
//         var id = $(this).data('id');
//         var product_id = $(this).data('product_id');
//         var product_name = $(this).data('product_name');
//         var product_brand = $(this).data('product_brand');
//         var qtyonhand = $(this).data('qtyonhand');
//         var price = $(this).data('price');   

//     $.ajax({
//         url:window.site_url.concat("productlist/update"),
//         method: "POST",
//         data: {product_id_edit:id, product_name_edit:product_name,brand_edit:product_brand, qtyonhand_edit: qtyonhand, price_edit: price},
//         contentType: false,
//         processData: false,
//         dataType: "JSON",
//         success: function(res){
//             if(res.status){
//                 Swal.fire({
//                 title:"Success",
//                 icon: "success"
//                 });
//                 $('[name="id"]').val("");
//                 $('[name="product_id_edit"]').val("");
//                 $('[name="product_name_edit"]').val("");
//                 $('[name="brand_edit"]').val("");
//                 $('[name="qtyonhand_edit"]').val("");
//                 $('[name="price_edit"]').val("");
//                 $("#editProdForm").trigger("reset");
//                 $("Modal_Edit").modal("hide");
//                 show_product();
//             }
//         }   
//     });       

// });
// //#endregion
// });
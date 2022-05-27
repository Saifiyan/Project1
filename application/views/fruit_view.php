<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Furit</title>
  </head>
  <body>
    <div class="container">
        <div class="col-m-12">
            <div class="col-md-12" style="margin-top: 50px;">
                <h1>Fruit
                    <small>List</small>
                    <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><span class="fa fa-plus"></span>Add New</a></div>                    
                </h1>
            </div>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Sr No.</th>
                        <th>Fruit Name</th>
                        <th>Fruit Price</th>
                        <th style="text-align: right;">Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
</div>


<!-- Modal -->
<form action="" id="form">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModelLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
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
                        <label class="col-md-2 col-form-label">Fruit Name</label>
                        <div class="col-md-10">
                            <input type="text" name="fruit_name" id="fruit_name" class="form-control" placeholder="first name">
                        </div>
                    </div>
                    <!-- 
                    working with this input[type="text"]    
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Fruit id</label>
                        <div class="col-md-10">
                            <input type="text" name="fruit_id" id="fruit_id" class="form-control" placeholder="first id">
                        </div>
                    </div> -->
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label"> Price</label>
                        <div class="col-md-10">
                            <input type="text" name="price" id="price" class="form-control" placeholder="price">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" type="submit" id="btn_save" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    <script>
        $(document).ready(function () {
            
            // $('#form input[type=text]').each(function(){
            $('.form-control input').each(function(){
                $(this).keyup(function () { 
                var input = $(this);
                // var name = $('input[name=name]');
                if(input.val() == "" || input.val().length < 5){
                    input.css( "border", "1px solid red" );
                } else{
                    input.css("border", "1px solid #ced4da");
                }

                });
            });
            $('#btn_save').on('click', function () {
                var fruit_name=$('#fruit_name').val();
                var price=$('#price').val();
                console.log(fruit_name);
                if (fruit_name!='' && price!='') {
                    console.log("if executed");
                    $.ajax({
                        type: "POST",
                        url: "<?php echo site_url();?>/Fruit/save",
                        // data: {'fruit_name':fruit_name,'price':price},
                        data: $('#form').serialize(),
                        dataType: "JSON",
                        success: function (data) {
                            console.log("not executing ?");
                            $('[name="fruit_name"]').val("");
                            $('[name="price"]').val("");
                            $('#exampleModal').modal('hide');
                        },
                       
                        
                    });
                }
                else{
                    alert("Please Enter Something");
                }
            });
        });
    </script>
  </body>
</html>
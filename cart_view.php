<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">



    <?php include 'includes/navbar.php'; ?>

    <div class="content-wrapper">
        <div class="container">

          <!-- Main content -->
          <section class="content">
            <div class="row">
                <div class="col-sm-9">
                    <h1 class="page-header">Su carrito de compras</h1>
                    <div class="box box-solid">
                        <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                                <th></th>
                                <th>Foto</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th width="20%">Cantidad</th>
                                <th>Subtotal</th>
                            </thead>
                            <tbody id="tbody">
                            </tbody>
                        </table>
                        </div>
                    </div>
                    <?php
                        if(isset($_SESSION['user'])){
                            echo "<button id='btnPagar' class='btn btn-primary' disabled>Pagar</button>";
                        }
                        else{
                            echo "<h4>Necesitas <a href='login.php'>Iniciar sesión</a> para revisar.</h4>";
                        }
                    ?>
                </div>
                <div class="col-sm-3">
                    <?php include 'includes/sidebar.php'; ?>
                </div>
            </div>
          </section>

        </div>
      </div>
    <?php $pdo->close(); ?>
    <!-- <?php include 'includes/footer.php'; ?> -->
</div>

<?php include 'includes/scripts.php'; ?>
<script>
var total = 0;
$(function(){
    $(document).on('click', '.cart_delete', function(e){
        e.preventDefault();
        var id = $(this).data('id');
        $.ajax({
            type: 'POST',
            url: 'cart_delete.php',
            data: {id:id},
            dataType: 'json',
            success: function(response){
                if(!response.error){
                    getDetails();
                    getCart();
                    getTotal();
                }
            }
        });
    });

    $(document).on('click', '.minus', function(e){
        e.preventDefault();
        var id = $(this).data('id');
        var qty = $('#qty_'+id).val();
        if(qty>1){
            qty--;
        }
        $('#qty_'+id).val(qty);
        $.ajax({
            type: 'POST',
            url: 'cart_update.php',
            data: {
                id: id,
                qty: qty,
            },
            dataType: 'json',
            success: function(response){
                if(!response.error){
                    getDetails();
                    getCart();
                    getTotal();
                }
            }
        });
    });

    $(document).on('click', '.add', function(e){
        e.preventDefault();
        var id = $(this).data('id');
        var qty = $('#qty_'+id).val();
        qty++;
        $('#qty_'+id).val(qty);
        $.ajax({
            type: 'POST',
            url: 'cart_update.php',
            data: {
                id: id,
                qty: qty,
            },
            dataType: 'json',
            success: function(response){
                if(!response.error){
                    getDetails();
                    getCart();
                    getTotal();
                }
            }
        });
    });

    getDetails();
    getTotal();

    $('#btnPagar').click(function(){
        window.location.href = 'factura.php';
    });

});

function getDetails(){
    $.ajax({
        type: 'POST',
        url: 'cart_details.php',
        dataType: 'json',
        success: function(response){
            $('#tbody').html(response);
            getCart();
            togglePagarButton();
        }
    });
}

function getTotal(){
    $.ajax({
        type: 'POST',
        url: 'cart_total.php',
        dataType: 'json',
        success:function(response){
            total = response;
            togglePagarButton();
        }
    });
}

function togglePagarButton(){
    if(total > 0){
        $('#btnPagar').prop('disabled', false);
    } else {
        $('#btnPagar').prop('disabled', true);
    }
}

</script>
</body>
</html>

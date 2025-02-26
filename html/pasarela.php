<?php 



if (isset($_GET['precio'])) {
   
    $precio = $_GET['precio'];
} else {
   
    $precio = 0;
}


?>
<!doctype html>
                        <html>
                            <head>
                                <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>
                                <title>Pasarela de Pagos</title>
                                <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='' rel='stylesheet'>
                                <style>body {
    background-color: #eee
}

.card {
    width: 340px;
    border-radius: 35px;
    background-color: #fff;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
}

.total-amount {
    font-size: 22px;
    font-weight: 700;
    color: #383737
}

.amount-container {
    background-color: #e9eaeb;
    padding: 6px;
    padding-left: 15px;
    padding-right: 15px;
    border-radius: 8px
}

.amount-text {
    font-size: 20px;
    font-weight: 700;
    color: #673AB7
}

.dollar-sign {
    font-size: 20px;
    font-weight: 700;
    color: #000
}

.label-text {
    font-size: 16px;
    font-weight: 600;
    color: #b2b2b2
}

.credit-card-number {
    width: 290px;
    z-index: 28;
    border: 2px solid #ced4da;
    border-radius: 6px;
    font-weight: 600
}

.credit-card-number:focus {
    box-shadow: none;
    border: 2px solid #673AB7
}

.visa-icon {
    position: relative;
    top: 42px;
    right: 14px;
    z-index: 30
}

.expiry-class {
    width: 120px;
    border: 2px solid #ced4da;
    font-weight: 600;
    font-size: 12px;
    height: 48px
}

.expiry-class:focus {
    box-shadow: none;
    border: 2px solid #673AB7
}

.cvv-class {
    width: 120px;
    border: 2px solid #ced4da;
    font-weight: 600;
    font-size: 12px;
    height: 48px
}

.cvv-class:focus {
    box-shadow: none;
    border: 2px solid #673AB7
}

.payment-btn {
    background-color: #673AB7;
    padding: 15px;
    padding-left: 25px;
    padding-right: 25px;
    color: #fff;
    font-weight: 600;
    border-radius: 12px
}

.payment-btn:hover {
    box-shadow: none;
    color: #fff
}

.cancel-btn {
    background-color: #fff;
    color: #b2b2b2;
    padding: 0px;
    padding-top: 3px;
    padding-bottom: 3px;
    font-weight: 600;
    border-radius: 6px
}

.cancel-btn:hover {
    border: 2px solid #b2b2b2;
    color: #b2b2b2
}

.cancel-btn:focus {
    box-shadow: none
}

.verified-logo-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .verified-logo {
            width: 200px; /* Ajusta el ancho según sea necesario */
        }

.label-text-cc-number {
    position: relative;
    top: 4px
}</style>
                                <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
                                <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
                                <script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js'></script>
                            </head>
                            <body oncontextmenu='return false' class='snippet-body'>


                            <div class="verified-logo-container">
        <img src="../img/logo.png" class="verified-logo" alt="Verified by Visa">
    </div>
                            <div class="container mt-5 d-flex justify-content-center">
    <div class="card p-4">
    <form id="paymentForm" action="procesar_pago.php" method="post">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="total-amount">Monto a Pagar</h5>
            <div class="amount-container"><span class="amount-text"><span class="dollar-sign">PEN  </span><?php echo number_format($precio,2); ?></span></div>
        </div>
        <div class="pt-4"> <label class="d-flex justify-content-between"> <span class="label-text label-text-cc-number">Número de tarjeta</span><img src="https://img.icons8.com/dusk/64/000000/visa.png" width="30" class="visa-icon" /></label> <input type="tel" name="credit-number" class="form-control credit-card-number" maxlength="19" placeholder="" required> </div>
        <div class="d-flex justify-content-between pt-4">
            <div> <label><span class="label-text">Fecha de Expiración</span> </label> <input type="date" name="expiry-date" class="form-control expiry-class" placeholder="MM / YY" required> </div>
            <div> <label><span class="label-text">CVV</span></label> <input type="tel" name="cvv-number" class="form-control cvv-class" maxlength="4" pattern="\d*" required> </div>
        </div>
        <div class="d-flex justify-content-between pt-5 align-items-center"> <a href="indexservicio.html" class="btn cancel-btn">Volver</a> <button type="submit" class="btn payment-btn">Pagar Ahora</button> </div>
        </form>
    </div>
</div>

<div class="verified-logo-container">
        <img src="../img/visa.png" class="verified-logo" alt="Verified by Visa">
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    document.getElementById('paymentForm').addEventListener('submit', function(event) {
        const form = event.target;
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
          
        } else {
            event.preventDefault(); 

            Swal.fire({
                title: '¡Gracias!',
                text: 'Su pago ha sido procesado correctamente.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = 'indexservicio.html'; 
            });
        }
        form.classList.add('was-validated');
    });
</script>

                            </body>
                        </html>
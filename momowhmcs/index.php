<!DOCTYPE html>
<html lang="en">

<head>
    <title>PursaPay Platform for CloudHost.cm</title>
        <!-- Required meta tags always come first -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="container-fluid top-menu">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                Tel: 2345252345235235523r452
            </div>
            <div class="col-md-6 text-right sm-none">
                <span class="">Tel: 2345252345235235523r452</span>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-dark navbar-expand-lg main-menu">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand mr-3" href="#">
            <img src="cloudhost.png" height="70">
        </a>
        <div class="collapse navbar-collapse" id="Navbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="#"><span class="main-nav-item"> HOME</span></a></li>
                <li class="nav-item"><a class="nav-link" href=""><span class="main-nav-item"> WEB HOSTING</span></a></li>
                <li class="nav-item"><a class="nav-link" href="#"><span class="main-nav-item"> SERVERS</span></a></li>
                <li class="nav-item"><a class="nav-link" href=""><span class="main-nav-item">DOMAINS</span></a></li>
                <li class="nav-item"><a class="nav-link" href=""><span class="main-nav-item">SUPPORT</span></a></li>
            </ul>
            <span class="navbar-text">
                <a data-toggle="modal" data-target="#loginModal">
                    <span class="fa fa-sign-in"></span> ACCOUNT</a>
            </span>
        </div>
    </div>
</nav>
<div class="container text-center mt-5 mb-5">
    <?php if(isset($_POST['amount']) && isset($_POST['invoice_id']) && isset($_POST['description']) && isset($_POST['callback_url'])){ ?>
    <h1 class="main-title">You are about to make a payment of <?= (int)$_POST['amount'] ?> FCFA for invoice #<?= $_POST['invoice_id'] ?></h1>
    <h3>Please select a payment method below to proceed</h3>
    <div class="row justify-content-center mt-5">
        <div class="col-lg-2 col-md-4 col-sm-6">
            <img src="mtn_momo.svg" width="150px" title="Active" data-toggle="modal" data-target="#mtnModal">
            <!-- Modal -->
            <div class="modal fade" id="mtnModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body text-center" id="step1">
                            <h4 class="mt-3">Pay <?= (int)$_POST['amount'] ?> Fcfa with MTN Mobile Money</h4>
                            <div class="">
                                <form id="mtnform" method="post">
                                    <input class="form-control mt-5 p-4 shadow bg-white rounded border border-primary" id="number" type="number" name="number" placeholder="Enter your MTN Mobile Money number Here (677216354)">
                                    <input type="hidden" name="amount" value="<?= $_POST['amount'] ?>">
                                    <input type="hidden" name="invoice_id" value="<?= $_POST['invoice_id'] ?>">
                                    <input type="hidden" name="description" value="<?= $_POST['description'] ?>">
                                    <input type="hidden" name="callback_url" value="<?= $_POST['callback_url'] ?>">
                                    <input class="btn btn-primary mt-4 px-5" type="button" value="Proceed" id="submt">
                                </form>
                            </div>
                            <div class="text-center mt-4">Lorem Ipsum dolor amet</div>
                        </div>
                        <div class="modal-body text-center d-none" id="step2">
                            <h4 class="mt-3">Awaiting you payment</h4>
                            <div>Dial *126# and enter your PIN code to confirm the payment of <?= (int)$_POST['amount'] ?> Fcfa</div>
                            <div></div>
                        </div>
                        <div class="modal-body text-center d-none" id="step3">
                            <h4 class="mt-3">Payment of <?= (int)$_POST['amount'] ?> Fcfa with MTN Mobile Money</h4>
                            <div>SUCCESS</div>
                            <div></div>
                            <div><button class="btn btn-success">Retry</button><button class="btn btn-danger">Cancel</button></div>
                        </div>
                        <div class="modal-body text-center d-none" id="step4">
                            <h4 class="mt-3">Payment of <?= (int)$_POST['amount'] ?> Fcfa with MTN Mobile Money</h4>
                            <div>FAILURE</div>
                            <div></div>
                            <div><button class="btn btn-success">Retry</button><button class="btn btn-danger">Cancel</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6">
            <img class="disab" src="orange_money.svg" width="150px" title="Inactive">
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6">
            <img class="disab" src="expressunion.svg" width="150px" title="Inactive">
        </div>
    </div>
    <?php } else{ ?>
        AUCUNE FACTURE SELECTIONNEE!
    <?php } ?>
</div>
<div class="container-fluid bottom-one">
    <div class="container">

    </div>
</div>
<!-- <div class="container-fluid bottom-two">
    <div class="container">

    </div>
</div> -->
</body>
    <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <!-- <script src="node_modules/popper.js/dist/umd/popper.min.js"></script> -->
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="script.js"></script>

</html>
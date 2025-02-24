<?php $this->extend('template'); ?>
<?php $this->section('css'); ?>
    <style>
        #Waves {
            background: url('<?= base_url() ?>home/img/waves.png') no-repeat;
            background-size: 100%;
        }

        .box-white {
            position: relative;
            top: -130px;
            border-radius: 7px;
            z-index: 4;
            border: 1px solid transparent;
        }

        .slug-icon {
            border-radius: 48px;
            margin-top: 7px;
        }

        .buy-label {
            font-family: 'Tokopedia-Reguler';
            font-size: 13px;
            display: block;
            margin-top: 0px !important;
        }

        .buy-form-control {
            font-family: 'Tokopedia-Reguler';
            border: none;
            background: none;
            border-bottom: 1px solid #00AA5B;
            border-radius: 0;
            outline: none;
            margin-top: -8px;
            padding: 0;
        }

        .buy-form-control:focus {
            box-shadow: 0 0 0 transparent;
            border: none;
            background: none;
            border-bottom: 1px solid #00AA5B;
        }

        .buy-history {
            width: 130px;
            border: 1px solid rgb(0, 218, 116);
            border-radius: 48px;
            font-size: 13px;
            display: inline-block
        }

        #vertical-scroll {
            width: 100%;
            overflow-x: scroll;
            white-space: nowrap;
            -ms-overflow-style: none;  /* Internet Explorer 10+ */
            scrollbar-width: none;  /* Firefox */
        }

        #vertical-scroll::-webkit-scrollbar { 
            display: none;  /* Safari and Chrome */
        }

        .box-white .prices {
            font-family: Arial;
            display: block;
            font-size: 12px;
            font-weight: bold;
        }

        .product-name {
            font-size: 13px !important;
        }

        .box-product.active {
            border: 1px solid rgb(0, 218, 116) !important;
            color: #000;
        }

        .shadow-top {
            box-shadow: 0 -.125rem .25rem rgba(0,0,0,.075)!important
        }

        .btn-success {
            background-color: var(--GN500, #00AA5B);
            border: none;
            border-radius: 48px;
            color: #fff;
            padding: 7px 0;
            outline: none;
        }

        .box-product.disabled {
            border: 1px solid rgb(211, 211, 211);
            background-color:rgb(233, 233, 233);
            color: #666666;
        }

        .css-c1gsx8 {
            font-size: 12px;
            color: var(--NN1000, rgba(0, 0, 0, 0.54));
            display: block;
            margin: 0px 0px 6px;
        }

        .badge-check {
            position: absolute; 
            top: -14px; 
            right: -14px; 
            font-size: 15px; 
            border-radius: 4px; 
            border-top-right-radius: 7px;
        }

        .badge-success {
            background: #00AA5B important;
            border: none;
            border-radius: 48px;
            color: #fff;
            font-size: 12px;
            outline: none;
            padding: 10px 0;
        }

        select.form-control {
            height: 50px;
            border-radius: 12px;
            outline: none;
            border-left: 0;
            padding-left: 0;
        }
        
        input.form-control {
            height: 50px;
            border-top-left-radius: 12px;
            border-bottom-left-radius: 12px;
            border-top-right-radius: 12px;
            border-bottom-right-radius: 12px;
            padding: 18px 13px !important;
            outline: none;
        }

        select.form-control:focus {
            border: 1px solid #ced4da;
            border-left: 0;
            box-shadow: 0 0 0 transparent;
        }

        input.form-control:focus {
            border: 1px solid #ced4da;
            box-shadow: 0 0 0 transparent;
        }

        input.form-control[readonly] {
            background-color: transparent !important;
            opacity: 1;
        }

        .input-group-text {
            background: none;
            border-top-left-radius: 12px;
            border-bottom-left-radius: 12px;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
            border-right: none;
        }
        .border {
            border: 1px solid #ced4da !important;
        }

        .selectNominal {
            cursor: pointer;
            display: inline-block;
            margin: 5px 5px;
            width: auto;
            text-align: center;
            padding: 8px 10px;
            border: 1px solid #ced4da;
            border-radius: 48px;
            font-size: 12px;
            font-family: Arial;
        }

        .selectNominal a {
            text-decoration: none;
        }

        .active {
            border: 1px solid #00AA5B !important;
        }

        .btn-success {

        }
    </style>
<?php $this->endSection(); ?>
<?php $this->section('konten'); ?>

<div class="container">
    <div class="row">
        <div class="col-12" id="PhoneOrder">
            <div class="box-white bg-white shadow">
                <div class="row">

                    <div class="col-12 mt-2">
                        <form action="/deposit" method="POST" id="FormDeposit">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id" id="id" value="<?= $users['id'] ?>">
                            <div class="form-group mt-3 px-4">
                                <label for="bank" class="form-label">Bank Pilihan</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-none border-none"><img id="bank_icon" src="<?= base_url() ?>home/img/bank/<?= $bank[0]['icon'] ?>" width="26" alt=""></span>
                                    <select class="form-control" name="bank" id="bank" required>
                                        <?php foreach($bank as $key => $b) : ?>
                                            <option value="<?= $b['id'] ?>" <?php if($key == 0) : ?> selected <?php endif ?> data-id="<?= $b['icon'] ?>"><?= $b['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mt-4 px-4">
                                <label for="nominal" class="form-label">Nominal Isi Saldo</label>
                                <input type="tel" class="form-control" name="nominal" id="nominal" placeholder="Nominal Saldo" aria-label="nominal" aria-describedby="nominal" required readonly>
                                <small class="text-danger d-none ml-1" style="font-size: 10.5px;" id="Err"></small>
                            </div>
                            <div class="form-group d-block mx-auto text-center">
                                <div class="selectNominal">
                                   <span price="50.000"><?= $curr ?> 50.000</span>
                                </div>
                                <div class="selectNominal">
                                   <span price="100.000"><?= $curr ?> 100.000</span>
                                </div>
                                <div class="selectNominal">
                                   <span price="500.000"><?= $curr ?> 500.000</span>
                                </div>
                                <div class="selectNominal">
                                    <span price="1.000.000"><?= $curr ?> 1.000.000</span>
                                </div>
                                <div class="selectNominal">
                                    <span price="2.000.000"><?= $curr ?> 2.000.000</span>
                                </div>
                                <div class="selectNominal">
                                    <span price="5.000.000"><?= $curr ?> 5.000.000</span>
                                </div>
                            </div>
                            <div class="form-group px-4">
                                <button class="btn btn-success d-block mx-auto w-100" type="submit">Lanjutkan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="fixed-bottom d-none p-3 px-4 mx-auto bg-white shadow-top" id="NextPage">
    <div class="row">
        <div class="col-7">
            Total Pembayaran<br>
            <span class="prices mt-1 font-weight-bold" id="ShowPrice"></span>   
        </div>
        <div class="col-5 float-right text-right pt-2">
            <button type="button" class="btn btn-success d-block w-100 mx-auto float-right" id="NextBTN">Lanjut</button>
        </div>
    </div>      
</div>

  <?php $this->endSection(); ?>

<?php $this->section('js'); ?>
<script>
    $(function() {
        $("form#FormDeposit").on('submit', function() {
            $bank    = $("select#bank").val();
            $Nominal = $("input#nominal").val();
            $ChangeNom = $Nominal.replace(".", "");

            if($ChangeNom.replace(".", "") < 50000) {
                $("#Err").removeClass('d-none');
                $("#Err").html('Kamu harus memilih nominal');
                return false;
            } else {
                return true;
            }
        });
        $("#bank").on('change', function() {
            $GetIcon = $('select#bank option:checked').attr('data-id');
            $("#bank_icon").attr('src', '/home/img/bank/' + $GetIcon);
        });

        $("div.selectNominal").on('click', function() {
            $("div.selectNominal").removeClass('active');
            $(this).addClass('active');

            $Nom = $(this).find('span').attr('price');
            $("input#nominal").val($Nom)
        })

        $("input#nominal").on('change', function() {
            $Nom = $("input#nominal").val();
            $Nominal = parseInt($Nom).toLocaleString(); 
            $("input#nominal").val($Nominal);
        });

        $("#NextBTN").on('click', function() {
            $orde<?= $curr ?>hone = $("#phone").val();

            $("#phone").attr('disabled', true);
            $("#Loading").removeClass('d-none');

            setTimeout(() => {
                $("#PhoneOrder").addClass('d-none');
                $("#ListProduct").addClass('d-none');
                $("#SetTitle").html('Pembelian');
                $("#NextPage").addClass('d-none');
                $("#Loading").addClass('d-none');

                $("#BoxDetail").addClass('active');
                $("#DetailOrder").removeClass('d-none');
                $("#PhoneNumberDetail").html($orde<?= $curr ?>hone);
            }, 1200);
        });
        $("#phone").on('input', function() {
            $phone = $("#phone").val(),
            intRegex = /^(?:\+62|62|0)[2-9]\d{7,11}$/;

            if($phone.length >= 11) {
                if(intRegex.test($phone)) {
                    $("#orde<?= $curr ?>hone").val($phone);
                    $("#Er<?= $curr ?>hone").addClass('d-none');
                    $("#ListProduct").removeClass('d-none');
                } else {
                    $("#orde<?= $curr ?>hone").val('');
                    $("#Er<?= $curr ?>hone").removeClass('d-none');
                    $("#ListProduct").addClass('d-none');
                    $("#NextPage").addClass('d-none');
                }
            } else {
                $("#orde<?= $curr ?>hone").val('');
                $("#ListProduct").addClass('d-none');
                $("#NextPage").addClass('d-none');
            }
        }); 

        $("div#chooseProduct").on('click', function() {
            $id = $(this).attr('data-id');
            $Price = $(this).find('.prices').html();
            $ProductName = $(this).find('.product-name').html();
            $TotalPrice  = $(this).attr('data-total');

            $("div.box-product").removeClass('active');
            $(this).addClass('active');
            $("#idProduct").val($id);
            $("#NextPage").removeClass('d-none');
            $("#ShowPrice").html($Price);

            $("#ProductPrice").html($Price);
            $("#ProductName").html($ProductName);

            $("#TotalPrice").html($TotalPrice);
        });
    })
</script>
<?php $this->endSection(); ?>
<?php $this->extend('template'); ?>
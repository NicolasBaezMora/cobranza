<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Ticket No 132</title>

  <link href="<?php echo site_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo site_url('assets/plugins/sweetalert2/sweetalert2.min.css'); ?>">
  <style type="text/css" media="all">
    body { color: #000; }
    #wrapper { max-width: 520px; margin: 0 auto; padding-top: 20px; }
    .btn { margin-bottom: 5px; }
    .table { border-radius: 3px; }
    .table th { background: #f5f5f5; }
    .table th, .table td { vertical-align: middle !important; }
    tfoot tr th:first-child { text-align: right; }

    @media print {
      .no-print { display: none; }
      #wrapper { max-width: 480px; width: 100%; min-width: 250px; margin: 0 auto; }
    }
  </style>
</head>
<body>
  <div id="wrapper">
    <div id="receiptData" style="width: auto; max-width: 580px; min-width: 250px; margin: 0 auto;">
      <div id="receipt-data">
       
            <p style="text-align:center;"><strong>Pago Realizado</strong>                               
            <p>
              Fecha/hora:  <?php echo $quotasPaid[0]->pay_date; $total = 0; ?><br>
              N° Prestamo: <?php echo $loan_id; ?> <br>
              Cliente: <?php echo $name_cst; ?> <br>
              Tipo moneda: <?php echo $coin; ?><br>
            </p>
            <div style="clear:both;"></div>
            <table class="table table-condensed">
              <thead>
                <tr>
                  <th style="width: 60%; border-bottom: 2px solid #ddd; text-align:center;">Descripcion</th>
                  <th style="width: 30%; border-bottom: 2px solid #ddd; text-align:center;">Monto Cancelado</th>
                  <th style="width: 30%; border-bottom: 2px solid #ddd; text-align:center;">Subtotal</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($quotasPaid as $qp): ?>
                  <tr>
                    <td>Cuota N° <?php echo $qp->num_quota ?></td>
                    <td style="text-align:right;"><?php echo $qp->fee_amount; $total+=$qp->fee_amount;  ?></td>
                    <td style="text-align:right;"><?php echo $qp->fee_amount ?></td>
                  </tr>
                <?php endforeach ?>
              </tbody>
              <tfoot>
                <tr>
                    <th colspan="2">Total</th>
                    <th style="text-align:right;"><?php echo number_format($total,2) ?></th>
                </tr>
              </tfoot>
              </table>
              <table class="table table-striped table-condensed" style="margin-top:10px; text-align: center; width: 50%;">
                <tbody>
                  <tr>
                    <td>Pagado por : Efectivo</td>
                  </tr>

                </tbody>
              </table>
        
            
      </div>

        
    </div>
  </div>
  <script src="<?php echo site_url() ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo site_url('assets/plugins/sweetalert2/sweetalert2.min.js'); ?>"></script>
  <script type="text/javascript">base_url = '<?= base_url();?>'</script>
    <script src="<?php echo site_url(); ?>assets/js/script.js"></script>
</body>
</html>

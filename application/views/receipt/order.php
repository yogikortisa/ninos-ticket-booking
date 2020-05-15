<html>
<head>
<title>TICKET BOOKING</title>
	<style type="text/css">
		th, td {
		  padding: 10px;
		  text-align: left;
		}
	</style>
<!-- <script src="<?= base_url('bower_components/jquery/dist/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/qrcode/jquery.qrcode.min.js') ?>"></script> -->
</head>
<?php //require_once($_SERVER['DOCUMENT_ROOT'].'/ninos/assets/phpqrcode/qrlib.php'); ?>
<body style="font-family: Arial, Times New Roman, Times, serif; font-size: 14px;">

	<div align="center" style="margin-bottom: 20px">
		<p><b>TICKET BOOKING</b></p>
		<img src="<?= base_url('assets/logo/ninos2019.png') ?>" width="200" hight="150">
		<br />
		<h2>Booking Code : <?= $order_id ?></h2>
	</div>

	<div style="margin-bottom: 50px;" align="center">

		<div id="qrcode2" style="float: left; padding-left: 80px; padding-top: 0px">
			<img src="cid:<?= $path ?>" alt="photo1" width="250" hight="250" />
			<!-- <img src="<?= base_url('/assets/img/barcode39/J2FK5VWF94V1.gif') ?>" width="250" hight="250" /> -->
		</div>
			
		<div style="padding-left: 20;float: left;">
			<table border="0">
				<!-- <tr><td><h2>Kode Booking</h2></td><td><h2>:</h2></td><td><h2><?= $code ?></h2></td></tr> -->
				<tr><td>Name</td><td>:</td><td><?= $name ?></td></tr>
				<tr><td>Phone</td><td>:</td><td><?= $phone_strip ?></td></tr>
				<tr><td>Email</td><td>:</td><td><?= $email ?></td></tr>
				<tr><td>Play Date</td><td>:</td><td><?= $play_date ?></td></tr>
				<tr><td>Session</td><td>:</td><td><?= $session_full ?></td></tr>
				<!-- <tr><td>Ticket Price</td><td>:</td><td><?= $price ?></td></tr> -->

				<?php foreach ($ticket_category as $key => $value) { 
					if($qty[$key] != '') {
				?>
					<tr><td><?= ($key == 0 ? 'Qty' : '') ?></td><td>:</td><td><?= number_format($qty[$key], 0, ',', '.') ?> × <?= $value ?></td></tr>
				<?php } } ?>

				<tr style="font-weight: bolder;"><td>Price Total</td><td>:</td><td><?= $price_formated ?></td></tr>
			</table>
		</div>
	</div>
<div style="clear: both"></div>
	<div style="margin: 25px;margin-left:0;padding-left: 100px">
		<p>Terima kasih telah memesan tiket Ninos, untuk langkah berikutnya:</p>

		<P>1. Transfer senilai total price ke Rekening:
		<table border="0">
			<tr><td>Bank</td><td>:</td><td>MANDIRI</td></tr>
			<tr><td>An</td><td>:</td><td>PT. WAHANA KREASI BANGSA</td></tr>
			<tr><td>No. Rek</td><td>:</td><td>1090 0323 000 06</td></tr>
		</table></P>

		<p>2. Informasikan bukti transfer pembayaran dan sertakan informasi KODE BOOKING ke:<br>
			Admin Ninos: +62 853 5535 8889 <img src="<?= base_url('assets/logo/wa.jpg') ?>" width="20" hight="10"></p>

		<p>3. Ninos akan mengirim kembali email bukti pembayaran.</p>
	</div>

</body>
</html>
<!-- <script type="text/javascript">
	jQuery('#qrcode').qrcode("<?= $code ?>");
</script> -->


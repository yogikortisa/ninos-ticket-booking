<!DOCTYPE html>
<html>
	<head>
		<title>Code Booking</title>
	</head>
	<body>
		<header>
			<div align="center">
				<img src="<?= base_url('assets/logo/header.png') ?>" width="200%" height="100%" />
			</div>
			<div >
				<h2 align="center">Booking Code : <?=$detailpdfschool->order_id;?></h2>
			</div>
			<div>
				<table class="table">
					<tr>
						<td width="240px">Name</td>
						<td>: <?=$detailpdfschool->name_school;?></td>
					</tr>
					<tr>
						<td width="240px">Phone</td>
						<td>: <?=$detailpdfschool->no_hp;?></td>
					</tr>
					<tr>
						<td width="240px">Email</td>
						<td>: <?=$detailpdfschool->email;?></td>
					</tr>
					<tr>
						<td width="240px">Play Date</td>
						<!-- <td>: <?= date('d F Y', strtotime($detailpdfschool->play_date));?></td> -->
						<?php
							if ($detailpdfschool->play_date > 0) { ?>
								<td> : <?= date('d F Y', strtotime($detailpdfschool->play_date));?></td>
						<?php }else{
								echo '<td> : </td>';
							}
						 ?>
					</tr>
					<tr>
						<td width="240px">Session</td>
						<td>: Session 1 : 09:00 s/d 14:00 (5 hours)</td>
					</tr>
				</table>
			</div>
			<br>
			<div>
				<table border="1"  class="uk-table" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Category</th>
							<th>Qty</th>
							<th>Price Ticket</th>
							<th>Price Food</th>
							<th>total price</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td style="text-align:center;" width="100"><h5><?=$detailpdfschool->name;?></h5></td>
							<td style="text-align:center;" width="90"><?=$detailpdfschool->pcs;?></td>
							<td style="text-align:center;" width="110">Rp<?=number_format($detailpdfschool->price_ticket,2,',','.');?></td>
							<td style="text-align:center;" width="110">Rp<?=number_format($detailpdfschool->food,2,',','.');?></td>
							<td style="text-align:center;" width="140">Rp<?=number_format($detailpdfschool->total_pay,2,',','.');?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<br>
			<table class="table">
				<tr>
					<td width="150px"></td>
					<td width="130px"></td>
					<td><b style="color: red;"><u>Purchase Amount</u></b> : </td>
					<td>Rp<?=number_format($detailpdfschool->total_pay,2,',','.');?></td>
				</tr>
			</table>
			<table class="table">
				<tr>
					<?php $barcode = $detailpdfschool->barcode;?>
					<td width="150px"></td>
					<td width="130px"></td>
					<td><img src="<?= base_url('assets/img/barcode39/'.$barcode.'.gif') ?>" width="250px" height="85px" /></td>
					<td></td>
				</tr>
			</table>
		</header>
		<br><br><br><br><br><br>
		<footer>
			<div>
				<h5 align="center" style="color: #004d80;">Komplek Dermaga Culinary Paradise Blok RH No.07 Sukajadi - Batam, Kep. Riau</h5>
				<table  class="uk-table" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th></th>
							<th></th>
							<th><h5 style="color: #004d80;"><img src="<?= base_url('assets/logo/telephone.png') ?>" width="13px" height="13px" /> 0823-86066598</h5></th>
							<th><h5 style="color: #004d80;"><img src="<?= base_url('assets/logo/wwww.png') ?>" width="13px" height="13px" /> www.ninos.co.id</h5></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td style="text-align:center;" width="60"></td>
							<td style="text-align:center;" width="60"></td>
							<td style="text-align:center;" width="50"></td>
							<td style="text-align:center;" width="80"></td>
							<td style="text-align:center;" width="85"></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</footer>
</body>
</html>
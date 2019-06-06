<?php $total_channels = count($records[0]['channels']); ?>

<div class="row">
	<nav>
		<div class="nav nav-tabs" id="nav-tab" role="tablist" style="width: 100%">
			<?php for($i = 0; $i < $total_channels; ++$i): ?>
				<a class="nav-item nav-link <?= ($i == 0) ? 'active' : '' ?>" id="<?= $records[0]['channels'][$i]['name'] ?>-tab" data-toggle="list" href="#<?= $records[0]['channels'][$i]['name'] ?>" role="tab" aria-controls="<?= $records[0]['channels'][$i]['name'] ?>" aria-selected="true">Sensor: <?= $records[0]['channels'][$i]['name'] ?></a>
			<?php endfor; ?>
		</div>
	</nav>
</div>
<div class="row">
	<div class="tab-content" id="nav-tabContent" style="width: 100%">
		<?php for($i = 0; $i < $total_channels; ++$i): ?>

			<div class="tab-pane fade show <?= ($i == 0) ? 'active' : '' ?>" id="<?= $records[0]['channels'][$i]['name'] ?>" role="tabpanel" aria-labelledby="<?= $records[0]['channels'][$i]['name'] ?>-tab">
				<table class="table">
					<thead>
						<tr>
							<th>id</th>
							<th>Timestamp</th>
							<th>Valor</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?= $id ?></td>
							<td>00/00/0000 00:00:00</td>
							<td>0000</td>
						</tr>
						<tr>
							<td><?= $id ?></td>
							<td>00/00/0000 00:00:00</td>
							<td>0000</td>
						</tr>
						<tr>
							<td><?= $id ?></td>
							<td>00/00/0000 00:00:00</td>
							<td>0000</td>
						</tr>
					</tbody>
				</table>	

			</div>
		<?php endfor; ?>

	</div>
</div>	

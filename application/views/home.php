<div class="row">
	<div class="col-md-6">
		<h2 class="text-center mb-3">Dispositivos</h2>
		<div class="list-items">
			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">ID</th>
			      <th scope="col">Nome</th>
			      <th scope="col">Dados</th>
			      <th scope="col">Editar</th>
			      <th scope="col">Excluir</th>
			    </tr>
			  </thead>
			  <tbody>
			  	
				<?php foreach ($devices as $d):
					$id = json_decode(json_encode($d["_id"]), True);
					?>
					<tr>
				      <th scope="row"><?= $id['$id'] ?></th>
				      <td><?= $d['device name'] ?></td>
				      <td><a href="<?= base_url().'devices/records/'.$id['$id']; ?>" class="btn btn-success">Dados</a></td>
				      <td><a href="<?= base_url().'devices/edit/'.$id['$id']; ?>" class="btn btn-primary">Editar</a></td>
				      <td><a href="<?= base_url().'devices/delete/'.$id['$id']; ?>" class="btn btn-danger">Excluir</a></td>
				    </tr>
				<?php endforeach; ?>

			
			  </tbody>
			</table>
			<a href="<?= base_url('devices/add'); ?>" class="btn btn-info float-right mt-5">Adicionar Dispositivo</a>
		</div>
	</div>
	<div class="col-md-6">
		<h2 class="text-center mb-3">Monitoramento</h2>
		<canvas></canvas>
	</div>
</div>
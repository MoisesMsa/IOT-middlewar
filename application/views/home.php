<div class="row">
	<div class="col-md-6">
		<h2 class="text-center mb-3">Dispositivos</h2>

		<div class="list-items">
			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">Token</th>
			      <th scope="col">Nome</th>
			      <th scope="col">Editar</th>
			      <th scope="col">Excluir</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <th scope="row">1</th>
			      <td>Nome dispositivo</td>
			      <td><a href="<?= base_url('device/edit?id=0'); ?>" class="btn btn-primary">Editar</a></td>
			      <td><a href="<?= base_url('device/delete?id=0'); ?>" class="btn btn-danger">Excluir</a></td>
			    </tr>
				<tr>
			      <th scope="row">1</th>
			      <td>Nome dispositivo</td>
			      <td><a href="<?= base_url('device/edit?id=0'); ?>" class="btn btn-primary">Editar</a></td>
			      <td><a href="<?= base_url('device/delete?id=0'); ?>" class="btn btn-danger">Excluir</a></td>
			    </tr>
			    <tr>
			      <th scope="row">1</th>
			      <td>Nome dispositivo</td>
			      <td><a href="<?= base_url('device/edit?id=0'); ?>" class="btn btn-primary">Editar</a></td>
			      <td><a href="<?= base_url('device/delete?id=0'); ?>" class="btn btn-danger">Excluir</a></td>
			    </tr>
			
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
<strong>Nome:</strong> {{ $data['nome'] }}<br>
<strong>Email:</strong> {{ $data['email'] }}<br>
<strong>Telefone:</strong> {{ $data['telefone'] }}<br>
<strong>Cargo Desejado:</strong> {{ $data['cargo_desejado'] }}<br>
<strong>Escolaridade:</strong> {{ $data['escolaridade'] }}<br>
<strong>Data de Envio:</strong> {{ date('d/m/Y H:i', strtotime($data['data_envio'])) }}<br>
@if($data['observacoes'])
  <strong>Observações:</strong> {{ $data['observacoes'] }}<br>
@endif

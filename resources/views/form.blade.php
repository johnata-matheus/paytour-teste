<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="/css/app.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&family=Roboto:wght@400&display=swap" rel="stylesheet">
</head>

<body>
  <div class="container">
    <div class="content">

      @if ($errors->any())
        <ul class="errors">
          @foreach ($errors->all() as $error)
            <li class="error">{{ $error }}</li>
          @endforeach
        </ul>
      @endif

      <form class="form" action="/user" method="post" enctype="multipart/form-data">
        @csrf
        <div class="grid">

          <div>
            <label for="nome">Nome</label>
            <input type="text" name="nome" placeholder="Seu nome" required>
          </div>
          <div>
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="telefone" placeholder="(99) 9 99999999" required>
          </div>
        </div>

        <div>
          <label for="email">Email</label>
          <input type="email" name="email" placeholder="Paytour@exemplo.com" required>
        </div>

        <div>
          <label for="cargo_desejado">Cargo desejado</label>
          <textarea name="cargo_desejado" placeholder="Escreva o cargo que você deseja" required></textarea>
        </div>

        <div>
          <label for="escolaridade">Escolaridade</label>
          <select name="escolaridade" required>
            <option value="Ensino Fundamental">Ensino Fundamental</option>
            <option value="Ensino Médio">Ensino Médio</option>
            <option value="Curso Técnico">Ensino Técnico</option>
            <option value="Graduação">Graduação</option>
            <option value="Pós-Graduação">Pós-Graduação</option>
            <option value="Mestrado">Mestrado</option>
            <option value="Doutorado">Doutorado</option>
            <option value="Outro">Outro</option>
          </select>
        </div>

        <div>
          <label for="observacoes">Observações</label>
          <input type="text" name="observacoes" placeholder="Digite suas observações (opcional)" required>
        </div>

        <div>
          <label for="arquivo">Arquivo</label>
          <input type="file" name="arquivo" accept=".doc, .docx, .pdf" required>
        </div>

        <div>
          <label for="data_envio">Data e hora do envio</label>
          <input type="datetime-local" name="data_envio" required>
        </div>

        <button class="btn" type="submit">Enviar currículo</button>
      </form>
    </div>
  </div>
  <script src="/js/script.js"></script>
</body>

</html>
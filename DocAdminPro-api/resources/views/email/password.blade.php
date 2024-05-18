<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Envio de Email Para Recuperação de Senha</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }
    .email-container {
      width: 100%;
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
    }
    .email-container h1 {
      color: #444;
    }
    .email-container p {
      color: #666;
      line-height: 1.5;
    }
    .code {
      background-color: #f4f4f4;
      padding: 10px;
      border: 1px solid #ddd;
      display: inline-block;
      margin: 10px 0;
      font-size: 16px;
    }
  </style>
</head>
<body>
  <div class="email-container">
    <h1>Recuperação de Senha</h1>
    <p>Olá, {{ $name }},</p>
    <p>Aqui está o seu código de recuperação de senha:</p>
    <p class="code">{{ $code }}</p>
    <p>Se você não solicitou a recuperação de senha, por favor, ignore este email.</p>
    <p>Atenciosamente,</p>
    <p>DocAdminPro</p>
  </div>
</body>
</html>
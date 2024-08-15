<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ticket de Pago</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }
        .container {
            width: 100%;
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
            font-size: 14px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 18px;
            margin: 0;
        }
        .header p {
            margin: 5px 0;
        }
        .details {
            margin-bottom: 20px;
            line-height: 1.6;
        }
        .details p {
            margin: 0;
        }
        .details .total {
            font-weight: bold;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>CLINICA CUIDARTE</h1>
            <p><strong>TEL.:</strong> 123456789</p>
            <p><strong>DATE:</strong> {{ $consulta->created_at->format('d/m/Y') }}</p>
        </div>
        <div class="details">
            <p><strong>Médico:</strong> {{ $consulta->medico->nombre }}</p>
            <p><strong>Paciente:</strong> {{ $consulta->paciente->nombre }}</p>
            <p><strong>TOTAL:</strong> ${{ number_format($consulta->total, 2) }}</p>
        </div>
        <div class="footer">
            <p>GRACIAS</p>
        </div>
    </div>
</body>
</html>

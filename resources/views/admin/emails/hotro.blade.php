<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Hỗ trợ khách hàng - {{ config('app.name', 'Laravel') }}</title>
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
            }
            p {
                margin-top: 3px;
                margin-bottom: 3px;
            }
        </style>
    </head>
    <body>
        <p>Xin chào {{ $lienhe->email }}</p>
        <p>Xin cảm ơn bạn đã để lại yêu cầu hỗ trợ với {{ config('app.name', 'Laravel') }}.</p>
        <p>- Nội dung hỗ trợ: <strong>{{ $lienhe->noidung }}</strong></p>
        <p>- Phản hồi từ cửa hàng: <strong>{{ $lienhe->phanhoi }}</strong></p>
  
        <p>Trân trọng,</p>
        <p>{{ config('app.name', 'Laravel') }}</p>
    </body>
</html>
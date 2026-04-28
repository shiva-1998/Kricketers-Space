<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Tournament Report</title>

    <style>
        @page {
            margin: 20px 25px 80px 25px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
        }

        /* WATERMARK */
        .watermark {
            position: fixed;
            top: 35%;
            left: 20%;
            width: 350px;
            opacity: 0.06;
            transform: rotate(-25deg);
        }

        /* HEADER */
        .header {
            border-bottom: 3px solid #0b0827;
            margin-bottom: 15px;
            padding-bottom: 10px;
        }

        .logo {
            width: 60px;
        }

        .title {
            font-size: 20px;
            font-weight: bold;
            color: #0b0827;
        }

        .right {
            float: right;
            text-align: right;
            font-size: 11px;
        }

        /* CARD */
        .card {
            border: 1px solid #e5e5e5;
            padding: 12px;
            margin-bottom: 12px;
            border-radius: 6px;
        }

        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #0b0827;
            color: #fff;
            padding: 8px;
            font-size: 11px;
        }

        td {
            padding: 8px;
            border-bottom: 1px solid #eee;
            font-size: 11px;
        }

        /* STATUS */
        .success {
            color: green;
            font-weight: bold;
        }

        .failed {
            color: red;
            font-weight: bold;
        }

        /* FOOTER */
        .footer {
            position: fixed;
            bottom: -50px;
            text-align: center;
            font-size: 10px;
            color: #777;
        }

        @page {
            margin: 20px;
        }

        .footer:after {
            content: "Page " counter(page);
        }

        .badge-success {
            background: #d4edda;
            padding: 3px 6px;
            border-radius: 4px;
        }
    </style>
</head>

<body>

    <!-- WATERMARK -->
    <img src="{{ public_path('assets/frontend/img/logo/logo.webp') }}" class="watermark">

    <!-- HEADER -->
    <div class="header">

        <div style="float:left;">
            <img src="{{ public_path('assets/frontend/img/logo/logo.webp') }}" class="logo">
        </div>

        <div style="float:left; margin-left:10px;">
            <div class="title">Kricketers Space</div>
            <div>Tournament Transaction Report</div>
        </div>

        <div class="right">
            <strong>Date:</strong> {{ date('d M Y') }} <br>
            <strong>Tournament:</strong> {{ $tournament->name }}
        </div>

        <div style="clear: both;"></div>
    </div>

    <!-- SUMMARY -->
    <div class="card">
        <strong>Registration Start:</strong> {{ date('d M Y', strtotime($tournament->registration_start)) }} <br>
        <strong>Registration End:</strong> {{ date('d M Y', strtotime($tournament->registration_end)) }} <br>
        <strong>Total Teams:</strong> {{ $totalTeams }} <br>
        <strong>Total Revenue:</strong> ₹ {{ number_format($payments->where('status', 'success')->sum('amount'), 2) }}
    </div>

    <!-- TABLE -->
    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Team</th>
                    <th>Email</th>
                    {{-- <th>Order ID</th>
                    <th>Payment ID</th> --}}
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($payments as $key => $payment)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $payment->player->team_name }}</td>
                        <td>{{ $payment->player->email }}</td>
                        {{-- <td>{{ $payment->razorpay_order_id ?? '-' }}</td>
                        <td>{{ $payment->razorpay_payment_id ?? '-' }}</td> --}}
                        <td>₹ {{ number_format($payment->amount, 2) }}</td>

                        <td class="{{ $payment->status == 'success' ? 'success' : 'failed' }}">
                            {{ ucfirst($payment->status) }}
                        </td>

                        <td>{{ date('d M Y', strtotime($payment->created_at)) }}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <!-- FOOTER -->
    <div class="footer">
        <hr>
        <strong>Kricketers Space</strong> |
        Tournament Management System |
        Generated on {{ date('d M Y h:i A') }}
    </div>

</body>

</html>

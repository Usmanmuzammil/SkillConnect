<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Congratulations on Joining <?php
                        $setting = App\Models\Setting::where('key', 'name')->get()->first();
                        if ($setting) {
                            echo $setting->value;
                        } else {
                            echo 'Brand name not found';
                        }
                        ?></title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        .email-wrapper {
            width: 100%;
            max-width: 700px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #4CAF50;
            color: #ffffff;
            padding: 20px;
            border-radius: 8px 8px 0 0;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }

        .content {
            padding: 30px;
            text-align: left;
            color: #333;
        }

        .content p {
            line-height: 1.6;
            font-size: 16px;
        }

        .table {
            margin-top: 20px;
            width: 100%;
            border-collapse: collapse;
        }

        .table td {
            padding: 8px;
            font-size: 16px;
            border-bottom: 1px solid #f2f2f2;
        }

        .table th {
            padding: 10px;
            font-size: 18px;
            text-align: left;
            background-color: #f2f2f2;
        }

        .footer {
            background-color: #f8f9fa;
            text-align: center;
            padding: 20px;
            font-size: 14px;
            color: #888;
            border-radius: 0 0 8px 8px;
        }

        .button {
            display: inline-block;
            padding: 12px 25px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #45a049;
        }

    </style>
</head>
<body>
    <div class="email-wrapper">
        <!-- Header Section -->
        <div class="header">
            <h1>Congratulations on Joining <?php
                        $setting = App\Models\Setting::where('key', 'name')->get()->first();
                        if ($setting) {
                            echo $setting->value;
                        } else {
                            echo 'Brand name not found';
                        }
                        ?>!</h1>
            <p>We are thrilled to welcome you to our faculty family.</p>
        </div>

        <!-- Content Section -->
        <div class="content">
            <p>Dear {{ $name }},</p>

            <p>We are excited to officially welcome you to <strong><?php
                        $setting = App\Models\Setting::where('key', 'name')->get()->first();
                        if ($setting) {
                            echo $setting->value;
                        } else {
                            echo 'Brand name not found';
                        }
                        ?></strong>! Your expertise and passion for teaching will be an invaluable asset to our institution and students.</p>

            <p>As a part of our faculty, you will help shape the future of our students, inspire them to pursue greatness, and contribute to the success of our college.</p>

            <p>Here are the details of your registration:</p>

            <!-- Registration Details Table -->
            <table class="table">
                <tr>
                    <th>Name:</th>
                    <td>{{ $name }}</td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>{{ $email }}</td>
                </tr>
                <tr>
                    <th>Desgination:</th>
                    <td>{{ $desgination }}</td>
                </tr>
            </table>

            <p>We look forward to your contributions and hope that you find your time with us both fulfilling and rewarding. If you have any questions or need support, don’t hesitate to reach out!</p>


            <p>Once again, congratulations on becoming a part of our esteemed institution!</p>

            <p>Best regards,</p>
            <p>The <?php
                        $setting = App\Models\Setting::where('key', 'name')->get()->first();
                        if ($setting) {
                            echo $setting->value;
                        } else {
                            echo 'Brand name not found';
                        }
                        ?> Team</p>
        </div>

        <!-- Footer Section -->
        <div class="footer">
            <p>&copy; {{ date('Y') }} <?php
                        $setting = App\Models\Setting::where('key', 'name')->get()->first();
                        if ($setting) {
                            echo $setting->value;
                        } else {
                            echo 'Brand name not found';
                        }
                        ?>. All rights reserved.</p>
        </div>
    </div>
</body>
</html>

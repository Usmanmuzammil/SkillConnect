<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to <?php
        $setting = App\Models\Setting::where('key', 'name')->get()->first();
        if ($setting) {
            echo $setting->value;
        } else {
            echo 'Brand name not found';
        }
        ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .email-wrapper {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
        }
        .header {
            text-align: center;
            background-color: #4CAF50;
            color: #ffffff;
            padding: 15px;
            border-radius: 8px 8px 0 0;
        }
        .content {
            padding: 20px;
            text-align: left;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #888;
            padding: 10px;
            margin-top: 20px;
            border-top: 1px solid #eee;
        }
        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
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
            <h1>Welcome to <?php
                $setting = App\Models\Setting::where('key', 'name')->get()->first();
                if ($setting) {
                    echo $setting->value;
                } else {
                    echo 'Brand name not found';
                }
                ?></h1>
        </div>

        <!-- Content Section -->
        <div class="content">
            <p>Dear {{ $name }},</p>

            <p>Thank you for registering at <strong><?php
                $setting = App\Models\Setting::where('key', 'name')->get()->first();
                if ($setting) {
                    echo $setting->value;
                } else {
                    echo 'Brand name not found';
                }
                ?></strong>. We're excited to have you as a part of our community!</p>
                    <p>As a member of our college, you will always stay up-to-date with the latest happenings, events, seminars, and much more!</p>

            <p>Here are your registration details:</p>

            <table>
                <tr>
                    <td><strong>Name:</strong></td>
                    <td>{{ $name }}</td>
                </tr>
                <tr>
                    <td><strong>Email:</strong></td>
                    <td>{{ $email }}</td>
                </tr>
                <tr>
                    <td><strong>College:</strong></td>
                    <td><?php
                        $setting = App\Models\Setting::where('key', 'name')->get()->first();
                        if ($setting) {
                            echo $setting->value;
                        } else {
                            echo 'Brand name not found';
                        }
                        ?></td>
                </tr>
            </table>

            <p>If you have any questions or need further assistance, feel free to contact us.</p>
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

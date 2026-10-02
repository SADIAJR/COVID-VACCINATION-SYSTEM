<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset PIN</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f3f4f6; margin: 0; padding: 0; }
        .wrapper { max-width: 520px; margin: 40px auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.08); }
        .header { background: linear-gradient(135deg, #1c1c2e, #2d2d44); padding: 32px; text-align: center; }
        .header h1 { color: #ffffff; margin: 0; font-size: 22px; font-weight: 700; }
        .header p { color: #9ca3af; margin: 6px 0 0; font-size: 13px; }
        .body { padding: 36px 32px; }
        .body p { color: #374151; font-size: 15px; line-height: 1.6; margin: 0 0 16px; }
        .pin-box { background: #f9fafb; border: 2px dashed #d1d5db; border-radius: 12px; text-align: center; padding: 24px; margin: 24px 0; }
        .pin-box .label { font-size: 12px; color: #6b7280; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px; }
        .pin-box .pin { font-size: 48px; font-weight: 800; color: #1c1c2e; letter-spacing: 12px; }
        .note { background: #fef9c3; border-left: 4px solid #facc15; padding: 12px 16px; border-radius: 6px; font-size: 13px; color: #854d0e; margin-top: 20px; }
        .footer { background: #f9fafb; padding: 20px 32px; text-align: center; border-top: 1px solid #e5e7eb; }
        .footer p { color: #9ca3af; font-size: 12px; margin: 0; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h1>Covid Vaccination Portal</h1>
            <p>Password Reset Request</p>
        </div>
        <div class="body">
            <p>Hello,</p>
            <p>We received a request to reset your password. Use the 5-digit PIN below to verify your identity:</p>

            <div class="pin-box">
                <div class="label">Your PIN</div>
                <div class="pin">{{ $pin }}</div>
            </div>

            <div class="note">
                ⚠️ This PIN is valid for <strong>10 minutes only</strong>. Do not share it with anyone.
            </div>

            <p style="margin-top: 20px;">If you did not request a password reset, please ignore this email. Your account remains secure.</p>
        </div>
        <div class="footer">
            <p>© {{ date('Y') }} Covid Vaccination Portal — Pakistan</p>
        </div>
    </div>
</body>
</html>

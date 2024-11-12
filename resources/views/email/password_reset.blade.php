<!DOCTYPE html>
<html>
<head>
  <title>Forgot Password</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
      color: #444;
    }
    .email-container {
      max-width: 600px;
      margin: 30px auto;
      background-color: #ffffff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }
    .header {
      text-align: center;
      padding: 10px 0;
      color: #0073e6;
      font-size: 24px;
      font-weight: bold;
      border-bottom: 1px solid #e0e0e0;
    }
    .content {
      margin: 30px 0;
      font-size: 16px;
      line-height: 1.6;
      color: #666;
    }
    .button-container {
      text-align: center;
      margin: 30px 0;
    }
    .button {
      padding: 14px 28px;
      font-size: 18px;
      color: #ffffff;
      background-color: #0073e6;
      text-decoration: none;
      border-radius: 5px;
      transition: background-color 0.3s;
    }
    .button:hover {
      background-color: #005bb5;
    }
    .footer {
      font-size: 12px;
      color: #999;
      text-align: center;
      margin-top: 30px;
      border-top: 1px solid #e0e0e0;
      padding-top: 20px;
    }
    .footer a {
      color: #0073e6;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <div class="email-container">
    <div class="header">Password Reset Request</div>
    
    <input type="hidden" name='email' value="{{$mailData['email']}}">

    <div class="content">
      <p>Hi {{$mailData['name']}},</p>
      <p>We received a request to reset your password. Simply click the button below to create a new password:</p>
    </div>
    <div class="button-container">
      <a href="{{route('forget-password-token',$mailData['token'])}}" class="button">Reset Password</a>
    </div>
    <div class="content">
      <p>If you did not request a password reset, please disregard this email or reach out to our support team if you have any questions.</p>
      <p>Best regards,<br>The Support Team</p>
    </div>
    <div class="footer">
      <p>If the button doesn’t work, please copy and paste the following link into your browser:</p>
      <p><a href="{{route('forget-password-token',$mailData['token'])}}">{{route('forget-password-token',$mailData['token'])}}</a></p>
    </div>
  </div>
</body>
</html>

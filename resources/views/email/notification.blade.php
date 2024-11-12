<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Notification</title>
    <style>
        body {
            background: #E0F2FE; /* Light blue gradient */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        .container {
            background: #FFFFFF;
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            font-size: 24px;
            font-weight: bold;
            color: #4A5568; /* Gray-800 */
            margin-bottom: 15px;
        }
        .subheader {
            font-size: 20px;
            color: #2B6CB0; /* Blue-600 */
            border-bottom: 2px solid #CBD5E0; /* Gray-300 */
            padding-bottom: 5px;
            margin-bottom: 10px;
        }
        .details {
            background: #EBF8FF; /* Blue-50 */
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 15px;
            transition: background 0.3s ease;
        }
        .details:hover {
            background: #BEE3F8; /* Hover effect */
        }
        .details span {
            font-weight: bold;
            color: #2C5282; /* Blue-800 */
        }
        .applicant-details {
            background: #F0FFF4; /* Green-50 */
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 15px;
            transition: background 0.3s ease;
        }
        .applicant-details:hover {
            background: #C6F6D5; /* Hover effect */
        }
        .footer {
            font-size: 10px;
            color: #A0AEC0; /* Gray-500 */
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="header">Hello {{$mailData['employer']->name}},</h1>
        <p>{{$mailData['user']->name}} has applied for the job you posted. Here are the details:</p>

        <h2 class="subheader">Job Details</h2>
        <div class="details">
            <p><span>Job Title:</span> {{$mailData['job']->title}}</p>
            <p><span>Vacancy:</span> {{$mailData['job']->vacancy}}</p>
            <p><span>Location:</span> {{$mailData['job']->location}}</p>
            <p><span>Salary:</span> {{$mailData['job']->salary}}</p>
        </div>

        <h2 class="subheader">Applicant Details</h2>
        <div class="applicant-details">
            <p><span>Name:</span> {{$mailData['user']->name}}</p>
            <p><span>Email:</span> {{$mailData['user']->email}}</p>
            <p><span>Phone:</span> {{$mailData['user']->mobile}}</p>
            <p><span>Designation:</span> {{$mailData['user']->designation}}</p>
        </div>

        <p class="footer">This is an automated email. Please do not reply.</p>
    </div>
</body>
</html>

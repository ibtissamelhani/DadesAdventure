<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>email</title>
    <style>
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .email-container main {
            font-family: Arial, sans-serif;
        }

        .email-container h2 {
            color: #b41212;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .email-container p {
            color: #0d0a0a;
            font-size: 16px;
            line-height: 1.5;
        }

        .email-container ul {
            list-style: none;
            padding: 0;
        }

        .email-container ul li {
            margin-bottom: 10px;
        }

        .email-container ul li strong {
            font-weight: bold;
        }

        .email-container ul li:last-child {
            margin-bottom: 0;
        }
    </style>
</head>

<body>
    <section class="email-container">
        <main>
            <h2>New Contact Form Submission</h2>
    
            <p>
                You have received a new message through the contact form on your website. Here are the details:
            </p>
            <ul>
                <li><strong>Name:</strong> {{ $formData['firstName'] }} {{ $formData['lastName'] }}</li>
                <li><strong>Email:</strong> {{ $formData['email'] }}</li>
                <li><strong>Message:</strong> <br>{{ $formData['message'] }}</li>
            </ul>
        </main>
    </section>
</body>

</html>

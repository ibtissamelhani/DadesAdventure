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
            margin-left: 32px; 
        }

        .email-container p {
            color: #1c1616;
            font-size: 16px;
            line-height: 1.5;
        }

        .email-container ul {
            list-style: none;
            padding: 0;
            margin-bottom: 16px;
            margin-top: 16px;
        }

        .email-container ul li {
            margin-bottom: 16px;
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

            <h2>Welcome to DadesAdventures!</h2>
            <ul>
                <li><strong>Message:</strong> <br>



                    Dear {{ $user['first_name'] }} {{ $user['last_name'] }}<br>

                    Welcome to our community! You're the heart of our adventures, sharing stories and creating
                    unforgettable memories.

                    Your expertise and passion make each journey special. We're here to support you every step of the
                    way.<br>

                    Let's inspire exploration together!<br>

                    Warm regards,<br>

                    [Ibtissam of DadesAdventures]</li>
                <li><strong>Authentication Credentials </strong></li>

                <li><strong>Email:</strong> {{ $user['email'] }}</li>
                <li><strong>Password:</strong> {{ $password }}</li>
            </ul>
        </main>
    </section>
</body>

</html>

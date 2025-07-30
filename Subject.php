<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Attendance Course Selection</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #f0f4f8, #d9e2ec);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .form-container {
      background: white;
      padding: 40px 30px;
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
      width: 90%;
      max-width: 400px;
      text-align: center;
    }

    .form-container h2 {
      margin-bottom: 25px;
      color: #333;
    }

    .btn {
      width: 100%;
      padding: 15px;
      font-size: 16px;
      margin: 10px 0;
      border: none;
      border-radius: 8px;
      background-color: #007bff;
      color: white;
      cursor: pointer;
      transition: background 0.3s ease, transform 0.2s ease;
    }

    .btn:hover {
      background-color: #0056b3;
      transform: translateY(-2px);
    }
  </style>
</head>
<body>

  <div class="form-container">
    <h2>🎓 Select Your Teaching SUBJECT</h2>
    <button class="btn" onclick="location.href='login.php'">JAVA</button>
    <button class="btn" onclick="location.href='login1.php'">PHP</button>
  </div>

</body>
</html>

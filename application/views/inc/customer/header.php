<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title : 'Customer Hub - Coffee Shop'; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css">
    <?php if (isset($additional_css)): ?>
        <?php foreach ($additional_css as $css): ?>
            <link rel="stylesheet" href="<?php echo $css; ?>">
        <?php endforeach; ?>
    <?php endif; ?>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
            color: #333;
        }
        .navbar {
            background: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 1rem 0;
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: #8B4513 !important;
        }
        .hero-section {
            background: linear-gradient(135deg, #8B4513 0%, #D2691E 100%);
            color: white;
            padding: 80px 0;
            text-align: center;
        }
        .hero-section h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .hero-section p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }
        .btn-primary-custom {
            background: #fff;
            color: #8B4513;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            border: none;
            transition: all 0.3s;
        }
        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            color: #8B4513;
        }
        .section {
            padding: 60px 0;
        }
        .card-custom {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: all 0.3s;
            height: 100%;
        }
        .card-custom:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }
        .icon-box {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #8B4513, #D2691E);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            margin-bottom: 20px;
        }
        .points-display {
            background: linear-gradient(135deg, #8B4513, #D2691E);
            color: white;
            padding: 40px;
            border-radius: 20px;
            text-align: center;
        }
        .points-value {
            font-size: 4rem;
            font-weight: 700;
            margin: 20px 0;
        }
        .tier-badge {
            display: inline-block;
            padding: 8px 20px;
            background: rgba(255,255,255,0.2);
            border-radius: 50px;
            font-weight: 600;
            margin-top: 10px;
        }
        .progress-custom {
            height: 10px;
            border-radius: 10px;
            background: rgba(255,255,255,0.3);
            margin-top: 20px;
        }
        .progress-bar-custom {
            background: white;
            border-radius: 10px;
        }
        .receipt-card {
            border-left: 4px solid #8B4513;
            padding: 20px;
            margin-bottom: 15px;
            background: #fff;
            border-radius: 10px;
            transition: all 0.3s;
        }
        .receipt-card:hover {
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transform: translateX(5px);
        }
        .feature-box {
            text-align: center;
            padding: 30px 20px;
        }
        .feature-box i {
            font-size: 3rem;
            color: #8B4513;
            margin-bottom: 20px;
        }
        .faq-item {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .faq-question {
            font-weight: 600;
            color: #8B4513;
            margin-bottom: 10px;
        }
        .testimonial-card {
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            margin-bottom: 20px;
        }
        .testimonial-text {
            font-style: italic;
            color: #666;
            margin-bottom: 15px;
            font-size: 1.1rem;
        }
        .testimonial-author {
            font-weight: 600;
            color: #8B4513;
        }
        .footer {
            background: #2c3e50;
            color: white;
            padding: 40px 0;
            margin-top: 60px;
        }
        .btn-secondary-custom {
            background: #8B4513;
            color: white;
            padding: 10px 25px;
            border-radius: 50px;
            font-weight: 600;
            border: none;
            transition: all 0.3s;
        }
        .btn-secondary-custom:hover {
            background: #D2691E;
            color: white;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>


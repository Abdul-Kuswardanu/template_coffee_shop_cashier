<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title . ' - Kasir Coffee Shop' : 'Kasir Coffee Shop'; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/style/css/styles.css'); ?>">
    <?php if (isset($page_css)): ?>
        <?php foreach ($page_css as $css): ?>
            <link rel="stylesheet" href="<?php echo $css; ?>">
        <?php endforeach; ?>
    <?php endif; ?>
    <style>
        :root {
            --bg-soft: #f7f9fc;
            --bg-card: #ffffff;
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --text-main: #0f172a;
            --text-muted: #475569;
            --border: #e2e8f0;
            --accent: #f97316;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f8fbff 0%, #eef2ff 45%, #fdf2f8 100%);
            min-height: 100vh;
            margin: 0;
            color: var(--text-main);
        }
        
        .main-header {
            background: rgba(255, 255, 255, 0.95);
            border-bottom: 1px solid rgba(226, 232, 240, 0.6);
            box-shadow: 0 2px 10px rgba(15, 23, 42, 0.05);
        }
        .navbar-nav .nav-link {
            color: #495057;
        }
        .navbar-nav .nav-link:hover {
            color: #2563eb;
        }
        .dropdown-menu .dropdown-item {
            padding: 10px 16px;
            transition: all 0.2s ease;
        }
        .dropdown-menu .dropdown-item:hover {
            background: #f8fafc;
            padding-left: 20px;
        }
        .dropdown-menu .dropdown-item i {
            width: 20px;
            margin-right: 8px;
        }

        a {
            text-decoration: none;
        }

        .kasir-app {
            padding: 32px clamp(20px, 3vw, 48px);
        }

        .kasir-topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(226, 232, 240, 0.6);
            border-radius: 18px;
            padding: 18px 24px;
            box-shadow: 0 20px 45px rgba(15, 23, 42, 0.08);
            backdrop-filter: blur(10px);
        }

        .kasir-brand {
            display: flex;
            gap: 14px;
            align-items: center;
        }

        .kasir-brand span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: #fef3c7;
            color: #b45309;
            font-weight: 700;
            font-size: 1.2rem;
        }

        .kasir-brand div strong {
            display: block;
            font-size: 1.1rem;
        }

        .kasir-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .kasir-actions a.hero-link {
            padding: 10px 18px;
            border-radius: 999px;
            border: 1px solid var(--border);
            color: var(--text-main);
            font-weight: 500;
            background: #fff;
        }

        .kasir-actions button {
            border: none;
            border-radius: 999px;
            padding: 11px 22px;
            font-weight: 600;
            cursor: pointer;
            background: var(--primary);
            color: #fff;
            transition: background 0.25s ease;
        }

        .kasir-actions button:hover {
            background: var(--primary-dark);
        }

        .kasir-status {
            margin-top: 24px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
            gap: 12px;
        }

        .kasir-status span {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 18px;
            border-radius: 999px;
            background: rgba(37, 99, 235, 0.08);
            color: var(--primary-dark);
            font-size: 0.9rem;
            font-weight: 500;
        }

        .kasir-grid {
            margin-top: 28px;
            display: grid;
            grid-template-columns: minmax(0, 1.6fr) minmax(320px, 0.95fr);
            gap: 24px;
        }

        .kasir-card {
            background: var(--bg-card);
            border-radius: 24px;
            padding: 24px;
            box-shadow: 0 22px 60px rgba(15, 23, 42, 0.08);
            border: 1px solid rgba(148, 163, 184, 0.2);
        }

        .kasir-card h2 {
            margin: 0 0 16px;
            font-size: 1.25rem;
        }

        .kasir-filter {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 18px;
        }

        .kasir-filter input,
        .kasir-filter select {
            flex: 1;
            min-width: 180px;
            border-radius: 14px;
            border: 1px solid var(--border);
            padding: 11px 16px;
            font-size: 0.95rem;
            background: #f8fafc;
        }

        .kasir-categories {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 18px;
        }

        .kasir-categories button {
            border: 1px solid var(--border);
            border-radius: 999px;
            background: #fff;
            padding: 8px 16px;
            font-size: 0.9rem;
            color: var(--text-muted);
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .kasir-categories button.active {
            background: #dbeafe;
            color: var(--primary);
            border-color: #93c5fd;
        }

        .kasir-products {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: 18px;
        }

        .kasir-product {
            border: 1px solid rgba(226, 232, 240, 0.8);
            border-radius: 20px;
            padding: 16px;
            background: linear-gradient(160deg, #ffffff, #f8fbff);
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .kasir-product:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 35px rgba(15, 23, 42, 0.12);
        }

        .kasir-product small {
            color: var(--text-muted);
        }

        .kasir-product strong {
            display: block;
            margin: 8px 0 4px;
            font-size: 1rem;
        }

        .kasir-product button {
            width: 100%;
            border: none;
            border-radius: 12px;
            padding: 10px 0;
            font-weight: 600;
            background: var(--primary);
            color: #fff;
            cursor: pointer;
        }

        .kasir-order {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .kasir-cart table {
            width: 100%;
            border-collapse: collapse;
        }

        .kasir-cart th,
        .kasir-cart td {
            padding: 10px 0;
            border-bottom: 1px dashed rgba(148, 163, 184, 0.4);
            font-size: 0.95rem;
        }

        .kasir-cart td:last-child {
            text-align: right;
        }

        .qty-pill {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 28px;
            border-radius: 40px;
            background: #f1f5f9;
            font-weight: 600;
            font-size: 0.85rem;
        }

        .kasir-totals {
            background: #0f172a;
            color: #fff;
            border-radius: 20px;
            padding: 18px;
        }

        .kasir-totals div {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        .kasir-totals div:last-child {
            font-size: 1.3rem;
            font-weight: 600;
            margin-top: 12px;
        }

        .kasir-payment {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 10px;
        }

        .kasir-payment button {
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 12px;
            background: #fff;
            font-weight: 600;
            cursor: pointer;
            transition: border 0.2s ease, box-shadow 0.2s ease;
        }

        .kasir-payment button.active {
            border-color: var(--primary);
            color: var(--primary);
            box-shadow: 0 12px 30px rgba(37, 99, 235, 0.2);
        }

        .kasir-actions-panel {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            gap: 12px;
        }

        .kasir-actions-panel button {
            border: none;
            border-radius: 16px;
            padding: 14px;
            font-weight: 600;
            cursor: pointer;
            color: #fff;
        }

        .btn-cancel {
            background: #f43f5e;
            box-shadow: 0 12px 30px rgba(244, 63, 94, 0.35);
        }

        .btn-hold {
            background: #fbbf24;
            color: #7c2d12;
            box-shadow: 0 12px 30px rgba(251, 191, 36, 0.35);
        }

        .btn-pay {
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            box-shadow: 0 12px 35px rgba(37, 99, 235, 0.4);
        }

        @media (max-width: 1100px) {
            .kasir-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body class="hold-transition">
<div class="wrapper">


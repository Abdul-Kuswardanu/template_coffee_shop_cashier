<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title : 'AdminLTE - Coffee Shop Admin'; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css">
    <?php if (isset($additional_css)): ?>
        <?php foreach ($additional_css as $css): ?>
            <link rel="stylesheet" href="<?php echo $css; ?>">
        <?php endforeach; ?>
    <?php endif; ?>
    <style>
        .navbar-nav .nav-link.active {
            background: rgba(37, 99, 235, 0.1);
            color: #2563eb !important;
            border-radius: 8px;
            font-weight: 600;
        }
        .navbar-nav .nav-link:hover {
            background: rgba(37, 99, 235, 0.05);
            border-radius: 8px;
        }
        .navbar-nav .nav-link i {
            margin-right: 6px;
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
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


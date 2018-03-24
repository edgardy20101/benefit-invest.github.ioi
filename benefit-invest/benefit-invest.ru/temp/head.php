<!DOCTYPE html>
<!--[if IE 8]>     <html class="no-js ie ie8 lte9 lte8"> <![endif]-->
<!--[if IE 9]>     <html class="no-js ie ie9 lte9"> <![endif]-->
<!--[if gt IE 9]>  <html class="no-js"> <![endif]-->
<!--[if !IE]><!--> <html class="no-js"> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Benefit-Invest</title>
    <meta name="description" content="0">
    <meta name="viewport" content="width=device-width, initial-scale=0.85">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">

    <!-- Icons & favicons -->
    <link rel="apple-touch-icon" href="/assets/images/apple-icon-touch.png">
    <link rel="icon" href="/assets/images/favicon.png">
    <!--[if IE]>
        <link rel="shortcut icon" href="assets/images/favicon.ico">
    <![endif]-->

    <!-- Stylesheet -->
    <link rel="stylesheet" href="/assets/styles/css/app.css">
    <link rel="stylesheet" class="color-switcher" href="/assets/styles/css/app.css">


<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    
    <!-- Modernizr -->
    <script src="/assets/js/modernizr.min.js"></script>
</head>
<body class="index parallax-title">

    <!-- SITE CONTENT -->

    <div id="site-content">

        <!-- Header -->

        <header class="app-header" id="app-header">
    <div class="container">
        <div class="header-wrapper">
            <!-- Logo -->
            <div class="logo" id="logo">
                <!-- image logo -->
                <a href="/" class="image-logo">
                    <img src="/assets/images/logo.png" alt="0" />
                </a>
                <!-- HTML logo -->
                <a href="/" class="html-logo"><i class="fa fa-square-o"></i> Benefit-Invest</a>
            </div>
            <!-- Main-Nav -->
                            <nav class="main-nav">
                    <ul>
                        <!-- Dropdown Nav -->
                        <li>
                            <a href="/">Главная</a>
                        </li>
						<li>
                            <a href="/#about">О Проекте</a>
                        </li>
						<li>
                            <a href="https://vk.com/benefitinvestt" target="_blank">Новости</a>
                        </li>
						<li>
						<li>
                            <a href="https://vk.com/benefitinvestt" target="_blank">Отзывы</a>
                        </li>
						<li>
                            <a href="/index.php?a=faq">F.A.Q.</a>
                        </li>
						<li>
                            <a href="/index.php?a=rules">Правила</a>
                        </li>
						<li>
                            <a href="/index.php?a=support">Контакты</a>
                        </li>
                    </ul>
                </nav>
                    </div>
    </div>
</header>


<?php if(isset($sess)) { ?>
<?PHP if(isset($_GET['a'])) { ?>



       <!-- Sub-Header -->

        <section class="hero sub-header">
    <div class="container inactive">
        <div class="sh-title-wrapper">
            <h1>Личный кабинет</h1>
            <p>В этом разделе Вы сможете увидеть информаци о своих счетах.</p>
        </div>
    </div>
</section>

        
<section class="section primary welcome inactive" id="s-welcome">
    <div class="container">

<center>
<a href="/index.php?a=profile" class="button brand-1"><i class="fa fa-user"></i> Аккаунт</a>
<a href="/index.php?a=history" class="button brand-1"><i class="fa fa-list"></i> Мои вклады</a>
<a href="/index.php?a=deposit" class="button brand-1"><i class="fa fa-plus-square"></i> Вложить</a>
<a href="/index.php?a=deposit&paysys=reinvest" class="button brand-1"><i class="fa fa-plus"></i> Реинвест</a>
<a href="/index.php?a=payment" class="button brand-1"><i class="fa fa-minus"></i> Вывести</a>
<a href="/index.php?a=tickets" class="button brand-1"><i class="fa fa-cog"></i> Тикеты</a>
<a href="/index.php?a=ref" class="button brand-1"><i class="fa fa-users"></i> Рефералы</a>
<a href="/index.php?a=exit" class="button brand-1"><i class="fa fa-sign-out"></i> Выйти</a>
</center>

<BR />	
	
<BR />

</div>


<?PHP } } ?>
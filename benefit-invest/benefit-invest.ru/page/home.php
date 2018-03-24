<section class="hero inactive">
    <div class="container">
        <div class="title-wrapper">
            <div class="hero-title">
                <h2>BENEFIT-INVEST</h2>
                <h3>Один из лучших проектов в текущем году!</h3>
            </div>
            <div class="meta">
                <p class="blurb">Не нужно думать, нужно действовать. Твоя судьба зависит только от тебя.</p>
<? if(!$sess) { ?>
				                <a href="/index.php?a=auth" class="button round brand-1">Авторизироватся</a>
                <a href="/index.php?a=reg" class="button round border">Зарегистрироватся</a>
		<? } else { ?>

				                <a href="/index.php?a=profile" class="button round brand-1">Аккаунт</a>
                <a href="/index.php?a=exit" class="button round border">Выход</a>

<? } ?>


									
                            </div>
        </div>
    </div>
</section>
        <!-- Main Content -->



$ball = $stats['invest'] + $stats['finvest'];


        <section class="stats row block-columns">
    <div class="stat span-3">
        <i class="livicon" data-n="users" data-c="#ffffff" data-op="1" data-s="68" data-hc="false"></i>
        <h4><span id="stat-1" data-val="<?=$stats['users'] + $stats['fusers']; ?>">0</span></h4>
        <p>Участников</p>
    </div>
    <div class="stat span-3">
        <i class="livicon" data-n="money" data-c="#ffffff" data-op="1" data-s="68" data-hc="false"></i>
        <h4><span id="stat-2"><?=number_format($stats['invest'] + $stats['finvest'], 0, ',', ' ');?></span></h4>
        <p>Пополнили
    </div>
    <div class="stat span-3">
        <i class="livicon" data-n="money" data-c="#ffffff" data-op="1" data-s="68" data-hc="false"></i>
        <h4><span id="stat-4"><?=number_format($stats['pay'] + $stats['fpay'], 0, ',', ' ');?></span></h4>
        <p>Вывели</p>
    </div>
    <div class="stat span-3">
        <i class="livicon" data-n="money" data-c="#ffffff" data-op="1" data-s="68" data-hc="false"></i>
        <h4><span id="stat-3"><?=$lst_depo['summa']; ?></span></h4>
        <p>Новый вклад
    </div>
</section>





        <section class="section services primary section-map inactive" id="about">
    <div class="container">
        <header class="sep active">
            <div class="section-title">







<h1>До старта проекта осталось:</h1>

<center><script type="text/javascript" src="http://www.timegenerator.ru/s/2ad1d8c3b0d8d87e95c52918dd553953.js"></script></center>

</br>


                <h2>Почему именно <strong>мы?</strong><i class="fa fa-trophy"></i></h2>
            </div>
            <p class="sub-text">Benefit-Invest - Это высокодходный инструмент, позволящий каждому человеку увеличить свой капитал в разумные сроки. Вам нужно лишь выбрать инвестиционный портфель. После этого вы будете получать до 100% чистой прибыли в сутки до тех пор, пока не решите вывести свой депозит.</p>
        </header>
        <div class="owl-carousel services-slider">
            <div class="widget service">
                <div class="widget-content">
                    <header>
                        <i class="livicon" data-n="phone" data-op="1" data-c="#C1C1C1" data-s="48" data-hc="false"></i>
                        <div class="title">
                            <h4>Поддержка</h4>
                        </div>
                    </header>
                    <p>Адекватная служба поддержки ответит вам в течении 2 часов и подробно проконсультирует по всем вопросам!</p>
                </div>
            </div>
            <div class="widget service">
                <div class="widget-content">
                    <header>
                        <i class="livicon" data-n="image" data-op="1" data-c="#C1C1C1" data-s="48" data-hc="false"></i>
                        <div class="title">
                            <h4>Интерфейс</h4>
                        </div>
                    </header>
                    <p>Яркий интуитивно понятный интерфейс поможет вам быстрее заинтересовать партнера принять участие в проекте!</p>
                </div>
            </div>
            <div class="widget service">
                <div class="widget-content">
                    <header>
                        <i class="livicon" data-n="globe" data-op="1" data-c="#C1C1C1" data-s="48" data-hc="false"></i>
                        <div class="title">
                            <h4>Высокая защита</h4>
                        </div>
                    </header>
                    <p>Все Ваши данные зашифрованы и надежно хранятся в базе данных проекта на отдельно защищенном сервере.</p>
                </div>
            </div>
			<div class="widget service">
                <div class="widget-content">
                    <header>
                        <i class="livicon" data-n="money" data-op="1" data-c="#C1C1C1" data-s="48" data-hc="false"></i>
                        <div class="title">
                            <h4>Быстрые выплаты</h4>
                        </div>
                    </header>
                    <p>Мы выплачиваем реально высокие проценты от вклада вашего партнера в самые кротчайшие сроки.</p>
                </div>
            </div>
			<div class="widget service">
                <div class="widget-content">
                    <header>
                        <i class="livicon" data-n="clock" data-op="1" data-c="#C1C1C1" data-s="48" data-hc="false"></i>
                        <div class="title">
                            <h4>Время-деньги</h4>
                        </div>
                    </header>
                    <p>Ваш реферальный доход мы выплатим максимально быстро не создавая не оправданных, долгих и нудных задержек.</p>
                </div>
            </div>
        </div>
        <div class="nav-carousel">
            <div class="icon-round-border-lrg nav-prev">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="icon-round-border-lrg nav-next">
                <i class="fa fa-angle-right"></i>
            </div>
        </div>
    </div>
</section>
        
        <section class="section primary pricing inactive" id="s-pricing">
    <div class="container">
        <header class="sep active">
            <div class="section-title">
                <h2>Наши <i>тарифы</i></h2>
            </div>
            <p>Работая с нами Вы сможете гарантированно получать прибыль.</p>
        </header>
        <div class="row price-charts">
            <div class="span-4 price-chart-container">
                <div class="price-chart free">
                    <h4>Start</h4>
                    
                    <div class="price">
                        <span>120 %</span>
                    </div>
                    <ul>
                        <li><span>Мин. сумма</span><strong>100</strong></li>
                        <li><span>Макс. сумма</span><strong>1999</strong></li>
                        <li><span>Срок</span><strong>3 дней</strong></li>
                    </ul>
                    <div class="buy-now">
                        <a href="/index.php?a=auth" class="button brand-1 full-width"><i class="fa fa-shopping-cart"></i> Вложить</a>
                    </div>
                </div>
            </div>
            <div class="span-4 price-chart-container">                    
                <div class="price-chart">                    
                    <div class="ribbon ribbon-large">
                        <div class="banner">
                            <div class="text">Лучший выбор!</div>
                        </div>
                    </div>
                    <h4>Basic</h4>
                    
                    <div class="price">
                        <span>150 %</span>
                    </div>
                    <ul>
                        <li><span>Мин. сумма</span><strong>2000</strong></li>
                        <li><span>Макс. сумма</span><strong>5999</strong></li>
                        <li><span>Срок</span><strong>5 дней</strong></li>
                    </ul>
                    <div class="buy-now">
                        <a href="/index.php?a=auth" class="button brand-1 full-width"><i class="fa fa-shopping-cart"></i> Вложить</a>
                    </div>
                </div>
            </div>
            <div class="span-4 price-chart-container">
                <div class="price-chart">
                    <h4>Pro <i class="fa fa-trophy"></i></h4>
                    
                    <div class="price">
                        <span>220 %</span>
                    </div>
                    <ul>
                        <li><span>Мин. сумма</span><strong>6000</strong></li>
                        <li><span>Макс. сумма</span><strong>15000</strong></li>
                        <li><span>Срок</span><strong>10 дней</strong></li>
                    </ul>
                    <div class="buy-now">
                        <a href="/index.php?a=auth" class="button brand-1 full-width"><i class="fa fa-shopping-cart"></i> Вложить</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

        <section class="section quote">
    <div class="container">
        <blockquote class="active">            




<img src="123.png" alt="">



			
        </blockquote>
    </div>
</section>
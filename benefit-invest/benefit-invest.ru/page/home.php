<section class="hero inactive">
    <div class="container">
        <div class="title-wrapper">
            <div class="hero-title">
                <h2>BENEFIT-INVEST</h2>
                <h3>���� �� ������ �������� � ������� ����!</h3>
            </div>
            <div class="meta">
                <p class="blurb">�� ����� ������, ����� �����������. ���� ������ ������� ������ �� ����.</p>
<? if(!$sess) { ?>
				                <a href="/index.php?a=auth" class="button round brand-1">���������������</a>
                <a href="/index.php?a=reg" class="button round border">�����������������</a>
		<? } else { ?>

				                <a href="/index.php?a=profile" class="button round brand-1">�������</a>
                <a href="/index.php?a=exit" class="button round border">�����</a>

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
        <p>����������</p>
    </div>
    <div class="stat span-3">
        <i class="livicon" data-n="money" data-c="#ffffff" data-op="1" data-s="68" data-hc="false"></i>
        <h4><span id="stat-2"><?=number_format($stats['invest'] + $stats['finvest'], 0, ',', ' ');?></span></h4>
        <p>���������
    </div>
    <div class="stat span-3">
        <i class="livicon" data-n="money" data-c="#ffffff" data-op="1" data-s="68" data-hc="false"></i>
        <h4><span id="stat-4"><?=number_format($stats['pay'] + $stats['fpay'], 0, ',', ' ');?></span></h4>
        <p>������</p>
    </div>
    <div class="stat span-3">
        <i class="livicon" data-n="money" data-c="#ffffff" data-op="1" data-s="68" data-hc="false"></i>
        <h4><span id="stat-3"><?=$lst_depo['summa']; ?></span></h4>
        <p>����� �����
    </div>
</section>





        <section class="section services primary section-map inactive" id="about">
    <div class="container">
        <header class="sep active">
            <div class="section-title">







<h1>�� ������ ������� ��������:</h1>

<center><script type="text/javascript" src="http://www.timegenerator.ru/s/2ad1d8c3b0d8d87e95c52918dd553953.js"></script></center>

</br>


                <h2>������ ������ <strong>��?</strong><i class="fa fa-trophy"></i></h2>
            </div>
            <p class="sub-text">Benefit-Invest - ��� ������������� ����������, ���������� ������� �������� ��������� ���� ������� � �������� �����. ��� ����� ���� ������� �������������� ��������. ����� ����� �� ������ �������� �� 100% ������ ������� � ����� �� ��� ���, ���� �� ������ ������� ���� �������.</p>
        </header>
        <div class="owl-carousel services-slider">
            <div class="widget service">
                <div class="widget-content">
                    <header>
                        <i class="livicon" data-n="phone" data-op="1" data-c="#C1C1C1" data-s="48" data-hc="false"></i>
                        <div class="title">
                            <h4>���������</h4>
                        </div>
                    </header>
                    <p>���������� ������ ��������� ������� ��� � ������� 2 ����� � �������� ���������������� �� ���� ��������!</p>
                </div>
            </div>
            <div class="widget service">
                <div class="widget-content">
                    <header>
                        <i class="livicon" data-n="image" data-op="1" data-c="#C1C1C1" data-s="48" data-hc="false"></i>
                        <div class="title">
                            <h4>���������</h4>
                        </div>
                    </header>
                    <p>����� ���������� �������� ��������� ������� ��� ������� �������������� �������� ������� ������� � �������!</p>
                </div>
            </div>
            <div class="widget service">
                <div class="widget-content">
                    <header>
                        <i class="livicon" data-n="globe" data-op="1" data-c="#C1C1C1" data-s="48" data-hc="false"></i>
                        <div class="title">
                            <h4>������� ������</h4>
                        </div>
                    </header>
                    <p>��� ���� ������ ����������� � ������� �������� � ���� ������ ������� �� �������� ���������� �������.</p>
                </div>
            </div>
			<div class="widget service">
                <div class="widget-content">
                    <header>
                        <i class="livicon" data-n="money" data-op="1" data-c="#C1C1C1" data-s="48" data-hc="false"></i>
                        <div class="title">
                            <h4>������� �������</h4>
                        </div>
                    </header>
                    <p>�� ����������� ������� ������� �������� �� ������ ������ �������� � ����� ���������� �����.</p>
                </div>
            </div>
			<div class="widget service">
                <div class="widget-content">
                    <header>
                        <i class="livicon" data-n="clock" data-op="1" data-c="#C1C1C1" data-s="48" data-hc="false"></i>
                        <div class="title">
                            <h4>�����-������</h4>
                        </div>
                    </header>
                    <p>��� ����������� ����� �� �������� ����������� ������ �� �������� �� �����������, ������ � ������ ��������.</p>
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
                <h2>���� <i>������</i></h2>
            </div>
            <p>������� � ���� �� ������� �������������� �������� �������.</p>
        </header>
        <div class="row price-charts">
            <div class="span-4 price-chart-container">
                <div class="price-chart free">
                    <h4>Start</h4>
                    
                    <div class="price">
                        <span>120 %</span>
                    </div>
                    <ul>
                        <li><span>���. �����</span><strong>100</strong></li>
                        <li><span>����. �����</span><strong>1999</strong></li>
                        <li><span>����</span><strong>3 ����</strong></li>
                    </ul>
                    <div class="buy-now">
                        <a href="/index.php?a=auth" class="button brand-1 full-width"><i class="fa fa-shopping-cart"></i> �������</a>
                    </div>
                </div>
            </div>
            <div class="span-4 price-chart-container">                    
                <div class="price-chart">                    
                    <div class="ribbon ribbon-large">
                        <div class="banner">
                            <div class="text">������ �����!</div>
                        </div>
                    </div>
                    <h4>Basic</h4>
                    
                    <div class="price">
                        <span>150 %</span>
                    </div>
                    <ul>
                        <li><span>���. �����</span><strong>2000</strong></li>
                        <li><span>����. �����</span><strong>5999</strong></li>
                        <li><span>����</span><strong>5 ����</strong></li>
                    </ul>
                    <div class="buy-now">
                        <a href="/index.php?a=auth" class="button brand-1 full-width"><i class="fa fa-shopping-cart"></i> �������</a>
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
                        <li><span>���. �����</span><strong>6000</strong></li>
                        <li><span>����. �����</span><strong>15000</strong></li>
                        <li><span>����</span><strong>10 ����</strong></li>
                    </ul>
                    <div class="buy-now">
                        <a href="/index.php?a=auth" class="button brand-1 full-width"><i class="fa fa-shopping-cart"></i> �������</a>
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
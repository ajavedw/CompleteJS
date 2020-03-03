<!-- Tour Popup -->
<?php //include($_SERVER['COSNET_WP_PATH'] . '/wp-content/themes/cosresponsive_v1/include_pages/cos_tour_popup.php') ?>

<script src="<?php echo $_SESSION['asset_url']; ?>/scripts_resp/Chart.js"></script>
<script src="<?php echo $_SESSION['asset_url']; ?>/scripts_resp/countUp.js"></script>
<script src="<?php echo $_SESSION['asset_url']; ?>/scripts_resp/legend.js"></script>
<script src="<?php echo $_SESSION['asset_url']; ?>/scripts_resp/Chart.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['asset_url']; ?>/scripts/jquery.tools.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">My Dashboard</li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="row">
            <div class="col-xs-12">
                <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                    <header id="my-element">
                        <h1>My Dashboard Change</h1>
                    </header>
                    <div class="content">
                        <div class="admin-message">
                            <?php
			$segment = $_SESSION['cust_segment'];
			$dashboardMessage = $dashboard->getWelcomeMessage();
			if($_SESSION["SessionOrderType"]=="BO")
			{
				echo "<p><div><h2>Hi ". ucwords(strtolower($_SESSION['first_name'])). ",</h2></div></p>";
				echo "Back to School is upon us and we're excited to be offering you an online solution. You are ordering your back to school requirements for future delivery commencing from 2nd September 2019 to 28th February 2020. Orders will require a 3 week processing time. Our friendly customer relations team are available for any questions. At COS Education, we are investing in our Australian communities' playground of the future & we thank you for your order.";
			}
			else if(!empty($dashboardMessage)){
				if ($_SESSION['co_branding'] == 'MURU')
					echo "<p><div><h2>Hi ". ucwords(strtolower($_SESSION['first_name'])). ", Welcome to MURU.</h2></div></p>";
				else
					echo "<p><div><h2>Hi ". ucwords(strtolower($_SESSION['first_name'])). ".</h2></div></p>";
				echo $dashboardMessage;
				}
				else

			{
				$welcomemsg="";
				if ($_SESSION['co_branding'] == 'MURU')
					$welcomemsg = "<p><div><h2>Hi ". ucwords(strtolower($_SESSION['first_name'])). ", </br>Welcome to your MURU dashboard!</h2><p>Muru, meaning pathway is a socially active and wholly Indigenous owned office supplier. When you purchase a Muru product, you are directly helping to create pathways for future generations within Indigenous communities. </p></div></p>";
				else
					$welcomemsg = "<p><div><h2>Hi ". ucwords(strtolower($_SESSION['first_name'])). ".</h2></div></p>";
				echo $welcomemsg;
				$orderedBefore=false;
				if(((int)$CountOrderValues['TotalOrders']) > 0)
					$orderedBefore=true;
				if ($segment=='D') //Business
				{
					if(!$orderedBefore)
						query_posts('post_type=admin-message&p=7685');
					else
					query_posts('post_type=admin-message&p=2581');
				}
				else if ($segment=='L') //Corporate
				{
					if(!$orderedBefore)
						query_posts('post_type=admin-message&p=9805');
				else
						query_posts('post_type=admin-message&p=9804');
				}
				else if ($segment=='S') //Enterprise
				{
					if(!$orderedBefore)
						query_posts('post_type=admin-message&p=9807');
					else
						query_posts('post_type=admin-message&p=9803');
				}
				else if ($segment=='G') //Government
				{
					if(!$orderedBefore)
						query_posts('post_type=admin-message&p=9808');
					else
					query_posts('post_type=admin-message&p=2582');
				}
				else if ($segment=='U') //Education
				{
					if(!$orderedBefore)
						query_posts('post_type=admin-message&p=9809');
					else
						query_posts('post_type=admin-message&p=9810 ');
				}
				else //Should never happen
				{
					query_posts('post_type=admin-message&p=7685');
				}
				while (have_posts()): the_post();
				the_content();
				endwhile;
			}
		?>
                        </div>



                    </div>
                    <!-- /.content -->
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-4 sidebar-wrapper">
                    <?php if ( $segment == 'D' && ((int)$CountOrderValues['TotalOrders']) == 0){ ?>
                    <div>
                        <h2>Why COS?</h2>
                        <?php 	query_posts('post_type=admin-message&p=7684');   // Dev message id = 5885 :::  Prod message 7684
                          while (have_posts()): the_post();
                              the_content();
                          endwhile;
                          ?>
                    </div>
                    <?php } else {
                      if ($_SESSION['punchout_usrlogin'] == 'Y' || $_SESSION['SessionType'] != 'OCI') {?>
                    <h2 class="tour-quicklinks">Quick Links</h2>

                    <a href="/index.html?pg=basketlist" class="btn btn-mycosnet quicklinks" id="favouriteslink"><i
                            class="fa fa-heart"></i>&nbsp; My Favourites</a>
                    <a href="/index.html?pg=ordertracking&tab=3" class="btn btn-mycosnet quicklinks" id="returnslink"><i
                            class="fa fa-reply"></i>&nbsp; Returns</a>
                    <a href="/index.html?pg=order" class="btn btn-md btn-success quicklinks" id="viewCartlink"><i
                            class="fa fa-cart-plus"></i>&nbsp;&nbsp;&nbsp;View Cart</a>


                    <?php if($_SESSION['printondemand_access'] == 'Y') {?>
                    <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/index.html?pg=printmainmenu"
                        class="btn btn-mycosnet quicklinks" id="printondemandlink"><span
                            class="icon-white icon-print-on-demand"></span>&nbsp; Print On Demand</a>
                    <?php }?>
                    <?php if ($display_custspecific) { ?>
                    <a href="/c/customer-stock/" class="btn btn-mycosnet quicklinks " id="customerstocklink"><span
                            class="icon-white icon-customer-stock"></span>&nbsp; Customer Stock</a>
                    <?php } ?>
                    <!-- Diaries -->
                    <!-- <a href="/c/diaries-and-planners/" class="btn btn-tonerfinder quicklinks"><span class="icon-white icon-diaries"></span>&nbsp; 2017 Diaries</a> -->
                    <?php if (($_SESSION['admin'] != 'N' && $_SESSION['admin'] != 'O' && $_SESSION['admin'] != 'E' && $_SESSION['yourprods_flag'] == 'Y' && $_SESSION['custspecific_exist'] == true) || $_SESSION['account_code'] == '.S COSDEMO'){?>
                    <a href="/index.html?pg=yourprodsonline" class="btn btn-mycosnet quicklinks"><span
                            class="fa fa-barcode"></span>&nbsp; Your Products Online</a>
                    <?php }?>

                    <?php }?>
                    <?php } ?>

                </div>
            </div>
        </div>
        <!-- /.col -->

        <div class="row mt-20 mb-20 ml-0 mr-0" style="-webkit-box-shadow: 0px 0px 3px 0px rgba(199,199,199,1);
-moz-box-shadow: 0px 0px 3px 0px rgba(199,199,199,1);
box-shadow: 0px 0px 3px 0px rgba(199,199,199,1); border-radius: 3px;">
            <div class="col-lg-2 mb-20 mb-25">
                <div class="row">
                    <div class="col-lg-12"><a class="f-18 c-red mb-10 mt-10 dis-show hand-cursor left-links-dashboard"
                            id="donut-chart" style="color:#1a99ce; font-weight: 500;"><i
                                class="fa fa-arrow-circle-right fw-5 mr-10 f-25" aria-hidden="true"></i><span>Order
                                Summary</span></a>
                    </div>
                    <div class="col-lg-12"><a class="f-18 c-red mb-10 mt-10 dis-show hand-cursor left-links-dashboard"
                            id="exclusive-offers" style="color:grey; font-weight: 400;"><i
                                class="fa fa-angle-right fw-5 mr-10 f-25" aria-hidden="true"></i><span>Exclusive
                                Offer</span><span class="pos-abs" style="background-color: red;
    color: white;
    border-radius: 50%;
 width: 15px;
                          height: 15px;
                          padding-left: 2.5%;
                          font-size: 11px;

">2</span>
                            <ul class="ml-20 offers-listings dis-none-imp">
                                <li class="f-14 ml-10 offers-list-dashboard hand-cursor" id="latest-offers"><a
                                        style="color:#1a99ce; font-weight: 500;">Latest Offers</a></li>
                                <li class="f-14 ml-10 offers-list-dashboard hand-cursor" id="previous-offers"><a
                                        style="color:grey;">Previous Offers</a></li>
                                <li class="f-14 ml-10 offers-list-dashboard hand-cursor" id="other-promotions"><a
                                        style="color:grey;">Other Promotions</a></li>
                            </ul>
                        </a>
                    </div>
                    <div class="col-lg-12"><a class="f-18 c-red mb-10 mt-10 dis-show hand-cursor left-links-dashboard"
                            id="top-20-items" style="color:grey; font-weight: 400;"><i
                                class="fa fa-angle-right fw-5 mr-10 f-25" aria-hidden="true"></i><span>Top 20
                                Items</span></a>
                    </div>
                    <div class="col-lg-12"><a class="f-18 c-red mb-10 mt-10 dis-show hand-cursor left-links-dashboard"
                            id="latest-updates" style="color:grey; font-weight: 400;"><i
                                class="fa fa-angle-right fw-5 mr-10 f-25" aria-hidden="true"></i><span>Latest
                                Updates</span> <span class="pos-abs" style="background-color: red;
    color: white;
    border-radius: 50%;
 width: 15px;
                          height: 15px;
                          padding-left: 2%;
                          font-size: 11px;

">2</span></a>
                    </div>
                    <div class="col-lg-12"><a class="f-18 c-red mb-10 mt-10 dis-show hand-cursor left-links-dashboard"
                            id="items-on-hold" style="color:grey; font-weight: 400;"><i
                                class="fa fa-angle-right fw-5 mr-10 f-25" aria-hidden="true"></i><span>Items on
                                Hold</span><span class="pos-abs" style="background-color: red;
                          color: white;
                          border-radius: 50%;
                          width: 15px;
                          height: 15px;
                          padding-left: 2.5%;
                          font-size: 11px;

                          ">2</span></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="row mr-0 ml-0">
                    <!-- Donut Chart Tabs -->
                    <div class="col-lg-12 col-md-8 col-sm-8 donut-chart">

                        <?php
                      $showdonut = false;

                      if (
                          ((int)$CountOrderValues['TotalOrders']) > 0 ||
                          ((int)$CountOrderValues['CountOrdersForMyApproval']) > 0
                      )
                          $showdonut = true;

                      if ($showdonut == true)
                          include 'static_templates_resp/cos_donut_chart_tabs.php';
                      ?>

                    </div>
                    <div class="col-lg-12 col-md-8 col-sm-8 pt-10 exclusive-offers dis-none-imp">
                        <div class="row latest-offers">
                            <div class="col-lg-12">
                                <p class="pt-5 pb-5 pl-10 f-15 c-white"
                                    style="border-radius: 3px;background-color: #0099cc;">Only for you!!! Buy today in
                                    <strong>Acer</strong> Laptops from our <strong>Technology</strong> store and get 10%
                                    off.</p>
                            </div>
                            <div id="carousel-for-dashboard" class="carousel slide" data-ride="carousel">
                                <!-- Left and right controls -->
                                <a class="pos-abs" style="left: -25px; top: 370px;" href="#carousel-for-dashboard"
                                    data-slide="prev">

                                    <i class="fa fa-arrow-circle-left fa-2x" aria-hidden="true"
                                        style="margin-left: 15px;"></i></a>

                                <div class="carousel-inner">
                                    <div class="item active">
                                        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs mb-10">
                                            <div class="col-item">
                                                <div class="row">
                                                    <div class="col-xs-12" style="position: relative;">
                                                        <div class="list-group-planet-friendly-carousel-6up c4spriteplanetfriendlygg"
                                                            width="35" height="35" title="Planet Friendly"
                                                            alt="Planet Friendly"></div>
                                                        <div class="photo-6up" style="z-index: 1; position: relative;">
                                                            <a href="http://wsdev02.cos.net.au/kitchen-and-catering/teas/Lipton-Green-Tea-Bags-TEAS5760"
                                                                class="product-detail-link"
                                                                rel="TEAS5760:25:Popular Products"><img width="100%"
                                                                    height="100%"
                                                                    src="https://dl2jx7zfbtwvr.cloudfront.net/Thumbnails/teas5760_1.jpg"
                                                                    class="img-responsive"
                                                                    alt="COS Lipton Green Tea Bags"></a>
                                                        </div>


                                                        <div class="product-name-6up   " title="Lipton Green Tea Bags">
                                                            <h3>
                                                                <a href="http://wsdev02.cos.net.au/kitchen-and-catering/teas/Lipton-Green-Tea-Bags-TEAS5760"
                                                                    class="product-detail-link"
                                                                    rel="TEAS5760:25:Popular Products">Lipton Green Tea
                                                                    Bags</a></h3>
                                                        </div>
                                                        <div class="product-code" name="stockcode"></div>
                                                        <div class="product-price">$11.59</div>
                                                        <div class="product-common"> / Pkt100</div>
                                                        <div class="input-group quantity-wrapper"><span
                                                                class="input-group-btn"> <button type="button"
                                                                    class="btn btn-circle btn-minus btn-number jqty"
                                                                    data-type="minus"
                                                                    onclick="minusClicked(TEAS5760Rem_QTY)"> <span
                                                                        class="glyphicon glyphicon-minus"></span>
                                                                </button> </span>
                                                            <input type="text" id="TEAS5760Rem_QTY" rel="509"
                                                                name="quantity[]"
                                                                class="form-control input-number input-sm quantity-style"
                                                                value="0" min="0"> <span class="input-group-btn">
                                                                <button type="button"
                                                                    class="btn btn-circle btn-addtocart btn-number"
                                                                    data-type="plus"
                                                                    onclick="plusClicked(TEAS5760Rem_QTY)"> <span
                                                                        class="glyphicon glyphicon-plus"></span>
                                                                </button> </span>
                                                        </div>
                                                        <a class="btn btn-addtocart btn-xs" name="addtotrolley"
                                                            rel="TEAS5760"
                                                            href="/index.html?pg=order&amp;cmd=add&amp;stock=TEAS5760"
                                                            onclick="event.preventDefault();addtocart(this,TEAS5760Rem_QTY,null,'Popular Products')"><i
                                                                class="fa fa-shopping-cart"></i>&nbsp; Add</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs mb-10">
                                            <div class="col-item">
                                                <div class="row">
                                                    <div class="col-xs-12" style="position: relative;">
                                                        <div class="photo-6up" style="z-index: 1; position: relative;">
                                                            <a href="http://wsdev02.cos.net.au/kitchen-and-catering/biscuits/Arnotts-Jatz-Original-Cracker-225g-BISC5970"
                                                                class="product-detail-link"
                                                                rel="BISC5970:26:Popular Products"><img width="100%"
                                                                    height="100%"
                                                                    src="https://dl2jx7zfbtwvr.cloudfront.net/Thumbnails/bisc5970_1.jpg"
                                                                    class="img-responsive"
                                                                    alt="COS Arnotts Jatz Original Cracker 225g"></a>
                                                        </div>

                                                        <div class="product-name-6up   "
                                                            title="Arnotts Jatz Original Cracker 225g">
                                                            <h3><a href="http://wsdev02.cos.net.au/kitchen-and-catering/biscuits/Arnotts-Jatz-Original-Cracker-225g-BISC5970"
                                                                    class="product-detail-link"
                                                                    rel="BISC5970:26:Popular Products">Arnotts
                                                                    Jatz
                                                                    Original Cracker 225g</a></h3>
                                                        </div>
                                                        <div class="product-code" name="stockcode"></div>
                                                        <div class="product-price">$3.66</div>
                                                        <div class="product-common"> + GST / Pkt</div>
                                                        <div class="input-group quantity-wrapper"><span
                                                                class="input-group-btn"> <button type="button"
                                                                    class="btn btn-circle btn-minus btn-number jqty"
                                                                    data-type="minus"
                                                                    onclick="minusClicked(BISC5970Rem_QTY)"> <span
                                                                        class="glyphicon glyphicon-minus"></span>
                                                                </button> </span>
                                                            <input type="text" id="BISC5970Rem_QTY" rel="71"
                                                                name="quantity[]"
                                                                class="form-control input-number input-sm quantity-style"
                                                                value="0" min="0"> <span class="input-group-btn">
                                                                <button type="button"
                                                                    class="btn btn-circle btn-addtocart btn-number"
                                                                    data-type="plus"
                                                                    onclick="plusClicked(BISC5970Rem_QTY)"> <span
                                                                        class="glyphicon glyphicon-plus"></span>
                                                                </button> </span>
                                                        </div>
                                                        <a class="btn btn-addtocart btn-xs" name="addtotrolley"
                                                            rel="BISC5970"
                                                            href="/index.html?pg=order&amp;cmd=add&amp;stock=BISC5970"
                                                            onclick="event.preventDefault();addtocart(this,BISC5970Rem_QTY,null,'Popular Products')"><i
                                                                class="fa fa-shopping-cart"></i>&nbsp; Add</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs mb-10">
                                            <div class="col-item">
                                                <div class="row">
                                                    <div class="col-xs-12" style="position: relative;">
                                                        <div class="photo-6up" style="z-index: 1; position: relative;">
                                                            <a href="http://wsdev02.cos.net.au/kitchen-and-catering/coffee-and-drinking-chocolate/Vittoria-Italian-Blend-Coffee-Beans-1kg-COFF1280"
                                                                class="product-detail-link"
                                                                rel="COFF1280:27:Popular Products"><img width="100%"
                                                                    height="100%"
                                                                    src="https://dl2jx7zfbtwvr.cloudfront.net/Thumbnails/coff1280_1.jpg"
                                                                    class="img-responsive"
                                                                    alt="COS Vittoria Italian Blend Coffee Beans 1kg"></a>
                                                        </div>

                                                        <div class="product-name-6up   "
                                                            title="Vittoria Italian Blend Coffee Beans 1kg">
                                                            <h3><a href="http://wsdev02.cos.net.au/kitchen-and-catering/coffee-and-drinking-chocolate/Vittoria-Italian-Blend-Coffee-Beans-1kg-COFF1280"
                                                                    class="product-detail-link"
                                                                    rel="COFF1280:27:Popular Products">Vittoria
                                                                    Italian
                                                                    Blend Coffee Beans 1kg</a></h3>
                                                        </div>
                                                        <div class="product-code" name="stockcode"></div>
                                                        <div class="product-price">$22.29</div>
                                                        <div class="product-common"> / Each</div>
                                                        <div class="input-group quantity-wrapper"><span
                                                                class="input-group-btn"> <button type="button"
                                                                    class="btn btn-circle btn-minus btn-number jqty"
                                                                    data-type="minus"
                                                                    onclick="minusClicked(COFF1280Rem_QTY)"> <span
                                                                        class="glyphicon glyphicon-minus"></span>
                                                                </button> </span>
                                                            <input type="text" id="COFF1280Rem_QTY" rel="123"
                                                                name="quantity[]"
                                                                class="form-control input-number input-sm quantity-style"
                                                                value="0" min="0"> <span class="input-group-btn">
                                                                <button type="button"
                                                                    class="btn btn-circle btn-addtocart btn-number"
                                                                    data-type="plus"
                                                                    onclick="plusClicked(COFF1280Rem_QTY)"> <span
                                                                        class="glyphicon glyphicon-plus"></span>
                                                                </button> </span>
                                                        </div>
                                                        <a class="btn btn-addtocart btn-xs" name="addtotrolley"
                                                            rel="COFF1280"
                                                            href="/index.html?pg=order&amp;cmd=add&amp;stock=COFF1280"
                                                            onclick="event.preventDefault();addtocart(this,COFF1280Rem_QTY,null,'Popular Products')"><i
                                                                class="fa fa-shopping-cart"></i>&nbsp; Add</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs mb-10">
                                            <div class="col-item">
                                                <div class="row">
                                                    <div class="col-xs-12" style="position: relative;">
                                                        <div class="photo-6up" style="z-index: 1; position: relative;">
                                                            <a href="http://wsdev02.cos.net.au/kitchen-and-catering/coffee-and-drinking-chocolate/Vittoria-Italian-Blend-Coffee-Beans-1kg-COFF1280"
                                                                class="product-detail-link"
                                                                rel="COFF1280:27:Popular Products"><img width="100%"
                                                                    height="100%"
                                                                    src="https://dl2jx7zfbtwvr.cloudfront.net/Thumbnails/coff1280_1.jpg"
                                                                    class="img-responsive"
                                                                    alt="COS Vittoria Italian Blend Coffee Beans 1kg"></a>
                                                        </div>

                                                        <div class="product-name-6up   "
                                                            title="Vittoria Italian Blend Coffee Beans 1kg">
                                                            <h3><a href="http://wsdev02.cos.net.au/kitchen-and-catering/coffee-and-drinking-chocolate/Vittoria-Italian-Blend-Coffee-Beans-1kg-COFF1280"
                                                                    class="product-detail-link"
                                                                    rel="COFF1280:27:Popular Products">Vittoria
                                                                    Italian
                                                                    Blend Coffee Beans 1kg</a></h3>
                                                        </div>
                                                        <div class="product-code" name="stockcode"></div>
                                                        <div class="product-price">$22.29</div>
                                                        <div class="product-common"> / Each</div>
                                                        <div class="input-group quantity-wrapper"><span
                                                                class="input-group-btn"> <button type="button"
                                                                    class="btn btn-circle btn-minus btn-number jqty"
                                                                    data-type="minus"
                                                                    onclick="minusClicked(COFF1280Rem_QTY)"> <span
                                                                        class="glyphicon glyphicon-minus"></span>
                                                                </button> </span>
                                                            <input type="text" id="COFF1280Rem_QTY" rel="123"
                                                                name="quantity[]"
                                                                class="form-control input-number input-sm quantity-style"
                                                                value="0" min="0"> <span class="input-group-btn">
                                                                <button type="button"
                                                                    class="btn btn-circle btn-addtocart btn-number"
                                                                    data-type="plus"
                                                                    onclick="plusClicked(COFF1280Rem_QTY)"> <span
                                                                        class="glyphicon glyphicon-plus"></span>
                                                                </button> </span>
                                                        </div>
                                                        <a class="btn btn-addtocart btn-xs" name="addtotrolley"
                                                            rel="COFF1280"
                                                            href="/index.html?pg=order&amp;cmd=add&amp;stock=COFF1280"
                                                            onclick="event.preventDefault();addtocart(this,COFF1280Rem_QTY,null,'Popular Products')"><i
                                                                class="fa fa-shopping-cart"></i>&nbsp; Add</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs mb-10">
                                            <div class="col-item">
                                                <div class="row">
                                                    <div class="col-xs-12" style="position: relative;">
                                                        <div class="list-group-planet-friendly-carousel-6up c4spriteplanetfriendlygg"
                                                            width="35" height="35" title="Planet Friendly"
                                                            alt="Planet Friendly"></div>
                                                        <div class="photo-6up" style="z-index: 1; position: relative;">
                                                            <a href="http://wsdev02.cos.net.au/kitchen-and-catering/teas/Lipton-Green-Tea-Bags-TEAS5760"
                                                                class="product-detail-link"
                                                                rel="TEAS5760:25:Popular Products"><img width="100%"
                                                                    height="100%"
                                                                    src="https://dl2jx7zfbtwvr.cloudfront.net/Thumbnails/teas5760_1.jpg"
                                                                    class="img-responsive"
                                                                    alt="COS Lipton Green Tea Bags"></a>
                                                        </div>


                                                        <div class="product-name-6up   " title="Lipton Green Tea Bags">
                                                            <h3>
                                                                <a href="http://wsdev02.cos.net.au/kitchen-and-catering/teas/Lipton-Green-Tea-Bags-TEAS5760"
                                                                    class="product-detail-link"
                                                                    rel="TEAS5760:25:Popular Products">Lipton Green Tea
                                                                    Bags</a></h3>
                                                        </div>
                                                        <div class="product-code" name="stockcode"></div>
                                                        <div class="product-price">$11.59</div>
                                                        <div class="product-common"> / Pkt100</div>
                                                        <div class="input-group quantity-wrapper"><span
                                                                class="input-group-btn"> <button type="button"
                                                                    class="btn btn-circle btn-minus btn-number jqty"
                                                                    data-type="minus"
                                                                    onclick="minusClicked(TEAS5760Rem_QTY)"> <span
                                                                        class="glyphicon glyphicon-minus"></span>
                                                                </button> </span>
                                                            <input type="text" id="TEAS5760Rem_QTY" rel="509"
                                                                name="quantity[]"
                                                                class="form-control input-number input-sm quantity-style"
                                                                value="0" min="0"> <span class="input-group-btn">
                                                                <button type="button"
                                                                    class="btn btn-circle btn-addtocart btn-number"
                                                                    data-type="plus"
                                                                    onclick="plusClicked(TEAS5760Rem_QTY)"> <span
                                                                        class="glyphicon glyphicon-plus"></span>
                                                                </button> </span>
                                                        </div>
                                                        <a class="btn btn-addtocart btn-xs" name="addtotrolley"
                                                            rel="TEAS5760"
                                                            href="/index.html?pg=order&amp;cmd=add&amp;stock=TEAS5760"
                                                            onclick="event.preventDefault();addtocart(this,TEAS5760Rem_QTY,null,'Popular Products')"><i
                                                                class="fa fa-shopping-cart"></i>&nbsp; Add</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs mb-10">
                                            <div class="col-item">
                                                <div class="row">
                                                    <div class="col-xs-12" style="position: relative;">
                                                        <div class="photo-6up" style="z-index: 1; position: relative;">
                                                            <a href="http://wsdev02.cos.net.au/kitchen-and-catering/biscuits/Arnotts-Jatz-Original-Cracker-225g-BISC5970"
                                                                class="product-detail-link"
                                                                rel="BISC5970:26:Popular Products"><img width="100%"
                                                                    height="100%"
                                                                    src="https://dl2jx7zfbtwvr.cloudfront.net/Thumbnails/bisc5970_1.jpg"
                                                                    class="img-responsive"
                                                                    alt="COS Arnotts Jatz Original Cracker 225g"></a>
                                                        </div>

                                                        <div class="product-name-6up   "
                                                            title="Arnotts Jatz Original Cracker 225g">
                                                            <h3><a href="http://wsdev02.cos.net.au/kitchen-and-catering/biscuits/Arnotts-Jatz-Original-Cracker-225g-BISC5970"
                                                                    class="product-detail-link"
                                                                    rel="BISC5970:26:Popular Products">Arnotts
                                                                    Jatz
                                                                    Original Cracker 225g</a></h3>
                                                        </div>
                                                        <div class="product-code" name="stockcode"></div>
                                                        <div class="product-price">$3.66</div>
                                                        <div class="product-common"> + GST / Pkt</div>
                                                        <div class="input-group quantity-wrapper"><span
                                                                class="input-group-btn"> <button type="button"
                                                                    class="btn btn-circle btn-minus btn-number jqty"
                                                                    data-type="minus"
                                                                    onclick="minusClicked(BISC5970Rem_QTY)"> <span
                                                                        class="glyphicon glyphicon-minus"></span>
                                                                </button> </span>
                                                            <input type="text" id="BISC5970Rem_QTY" rel="71"
                                                                name="quantity[]"
                                                                class="form-control input-number input-sm quantity-style"
                                                                value="0" min="0"> <span class="input-group-btn">
                                                                <button type="button"
                                                                    class="btn btn-circle btn-addtocart btn-number"
                                                                    data-type="plus"
                                                                    onclick="plusClicked(BISC5970Rem_QTY)"> <span
                                                                        class="glyphicon glyphicon-plus"></span>
                                                                </button> </span>
                                                        </div>
                                                        <a class="btn btn-addtocart btn-xs" name="addtotrolley"
                                                            rel="BISC5970"
                                                            href="/index.html?pg=order&amp;cmd=add&amp;stock=BISC5970"
                                                            onclick="event.preventDefault();addtocart(this,BISC5970Rem_QTY,null,'Popular Products')"><i
                                                                class="fa fa-shopping-cart"></i>&nbsp; Add</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs mb-10">
                                            <div class="col-item">
                                                <div class="row">
                                                    <div class="col-xs-12" style="position: relative;">
                                                        <div class="photo-6up" style="z-index: 1; position: relative;">
                                                            <a href="http://wsdev02.cos.net.au/kitchen-and-catering/coffee-and-drinking-chocolate/Vittoria-Italian-Blend-Coffee-Beans-1kg-COFF1280"
                                                                class="product-detail-link"
                                                                rel="COFF1280:27:Popular Products"><img width="100%"
                                                                    height="100%"
                                                                    src="https://dl2jx7zfbtwvr.cloudfront.net/Thumbnails/coff1280_1.jpg"
                                                                    class="img-responsive"
                                                                    alt="COS Vittoria Italian Blend Coffee Beans 1kg"></a>
                                                        </div>

                                                        <div class="product-name-6up   "
                                                            title="Vittoria Italian Blend Coffee Beans 1kg">
                                                            <h3><a href="http://wsdev02.cos.net.au/kitchen-and-catering/coffee-and-drinking-chocolate/Vittoria-Italian-Blend-Coffee-Beans-1kg-COFF1280"
                                                                    class="product-detail-link"
                                                                    rel="COFF1280:27:Popular Products">Vittoria
                                                                    Italian
                                                                    Blend Coffee Beans 1kg</a></h3>
                                                        </div>
                                                        <div class="product-code" name="stockcode"></div>
                                                        <div class="product-price">$22.29</div>
                                                        <div class="product-common"> / Each</div>
                                                        <div class="input-group quantity-wrapper"><span
                                                                class="input-group-btn"> <button type="button"
                                                                    class="btn btn-circle btn-minus btn-number jqty"
                                                                    data-type="minus"
                                                                    onclick="minusClicked(COFF1280Rem_QTY)"> <span
                                                                        class="glyphicon glyphicon-minus"></span>
                                                                </button> </span>
                                                            <input type="text" id="COFF1280Rem_QTY" rel="123"
                                                                name="quantity[]"
                                                                class="form-control input-number input-sm quantity-style"
                                                                value="0" min="0"> <span class="input-group-btn">
                                                                <button type="button"
                                                                    class="btn btn-circle btn-addtocart btn-number"
                                                                    data-type="plus"
                                                                    onclick="plusClicked(COFF1280Rem_QTY)"> <span
                                                                        class="glyphicon glyphicon-plus"></span>
                                                                </button> </span>
                                                        </div>
                                                        <a class="btn btn-addtocart btn-xs" name="addtotrolley"
                                                            rel="COFF1280"
                                                            href="/index.html?pg=order&amp;cmd=add&amp;stock=COFF1280"
                                                            onclick="event.preventDefault();addtocart(this,COFF1280Rem_QTY,null,'Popular Products')"><i
                                                                class="fa fa-shopping-cart"></i>&nbsp; Add</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs mb-10">
                                            <div class="col-item">
                                                <div class="row">
                                                    <div class="col-xs-12" style="position: relative;">
                                                        <div class="photo-6up" style="z-index: 1; position: relative;">
                                                            <a href="http://wsdev02.cos.net.au/kitchen-and-catering/coffee-and-drinking-chocolate/Vittoria-Italian-Blend-Coffee-Beans-1kg-COFF1280"
                                                                class="product-detail-link"
                                                                rel="COFF1280:27:Popular Products"><img width="100%"
                                                                    height="100%"
                                                                    src="https://dl2jx7zfbtwvr.cloudfront.net/Thumbnails/coff1280_1.jpg"
                                                                    class="img-responsive"
                                                                    alt="COS Vittoria Italian Blend Coffee Beans 1kg"></a>
                                                        </div>

                                                        <div class="product-name-6up   "
                                                            title="Vittoria Italian Blend Coffee Beans 1kg">
                                                            <h3><a href="http://wsdev02.cos.net.au/kitchen-and-catering/coffee-and-drinking-chocolate/Vittoria-Italian-Blend-Coffee-Beans-1kg-COFF1280"
                                                                    class="product-detail-link"
                                                                    rel="COFF1280:27:Popular Products">Vittoria
                                                                    Italian
                                                                    Blend Coffee Beans 1kg</a></h3>
                                                        </div>
                                                        <div class="product-code" name="stockcode"></div>
                                                        <div class="product-price">$22.29</div>
                                                        <div class="product-common"> / Each</div>
                                                        <div class="input-group quantity-wrapper"><span
                                                                class="input-group-btn"> <button type="button"
                                                                    class="btn btn-circle btn-minus btn-number jqty"
                                                                    data-type="minus"
                                                                    onclick="minusClicked(COFF1280Rem_QTY)"> <span
                                                                        class="glyphicon glyphicon-minus"></span>
                                                                </button> </span>
                                                            <input type="text" id="COFF1280Rem_QTY" rel="123"
                                                                name="quantity[]"
                                                                class="form-control input-number input-sm quantity-style"
                                                                value="0" min="0"> <span class="input-group-btn">
                                                                <button type="button"
                                                                    class="btn btn-circle btn-addtocart btn-number"
                                                                    data-type="plus"
                                                                    onclick="plusClicked(COFF1280Rem_QTY)"> <span
                                                                        class="glyphicon glyphicon-plus"></span>
                                                                </button> </span>
                                                        </div>
                                                        <a class="btn btn-addtocart btn-xs" name="addtotrolley"
                                                            rel="COFF1280"
                                                            href="/index.html?pg=order&amp;cmd=add&amp;stock=COFF1280"
                                                            onclick="event.preventDefault();addtocart(this,COFF1280Rem_QTY,null,'Popular Products')"><i
                                                                class="fa fa-shopping-cart"></i>&nbsp; Add</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <a class="pos-abs" href="#carousel-for-dashboard" data-slide="next"
                                    style="right: -13px; top: 370px;">
                                    <i class="fa fa-arrow-circle-right fa-2x" aria-hidden="true"
                                        style=" margin-left: 15px;"></i>
                                </a>
                            </div>
                        </div>
                        <div class="row previous-offers dis-none-imp">
                            <div class="col-lg-3 col-md-3 hidden-sm hidden-xs mb-10">
                                <div class="col-item">
                                    <div class="row">
                                        <div class="col-xs-12" style="position: relative;"><span
                                                class="tag-pink z-3 pos-abs">BONUS</span>
                                            <div class="photo-6up" style="z-index: 1; position: relative;"><a
                                                    href="http://wsdev02.cos.net.au/kitchen-and-catering/confectionery-and-snacks/Mentos-Mints-540g-CONF1170"
                                                    class="product-detail-link" rel="CONF1170:28:Popular Products"><img
                                                        width="100%" height="100%"
                                                        src="https://dl2jx7zfbtwvr.cloudfront.net/Thumbnails/conf1170_1.jpg"
                                                        class="img-responsive" alt="COS Mentos Mints 540g"></a>
                                            </div>

                                            <div class="product-name-6up   " title="Mentos Mints 540g">
                                                <h3><a href="http://wsdev02.cos.net.au/kitchen-and-catering/confectionery-and-snacks/Mentos-Mints-540g-CONF1170"
                                                        class="product-detail-link"
                                                        rel="CONF1170:28:Popular Products">Mentos
                                                        Mints
                                                        540g</a></h3>
                                            </div>
                                            <div class="product-code" name="stockcode"></div>
                                            <div class="product-price">$9.99</div>
                                            <div class="product-common"> + GST / Pkt</div>
                                            <div class="input-group quantity-wrapper"><span class="input-group-btn">
                                                    <button type="button"
                                                        class="btn btn-circle btn-minus btn-number jqty"
                                                        data-type="minus" onclick="minusClicked(CONF1170Rem_QTY)"> <span
                                                            class="glyphicon glyphicon-minus"></span> </button> </span>
                                                <input type="text" id="CONF1170Rem_QTY" rel="794" name="quantity[]"
                                                    class="form-control input-number input-sm quantity-style" value="0"
                                                    min="0"> <span class="input-group-btn"> <button type="button"
                                                        class="btn btn-circle btn-addtocart btn-number" data-type="plus"
                                                        onclick="plusClicked(CONF1170Rem_QTY)"> <span
                                                            class="glyphicon glyphicon-plus"></span> </button> </span>
                                            </div>
                                            <a class="btn btn-addtocart btn-xs" name="addtotrolley" rel="CONF1170"
                                                href="/index.html?pg=order&amp;cmd=add&amp;stock=CONF1170"
                                                onclick="event.preventDefault();addtocart(this,CONF1170Rem_QTY,null,'Popular Products')"><i
                                                    class="fa fa-shopping-cart"></i>&nbsp; Add</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-3 col-md-3 hidden-sm hidden-xs mb-10">
                                <div class="col-item">
                                    <div class="row">
                                        <div class="col-xs-12" style="position: relative;">
                                            <div class="list-group-planet-friendly-carousel-6up c4spriteplanetfriendlygg"
                                                width="35" height="35" title="Planet Friendly" alt="Planet Friendly">
                                            </div>
                                            <div class="photo-6up" style="z-index: 1; position: relative;"><a
                                                    href="http://wsdev02.cos.net.au/kitchen-and-catering/catering-and-disposable-party-supplies/Wooden-Stirrers-114mm-STIR8010"
                                                    class="product-detail-link" rel="STIR8010:29:Popular Products"><img
                                                        width="100%" height="100%"
                                                        src="https://dl2jx7zfbtwvr.cloudfront.net/Thumbnails/stir8010_1.jpg"
                                                        class="img-responsive" alt="COS Wooden Stirrers 114mm"></a>
                                            </div>

                                            <div class="product-name-6up   " title="Wooden Stirrers 114mm">
                                                <h3>
                                                    <a href="http://wsdev02.cos.net.au/kitchen-and-catering/catering-and-disposable-party-supplies/Wooden-Stirrers-114mm-STIR8010"
                                                        class="product-detail-link"
                                                        rel="STIR8010:29:Popular Products">Wooden Stirrers
                                                        114mm</a></h3>
                                            </div>
                                            <div class="product-code" name="stockcode"></div>
                                            <div class="product-price">$9.49</div>
                                            <div class="product-common"> + GST / Pkt1000</div>
                                            <div class="input-group quantity-wrapper"><span class="input-group-btn">
                                                    <button type="button"
                                                        class="btn btn-circle btn-minus btn-number jqty"
                                                        data-type="minus" onclick="minusClicked(STIR8010Rem_QTY)"> <span
                                                            class="glyphicon glyphicon-minus"></span> </button> </span>
                                                <input type="text" id="STIR8010Rem_QTY" rel="621" name="quantity[]"
                                                    class="form-control input-number input-sm quantity-style" value="0"
                                                    min="0"> <span class="input-group-btn"> <button type="button"
                                                        class="btn btn-circle btn-addtocart btn-number" data-type="plus"
                                                        onclick="plusClicked(STIR8010Rem_QTY)"> <span
                                                            class="glyphicon glyphicon-plus"></span> </button> </span>
                                            </div>
                                            <a class="btn btn-addtocart btn-xs" name="addtotrolley" rel="STIR8010"
                                                href="/index.html?pg=order&amp;cmd=add&amp;stock=STIR8010"
                                                onclick="event.preventDefault();addtocart(this,STIR8010Rem_QTY,null,'Popular Products')"><i
                                                    class="fa fa-shopping-cart"></i>&nbsp; Add</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-3 col-md-3 hidden-sm hidden-xs mb-10">
                                <div class="col-item">
                                    <div class="row">
                                        <div class="col-xs-12" style="position: relative;">
                                            <div class="photo-6up" style="z-index: 1; position: relative;"><a
                                                    href="http://wsdev02.cos.net.au/kitchen-and-catering/teas/Bushells-Blue-Label-Tea-Bags-Teapot-TEAS1110"
                                                    class="product-detail-link" rel="TEAS1110:30:Popular Products"><img
                                                        width="100%" height="100%"
                                                        src="https://dl2jx7zfbtwvr.cloudfront.net/Thumbnails/teas1110_1.jpg"
                                                        class="img-responsive"
                                                        alt="COS Bushells Blue Label Tea Bags Teapot"></a>
                                            </div>

                                            <div class="product-name-6up   "
                                                title="Bushells Blue Label Tea Bags Teapot">
                                                <h3><a href="http://wsdev02.cos.net.au/kitchen-and-catering/teas/Bushells-Blue-Label-Tea-Bags-Teapot-TEAS1110"
                                                        class="product-detail-link"
                                                        rel="TEAS1110:30:Popular Products">Bushells
                                                        Blue
                                                        Label Tea Bags Teapot</a></h3>
                                            </div>
                                            <div class="product-code" name="stockcode"></div>
                                            <div class="product-price">$48.48</div>
                                            <div class="product-common"> / Ctn1000</div>
                                            <div class="input-group quantity-wrapper"><span class="input-group-btn">
                                                    <button type="button"
                                                        class="btn btn-circle btn-minus btn-number jqty"
                                                        data-type="minus" onclick="minusClicked(TEAS1110Rem_QTY)"> <span
                                                            class="glyphicon glyphicon-minus"></span> </button> </span>
                                                <input type="text" id="TEAS1110Rem_QTY" rel="11" name="quantity[]"
                                                    class="form-control input-number input-sm quantity-style" value="0"
                                                    min="0"> <span class="input-group-btn"> <button type="button"
                                                        class="btn btn-circle btn-addtocart btn-number" data-type="plus"
                                                        onclick="plusClicked(TEAS1110Rem_QTY)"> <span
                                                            class="glyphicon glyphicon-plus"></span> </button> </span>
                                            </div>
                                            <a class="btn btn-addtocart btn-xs" name="addtotrolley" rel="TEAS1110"
                                                href="/index.html?pg=order&amp;cmd=add&amp;stock=TEAS1110"
                                                onclick="event.preventDefault();addtocart(this,TEAS1110Rem_QTY,null,'Popular Products')"><i
                                                    class="fa fa-shopping-cart"></i>&nbsp; Add</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-3"><a href="#" style="line-height: 300px; "><i
                                        class="fa fa-arrow-circle-right fa-6x" aria-hidden="true"
                                        style="font-size: 100px; margin-left: 15px;"></i></a></div>
                        </div>
                        <div class="row other-promotions dis-none-imp">
                            <div class="col-lg-3 col-md-3 hidden-sm hidden-xs mb-10">
                                <div class="col-item">
                                    <div class="row">
                                        <div class="col-xs-12" style="position: relative;">
                                            <div class="list-group-planet-friendly-carousel-6up c4spriteplanetfriendlygg"
                                                width="35" height="35" title="Planet Friendly" alt="Planet Friendly">
                                            </div>
                                            <div class="photo-6up" style="z-index: 1; position: relative;"><a
                                                    href="http://wsdev02.cos.net.au/kitchen-and-catering/catering-and-disposable-party-supplies/Wooden-Stirrers-114mm-STIR8010"
                                                    class="product-detail-link" rel="STIR8010:29:Popular Products"><img
                                                        width="100%" height="100%"
                                                        src="https://dl2jx7zfbtwvr.cloudfront.net/Thumbnails/stir8010_1.jpg"
                                                        class="img-responsive" alt="COS Wooden Stirrers 114mm"></a>
                                            </div>

                                            <div class="product-name-6up   " title="Wooden Stirrers 114mm">
                                                <h3>
                                                    <a href="http://wsdev02.cos.net.au/kitchen-and-catering/catering-and-disposable-party-supplies/Wooden-Stirrers-114mm-STIR8010"
                                                        class="product-detail-link"
                                                        rel="STIR8010:29:Popular Products">Wooden Stirrers
                                                        114mm</a></h3>
                                            </div>
                                            <div class="product-code" name="stockcode"></div>
                                            <div class="product-price">$9.49</div>
                                            <div class="product-common"> + GST / Pkt1000</div>
                                            <div class="input-group quantity-wrapper"><span class="input-group-btn">
                                                    <button type="button"
                                                        class="btn btn-circle btn-minus btn-number jqty"
                                                        data-type="minus" onclick="minusClicked(STIR8010Rem_QTY)"> <span
                                                            class="glyphicon glyphicon-minus"></span> </button> </span>
                                                <input type="text" id="STIR8010Rem_QTY" rel="621" name="quantity[]"
                                                    class="form-control input-number input-sm quantity-style" value="0"
                                                    min="0"> <span class="input-group-btn"> <button type="button"
                                                        class="btn btn-circle btn-addtocart btn-number" data-type="plus"
                                                        onclick="plusClicked(STIR8010Rem_QTY)"> <span
                                                            class="glyphicon glyphicon-plus"></span> </button> </span>
                                            </div>
                                            <a class="btn btn-addtocart btn-xs" name="addtotrolley" rel="STIR8010"
                                                href="/index.html?pg=order&amp;cmd=add&amp;stock=STIR8010"
                                                onclick="event.preventDefault();addtocart(this,STIR8010Rem_QTY,null,'Popular Products')"><i
                                                    class="fa fa-shopping-cart"></i>&nbsp; Add</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-3 col-md-3 hidden-sm hidden-xs mb-10">
                                <div class="col-item">
                                    <div class="row">
                                        <div class="col-xs-12" style="position: relative;">
                                            <div class="photo-6up" style="z-index: 1; position: relative;"><a
                                                    href="http://wsdev02.cos.net.au/kitchen-and-catering/biscuits/Arnotts-Jatz-Original-Cracker-225g-BISC5970"
                                                    class="product-detail-link" rel="BISC5970:26:Popular Products"><img
                                                        width="100%" height="100%"
                                                        src="https://dl2jx7zfbtwvr.cloudfront.net/Thumbnails/bisc5970_1.jpg"
                                                        class="img-responsive"
                                                        alt="COS Arnotts Jatz Original Cracker 225g"></a>
                                            </div>

                                            <div class="product-name-6up   " title="Arnotts Jatz Original Cracker 225g">
                                                <h3><a href="http://wsdev02.cos.net.au/kitchen-and-catering/biscuits/Arnotts-Jatz-Original-Cracker-225g-BISC5970"
                                                        class="product-detail-link"
                                                        rel="BISC5970:26:Popular Products">Arnotts
                                                        Jatz
                                                        Original Cracker 225g</a></h3>
                                            </div>
                                            <div class="product-code" name="stockcode"></div>
                                            <div class="product-price">$3.66</div>
                                            <div class="product-common"> + GST / Pkt</div>
                                            <div class="input-group quantity-wrapper"><span class="input-group-btn">
                                                    <button type="button"
                                                        class="btn btn-circle btn-minus btn-number jqty"
                                                        data-type="minus" onclick="minusClicked(BISC5970Rem_QTY)"> <span
                                                            class="glyphicon glyphicon-minus"></span> </button> </span>
                                                <input type="text" id="BISC5970Rem_QTY" rel="71" name="quantity[]"
                                                    class="form-control input-number input-sm quantity-style" value="0"
                                                    min="0"> <span class="input-group-btn"> <button type="button"
                                                        class="btn btn-circle btn-addtocart btn-number" data-type="plus"
                                                        onclick="plusClicked(BISC5970Rem_QTY)"> <span
                                                            class="glyphicon glyphicon-plus"></span> </button> </span>
                                            </div>
                                            <a class="btn btn-addtocart btn-xs" name="addtotrolley" rel="BISC5970"
                                                href="/index.html?pg=order&amp;cmd=add&amp;stock=BISC5970"
                                                onclick="event.preventDefault();addtocart(this,BISC5970Rem_QTY,null,'Popular Products')"><i
                                                    class="fa fa-shopping-cart"></i>&nbsp; Add</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 hidden-sm hidden-xs mb-10">
                                <div class="col-item">
                                    <div class="row">
                                        <div class="col-xs-12" style="position: relative;"><span
                                                class="tag-pink z-3 pos-abs">BONUS</span>
                                            <div class="photo-6up" style="z-index: 1; position: relative;"><a
                                                    href="http://wsdev02.cos.net.au/kitchen-and-catering/confectionery-and-snacks/Mentos-Mints-540g-CONF1170"
                                                    class="product-detail-link" rel="CONF1170:28:Popular Products"><img
                                                        width="100%" height="100%"
                                                        src="https://dl2jx7zfbtwvr.cloudfront.net/Thumbnails/conf1170_1.jpg"
                                                        class="img-responsive" alt="COS Mentos Mints 540g"></a>
                                            </div>

                                            <div class="product-name-6up   " title="Mentos Mints 540g">
                                                <h3><a href="http://wsdev02.cos.net.au/kitchen-and-catering/confectionery-and-snacks/Mentos-Mints-540g-CONF1170"
                                                        class="product-detail-link"
                                                        rel="CONF1170:28:Popular Products">Mentos
                                                        Mints
                                                        540g</a></h3>
                                            </div>
                                            <div class="product-code" name="stockcode"></div>
                                            <div class="product-price">$9.99</div>
                                            <div class="product-common"> + GST / Pkt</div>
                                            <div class="input-group quantity-wrapper"><span class="input-group-btn">
                                                    <button type="button"
                                                        class="btn btn-circle btn-minus btn-number jqty"
                                                        data-type="minus" onclick="minusClicked(CONF1170Rem_QTY)"> <span
                                                            class="glyphicon glyphicon-minus"></span> </button> </span>
                                                <input type="text" id="CONF1170Rem_QTY" rel="794" name="quantity[]"
                                                    class="form-control input-number input-sm quantity-style" value="0"
                                                    min="0"> <span class="input-group-btn"> <button type="button"
                                                        class="btn btn-circle btn-addtocart btn-number" data-type="plus"
                                                        onclick="plusClicked(CONF1170Rem_QTY)"> <span
                                                            class="glyphicon glyphicon-plus"></span> </button> </span>
                                            </div>
                                            <a class="btn btn-addtocart btn-xs" name="addtotrolley" rel="CONF1170"
                                                href="/index.html?pg=order&amp;cmd=add&amp;stock=CONF1170"
                                                onclick="event.preventDefault();addtocart(this,CONF1170Rem_QTY,null,'Popular Products')"><i
                                                    class="fa fa-shopping-cart"></i>&nbsp; Add</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-3"><a href="#" style="line-height: 300px; "><i
                                        class="fa fa-arrow-circle-right fa-6x" aria-hidden="true"
                                        style="font-size: 100px; margin-left: 15px;"></i></a></div>
                        </div>

                    </div>
                    <div class="col-lg-12 col-md-8 col-sm-8 pt-10 top-20-items dis-none-imp">
                        <div class="row mb-10">
                            <div class="col-lg-2 pl-0 ">
                                <button class="btn btn-md btn-mycosnet" style="min-width:160px;">Save Quantity</button>
                            </div>
                            <div class="col-lg-2  mr-15">
                                <button class="btn btn-md btn-mycosnet" style="min-width:160px;">Set Quantity to Zero
                                </button>
                            </div>
                            <div class="col-lg-2  mr-15">
                                <button class="btn btn-md btn-mycosnet" style="min-width:160px;">Order All</button>
                            </div>
                            <div class="col-lg-2  mr-15">
                                <button class="btn btn-md btn-mycosnet" style="min-width:160px;"><i
                                        class="fa fa-heart"></i> Add to Favorite</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="searchItems item col-lg-3  no-padding" rel="CERE3012">

                                <input type="hidden" name="stk_code[]" value="CERE3012">
                                <input type="hidden" name="taxcode[]" value="0">
                                <input type="hidden" name="cp[]" value="0">
                                <input type="hidden" name="pf[]" value="N">
                                <input type="hidden" name="description[]" value="Uncle Tobys Quick Oats Variety 420g">
                                <input type="hidden" name="price[]" value="6.02">
                                <input type="hidden" name="image[]" value="cere3012_1.jpg">
                                <input type="hidden" name="thumb[]" value="cere3012_1.jpg">
                                <input type="hidden" name="pickunit[]" value="Pkt">
                                <input type="hidden" name="kitflag[]" value="">
                                <input type="hidden" name="cust_redirect[]" value="">
                                <div class="thumbnail h-m-490 pl-5 pr-5 pt-5" style="padding-bottom:5px !important;">

                                    <div class="orange-block-wrapper pos-rel">
                                        <a href="/kitchen-and-catering/confectionery-and-snacks/Uncle-Tobys-Quick-Oats-Variety-420g-CERE3012"
                                            class="product-detail-link" rel="CERE3012:1:My Favourites"><img
                                                src=" https://dl2jx7zfbtwvr.cloudfront.net/Thumbnails/cere3012_1.jpg"
                                                class="group inner list-group-image  "
                                                alt="COS Uncle Tobys Quick Oats Variety 420g"></a>

                                    </div>
                                    <input type="hidden" id="disc_sim_CERE3012" value="N">
                                    <input type="hidden" id="CERE3012_searchdata"
                                        value="CERE3012 Uncle Tobys Quick Oats Variety 420g">
                                    <div class="caption pt-0">
                                        <div class="group inner list-group-item-block1">
                                            <div class="group inner list-group-item-heading     "
                                                style="width:100%;max-height: 32px !important;-webkit-line-clamp: 2;">
                                                <h3>
                                                    <a href="/kitchen-and-catering/confectionery-and-snacks/Uncle-Tobys-Quick-Oats-Variety-420g-CERE3012"
                                                        class="product-detail-link product-links"
                                                        rel="CERE3012:1:My Favourites"> Uncle Tobys Quick Oats Variety
                                                        420g</a></h3>
                                            </div>
                                            <div class="group inner list-group-item-description ">Uncle Tobys® Quick
                                                Sachets are an easy option for bus...
                                            </div>
                                            <div class="group inner list-group-item-code">CERE3012</div>
                                            <div class="clearfix"></div>
                                            <div class="group inner list-group-planet-friendly-list c4spriteaustraliang"
                                                width="35" height="35" title="Australian Made"></div>


                                            <a class="list-group-planet-friendly-list"
                                                href="https://dl2jx7zfbtwvr.cloudfront.net/specsheets/CERE3012.pdf"
                                                target="_blank">
                                                <div class="group inner list-group-planet-friendly-list c4spritespecsheetg"
                                                    width="35" height="35" title="View Spec Sheet"></div>
                                            </a>


                                        </div>

                                        <div class="group inner list-group-item-block2">

                                            <div class="group inner list-group-item-price" id="CERE3012_PRC">$6.02</div>
                                            <div class="group inner list-group-item-gst">+0% GST / Pkt</div>

                                            <!--<div class="clearfix"></div>-->


                                            <!-- Bulk Savings -->

                                            <div class="list-group-discount-bulk"></div>

                                        </div>
                                        <!--comm-->
                                        <div class="group inner list-group-item-block1">
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="row">
                                                    <div class="btn-group">
                                                        <label for="new_cost_centre">Cost Centre&nbsp; </label>
                                                        <span>
                                                            <select name="cost_centre[]" id="cc_CERE3012"
                                                                class="b-white cc_dropdown selectpicker btn-sm custom-cart pl-3 pr-3 mb-5"
                                                                onchange="updateCostCentre(this, 'CERE3012');"
                                                                style="min-width:73px;max-width:73px !important;height:27px;;">
                                                                <option value="CATEGORY MANAGER">
                                                                    CATEGORY MANAGER : CATEGORY MANAGEMENT </option>
                                                                <option value="HOSSM" selected="selected">
                                                                    HOSSM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : HO SSAM
                                                                </option>
                                                                <option value="000180">
                                                                    000180&nbsp;&nbsp;&nbsp;&nbsp; : HO MD (DOM)
                                                                </option>
                                                                <option value="000190">
                                                                    000190&nbsp;&nbsp;&nbsp;&nbsp; : MATCHAM </option>
                                                                <option value="2124323">
                                                                    2124323&nbsp;&nbsp;&nbsp; : fvsfas </option>
                                                                <option value="ACCOUNTS">
                                                                    ACCOUNTS&nbsp;&nbsp; : HO ACCOUNTS </option>
                                                                <option value="ADELAIDE">
                                                                    ADELAIDE&nbsp;&nbsp; : AD GENERAL OFFICE USE
                                                                </option>
                                                                <option value="ADMIN">
                                                                    ADMIN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : HO ADMIN/HR
                                                                </option>
                                                                <option value="ADWH">
                                                                    ADWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : AD
                                                                    WAREHOUSE </option>
                                                                <option value="BRISBANE">
                                                                    BRISBANE&nbsp;&nbsp; : BR GENERAL OFFICE USE
                                                                </option>
                                                                <option value="BRWH">
                                                                    BRWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : BR
                                                                    WAREHOUSE </option>
                                                                <option value="BST">
                                                                    BST&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : HO
                                                                    BST </option>
                                                                <option value="CANBERRA">
                                                                    CANBERRA&nbsp;&nbsp; : CB GENERAL OFFICE USE
                                                                </option>
                                                                <option value="CBWH">
                                                                    CBWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : CB
                                                                    WAREHOUSE </option>
                                                                <option value="CLEANERS">
                                                                    CLEANERS&nbsp;&nbsp; : HO CLEANERS </option>
                                                                <option value="DARWIN">
                                                                    DARWIN&nbsp;&nbsp;&nbsp;&nbsp; : NT GENERAL OFFICE
                                                                    USE </option>
                                                                <option value="FURNITURE">
                                                                    FURNITURE&nbsp; : FURNITURE </option>
                                                                <option value="HO NSM">
                                                                    HO NSM&nbsp;&nbsp;&nbsp;&nbsp; : HO NSM </option>
                                                                <option value="HO WAREHOUSE">
                                                                    HO WAREHOUSE : HO WAREHOUSE </option>
                                                                <option value="HOBART">
                                                                    HOBART&nbsp;&nbsp;&nbsp;&nbsp; : TS GENERAL OFFICE
                                                                    USE </option>
                                                                <option value="IMPLEMENTATION">
                                                                    IMPLEMENTATION : IMPLEMENTATION TEAM </option>
                                                                <option value="IT TEAM">
                                                                    IT TEAM&nbsp;&nbsp;&nbsp; : HO IT </option>
                                                                <option value="LEVEL 2">
                                                                    LEVEL 2&nbsp;&nbsp;&nbsp; : LEVEL 2 ADMIN </option>
                                                                <option value="MB WHSE JAN/ADMIN">
                                                                    MB WHSE JAN/ADMIN : MB CLEANERS / JANITORIAL
                                                                </option>
                                                                <option value="MBWH">
                                                                    MBWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : MB
                                                                    WAREHOUSE </option>
                                                                <option value="MD">
                                                                    MD&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
                                                                    MD </option>
                                                                <option value="MELBOURNE">
                                                                    MELBOURNE&nbsp; : MB GENERAL OFFICE USE </option>
                                                                <option value="NCWH">
                                                                    NCWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : NC
                                                                    WAREHOUSE </option>
                                                                <option value="NEWCASTLE">
                                                                    NEWCASTLE&nbsp; : NC GENERAL OFFICE USE </option>
                                                                <option value="NTWH">
                                                                    NTWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : NT
                                                                    WAREHOUSE </option>
                                                                <option value="PERTH">
                                                                    PERTH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : WA GENERAL
                                                                    OFFICE USE </option>
                                                                <option value="SH GENERAL">
                                                                    SH GENERAL : SH GENERAL OFFICE USE </option>
                                                                <option value="SH SALES">
                                                                    SH SALES&nbsp;&nbsp; : SH SALES </option>
                                                                <option value="SHCS">
                                                                    SHCS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : SH
                                                                    CUSTOMER SERVICE </option>
                                                                <option value="SH-DA">
                                                                    SH-DA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : SH-DA
                                                                </option>
                                                                <option value="TSWH">
                                                                    TSWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : TS
                                                                    WAREHOUSE </option>
                                                                <option value="WAWH">
                                                                    WAWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : WA
                                                                    WAREHOUSE </option>

                                                            </select>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group">
                                                        <label class="sr-only" for="form-notes">Notes</label>
                                                        <input type="textarea" name="notes[]" placeholder="Write notes"
                                                            id="notes_CERE3012"
                                                            onchange="updateNotes(this, 'CERE3012');"
                                                            class="form-notes form-control input-sm line-note" value=""
                                                            style="height:27px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--group inner list-group-item-block1-->

                                        <div class="group inner list-group-item-block2">
                                            <div class="product-qty-add mt-0">
                                                <input type="hidden" name="color[]" id="color_CERE3012" value="">
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="product-qty-add mt-0" style="zoom:.935;-ms-zoom: .935;
    -moz-transform: scale(.935);
    -moz-transform-origin: 0 0;">
                                                <div class="group inner input-group quantity-wrapper product-quantity">
                                                    <span class="input-group-btn">
                                                        <button type="button"
                                                            class="btn btn-circle btn-minus btn-number"
                                                            data-type="minus" onclick="minusClicked('#CERE3012_QTY')">
                                                            <span class="glyphicon glyphicon-minus"></span> </button>
                                                    </span>
                                                    <div class="dropup" id="qty-dropup">
                                                        <input id="CERE3012_QTY" type="text" name="quantity[]"
                                                            class="form-control input-number input-sm quantity-style dropdown-toggle jqty"
                                                            value="20" min="0" data-toggle="dropdown"
                                                            data-trigger="click" bulkbuy="0-6.02|-|-|-|-"
                                                            autocomplete="off">
                                                        <div class="dropdown-menu">
                                                            <ul class="list-unstyled">
                                                                <li><a class="hand-cursor logpackqty"
                                                                        onclick="addToTrolley('CERE3012_QTY',1)"
                                                                        rel="CERE3012|1|5">Order 1</a></li>
                                                                <li><a class="hand-cursor logpackqty"
                                                                        onclick="addToTrolley('CERE3012_QTY',3)"
                                                                        rel="CERE3012|3|5">Order 3</a></li>
                                                                <li><a class="txt_red hand-cursor logpackqty"
                                                                        onclick="addToTrolley('CERE3012_QTY',5)"
                                                                        rel="CERE3012|5|5"> Order 5 for a Carton</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <span class="input-group-btn">
                                                        <button id="button-qty" type="button"
                                                            class="btn btn-circle btn-addtocart btn-number"
                                                            data-type="plus" onclick="plusClicked('#CERE3012_QTY')">
                                                            <span class="glyphicon glyphicon-plus"></span> </button>
                                                    </span>
                                                    <div class="dis-ib">
                                                        <div class="delivery-days product-qty-add h-m-20"
                                                            style="width:80px;">
                                                            <a class="group inner btn btn-addtocart btn-xs product-button btn_addtoorder"
                                                                rel="CERE3012"
                                                                onclick="validateAddedStk('CERE3012_QTY','My Favourites');"><i
                                                                    class="fa fa-shopping-cart"></i>&nbsp; Add</a>
                                                            <a class="btn_deleteitem group inner hand-cursor dark pl-5"
                                                                rel="CERE3012"><i
                                                                    class="fa fa-trash fa-lg link-blk f-18"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="clearfix"></div>
                                                <div class="col-xs-12 delivery-days h-m-15 mt-5">

                                                    <!--<i class="fa fa-truck"></i>&nbsp; Immediate Delivery-->

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="searchItems item col-lg-3  no-padding" rel="PENC2036">

                                <input type="hidden" name="stk_code[]" value="PENC2036">
                                <input type="hidden" name="taxcode[]" value="1">
                                <input type="hidden" name="cp[]" value="0">
                                <input type="hidden" name="pf[]" value="N">
                                <input type="hidden" name="description[]" value="COS HB Pencil">
                                <input type="hidden" name="price[]" value="5.55">
                                <input type="hidden" name="image[]" value="penc2036_1.jpg">
                                <input type="hidden" name="thumb[]" value="penc2036_1.jpg">
                                <input type="hidden" name="pickunit[]" value="Box20">
                                <input type="hidden" name="kitflag[]" value="">
                                <input type="hidden" name="cust_redirect[]" value="">
                                <div class="thumbnail h-m-490 pl-5 pr-5 pt-5" style="padding-bottom:5px !important;">

                                    <div class="orange-block-wrapper pos-rel">
                                        <a href="/education-supplies/drawing/COS-HB-Pencil-PENC2036"
                                            class="product-detail-link" rel="PENC2036:2:My Favourites"><img
                                                src=" https://dl2jx7zfbtwvr.cloudfront.net/Thumbnails/penc2036_1.jpg"
                                                class="group inner list-group-image  " alt="COS HB Pencil"></a>

                                    </div>
                                    <input type="hidden" id="disc_sim_PENC2036" value="N">
                                    <input type="hidden" id="PENC2036_searchdata" value="PENC2036 COS HB Pencil">
                                    <div class="caption pt-0">
                                        <div class="group inner list-group-item-block1">
                                            <div class="group inner list-group-item-heading     "
                                                style="width:100%;max-height: 32px !important;-webkit-line-clamp: 2;">
                                                <h3><a href="/education-supplies/drawing/COS-HB-Pencil-PENC2036"
                                                        class="product-detail-link product-links"
                                                        rel="PENC2036:2:My Favourites"> COS HB Pencil</a></h3>
                                            </div>
                                            <div class="group inner list-group-item-description ">Hexagonal Lead Pencils
                                                are easy to erase and sharpen. Sha...
                                            </div>
                                            <div class="group inner list-group-item-code">PENC2036</div>
                                            <div class="clearfix"></div>
                                            <div class="group inner list-group-planet-friendly-list c4spritebestsellerg"
                                                width="35" height="35" title="Best Seller"></div>


                                        </div>

                                        <div class="group inner list-group-item-block2">

                                            <div class="group inner list-group-item-price" id="PENC2036_PRC">$5.55</div>
                                            <div class="group inner list-group-item-gst">+10% GST / Box20</div>

                                            <!--<div class="clearfix"></div>-->


                                            <!-- Bulk Savings -->

                                            <div class="list-group-discount-bulk">
                                                <div id="bulk-savings-carousel-holder">

                                                    <div class="carousel slide bulk-savings-carousel"
                                                        id="bulk-savings-carousel1" data-ride="carousel">
                                                        <div class="carousel-inner">
                                                            <div class="item bulk-savings-text active"><span
                                                                    class="bulk-savings-title">BULK SAVING</span><br>
                                                                <a class="hand-cursor text-black qtybreak"
                                                                    rel="PENC2036|4">Buy <strong>4</strong> at
                                                                    <strong>$4.99</strong></a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <!--comm-->
                                        <div class="group inner list-group-item-block1">
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="row">
                                                    <div class="btn-group">
                                                        <label for="new_cost_centre">Cost Centre&nbsp; </label>
                                                        <span>
                                                            <select name="cost_centre[]" id="cc_PENC2036"
                                                                class="b-white cc_dropdown selectpicker btn-sm custom-cart pl-3 pr-3 mb-5"
                                                                onchange="updateCostCentre(this, 'PENC2036');"
                                                                style="min-width:73px;max-width:73px !important;height:27px;;">
                                                                <option value="CATEGORY MANAGER">
                                                                    CATEGORY MANAGER : CATEGORY MANAGEMENT </option>
                                                                <option value="HOSSM" selected="selected">
                                                                    HOSSM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : HO SSAM
                                                                </option>
                                                                <option value="000180">
                                                                    000180&nbsp;&nbsp;&nbsp;&nbsp; : HO MD (DOM)
                                                                </option>
                                                                <option value="000190">
                                                                    000190&nbsp;&nbsp;&nbsp;&nbsp; : MATCHAM </option>
                                                                <option value="2124323">
                                                                    2124323&nbsp;&nbsp;&nbsp; : fvsfas </option>
                                                                <option value="ACCOUNTS">
                                                                    ACCOUNTS&nbsp;&nbsp; : HO ACCOUNTS </option>
                                                                <option value="ADELAIDE">
                                                                    ADELAIDE&nbsp;&nbsp; : AD GENERAL OFFICE USE
                                                                </option>
                                                                <option value="ADMIN">
                                                                    ADMIN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : HO ADMIN/HR
                                                                </option>
                                                                <option value="ADWH">
                                                                    ADWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : AD
                                                                    WAREHOUSE </option>
                                                                <option value="BRISBANE">
                                                                    BRISBANE&nbsp;&nbsp; : BR GENERAL OFFICE USE
                                                                </option>
                                                                <option value="BRWH">
                                                                    BRWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : BR
                                                                    WAREHOUSE </option>
                                                                <option value="BST">
                                                                    BST&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : HO
                                                                    BST </option>
                                                                <option value="CANBERRA">
                                                                    CANBERRA&nbsp;&nbsp; : CB GENERAL OFFICE USE
                                                                </option>
                                                                <option value="CBWH">
                                                                    CBWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : CB
                                                                    WAREHOUSE </option>
                                                                <option value="CLEANERS">
                                                                    CLEANERS&nbsp;&nbsp; : HO CLEANERS </option>
                                                                <option value="DARWIN">
                                                                    DARWIN&nbsp;&nbsp;&nbsp;&nbsp; : NT GENERAL OFFICE
                                                                    USE </option>
                                                                <option value="FURNITURE">
                                                                    FURNITURE&nbsp; : FURNITURE </option>
                                                                <option value="HO NSM">
                                                                    HO NSM&nbsp;&nbsp;&nbsp;&nbsp; : HO NSM </option>
                                                                <option value="HO WAREHOUSE">
                                                                    HO WAREHOUSE : HO WAREHOUSE </option>
                                                                <option value="HOBART">
                                                                    HOBART&nbsp;&nbsp;&nbsp;&nbsp; : TS GENERAL OFFICE
                                                                    USE </option>
                                                                <option value="IMPLEMENTATION">
                                                                    IMPLEMENTATION : IMPLEMENTATION TEAM </option>
                                                                <option value="IT TEAM">
                                                                    IT TEAM&nbsp;&nbsp;&nbsp; : HO IT </option>
                                                                <option value="LEVEL 2">
                                                                    LEVEL 2&nbsp;&nbsp;&nbsp; : LEVEL 2 ADMIN </option>
                                                                <option value="MB WHSE JAN/ADMIN">
                                                                    MB WHSE JAN/ADMIN : MB CLEANERS / JANITORIAL
                                                                </option>
                                                                <option value="MBWH">
                                                                    MBWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : MB
                                                                    WAREHOUSE </option>
                                                                <option value="MD">
                                                                    MD&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
                                                                    MD </option>
                                                                <option value="MELBOURNE">
                                                                    MELBOURNE&nbsp; : MB GENERAL OFFICE USE </option>
                                                                <option value="NCWH">
                                                                    NCWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : NC
                                                                    WAREHOUSE </option>
                                                                <option value="NEWCASTLE">
                                                                    NEWCASTLE&nbsp; : NC GENERAL OFFICE USE </option>
                                                                <option value="NTWH">
                                                                    NTWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : NT
                                                                    WAREHOUSE </option>
                                                                <option value="PERTH">
                                                                    PERTH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : WA GENERAL
                                                                    OFFICE USE </option>
                                                                <option value="SH GENERAL">
                                                                    SH GENERAL : SH GENERAL OFFICE USE </option>
                                                                <option value="SH SALES">
                                                                    SH SALES&nbsp;&nbsp; : SH SALES </option>
                                                                <option value="SHCS">
                                                                    SHCS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : SH
                                                                    CUSTOMER SERVICE </option>
                                                                <option value="SH-DA">
                                                                    SH-DA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : SH-DA
                                                                </option>
                                                                <option value="TSWH">
                                                                    TSWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : TS
                                                                    WAREHOUSE </option>
                                                                <option value="WAWH">
                                                                    WAWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : WA
                                                                    WAREHOUSE </option>

                                                            </select>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group">
                                                        <label class="sr-only" for="form-notes">Notes</label>
                                                        <input type="textarea" name="notes[]" placeholder="Write notes"
                                                            id="notes_PENC2036"
                                                            onchange="updateNotes(this, 'PENC2036');"
                                                            class="form-notes form-control input-sm line-note" value=""
                                                            style="height:27px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--group inner list-group-item-block1-->

                                        <div class="group inner list-group-item-block2">
                                            <div class="product-qty-add mt-0">
                                                <input type="hidden" name="color[]" id="color_PENC2036" value="">
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="product-qty-add mt-0" style="zoom:.935;-ms-zoom: .935;
    -moz-transform: scale(.935);
    -moz-transform-origin: 0 0;">
                                                <div class="group inner input-group quantity-wrapper product-quantity">
                                                    <span class="input-group-btn">
                                                        <button type="button"
                                                            class="btn btn-circle btn-minus btn-number"
                                                            data-type="minus" onclick="minusClicked('#PENC2036_QTY')">
                                                            <span class="glyphicon glyphicon-minus"></span> </button>
                                                    </span>
                                                    <input id="PENC2036_QTY" type="text" name="quantity[]"
                                                        class="form-control input-number input-sm quantity-style jqty"
                                                        value="1" min="0" bulkbuy="0-5.55|4-4.99|-|-|-"
                                                        autocomplete="off">
                                                    <span class="input-group-btn">
                                                        <button id="button-qty" type="button"
                                                            class="btn btn-circle btn-addtocart btn-number"
                                                            data-type="plus" onclick="plusClicked('#PENC2036_QTY')">
                                                            <span class="glyphicon glyphicon-plus"></span> </button>
                                                    </span>
                                                    <div class="dis-ib">
                                                        <div class="delivery-days product-qty-add h-m-20"
                                                            style="width:80px;">
                                                            <a class="group inner btn btn-addtocart btn-xs product-button btn_addtoorder"
                                                                rel="PENC2036"
                                                                onclick="validateAddedStk('PENC2036_QTY','My Favourites');"><i
                                                                    class="fa fa-shopping-cart"></i>&nbsp; Add</a>
                                                            <a class="btn_deleteitem group inner hand-cursor dark pl-5"
                                                                rel="PENC2036"><i
                                                                    class="fa fa-trash fa-lg link-blk f-18"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="clearfix"></div>
                                                <div class="col-xs-12 delivery-days h-m-15 mt-5">

                                                    <!--<i class="fa fa-truck"></i>&nbsp; Immediate Delivery-->

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="searchItems item col-lg-3  no-padding" rel="CERE3012">

                                <input type="hidden" name="stk_code[]" value="CERE3012">
                                <input type="hidden" name="taxcode[]" value="0">
                                <input type="hidden" name="cp[]" value="0">
                                <input type="hidden" name="pf[]" value="N">
                                <input type="hidden" name="description[]" value="Uncle Tobys Quick Oats Variety 420g">
                                <input type="hidden" name="price[]" value="6.02">
                                <input type="hidden" name="image[]" value="cere3012_1.jpg">
                                <input type="hidden" name="thumb[]" value="cere3012_1.jpg">
                                <input type="hidden" name="pickunit[]" value="Pkt">
                                <input type="hidden" name="kitflag[]" value="">
                                <input type="hidden" name="cust_redirect[]" value="">
                                <div class="thumbnail h-m-490 pl-5 pr-5 pt-5" style="padding-bottom:5px !important;">

                                    <div class="orange-block-wrapper pos-rel">
                                        <a href="/kitchen-and-catering/confectionery-and-snacks/Uncle-Tobys-Quick-Oats-Variety-420g-CERE3012"
                                            class="product-detail-link" rel="CERE3012:1:My Favourites"><img
                                                src=" https://dl2jx7zfbtwvr.cloudfront.net/Thumbnails/cere3012_1.jpg"
                                                class="group inner list-group-image  "
                                                alt="COS Uncle Tobys Quick Oats Variety 420g"></a>

                                    </div>
                                    <input type="hidden" id="disc_sim_CERE3012" value="N">
                                    <input type="hidden" id="CERE3012_searchdata"
                                        value="CERE3012 Uncle Tobys Quick Oats Variety 420g">
                                    <div class="caption pt-0">
                                        <div class="group inner list-group-item-block1">
                                            <div class="group inner list-group-item-heading     "
                                                style="width:100%;max-height: 32px !important;-webkit-line-clamp: 2;">
                                                <h3>
                                                    <a href="/kitchen-and-catering/confectionery-and-snacks/Uncle-Tobys-Quick-Oats-Variety-420g-CERE3012"
                                                        class="product-detail-link product-links"
                                                        rel="CERE3012:1:My Favourites"> Uncle Tobys Quick Oats Variety
                                                        420g</a></h3>
                                            </div>
                                            <div class="group inner list-group-item-description ">Uncle Tobys® Quick
                                                Sachets are an easy option for bus...
                                            </div>
                                            <div class="group inner list-group-item-code">CERE3012</div>
                                            <div class="clearfix"></div>
                                            <div class="group inner list-group-planet-friendly-list c4spriteaustraliang"
                                                width="35" height="35" title="Australian Made"></div>


                                            <a class="list-group-planet-friendly-list"
                                                href="https://dl2jx7zfbtwvr.cloudfront.net/specsheets/CERE3012.pdf"
                                                target="_blank">
                                                <div class="group inner list-group-planet-friendly-list c4spritespecsheetg"
                                                    width="35" height="35" title="View Spec Sheet"></div>
                                            </a>


                                        </div>

                                        <div class="group inner list-group-item-block2">

                                            <div class="group inner list-group-item-price" id="CERE3012_PRC">$6.02</div>
                                            <div class="group inner list-group-item-gst">+0% GST / Pkt</div>

                                            <!--<div class="clearfix"></div>-->


                                            <!-- Bulk Savings -->

                                            <div class="list-group-discount-bulk"></div>

                                        </div>
                                        <!--comm-->
                                        <div class="group inner list-group-item-block1">
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="row">
                                                    <div class="btn-group">
                                                        <label for="new_cost_centre">Cost Centre&nbsp; </label>
                                                        <span>
                                                            <select name="cost_centre[]" id="cc_CERE3012"
                                                                class="b-white cc_dropdown selectpicker btn-sm custom-cart pl-3 pr-3 mb-5"
                                                                onchange="updateCostCentre(this, 'CERE3012');"
                                                                style="min-width:73px;max-width:73px !important;height:27px;;">
                                                                <option value="CATEGORY MANAGER">
                                                                    CATEGORY MANAGER : CATEGORY MANAGEMENT </option>
                                                                <option value="HOSSM" selected="selected">
                                                                    HOSSM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : HO SSAM
                                                                </option>
                                                                <option value="000180">
                                                                    000180&nbsp;&nbsp;&nbsp;&nbsp; : HO MD (DOM)
                                                                </option>
                                                                <option value="000190">
                                                                    000190&nbsp;&nbsp;&nbsp;&nbsp; : MATCHAM </option>
                                                                <option value="2124323">
                                                                    2124323&nbsp;&nbsp;&nbsp; : fvsfas </option>
                                                                <option value="ACCOUNTS">
                                                                    ACCOUNTS&nbsp;&nbsp; : HO ACCOUNTS </option>
                                                                <option value="ADELAIDE">
                                                                    ADELAIDE&nbsp;&nbsp; : AD GENERAL OFFICE USE
                                                                </option>
                                                                <option value="ADMIN">
                                                                    ADMIN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : HO ADMIN/HR
                                                                </option>
                                                                <option value="ADWH">
                                                                    ADWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : AD
                                                                    WAREHOUSE </option>
                                                                <option value="BRISBANE">
                                                                    BRISBANE&nbsp;&nbsp; : BR GENERAL OFFICE USE
                                                                </option>
                                                                <option value="BRWH">
                                                                    BRWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : BR
                                                                    WAREHOUSE </option>
                                                                <option value="BST">
                                                                    BST&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : HO
                                                                    BST </option>
                                                                <option value="CANBERRA">
                                                                    CANBERRA&nbsp;&nbsp; : CB GENERAL OFFICE USE
                                                                </option>
                                                                <option value="CBWH">
                                                                    CBWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : CB
                                                                    WAREHOUSE </option>
                                                                <option value="CLEANERS">
                                                                    CLEANERS&nbsp;&nbsp; : HO CLEANERS </option>
                                                                <option value="DARWIN">
                                                                    DARWIN&nbsp;&nbsp;&nbsp;&nbsp; : NT GENERAL OFFICE
                                                                    USE </option>
                                                                <option value="FURNITURE">
                                                                    FURNITURE&nbsp; : FURNITURE </option>
                                                                <option value="HO NSM">
                                                                    HO NSM&nbsp;&nbsp;&nbsp;&nbsp; : HO NSM </option>
                                                                <option value="HO WAREHOUSE">
                                                                    HO WAREHOUSE : HO WAREHOUSE </option>
                                                                <option value="HOBART">
                                                                    HOBART&nbsp;&nbsp;&nbsp;&nbsp; : TS GENERAL OFFICE
                                                                    USE </option>
                                                                <option value="IMPLEMENTATION">
                                                                    IMPLEMENTATION : IMPLEMENTATION TEAM </option>
                                                                <option value="IT TEAM">
                                                                    IT TEAM&nbsp;&nbsp;&nbsp; : HO IT </option>
                                                                <option value="LEVEL 2">
                                                                    LEVEL 2&nbsp;&nbsp;&nbsp; : LEVEL 2 ADMIN </option>
                                                                <option value="MB WHSE JAN/ADMIN">
                                                                    MB WHSE JAN/ADMIN : MB CLEANERS / JANITORIAL
                                                                </option>
                                                                <option value="MBWH">
                                                                    MBWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : MB
                                                                    WAREHOUSE </option>
                                                                <option value="MD">
                                                                    MD&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
                                                                    MD </option>
                                                                <option value="MELBOURNE">
                                                                    MELBOURNE&nbsp; : MB GENERAL OFFICE USE </option>
                                                                <option value="NCWH">
                                                                    NCWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : NC
                                                                    WAREHOUSE </option>
                                                                <option value="NEWCASTLE">
                                                                    NEWCASTLE&nbsp; : NC GENERAL OFFICE USE </option>
                                                                <option value="NTWH">
                                                                    NTWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : NT
                                                                    WAREHOUSE </option>
                                                                <option value="PERTH">
                                                                    PERTH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : WA GENERAL
                                                                    OFFICE USE </option>
                                                                <option value="SH GENERAL">
                                                                    SH GENERAL : SH GENERAL OFFICE USE </option>
                                                                <option value="SH SALES">
                                                                    SH SALES&nbsp;&nbsp; : SH SALES </option>
                                                                <option value="SHCS">
                                                                    SHCS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : SH
                                                                    CUSTOMER SERVICE </option>
                                                                <option value="SH-DA">
                                                                    SH-DA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : SH-DA
                                                                </option>
                                                                <option value="TSWH">
                                                                    TSWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : TS
                                                                    WAREHOUSE </option>
                                                                <option value="WAWH">
                                                                    WAWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : WA
                                                                    WAREHOUSE </option>

                                                            </select>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group">
                                                        <label class="sr-only" for="form-notes">Notes</label>
                                                        <input type="textarea" name="notes[]" placeholder="Write notes"
                                                            id="notes_CERE3012"
                                                            onchange="updateNotes(this, 'CERE3012');"
                                                            class="form-notes form-control input-sm line-note" value=""
                                                            style="height:27px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--group inner list-group-item-block1-->

                                        <div class="group inner list-group-item-block2">
                                            <div class="product-qty-add mt-0">
                                                <input type="hidden" name="color[]" id="color_CERE3012" value="">
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="product-qty-add mt-0" style="zoom:.935;-ms-zoom: .935;
    -moz-transform: scale(.935);
    -moz-transform-origin: 0 0;">
                                                <div class="group inner input-group quantity-wrapper product-quantity">
                                                    <span class="input-group-btn">
                                                        <button type="button"
                                                            class="btn btn-circle btn-minus btn-number"
                                                            data-type="minus" onclick="minusClicked('#CERE3012_QTY')">
                                                            <span class="glyphicon glyphicon-minus"></span> </button>
                                                    </span>
                                                    <div class="dropup" id="qty-dropup">
                                                        <input id="CERE3012_QTY" type="text" name="quantity[]"
                                                            class="form-control input-number input-sm quantity-style dropdown-toggle jqty"
                                                            value="20" min="0" data-toggle="dropdown"
                                                            data-trigger="click" bulkbuy="0-6.02|-|-|-|-"
                                                            autocomplete="off">
                                                        <div class="dropdown-menu">
                                                            <ul class="list-unstyled">
                                                                <li><a class="hand-cursor logpackqty"
                                                                        onclick="addToTrolley('CERE3012_QTY',1)"
                                                                        rel="CERE3012|1|5">Order 1</a></li>
                                                                <li><a class="hand-cursor logpackqty"
                                                                        onclick="addToTrolley('CERE3012_QTY',3)"
                                                                        rel="CERE3012|3|5">Order 3</a></li>
                                                                <li><a class="txt_red hand-cursor logpackqty"
                                                                        onclick="addToTrolley('CERE3012_QTY',5)"
                                                                        rel="CERE3012|5|5"> Order 5 for a Carton</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <span class="input-group-btn">
                                                        <button id="button-qty" type="button"
                                                            class="btn btn-circle btn-addtocart btn-number"
                                                            data-type="plus" onclick="plusClicked('#CERE3012_QTY')">
                                                            <span class="glyphicon glyphicon-plus"></span> </button>
                                                    </span>
                                                    <div class="dis-ib">
                                                        <div class="delivery-days product-qty-add h-m-20"
                                                            style="width:80px;">
                                                            <a class="group inner btn btn-addtocart btn-xs product-button btn_addtoorder"
                                                                rel="CERE3012"
                                                                onclick="validateAddedStk('CERE3012_QTY','My Favourites');"><i
                                                                    class="fa fa-shopping-cart"></i>&nbsp; Add</a>
                                                            <a class="btn_deleteitem group inner hand-cursor dark pl-5"
                                                                rel="CERE3012"><i
                                                                    class="fa fa-trash fa-lg link-blk f-18"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="clearfix"></div>
                                                <div class="col-xs-12 delivery-days h-m-15 mt-5">

                                                    <!--<i class="fa fa-truck"></i>&nbsp; Immediate Delivery-->

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="searchItems item col-lg-3  no-padding" rel="PENC2036">

                                <input type="hidden" name="stk_code[]" value="PENC2036">
                                <input type="hidden" name="taxcode[]" value="1">
                                <input type="hidden" name="cp[]" value="0">
                                <input type="hidden" name="pf[]" value="N">
                                <input type="hidden" name="description[]" value="COS HB Pencil">
                                <input type="hidden" name="price[]" value="5.55">
                                <input type="hidden" name="image[]" value="penc2036_1.jpg">
                                <input type="hidden" name="thumb[]" value="penc2036_1.jpg">
                                <input type="hidden" name="pickunit[]" value="Box20">
                                <input type="hidden" name="kitflag[]" value="">
                                <input type="hidden" name="cust_redirect[]" value="">
                                <div class="thumbnail h-m-490 pl-5 pr-5 pt-5" style="padding-bottom:5px !important;">

                                    <div class="orange-block-wrapper pos-rel">
                                        <a href="/education-supplies/drawing/COS-HB-Pencil-PENC2036"
                                            class="product-detail-link" rel="PENC2036:2:My Favourites"><img
                                                src=" https://dl2jx7zfbtwvr.cloudfront.net/Thumbnails/penc2036_1.jpg"
                                                class="group inner list-group-image  " alt="COS HB Pencil"></a>

                                    </div>
                                    <input type="hidden" id="disc_sim_PENC2036" value="N">
                                    <input type="hidden" id="PENC2036_searchdata" value="PENC2036 COS HB Pencil">
                                    <div class="caption pt-0">
                                        <div class="group inner list-group-item-block1">
                                            <div class="group inner list-group-item-heading     "
                                                style="width:100%;max-height: 32px !important;-webkit-line-clamp: 2;">
                                                <h3><a href="/education-supplies/drawing/COS-HB-Pencil-PENC2036"
                                                        class="product-detail-link product-links"
                                                        rel="PENC2036:2:My Favourites"> COS HB Pencil</a></h3>
                                            </div>
                                            <div class="group inner list-group-item-description ">Hexagonal Lead Pencils
                                                are easy to erase and sharpen. Sha...
                                            </div>
                                            <div class="group inner list-group-item-code">PENC2036</div>
                                            <div class="clearfix"></div>
                                            <div class="group inner list-group-planet-friendly-list c4spritebestsellerg"
                                                width="35" height="35" title="Best Seller"></div>


                                        </div>

                                        <div class="group inner list-group-item-block2">

                                            <div class="group inner list-group-item-price" id="PENC2036_PRC">$5.55</div>
                                            <div class="group inner list-group-item-gst">+10% GST / Box20</div>

                                            <!--<div class="clearfix"></div>-->


                                            <!-- Bulk Savings -->

                                            <div class="list-group-discount-bulk">
                                                <div id="bulk-savings-carousel-holder">

                                                    <div class="carousel slide bulk-savings-carousel"
                                                        id="bulk-savings-carousel1" data-ride="carousel">
                                                        <div class="carousel-inner">
                                                            <div class="item bulk-savings-text active"><span
                                                                    class="bulk-savings-title">BULK SAVING</span><br>
                                                                <a class="hand-cursor text-black qtybreak"
                                                                    rel="PENC2036|4">Buy <strong>4</strong> at
                                                                    <strong>$4.99</strong></a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <!--comm-->
                                        <div class="group inner list-group-item-block1">
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="row">
                                                    <div class="btn-group">
                                                        <label for="new_cost_centre">Cost Centre&nbsp; </label>
                                                        <span>
                                                            <select name="cost_centre[]" id="cc_PENC2036"
                                                                class="b-white cc_dropdown selectpicker btn-sm custom-cart pl-3 pr-3 mb-5"
                                                                onchange="updateCostCentre(this, 'PENC2036');"
                                                                style="min-width:73px;max-width:73px !important;height:27px;;">
                                                                <option value="CATEGORY MANAGER">
                                                                    CATEGORY MANAGER : CATEGORY MANAGEMENT </option>
                                                                <option value="HOSSM" selected="selected">
                                                                    HOSSM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : HO SSAM
                                                                </option>
                                                                <option value="000180">
                                                                    000180&nbsp;&nbsp;&nbsp;&nbsp; : HO MD (DOM)
                                                                </option>
                                                                <option value="000190">
                                                                    000190&nbsp;&nbsp;&nbsp;&nbsp; : MATCHAM </option>
                                                                <option value="2124323">
                                                                    2124323&nbsp;&nbsp;&nbsp; : fvsfas </option>
                                                                <option value="ACCOUNTS">
                                                                    ACCOUNTS&nbsp;&nbsp; : HO ACCOUNTS </option>
                                                                <option value="ADELAIDE">
                                                                    ADELAIDE&nbsp;&nbsp; : AD GENERAL OFFICE USE
                                                                </option>
                                                                <option value="ADMIN">
                                                                    ADMIN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : HO ADMIN/HR
                                                                </option>
                                                                <option value="ADWH">
                                                                    ADWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : AD
                                                                    WAREHOUSE </option>
                                                                <option value="BRISBANE">
                                                                    BRISBANE&nbsp;&nbsp; : BR GENERAL OFFICE USE
                                                                </option>
                                                                <option value="BRWH">
                                                                    BRWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : BR
                                                                    WAREHOUSE </option>
                                                                <option value="BST">
                                                                    BST&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : HO
                                                                    BST </option>
                                                                <option value="CANBERRA">
                                                                    CANBERRA&nbsp;&nbsp; : CB GENERAL OFFICE USE
                                                                </option>
                                                                <option value="CBWH">
                                                                    CBWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : CB
                                                                    WAREHOUSE </option>
                                                                <option value="CLEANERS">
                                                                    CLEANERS&nbsp;&nbsp; : HO CLEANERS </option>
                                                                <option value="DARWIN">
                                                                    DARWIN&nbsp;&nbsp;&nbsp;&nbsp; : NT GENERAL OFFICE
                                                                    USE </option>
                                                                <option value="FURNITURE">
                                                                    FURNITURE&nbsp; : FURNITURE </option>
                                                                <option value="HO NSM">
                                                                    HO NSM&nbsp;&nbsp;&nbsp;&nbsp; : HO NSM </option>
                                                                <option value="HO WAREHOUSE">
                                                                    HO WAREHOUSE : HO WAREHOUSE </option>
                                                                <option value="HOBART">
                                                                    HOBART&nbsp;&nbsp;&nbsp;&nbsp; : TS GENERAL OFFICE
                                                                    USE </option>
                                                                <option value="IMPLEMENTATION">
                                                                    IMPLEMENTATION : IMPLEMENTATION TEAM </option>
                                                                <option value="IT TEAM">
                                                                    IT TEAM&nbsp;&nbsp;&nbsp; : HO IT </option>
                                                                <option value="LEVEL 2">
                                                                    LEVEL 2&nbsp;&nbsp;&nbsp; : LEVEL 2 ADMIN </option>
                                                                <option value="MB WHSE JAN/ADMIN">
                                                                    MB WHSE JAN/ADMIN : MB CLEANERS / JANITORIAL
                                                                </option>
                                                                <option value="MBWH">
                                                                    MBWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : MB
                                                                    WAREHOUSE </option>
                                                                <option value="MD">
                                                                    MD&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
                                                                    MD </option>
                                                                <option value="MELBOURNE">
                                                                    MELBOURNE&nbsp; : MB GENERAL OFFICE USE </option>
                                                                <option value="NCWH">
                                                                    NCWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : NC
                                                                    WAREHOUSE </option>
                                                                <option value="NEWCASTLE">
                                                                    NEWCASTLE&nbsp; : NC GENERAL OFFICE USE </option>
                                                                <option value="NTWH">
                                                                    NTWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : NT
                                                                    WAREHOUSE </option>
                                                                <option value="PERTH">
                                                                    PERTH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : WA GENERAL
                                                                    OFFICE USE </option>
                                                                <option value="SH GENERAL">
                                                                    SH GENERAL : SH GENERAL OFFICE USE </option>
                                                                <option value="SH SALES">
                                                                    SH SALES&nbsp;&nbsp; : SH SALES </option>
                                                                <option value="SHCS">
                                                                    SHCS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : SH
                                                                    CUSTOMER SERVICE </option>
                                                                <option value="SH-DA">
                                                                    SH-DA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : SH-DA
                                                                </option>
                                                                <option value="TSWH">
                                                                    TSWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : TS
                                                                    WAREHOUSE </option>
                                                                <option value="WAWH">
                                                                    WAWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : WA
                                                                    WAREHOUSE </option>

                                                            </select>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group">
                                                        <label class="sr-only" for="form-notes">Notes</label>
                                                        <input type="textarea" name="notes[]" placeholder="Write notes"
                                                            id="notes_PENC2036"
                                                            onchange="updateNotes(this, 'PENC2036');"
                                                            class="form-notes form-control input-sm line-note" value=""
                                                            style="height:27px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--group inner list-group-item-block1-->

                                        <div class="group inner list-group-item-block2">
                                            <div class="product-qty-add mt-0">
                                                <input type="hidden" name="color[]" id="color_PENC2036" value="">
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="product-qty-add mt-0" style="zoom:.935;-ms-zoom: .935;
    -moz-transform: scale(.935);
    -moz-transform-origin: 0 0;">
                                                <div class="group inner input-group quantity-wrapper product-quantity">
                                                    <span class="input-group-btn">
                                                        <button type="button"
                                                            class="btn btn-circle btn-minus btn-number"
                                                            data-type="minus" onclick="minusClicked('#PENC2036_QTY')">
                                                            <span class="glyphicon glyphicon-minus"></span> </button>
                                                    </span>
                                                    <input id="PENC2036_QTY" type="text" name="quantity[]"
                                                        class="form-control input-number input-sm quantity-style jqty"
                                                        value="1" min="0" bulkbuy="0-5.55|4-4.99|-|-|-"
                                                        autocomplete="off">
                                                    <span class="input-group-btn">
                                                        <button id="button-qty" type="button"
                                                            class="btn btn-circle btn-addtocart btn-number"
                                                            data-type="plus" onclick="plusClicked('#PENC2036_QTY')">
                                                            <span class="glyphicon glyphicon-plus"></span> </button>
                                                    </span>
                                                    <div class="dis-ib">
                                                        <div class="delivery-days product-qty-add h-m-20"
                                                            style="width:80px;">
                                                            <a class="group inner btn btn-addtocart btn-xs product-button btn_addtoorder"
                                                                rel="PENC2036"
                                                                onclick="validateAddedStk('PENC2036_QTY','My Favourites');"><i
                                                                    class="fa fa-shopping-cart"></i>&nbsp; Add</a>
                                                            <a class="btn_deleteitem group inner hand-cursor dark pl-5"
                                                                rel="PENC2036"><i
                                                                    class="fa fa-trash fa-lg link-blk f-18"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="clearfix"></div>
                                                <div class="col-xs-12 delivery-days h-m-15 mt-5">

                                                    <!--<i class="fa fa-truck"></i>&nbsp; Immediate Delivery-->

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="searchItems item col-lg-3  no-padding" rel="CERE3012">

                                <input type="hidden" name="stk_code[]" value="CERE3012">
                                <input type="hidden" name="taxcode[]" value="0">
                                <input type="hidden" name="cp[]" value="0">
                                <input type="hidden" name="pf[]" value="N">
                                <input type="hidden" name="description[]" value="Uncle Tobys Quick Oats Variety 420g">
                                <input type="hidden" name="price[]" value="6.02">
                                <input type="hidden" name="image[]" value="cere3012_1.jpg">
                                <input type="hidden" name="thumb[]" value="cere3012_1.jpg">
                                <input type="hidden" name="pickunit[]" value="Pkt">
                                <input type="hidden" name="kitflag[]" value="">
                                <input type="hidden" name="cust_redirect[]" value="">
                                <div class="thumbnail h-m-490 pl-5 pr-5 pt-5" style="padding-bottom:5px !important;">

                                    <div class="orange-block-wrapper pos-rel">
                                        <a href="/kitchen-and-catering/confectionery-and-snacks/Uncle-Tobys-Quick-Oats-Variety-420g-CERE3012"
                                            class="product-detail-link" rel="CERE3012:1:My Favourites"><img
                                                src=" https://dl2jx7zfbtwvr.cloudfront.net/Thumbnails/cere3012_1.jpg"
                                                class="group inner list-group-image  "
                                                alt="COS Uncle Tobys Quick Oats Variety 420g"></a>

                                    </div>
                                    <input type="hidden" id="disc_sim_CERE3012" value="N">
                                    <input type="hidden" id="CERE3012_searchdata"
                                        value="CERE3012 Uncle Tobys Quick Oats Variety 420g">
                                    <div class="caption pt-0">
                                        <div class="group inner list-group-item-block1">
                                            <div class="group inner list-group-item-heading     "
                                                style="width:100%;max-height: 32px !important;-webkit-line-clamp: 2;">
                                                <h3>
                                                    <a href="/kitchen-and-catering/confectionery-and-snacks/Uncle-Tobys-Quick-Oats-Variety-420g-CERE3012"
                                                        class="product-detail-link product-links"
                                                        rel="CERE3012:1:My Favourites"> Uncle Tobys Quick Oats Variety
                                                        420g</a></h3>
                                            </div>
                                            <div class="group inner list-group-item-description ">Uncle Tobys® Quick
                                                Sachets are an easy option for bus...
                                            </div>
                                            <div class="group inner list-group-item-code">CERE3012</div>
                                            <div class="clearfix"></div>
                                            <div class="group inner list-group-planet-friendly-list c4spriteaustraliang"
                                                width="35" height="35" title="Australian Made"></div>


                                            <a class="list-group-planet-friendly-list"
                                                href="https://dl2jx7zfbtwvr.cloudfront.net/specsheets/CERE3012.pdf"
                                                target="_blank">
                                                <div class="group inner list-group-planet-friendly-list c4spritespecsheetg"
                                                    width="35" height="35" title="View Spec Sheet"></div>
                                            </a>


                                        </div>

                                        <div class="group inner list-group-item-block2">

                                            <div class="group inner list-group-item-price" id="CERE3012_PRC">$6.02</div>
                                            <div class="group inner list-group-item-gst">+0% GST / Pkt</div>

                                            <!--<div class="clearfix"></div>-->


                                            <!-- Bulk Savings -->

                                            <div class="list-group-discount-bulk"></div>

                                        </div>
                                        <!--comm-->
                                        <div class="group inner list-group-item-block1">
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="row">
                                                    <div class="btn-group">
                                                        <label for="new_cost_centre">Cost Centre&nbsp; </label>
                                                        <span>
                                                            <select name="cost_centre[]" id="cc_CERE3012"
                                                                class="b-white cc_dropdown selectpicker btn-sm custom-cart pl-3 pr-3 mb-5"
                                                                onchange="updateCostCentre(this, 'CERE3012');"
                                                                style="min-width:73px;max-width:73px !important;height:27px;;">
                                                                <option value="CATEGORY MANAGER">
                                                                    CATEGORY MANAGER : CATEGORY MANAGEMENT </option>
                                                                <option value="HOSSM" selected="selected">
                                                                    HOSSM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : HO SSAM
                                                                </option>
                                                                <option value="000180">
                                                                    000180&nbsp;&nbsp;&nbsp;&nbsp; : HO MD (DOM)
                                                                </option>
                                                                <option value="000190">
                                                                    000190&nbsp;&nbsp;&nbsp;&nbsp; : MATCHAM </option>
                                                                <option value="2124323">
                                                                    2124323&nbsp;&nbsp;&nbsp; : fvsfas </option>
                                                                <option value="ACCOUNTS">
                                                                    ACCOUNTS&nbsp;&nbsp; : HO ACCOUNTS </option>
                                                                <option value="ADELAIDE">
                                                                    ADELAIDE&nbsp;&nbsp; : AD GENERAL OFFICE USE
                                                                </option>
                                                                <option value="ADMIN">
                                                                    ADMIN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : HO ADMIN/HR
                                                                </option>
                                                                <option value="ADWH">
                                                                    ADWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : AD
                                                                    WAREHOUSE </option>
                                                                <option value="BRISBANE">
                                                                    BRISBANE&nbsp;&nbsp; : BR GENERAL OFFICE USE
                                                                </option>
                                                                <option value="BRWH">
                                                                    BRWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : BR
                                                                    WAREHOUSE </option>
                                                                <option value="BST">
                                                                    BST&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : HO
                                                                    BST </option>
                                                                <option value="CANBERRA">
                                                                    CANBERRA&nbsp;&nbsp; : CB GENERAL OFFICE USE
                                                                </option>
                                                                <option value="CBWH">
                                                                    CBWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : CB
                                                                    WAREHOUSE </option>
                                                                <option value="CLEANERS">
                                                                    CLEANERS&nbsp;&nbsp; : HO CLEANERS </option>
                                                                <option value="DARWIN">
                                                                    DARWIN&nbsp;&nbsp;&nbsp;&nbsp; : NT GENERAL OFFICE
                                                                    USE </option>
                                                                <option value="FURNITURE">
                                                                    FURNITURE&nbsp; : FURNITURE </option>
                                                                <option value="HO NSM">
                                                                    HO NSM&nbsp;&nbsp;&nbsp;&nbsp; : HO NSM </option>
                                                                <option value="HO WAREHOUSE">
                                                                    HO WAREHOUSE : HO WAREHOUSE </option>
                                                                <option value="HOBART">
                                                                    HOBART&nbsp;&nbsp;&nbsp;&nbsp; : TS GENERAL OFFICE
                                                                    USE </option>
                                                                <option value="IMPLEMENTATION">
                                                                    IMPLEMENTATION : IMPLEMENTATION TEAM </option>
                                                                <option value="IT TEAM">
                                                                    IT TEAM&nbsp;&nbsp;&nbsp; : HO IT </option>
                                                                <option value="LEVEL 2">
                                                                    LEVEL 2&nbsp;&nbsp;&nbsp; : LEVEL 2 ADMIN </option>
                                                                <option value="MB WHSE JAN/ADMIN">
                                                                    MB WHSE JAN/ADMIN : MB CLEANERS / JANITORIAL
                                                                </option>
                                                                <option value="MBWH">
                                                                    MBWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : MB
                                                                    WAREHOUSE </option>
                                                                <option value="MD">
                                                                    MD&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
                                                                    MD </option>
                                                                <option value="MELBOURNE">
                                                                    MELBOURNE&nbsp; : MB GENERAL OFFICE USE </option>
                                                                <option value="NCWH">
                                                                    NCWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : NC
                                                                    WAREHOUSE </option>
                                                                <option value="NEWCASTLE">
                                                                    NEWCASTLE&nbsp; : NC GENERAL OFFICE USE </option>
                                                                <option value="NTWH">
                                                                    NTWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : NT
                                                                    WAREHOUSE </option>
                                                                <option value="PERTH">
                                                                    PERTH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : WA GENERAL
                                                                    OFFICE USE </option>
                                                                <option value="SH GENERAL">
                                                                    SH GENERAL : SH GENERAL OFFICE USE </option>
                                                                <option value="SH SALES">
                                                                    SH SALES&nbsp;&nbsp; : SH SALES </option>
                                                                <option value="SHCS">
                                                                    SHCS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : SH
                                                                    CUSTOMER SERVICE </option>
                                                                <option value="SH-DA">
                                                                    SH-DA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : SH-DA
                                                                </option>
                                                                <option value="TSWH">
                                                                    TSWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : TS
                                                                    WAREHOUSE </option>
                                                                <option value="WAWH">
                                                                    WAWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : WA
                                                                    WAREHOUSE </option>

                                                            </select>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group">
                                                        <label class="sr-only" for="form-notes">Notes</label>
                                                        <input type="textarea" name="notes[]" placeholder="Write notes"
                                                            id="notes_CERE3012"
                                                            onchange="updateNotes(this, 'CERE3012');"
                                                            class="form-notes form-control input-sm line-note" value=""
                                                            style="height:27px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--group inner list-group-item-block1-->

                                        <div class="group inner list-group-item-block2">
                                            <div class="product-qty-add mt-0">
                                                <input type="hidden" name="color[]" id="color_CERE3012" value="">
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="product-qty-add mt-0" style="zoom:.935;-ms-zoom: .935;
    -moz-transform: scale(.935);
    -moz-transform-origin: 0 0;">
                                                <div class="group inner input-group quantity-wrapper product-quantity">
                                                    <span class="input-group-btn">
                                                        <button type="button"
                                                            class="btn btn-circle btn-minus btn-number"
                                                            data-type="minus" onclick="minusClicked('#CERE3012_QTY')">
                                                            <span class="glyphicon glyphicon-minus"></span> </button>
                                                    </span>
                                                    <div class="dropup" id="qty-dropup">
                                                        <input id="CERE3012_QTY" type="text" name="quantity[]"
                                                            class="form-control input-number input-sm quantity-style dropdown-toggle jqty"
                                                            value="20" min="0" data-toggle="dropdown"
                                                            data-trigger="click" bulkbuy="0-6.02|-|-|-|-"
                                                            autocomplete="off">
                                                        <div class="dropdown-menu">
                                                            <ul class="list-unstyled">
                                                                <li><a class="hand-cursor logpackqty"
                                                                        onclick="addToTrolley('CERE3012_QTY',1)"
                                                                        rel="CERE3012|1|5">Order 1</a></li>
                                                                <li><a class="hand-cursor logpackqty"
                                                                        onclick="addToTrolley('CERE3012_QTY',3)"
                                                                        rel="CERE3012|3|5">Order 3</a></li>
                                                                <li><a class="txt_red hand-cursor logpackqty"
                                                                        onclick="addToTrolley('CERE3012_QTY',5)"
                                                                        rel="CERE3012|5|5"> Order 5 for a Carton</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <span class="input-group-btn">
                                                        <button id="button-qty" type="button"
                                                            class="btn btn-circle btn-addtocart btn-number"
                                                            data-type="plus" onclick="plusClicked('#CERE3012_QTY')">
                                                            <span class="glyphicon glyphicon-plus"></span> </button>
                                                    </span>
                                                    <div class="dis-ib">
                                                        <div class="delivery-days product-qty-add h-m-20"
                                                            style="width:80px;">
                                                            <a class="group inner btn btn-addtocart btn-xs product-button btn_addtoorder"
                                                                rel="CERE3012"
                                                                onclick="validateAddedStk('CERE3012_QTY','My Favourites');"><i
                                                                    class="fa fa-shopping-cart"></i>&nbsp; Add</a>
                                                            <a class="btn_deleteitem group inner hand-cursor dark pl-5"
                                                                rel="CERE3012"><i
                                                                    class="fa fa-trash fa-lg link-blk f-18"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="clearfix"></div>
                                                <div class="col-xs-12 delivery-days h-m-15 mt-5">

                                                    <!--<i class="fa fa-truck"></i>&nbsp; Immediate Delivery-->

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="searchItems item col-lg-3  no-padding" rel="PENC2036">

                                <input type="hidden" name="stk_code[]" value="PENC2036">
                                <input type="hidden" name="taxcode[]" value="1">
                                <input type="hidden" name="cp[]" value="0">
                                <input type="hidden" name="pf[]" value="N">
                                <input type="hidden" name="description[]" value="COS HB Pencil">
                                <input type="hidden" name="price[]" value="5.55">
                                <input type="hidden" name="image[]" value="penc2036_1.jpg">
                                <input type="hidden" name="thumb[]" value="penc2036_1.jpg">
                                <input type="hidden" name="pickunit[]" value="Box20">
                                <input type="hidden" name="kitflag[]" value="">
                                <input type="hidden" name="cust_redirect[]" value="">
                                <div class="thumbnail h-m-490 pl-5 pr-5 pt-5" style="padding-bottom:5px !important;">

                                    <div class="orange-block-wrapper pos-rel">
                                        <a href="/education-supplies/drawing/COS-HB-Pencil-PENC2036"
                                            class="product-detail-link" rel="PENC2036:2:My Favourites"><img
                                                src=" https://dl2jx7zfbtwvr.cloudfront.net/Thumbnails/penc2036_1.jpg"
                                                class="group inner list-group-image  " alt="COS HB Pencil"></a>

                                    </div>
                                    <input type="hidden" id="disc_sim_PENC2036" value="N">
                                    <input type="hidden" id="PENC2036_searchdata" value="PENC2036 COS HB Pencil">
                                    <div class="caption pt-0">
                                        <div class="group inner list-group-item-block1">
                                            <div class="group inner list-group-item-heading     "
                                                style="width:100%;max-height: 32px !important;-webkit-line-clamp: 2;">
                                                <h3><a href="/education-supplies/drawing/COS-HB-Pencil-PENC2036"
                                                        class="product-detail-link product-links"
                                                        rel="PENC2036:2:My Favourites"> COS HB Pencil</a></h3>
                                            </div>
                                            <div class="group inner list-group-item-description ">Hexagonal Lead Pencils
                                                are easy to erase and sharpen. Sha...
                                            </div>
                                            <div class="group inner list-group-item-code">PENC2036</div>
                                            <div class="clearfix"></div>
                                            <div class="group inner list-group-planet-friendly-list c4spritebestsellerg"
                                                width="35" height="35" title="Best Seller"></div>


                                        </div>

                                        <div class="group inner list-group-item-block2">

                                            <div class="group inner list-group-item-price" id="PENC2036_PRC">$5.55</div>
                                            <div class="group inner list-group-item-gst">+10% GST / Box20</div>

                                            <!--<div class="clearfix"></div>-->


                                            <!-- Bulk Savings -->

                                            <div class="list-group-discount-bulk">
                                                <div id="bulk-savings-carousel-holder">

                                                    <div class="carousel slide bulk-savings-carousel"
                                                        id="bulk-savings-carousel1" data-ride="carousel">
                                                        <div class="carousel-inner">
                                                            <div class="item bulk-savings-text active"><span
                                                                    class="bulk-savings-title">BULK SAVING</span><br>
                                                                <a class="hand-cursor text-black qtybreak"
                                                                    rel="PENC2036|4">Buy <strong>4</strong> at
                                                                    <strong>$4.99</strong></a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <!--comm-->
                                        <div class="group inner list-group-item-block1">
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="row">
                                                    <div class="btn-group">
                                                        <label for="new_cost_centre">Cost Centre&nbsp; </label>
                                                        <span>
                                                            <select name="cost_centre[]" id="cc_PENC2036"
                                                                class="b-white cc_dropdown selectpicker btn-sm custom-cart pl-3 pr-3 mb-5"
                                                                onchange="updateCostCentre(this, 'PENC2036');"
                                                                style="min-width:73px;max-width:73px !important;height:27px;;">
                                                                <option value="CATEGORY MANAGER">
                                                                    CATEGORY MANAGER : CATEGORY MANAGEMENT </option>
                                                                <option value="HOSSM" selected="selected">
                                                                    HOSSM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : HO SSAM
                                                                </option>
                                                                <option value="000180">
                                                                    000180&nbsp;&nbsp;&nbsp;&nbsp; : HO MD (DOM)
                                                                </option>
                                                                <option value="000190">
                                                                    000190&nbsp;&nbsp;&nbsp;&nbsp; : MATCHAM </option>
                                                                <option value="2124323">
                                                                    2124323&nbsp;&nbsp;&nbsp; : fvsfas </option>
                                                                <option value="ACCOUNTS">
                                                                    ACCOUNTS&nbsp;&nbsp; : HO ACCOUNTS </option>
                                                                <option value="ADELAIDE">
                                                                    ADELAIDE&nbsp;&nbsp; : AD GENERAL OFFICE USE
                                                                </option>
                                                                <option value="ADMIN">
                                                                    ADMIN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : HO ADMIN/HR
                                                                </option>
                                                                <option value="ADWH">
                                                                    ADWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : AD
                                                                    WAREHOUSE </option>
                                                                <option value="BRISBANE">
                                                                    BRISBANE&nbsp;&nbsp; : BR GENERAL OFFICE USE
                                                                </option>
                                                                <option value="BRWH">
                                                                    BRWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : BR
                                                                    WAREHOUSE </option>
                                                                <option value="BST">
                                                                    BST&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : HO
                                                                    BST </option>
                                                                <option value="CANBERRA">
                                                                    CANBERRA&nbsp;&nbsp; : CB GENERAL OFFICE USE
                                                                </option>
                                                                <option value="CBWH">
                                                                    CBWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : CB
                                                                    WAREHOUSE </option>
                                                                <option value="CLEANERS">
                                                                    CLEANERS&nbsp;&nbsp; : HO CLEANERS </option>
                                                                <option value="DARWIN">
                                                                    DARWIN&nbsp;&nbsp;&nbsp;&nbsp; : NT GENERAL OFFICE
                                                                    USE </option>
                                                                <option value="FURNITURE">
                                                                    FURNITURE&nbsp; : FURNITURE </option>
                                                                <option value="HO NSM">
                                                                    HO NSM&nbsp;&nbsp;&nbsp;&nbsp; : HO NSM </option>
                                                                <option value="HO WAREHOUSE">
                                                                    HO WAREHOUSE : HO WAREHOUSE </option>
                                                                <option value="HOBART">
                                                                    HOBART&nbsp;&nbsp;&nbsp;&nbsp; : TS GENERAL OFFICE
                                                                    USE </option>
                                                                <option value="IMPLEMENTATION">
                                                                    IMPLEMENTATION : IMPLEMENTATION TEAM </option>
                                                                <option value="IT TEAM">
                                                                    IT TEAM&nbsp;&nbsp;&nbsp; : HO IT </option>
                                                                <option value="LEVEL 2">
                                                                    LEVEL 2&nbsp;&nbsp;&nbsp; : LEVEL 2 ADMIN </option>
                                                                <option value="MB WHSE JAN/ADMIN">
                                                                    MB WHSE JAN/ADMIN : MB CLEANERS / JANITORIAL
                                                                </option>
                                                                <option value="MBWH">
                                                                    MBWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : MB
                                                                    WAREHOUSE </option>
                                                                <option value="MD">
                                                                    MD&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
                                                                    MD </option>
                                                                <option value="MELBOURNE">
                                                                    MELBOURNE&nbsp; : MB GENERAL OFFICE USE </option>
                                                                <option value="NCWH">
                                                                    NCWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : NC
                                                                    WAREHOUSE </option>
                                                                <option value="NEWCASTLE">
                                                                    NEWCASTLE&nbsp; : NC GENERAL OFFICE USE </option>
                                                                <option value="NTWH">
                                                                    NTWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : NT
                                                                    WAREHOUSE </option>
                                                                <option value="PERTH">
                                                                    PERTH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : WA GENERAL
                                                                    OFFICE USE </option>
                                                                <option value="SH GENERAL">
                                                                    SH GENERAL : SH GENERAL OFFICE USE </option>
                                                                <option value="SH SALES">
                                                                    SH SALES&nbsp;&nbsp; : SH SALES </option>
                                                                <option value="SHCS">
                                                                    SHCS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : SH
                                                                    CUSTOMER SERVICE </option>
                                                                <option value="SH-DA">
                                                                    SH-DA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : SH-DA
                                                                </option>
                                                                <option value="TSWH">
                                                                    TSWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : TS
                                                                    WAREHOUSE </option>
                                                                <option value="WAWH">
                                                                    WAWH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : WA
                                                                    WAREHOUSE </option>

                                                            </select>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group">
                                                        <label class="sr-only" for="form-notes">Notes</label>
                                                        <input type="textarea" name="notes[]" placeholder="Write notes"
                                                            id="notes_PENC2036"
                                                            onchange="updateNotes(this, 'PENC2036');"
                                                            class="form-notes form-control input-sm line-note" value=""
                                                            style="height:27px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--group inner list-group-item-block1-->

                                        <div class="group inner list-group-item-block2">
                                            <div class="product-qty-add mt-0">
                                                <input type="hidden" name="color[]" id="color_PENC2036" value="">
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="product-qty-add mt-0" style="zoom:.935;-ms-zoom: .935;
    -moz-transform: scale(.935);
    -moz-transform-origin: 0 0;">
                                                <div class="group inner input-group quantity-wrapper product-quantity">
                                                    <span class="input-group-btn">
                                                        <button type="button"
                                                            class="btn btn-circle btn-minus btn-number"
                                                            data-type="minus" onclick="minusClicked('#PENC2036_QTY')">
                                                            <span class="glyphicon glyphicon-minus"></span> </button>
                                                    </span>
                                                    <input id="PENC2036_QTY" type="text" name="quantity[]"
                                                        class="form-control input-number input-sm quantity-style jqty"
                                                        value="1" min="0" bulkbuy="0-5.55|4-4.99|-|-|-"
                                                        autocomplete="off">
                                                    <span class="input-group-btn">
                                                        <button id="button-qty" type="button"
                                                            class="btn btn-circle btn-addtocart btn-number"
                                                            data-type="plus" onclick="plusClicked('#PENC2036_QTY')">
                                                            <span class="glyphicon glyphicon-plus"></span> </button>
                                                    </span>
                                                    <div class="dis-ib">
                                                        <div class="delivery-days product-qty-add h-m-20"
                                                            style="width:80px;">
                                                            <a class="group inner btn btn-addtocart btn-xs product-button btn_addtoorder"
                                                                rel="PENC2036"
                                                                onclick="validateAddedStk('PENC2036_QTY','My Favourites');"><i
                                                                    class="fa fa-shopping-cart"></i>&nbsp; Add</a>
                                                            <a class="btn_deleteitem group inner hand-cursor dark pl-5"
                                                                rel="PENC2036"><i
                                                                    class="fa fa-trash fa-lg link-blk f-18"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="clearfix"></div>
                                                <div class="col-xs-12 delivery-days h-m-15 mt-5">

                                                    <!--<i class="fa fa-truck"></i>&nbsp; Immediate Delivery-->

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-8 col-sm-8 pt-10 latest-updates dis-none-imp">
                        <?php if ($_SESSION['punchout_usrlogin'] == 'Y' || $_SESSION['SessionType'] != 'OCI') { ?>
                        <?php
                          if (((int)$CountOrderValues['TotalOrders']) > 0) {
                              include 'static_templates_resp/cos_segment_news.php';
                          }
                          ?>
                        <?php } ?>
                    </div>
                    <div class="col-lg-12 col-md-8 col-sm-8 pt-10 items-on-hold dis-none-imp"></div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $('.left-links-dashboard').click(function (e) {
                    storeId = $(this).prop('id');
                    $('#' + storeId).css({ 'color': '#1a99ce', 'font-weight': '500' });
                    $('#' + storeId).children('i').removeClass('fa-angle-right').addClass('fa-arrow-circle-right');
                    $('#' + storeId).parent().siblings().each(function () {
                        // $(this).children('.left-links-dashboard').css({'color':'lightgrey'});
                        selectChildren(this);
                    });

                    function selectChildren(esd) {
                        $(esd).children('.left-links-dashboard').css({ 'color': 'grey', 'font-weight': '400' });
                        $(esd).children('.left-links-dashboard').children('i').removeClass('fa-arrow-circle-right').addClass('fa-angle-right');

                    }

                    /*                  $('#' + storeId).parent().siblings().each(function(){
                                          selectChildren();
                                      });
                                      function selectChildren(){
                                          $(this).children('.left-links-dashboard').css({'color':'grey'});
                                          //this one doesn't work..why ????
                                      }*/
                    $('.' + storeId).siblings().addClass('dis-none-imp');
                    if (storeId !== 'exclusive-offers') {
                        $('.offers-listings').addClass('dis-none-imp');
                    }
                    console.log($(this).siblings());
                    hideShowD(storeId);
                });

                function hideShowD(idClass) {
                    $('.' + idClass).removeClass('dis-none-imp');
                    if (idClass === 'exclusive-offers') {
                        $('.offers-listings').removeClass('dis-none-imp');
                        $('.offers-list-dashboard').click(function () {
                            exclusiveOfferId = $(this).prop('id');
                            $('.' + exclusiveOfferId).removeClass('dis-none-imp');
                            $('.' + exclusiveOfferId).siblings().addClass('dis-none-imp');
                            $('#' + exclusiveOfferId).children().css({ 'color': '#1a99ce', 'font-weight': '500' });
                            $('#' + exclusiveOfferId).siblings().children().css({ 'color': 'grey', 'font-weight': '400' });
                        });
                    }
                }
            });
        </script>

        <!--div class="col-lg-4 col-md-4 col-sm-4 col-4 sidebar-wrapper">
	 <?php /*if ( $segment == 'D' && ((int)$CountOrderValues['TotalOrders']) == 0){ */?>
			<div >
			<h2>Why COS?</h2>
			 <?php /*	query_posts('post_type=admin-message&p=7684');   // Dev message id = 5885 :::  Prod message 7684
				while (have_posts()): the_post();
				the_content();
				endwhile;
			  */?>
            </div>
            <?php /*} else {
				if ($_SESSION['punchout_usrlogin'] == 'Y' || $_SESSION['SessionType'] != 'OCI') {*/?>
				<?php
/*					if(((int)$CountOrderValues['TotalOrders']) > 0)
					{
						echo "<hr>";
						include 'static_templates_resp/cos_segment_news.php';
					}
			*/?>
            <?php /*}*/?>
			<?php /*} */?>
                <hr>

        </div>-->
        <!--/.col -->

    </div>

    <!--/.row -->
    <div class="row mb-30 mt-30 clear-fix">


        <?php
		$segment = $_SESSION['cust_segment'];
		if ( $segment == 'D' && ((int)$CountOrderValues['TotalOrders']) == 0){
			$newbusinesssegcust = true;
			include 'static_templates_resp/cos_big_stats_1_All_Columns.php';
		?>
    </div>
    <div class="row text-center mb-30 mt-30  clear-fix">
        <img class="img-responsive"
            src="<?php echo $_SESSION['asset_url'];?>/wp-content/themes/cosresponsive_v1/img/COS Banner - Next Day Delivery.jpg" />
    </div>
    <div class="row  mb-30 mt-30 clear-fix">
        <?php include 'static_templates_resp/cos_product_carousel_6col.php'; ?>
    </div>
    <br />
    <div class="row text-center mb-30 clear-fix">
        <img class="img-responsive"
            src="<?php echo $_SESSION['asset_url'];?>/wp-content/themes/cosresponsive_v1/img/COS Banner - 3 Easy Steps Return.jpg" />

    </div>
    <br />
    <?php	include 'static_templates_resp/cos_current_promotion_carousel_6col.php'; ?>
    <br />
    <div class="row text-center mb-30 mt-30">
        <img class="img-responsive"
            src="<?php echo $_SESSION['asset_url'];?>/wp-content/themes/cosresponsive_v1/img/COS Banner - Support Australian Business.jpg" />

    </div>
    <br />
    <div class='row'>
        <?php	include 'static_templates_resp/logo_slider.php'; ?>
    </div>
    <?php } elseif ( $_SESSION['SessionOrderType'] != 'BO' && ($segment == 'L' || ($segment == 'D' && ((int)$CountOrderValues['TotalOrders']) > 0))){
			// Corporate or Business
			if($countStats['clearanceCount'] != "0" && $countStats['promoCount'] != "0" && $countStats['newCount'] != "0")
				include 'static_templates_resp/cos_big_stats_1_All_Columns.php';
			else if($countStats['clearanceCount'] != "0" && $countStats['newCount'] != "0")
				include 'static_templates_resp/cos_big_stats_2_Clearance_New.php';
			else if($countStats['clearanceCount'] != "0" && $countStats['promoCount'] != "0")
				include 'static_templates_resp/cos_big_stats_3_Clearance_Promo.php';
			else if($countStats['promoCount'] != "0" && $countStats['newCount'] != "0")
				include 'static_templates_resp/cos_big_stats_4_Promo_New.php';

			if($is_new_customer)
				include 'static_templates_resp/cos_products_3rows.php';
			else
				include 'static_templates_resp/cos_product_carousel_6col.php';

		} elseif(($segment == 'S' || $segment == 'G' || $segment == 'U') && $_SESSION['SessionOrderType'] != 'BO'){
			// Enterprise or Government
			if(!empty($_SESSION['promotions_flag']) && $_SESSION['promotions_flag'] != 'N' && $countStats['clearanceCount'] != "0" && $countStats['promoCount'] != "0")
				include 'static_templates_resp/cos_big_stats_3_Clearance_Promo.php';
		}
		?>
    <?php
  if (!isset($_SESSION['showDashboardpopup']))
	  $_SESSION['showDashboardpopup']=true;
  if (empty($_SESSION['default_order_number']))
	  $_SESSION['showDashboardpopup']=false;
  if (
		  isset($_SESSION['default_order_number']) &&
		  !empty($_SESSION['default_order_number']) &&
		  (!isset($_SESSION['showDashboardpopup']) || ($_SESSION['showDashboardpopup']==true)) &&
		  ($_SESSION['cust_segment']== 'D' || $_SESSION['cust_segment']== 'L')
			) {
		//$_SESSION['showDashboardpopup']=false;
  ?>
    <div id="c4dashdetails" class="pb-10 c4LeaveCOSmodal" style="border-top: 3px solid black;">
        <div class="pull-right" style="position:absolute;">
            <a class="btn-close dismisbari pull-right" type="button">
                <span class="btn-close dismisbar pull-right btn-close1 c-black ">
                    <span class="glyphicon glyphicon-remove"></span>
                </span>
            </a>
        </div>
        <div class="pl-0 mt-30 pr-0 mb-0" style="text-align: center;">
            <div>
                <hr class="mt-10 mb-5 w-90 hr-color">
                <p class="ta-c"><span class="f-22 c-black f-w-700">Welcome back,
                        <?php echo $_SESSION['first_name']; ?></span>.
                </p>
                <p class="pl-15 c-black  f-w-400  pr-15 pb-0" style="text-align: center;">You still have products in
                    your shopping cart from last time.
                </p>
                <hr class="mt-0 mb-15 w-90 hr-color">
            </div>
            <div class="f-13 c-white c4DBsize mb-20" style="text-align: center;">
                <div class="mb-10">
                    <a href="/index.html?pg=order&trolleylist=<?php echo $_SESSION['default_order_number']; ?>"
                        class="btn btn-md btn-default c-white pr-30" style="border:0px;background: #66cc66;box-shadow: 1px 3px 2px rgba(0, 0, 0, 0.5)  ;
                    -webkit-box-shadow: 1px 3px 2px rgba(0, 0, 0, 0.5);
                    -moz-box-shadow: 1px 3px 2px rgba(0, 0, 0, 0.5);">
                        <span class="glyphicon glyphicon-share-alt"></span>&nbsp;Go to my shopping cart </a>
                </div>
                <div class="mb-10 mt-15">
                    <a href="/c/office-supplies" class="btn btn-md btn-default c-white pr-55" style="border:0px;background:#2cafdb;box-shadow: 1px 3px 2px rgba(0, 0, 0, 0.5)  ;
                    -webkit-box-shadow: 1px 3px 2px rgba(0, 0, 0, 0.5)  ;
                    -moz-box-shadow: 1px 3px 2px rgba(0, 0, 0, 0.5)  ; ">
                        <span class="glyphicon glyphicon-chevron-left"></span>&nbsp;Continue shopping</a>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

</div>

<script src="//code.highcharts.com/highcharts.js"></script>
<script src="//code.highcharts.com/modules/data.js"></script>
<script src="//code.highcharts.com/modules/exporting.js"></script>
<!-- Dashboard -->
<script type="text/javascript" src="<?php echo $_SESSION['asset_url']; ?>/scripts_resp/countUp.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['asset_url']; ?>/scripts_resp/Chart.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['asset_url']; ?>/scripts_resp/legend.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['asset_url']; ?>/scripts_resp/Chart.min.js"></script>
<script>
    var custSpecificExist = <? php echo json_encode($_SESSION['custspecific_exist']); ?>;
    var printOnDemandAccess = <? php echo json_encode($_SESSION['printondemand_access'] == 'Y'); ?>;
    if (custSpecificExist)
        $("#customerstocklink").show();
    else
        $("#customerstocklink").hide();

    if (printOnDemandAccess)
        $("#printondemandlink").show();
    else
        $("#printondemandlink").hide();


    $('.btn-number').click(function (e) {
        e.preventDefault();
        fieldName = $(this).attr('data-field');
        type = $(this).attr('data-type');
        var input = $("input[name='" + fieldName + "']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if (type == 'minus') {

                if (currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                }
                if (parseInt(input.val()) == input.attr('min')) {
                    $(this).attr('disabled', true);
                }

            } else if (type == 'plus') {

                if (currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();
                }
                if (parseInt(input.val()) == input.attr('max')) {
                    $(this).attr('disabled', true);
                }

            }
        } else {
            input.val(0);
        }
    });
    $('.input-number').focusin(function () {
        $(this).data('oldValue', $(this).val());
    });
    $('.input-number').change(function () {

        minValue = parseInt($(this).attr('min'));
        maxValue = parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());

        name = $(this).attr('name');
        if (valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            //alert('Sorry, the minimum value was reached');
            COSAlert('Sorry, the minimum value was reached', 'INFORMATION', 'COS Alert', true, true, false);
            $(this).val($(this).data('oldValue'));
        }
        if (valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            //alert('Sorry, the maximum value was reached');
            COSAlert('Sorry, the maximum value was reached', 'INFORMATION', 'COS Alert', true, true, false);
            $(this).val($(this).data('oldValue'));
        }


    });
    $(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 190]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
        // Disable enter key, which may fire change event to save a out-of-range value to data-oldValue.
        if (e.keyCode == 13) {
            e.preventDefault();
        }
    });

    //For Bargain/Promo/New

    var productInfo = new Array();

    var dashboardBigStatId = <? php echo json_encode($dashboardBigStatId); ?>;

    if (dashboardBigStatId == "ClearancePromo") {

        productInfo[0] = <? php echo json_encode($productInfo[0]); ?>;
        productInfo[1] = <? php echo json_encode($productInfo[1]); ?>;
    } else if (dashboardBigStatId == "ClearanceNew") {
        productInfo[0] = <? php echo json_encode($productInfo[0]); ?>;
        productInfo[1] = <? php echo json_encode($productInfo[2]); ?>;
    } else if (dashboardBigStatId == "PromoNew") {
        productInfo[0] = <? php echo json_encode($productInfo[1]); ?>;
        productInfo[1] = <? php echo json_encode($productInfo[2]); ?>;
    } else {
        productInfo[0] = <? php echo json_encode($productInfo[0]); ?>;
        productInfo[1] = <? php echo json_encode($productInfo[1]); ?>;
        productInfo[2] = <? php echo json_encode($productInfo[2]); ?>;
    }

    for (var i = 0; i < 3; i++) {
        if (productInfo[i] != null) {
            $("#imageUrl" + i).show();
            var createdDate = new Date(productInfo[i]['date_created']);
            var dateThreeMonthsAgo = new Date();
            dateThreeMonthsAgo.setMonth(dateThreeMonthsAgo.getMonth() - 3);

            var differenceBetweenCreatedDateAndToday = getDateDifferenceInDays(createdDate, new Date());

            var differenceBetweenTodayAndThreeMonthsAgo = getDateDifferenceInDays(new Date(), dateThreeMonthsAgo);

            if (productInfo[i]['planet_friendly'] == 'Y') {

                $("#bannerImage" + i).show();
                $("#bannerImage" + i).attr("src", "<?php echo $_SESSION['asset_url']; ?>/images/ref_symbols/planetfriendly_small.gif");
                $("#bannerImage" + i).attr("title", "Planet Friendly");
                $("#bannerImage" + i).attr("alt", "Planet Friendly");
            } else if (differenceBetweenCreatedDateAndToday <= differenceBetweenTodayAndThreeMonthsAgo) {
                $("#bannerImage" + i).show();
                $("#bannerImage" + i).attr("src", "<?php echo $_SESSION['asset_url']; ?>/images/ref_symbols/new_small.gif");
                $("#bannerImage" + i).attr("title", "New Product");
                $("#bannerImage" + i).attr("alt", "New Product");
            } else {
                $("#bannerImage" + i).hide();
            }

            $("#url" + i).html(productInfo[i]['description']);
            $("#productImage" + i).attr("src", "<?php echo $_SESSION['asset_url'];?>/Thumbnails/" + productInfo[i]['imix_image']);
            $("#productImage" + i).attr("alt", productInfo[i]['description']);
            $("#productCode" + i).html(productInfo[i]['stk_code']);
            $("#price" + i).html("$" + productInfo[i]['min_price']);

            if (productInfo[i]['gst_code'] == "1") {
                $("#gst" + i).html("+10% GST/ " + productInfo[i]['pick_unit']);
            }
            else {
                $("#gst" + i).html("+0% GST/ " + productInfo[i]['pick_unit']);
            }

            var url = "index.html?pg=dashboardresp&urlRequired=Y&stockCode=" + productInfo[i]['stk_code'];

            $("#addToTrolley" + i).attr('href', '/index.html?pg=order&cmd=add&stock=' + productInfo[i]['stk_code']);

            $("#addToTrolley" + i).click({ inputId: "quant" + i, stkCode: productInfo[i]['stk_code'], listName: "My Dashboard - Featured" }, addtocartNew);

            var rel = productInfo[i]['stk_code'] + ":" + (i + 1) + ":My Dashboard - Featured";
            $.ajax({
                type: "GET",
                url: url,
                indexValue: i,
                ref: rel,
                success: function (data) {

                    $("#url" + this.indexValue).attr("href", data);
                    $("#url" + this.indexValue).attr("rel", this.ref)
                    $("#url" + this.indexValue).addClass("product-detail-link");
                    $("#imageUrl" + this.indexValue).attr("href", data);

                },
                error: function (data) {
                }
            });
        }
        else {
            $("#imageUrl" + i).hide();
        }
    }

    function addtocartNew(event) {
        var qty = $("#" + event.data.inputId).val();

        if (qty <= 0)
            qty = 1;

        var stockCode = event.data.stkCode;
        var listName = event.data.listName;
        var orderNo = $("#hdr_trolleylist").val();
        checkAddedStk(stockCode, qty, null, null, null, null, listName);


        event.preventDefault();
        return false;
    }

    function getDateDifferenceInDays(a, b) {
        var _MS_PER_DAY = 1000 * 60 * 60 * 24;
        var utc1 = Date.UTC(a.getFullYear(), a.getMonth(), a.getDate());
        var utc2 = Date.UTC(b.getFullYear(), b.getMonth(), b.getDate());

        return Math.abs(Math.floor((utc2 - utc1) / _MS_PER_DAY));
    }

    function getCustRedirect() {
		<? php /*Hide alert is not hiding right now. Need to work on Ajax solution*/ ?>
		var hideAlert = false;
        var chkAlert = document.getElementById('hide_alert');
        if (chkAlert) {
            hideAlert = chkAlert.checked;
        }
        var stockCode = '';
        var qty = 1;
        if ($('#cosbox_dialog_form').length == 0) {
            stockCode = $("#orig_stkCode").val();
            qty = $("#Orig_val").val();
        }
        else {
            var altStockCodeString = $('#cosbox_dialog_form').serializeArray()[0]['value'];
            var altStockCodeArray = altStockCodeString.split('|');
            var stockCode = '';
            if (altStockCodeArray[0] == 'Y')
                stockCode = altStockCodeArray[2];
            else
                stockCode = $('#cosbox_dialog_form').serializeArray()[0]['name'];
        }
        $('#cosbox_dialog').data('overlay').close();
        additemtocart(stockCode, qty);
        return false;

    }
<? php if (
        isset($_SESSION['default_order_number']) &&
        !empty($_SESSION['default_order_number']) &&
        (!isset($_SESSION['showDashboardpopup']) || ($_SESSION['showDashboardpopup'] == true)) &&
        ($_SESSION['cust_segment'] == 'D' || $_SESSION['cust_segment'] == 'L')
    ) {
        $_SESSION['showDashboardpopup'] = false;
?>

            $(document).ready(function () {
	<? php if ($_SESSION['trolleyitems'] > 0) { ?>
                    setTimeout(function () { $("#c4dashdetails").fadeOut("slow", "linear"); }, 200000);
    <? php } ?>
                    $(".dismisbar").click(function () {
                        $("#c4dashdetails").hide("5000");
                    });
            });
<? php } ?>
</script>
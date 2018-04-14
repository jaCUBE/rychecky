<?php $social_list =& $data; /* @var $social_list Social */ ?>


<div id="contact">
    <div class="row">
        <div class="col-lg-7">
            <div class="social-bar" style="margin-top: 20px;">
                <?php Rychecky::view('socialbar.master', $social_list); ?>
            </div>


            <hr class="clear"/>


            <div class="row" id="contact-table">
                <div class="col-lg-6" id="channels">
                    <div class="email"><a href="mailto:<?= getenv('EMAIL') ?>"> <?= getenv('EMAIL') ?></a></div>
                    <div class="tel">
                        <a href="tel:<?= str_replace(' ', '', getenv('PHONE')) ?>">
                            <?= e('', getenv('PHONE_PREFIX')) ?>    <?= getenv('PHONE') ?>
                        </a>
                    </div>
                    <br/>
                    <div class="bank">
                        <i class="fa fa-institution"></i>
                        <?= e('Číslo účtu', 'Bank account') ?> : <?= getenv('BANK') ?>
                    </div>
                </div>

                <div class="col-lg-6" id="address">
                    <div class="name">Jakub Rychecký</div>
                    <div class="street"><?= getenv('ADDR_STREET') ?> <?= getenv('ADDR_STREET_NUMBER') ?></div>
                    <div class="city"><?= getenv('ADDR_ZIP') ?> <?= getenv('ADDR_CITY') ?></div>
                </div>
            </div>
        </div>


        <div class="col-lg-5 center">
            <img src="<?= URL ?>/images/qr.png" alt="QR kód" title="QR kód" class="qr d-none d-lg-block"/>
        </div>
    </div>


    <?php $gmap_address = ADDR_STREET . ' ' . ADDR_CITY ?>
    <iframe height="450" frameborder="0" id="gmap-iframe"
            src="https://www.google.com/maps/embed/v1/place?q=<?= $gmap_address ?>&amp;key=AIzaSyDNcVRTFRK2Ljn8n4PQzESMZtkNFDeABNQ&amp;zoom=10">
    </iframe>
</div>
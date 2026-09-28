<?php
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="plugin/bootstrap/css/bootstrap.min.css">
<script src="plugin/bootstrap/js/bootstrap.bundle.min.js"></script>
<div class="header-container">
    <div class="header-top-field desktop-section">
        <img src="style/images/desktop/header_top_<?=$lang?>.jpg" border=0 />
        <div class="lang-field lang-<?=$lang?>">
            <?php if ($section == 'video') { ?>
                <?php echo $langObj->getText('channel'); ?>:
                <select onchange="changeChannel(this.value)" class="lang-selection lang-desktop-select lang-<?=$selected?>">
                    <option value="1" <?php if ($selected == '1') {
                        echo 'selected';
                    } ?>><?= $langObj->getText('floor') ?>
                    </option>
                    <option value="2" <?php if ($selected == '2') {
                        echo 'selected';
                    } ?>><?= $langObj->getText('english') ?>
                    </option>
                    <option value="3" <?php if ($selected == '3') {
                        echo 'selected';
                    } ?>><?= $langObj->getText('cantonese') ?>
                    </option>
                    <option value="4" <?php if ($selected == '4') {
                        echo 'selected';
                    } ?>><?= $langObj->getText('putonghua') ?>
                    </option>
                </select>
            <?php } else { ?>
                <?php echo $langObj->getText('language'); ?>:
                <select onchange="setLanguage('<?= SITE_SESSION_KEY ?>',this.value, true)" class="lang-selection lang-desktop-select lang-<?=$lang?>">
                    <option value="tc" <?php if ($lang == 'tc') {
                        echo 'selected';
                    } ?>>繁體</option>
                    <option value="sc" <?php if ($lang == 'sc') {
                        echo 'selected';
                    } ?>>简体</option>
                    <option value="en" <?php if ($lang == 'en') {
                        echo 'selected';
                    } ?>>English</option>
                </select>
            <?php } ?>
        </div>
    </div>
    <div class="header-top-field mobile-section">
        <img src="style/images/mobile/header_top_<?=$lang?>_v2.png" border=0 />
        <div class="lang-field lang-<?=$lang?>">
            <?php if ($section == 'video') { ?>
                <?php echo $langObj->getText('channel'); ?>:
                <select onchange="changeChannel(this.value)" class="lang-selection lang-mobile-select lang-<?=$selected?>">
                    <option value="1" <?php if ($selected == '1') {
                        echo 'selected';
                    } ?>><?= $langObj->getText('floor') ?>
                    </option>
                    <option value="2" <?php if ($selected == '2') {
                        echo 'selected';
                    } ?>><?= $langObj->getText('english') ?>
                    </option>
                    <option value="3" <?php if ($selected == '3') {
                        echo 'selected';
                    } ?>><?= $langObj->getText('cantonese') ?>
                    </option>
                    <option value="4" <?php if ($selected == '4') {
                        echo 'selected';
                    } ?>><?= $langObj->getText('putonghua') ?>
                    </option>
                </select>
            <?php } else { ?>
                <?php echo $langObj->getText('language'); ?>:
                <select onchange="setLanguage('<?= SITE_SESSION_KEY ?>',this.value, true)" class="lang-selection lang-mobile-select lang-<?=$lang?>">
                    <option value="tc" <?php if ($lang == 'tc') {
                        echo 'selected';
                    } ?>>繁體</option>
                    <option value="sc" <?php if ($lang == 'sc') {
                        echo 'selected';
                    } ?>>简体</option>
                    <option value="en" <?php if ($lang == 'en') {
                        echo 'selected';
                    } ?>>English</option>
                </select>
            <?php } ?>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center" id="display-message"></div>
                <div class="btn-ok-field text-center"><button type="button" class="btn btn-secondary btn-ok"
                        data-bs-dismiss="modal"><?= $langObj->getText("ok") ?></button></div>
            </div>
        </div>
    </div>
</div>
<script>
    function messageDisplay(msg) {
        document.getElementById('display-message').innerHTML = msg;
        var myModal = new bootstrap.Modal(document.getElementById('messageModal'), {
            keyboard: false
        });
        myModal.show();
    }
</script>
<style>
    #display-message {
        font-weight: bold;
    }
</style>
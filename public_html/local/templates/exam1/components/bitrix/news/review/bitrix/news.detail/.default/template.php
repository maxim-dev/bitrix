<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="review-block">
    <div class="review-text">
        <div class="review-text-cont">

            <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["FIELDS"]["PREVIEW_TEXT"]):?>
                <?=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);?>
            <?endif;?>
            <?if($arResult["NAV_RESULT"]):?>
                <?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?endif;?>
                <?echo $arResult["NAV_TEXT"];?>
                <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
            <?elseif(strlen($arResult["DETAIL_TEXT"])>0):?>
                <?echo $arResult["DETAIL_TEXT"];?>
            <?else:?>
                <?echo $arResult["PREVIEW_TEXT"];?>
            <?endif?>

        </div>
        <div class="review-autor">

            <?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
                <?=$arResult["NAME"]?>,
            <?endif;?>


            <? if ($arParams["DISPLAY_DATE"] != "N" && $arResult["DISPLAY_ACTIVE_FROM"]): ?>
                <? echo $arResult["DISPLAY_ACTIVE_FROM"] ?>,
            <? endif ?>

            <?= $arResult["DISPLAY_PROPERTIES"]['POSITION']["DISPLAY_VALUE"]  ?>
            <?= $arResult["DISPLAY_PROPERTIES"]['POSITION']["DISPLAY_VALUE"] ? ', ' : '' ?>
            <?= $arResult["DISPLAY_PROPERTIES"]['COMPANY']["DISPLAY_VALUE"] ?>.
        </div>
    </div>

    <? if ($arParams["DISPLAY_PICTURE"] != "N"): ?>
    <div style="clear: both;" class="review-img-wrap">
    <?if(is_array($arResult["DETAIL_PICTURE"])):?>

        <img
                src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
                width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
                height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
                alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
                title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
        />
    <?else:?>
        <img
                src="<?= SITE_TEMPLATE_PATH ?>/img/rew/no_photo.jpg"
                alt="<?=$arResult["NAME"]?>"
                title="<?=$arResult["NAME"]?>"
        />
    <?endif?>
    </div>
    <?endif?>




</div>

<?php if($arResult["DISPLAY_PROPERTIES"]["DOCS"]): ?>

<div class="exam-review-doc">
    <p><?=GetMessage("T_NEWS_DETAIL_DOCS")?></p>

<?php

    // print_r($arResult["DISPLAY_PROPERTIES"]["DOCS"]); exit();


        $files = count($arResult["DISPLAY_PROPERTIES"]["DOCS"]["VALUE"]) > 1
            ? $arResult["DISPLAY_PROPERTIES"]["DOCS"]["FILE_VALUE"]
            : array($arResult["DISPLAY_PROPERTIES"]["DOCS"]["FILE_VALUE"]);

        foreach ($files as $file_value):
?>
    <div  class="exam-review-item-doc"><img class="rew-doc-ico" src="<?= SITE_TEMPLATE_PATH ?>/img/icons/pdf_ico_40.png"><a href="<?= $file_value["SRC"] ?>"><?= $file_value["ORIGINAL_NAME"] ?></a></div>
        <?php endforeach; ?>
</div>

<?php endif; ?>


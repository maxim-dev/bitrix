<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== TRUE) {
    die();
}
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
$this->setFrameMode(TRUE);
?>



<? if ($arParams["DISPLAY_TOP_PAGER"]): ?>
    <?= $arResult["NAV_STRING"] ?><br/>
<? endif; ?>
<? foreach ($arResult["ITEMS"] as $arItem): ?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), ["CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')]);
    ?>
    <div class="review-block" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
        <div class="review-text">

            <div class="review-block-title">

                <? if ($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]): ?>
                    <span class="review-block-name">
                    <? if (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])): ?>
                        <a href="<? echo $arItem["DETAIL_PAGE_URL"] ?>"><? echo $arItem["NAME"] ?></a>
                    <? else: ?>
                        <? echo $arItem["NAME"] ?>
                    <? endif; ?>
                    </span>
                <? endif; ?>

                <span class="review-block-description">
                    <? if ($arParams["DISPLAY_DATE"] != "N" && $arItem["DISPLAY_ACTIVE_FROM"]): ?>
                        <? echo $arItem["DISPLAY_ACTIVE_FROM"] ?>,
                    <? endif ?>

                    <?= $arItem["DISPLAY_PROPERTIES"]['POSITION']["DISPLAY_VALUE"] ?>
                    <?= $arItem["DISPLAY_PROPERTIES"]['POSITION']["DISPLAY_VALUE"] ? ', ' : '' ?>
                    <?= $arItem["DISPLAY_PROPERTIES"]['COMPANY']["DISPLAY_VALUE"] ?>

                </span>
            </div>

            <? if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arItem["PREVIEW_TEXT"]): ?>
                <div class="review-text-cont">
                    <? echo $arItem["PREVIEW_TEXT"]; ?>
                </div>
            <? endif; ?>

        </div>

        <? if ($arParams["DISPLAY_PICTURE"] != "N"): ?>

            <div class="review-img-wrap">
            <? if (is_array($arItem["PREVIEW_PICTURE"])): ?>
                    <? if (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])): ?>
                        <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><img
                                    class="preview_picture"
                                    border="0"
                                    src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
                                    width="<?= $arItem["PREVIEW_PICTURE"]["WIDTH"] ?>"
                                    height="<?= $arItem["PREVIEW_PICTURE"]["HEIGHT"] ?>"
                                    alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
                                    title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>"
                                    style="float:left"
                            /></a>
                    <? else: ?>
                        <img
                                class="preview_picture"
                                border="0"
                                src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
                                width="<?= $arItem["PREVIEW_PICTURE"]["WIDTH"] ?>"
                                height="<?= $arItem["PREVIEW_PICTURE"]["HEIGHT"] ?>"
                                alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
                                title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>"
                                style="float:left"
                        />
                    <? endif; ?>
            <? else: ?>
                <? if (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])): ?>
                    <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><img
                                class="preview_picture"
                                border="0"
                                src="<?= SITE_TEMPLATE_PATH ?>/img/rew/no_photo.jpg"
                                alt="<?= $arItem["NAME"] ?>"
                                title="<?= $arItem["NAME"] ?>"
                                style="float:left"
                        /></a>
                <? else: ?>
                    <img
                            class="preview_picture"
                            border="0"
                            src="<?= SITE_TEMPLATE_PATH ?>/img/rew/no_photo.jpg"
                            alt="<?= $arItem["NAME"] ?>"
                            title="<?= $arItem["NAME"] ?>"
                            style="float:left"
                    />
                <? endif; ?>
            <? endif ?>
            </div>
        <? endif ?>


    </div>
<? endforeach; ?>
<? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
    <br/><?= $arResult["NAV_STRING"] ?>
<? endif; ?>



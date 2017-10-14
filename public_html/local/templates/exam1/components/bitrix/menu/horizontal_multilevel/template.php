<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== TRUE) {
    die();
} ?>

<? if (!empty($arResult)): ?>

    <div class="inner-wrap">
        <div class="menu-block popup-wrap">
            <a href="" class="btn-menu btn-toggle"></a>
            <div class="menu popup-block">

                <ul id="horizontal-multilevel-menu">

                    <?
                    $previousLevel = 0;
                    foreach ($arResult

                    as $arItem): ?>

                    <? if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
                        <?= str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"])); ?>
                    <? endif ?>

                    <? if ($arItem["IS_PARENT"]): ?>

                    <? if ($arItem["DEPTH_LEVEL"] == 1): ?>
                    <li class="<?= $arItem["PARAMS"]['class'] ?>">
                        <a href="<?= $arItem["LINK"] ?>"
                           class="<? if ($arItem["SELECTED"]):?>root-item-selected<? else:?>root-item<? endif ?>"><?= $arItem["TEXT"] ?></a>
                        <ul>
                            <? if ($arItem["PARAMS"]['before']): ?><div class="menu-text"><?= $arItem["PARAMS"]['before'] ?></div><? endif; ?>

                            <? else: ?>
                            <li class="<? if ($arItem["SELECTED"]):?>item-selected<? endif ?> <?= $arItem["PARAMS"]['class'] ?>">
                                <a href="<?= $arItem["LINK"] ?>"
                                   class="parent"><?= $arItem["TEXT"] ?></a>
                                <ul>
                                    <? if ($arItem["PARAMS"]['before']): ?><div class="menu-text"><?= $arItem["PARAMS"]['before'] ?></div><? endif; ?>
                                    <? endif ?>

                                    <? else:?>

                                        <? if ($arItem["PERMISSION"] > "D"):?>

                                            <? if ($arItem["DEPTH_LEVEL"] == 1):?>
                                                <li class="<?= $arItem["PARAMS"]['class'] ?>">
                                                    <a href="<?= $arItem["LINK"] ?>"
                                                       class="<? if ($arItem["SELECTED"]):?>root-item-selected<? else:?>root-item<? endif ?>"><?= $arItem["TEXT"] ?></a>
                                                </li>
                                            <? else:?>
                                                <li<? if ($arItem["SELECTED"]):?> class="item-selected"<? endif ?>>
                                                    <a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a>
                                                </li>
                                            <? endif ?>


                                        <? endif ?>

                                    <? endif ?>

                                    <? $previousLevel = $arItem["DEPTH_LEVEL"]; ?>

                                    <? endforeach ?>

                                    <? if ($previousLevel > 1)://close last item tags?>
                                        <?= str_repeat("</ul></li>", ($previousLevel - 1)); ?>
                                    <? endif ?>

                                </ul>
                                <a href="" class="btn-close"></a>
            </div>
            <div class="menu-overlay"></div>
        </div>
    </div>
<? endif ?>
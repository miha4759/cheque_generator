<?php
/* @var $this yii\web\View */
?>
<div class="cheque">
    <div class="cheque__container">
        <div class="cheque__border">
            <div class="cheque__header">
                <div class="cheque__header__left">
                    <div class="header__full-name">
                        <?= $user->full_name ?>
                    </div>
                    <div class="header__street">
                        <?= $user->street ?>, <?= $user->town ?>
                    </div>
                    <div class="header__province">
                        <?= implode(', ', array_filter([$bank->province ?: null, $user->postal_code])) ?>
                    </div>
                </div>
                <div class="cheque__header__right">
                    <div class="header__date__description">
                        DATE
                    </div>
                    <div class="header__date">
                        <div class="date__top hand-written">
                            <span><?= $date->format('d')[0] ?></span>
                            <span><?= $date->format('d')[1] ?></span>
                            <span><?= $date->format('m')[0] ?></span>
                            <span><?= $date->format('m')[1] ?></span>
                            <span><?= $date->format('Y')[0] ?></span>
                            <span><?= $date->format('Y')[1] ?></span>
                            <span><?= $date->format('Y')[2] ?></span>
                            <span><?= $date->format('Y')[3] ?></span>
                        </div>
                        <div class="date__bottom">
                            <span>D</span>
                            <span>D</span>
                            <span>M</span>
                            <span>M</span>
                            <span>Y</span>
                            <span>Y</span>
                            <span>Y</span>
                            <span>Y</span>
                        </div>
                    </div>
                    <div class="header__id">
                        <?= $cheque->id ?>
                    </div>
                </div>
            </div>
            <div class="cheque__body">
                <div class="cheque__recipient">
                    <div class="recipient__description">
                        Pay to the order of
                    </div>
                    <div class="recipient__name hand-written">
                        <?= $cheque->recipient ?>
                    </div>
                    <div class="recipient__amount">
                        <span class="recipient__currency">
                            £
                        </span>
                        <span class="recipient__amount__value hand-written">
                            <?= number_format($cheque->amount, 2) ?>
                        </span>
                    </div>
                </div>
                <div class="cheque__amount__inletters">
                    <div class="inletters__value hand-written">
                        <span><?= $cheque->amountInletter ?></span>
                        <span class="fill">
                            <?php
                            $i = 0;
                            while (++$i < 120) {
                                echo '-';
                            } ?>
                        </span>
                    </div>
                    <div class="inletters__description">
                        pounds
                    </div>
                </div>
                <div class="cheque__bank">
                    <div class="bank__name">
                        <?= $bank->name ?>
                    </div>
                    <div class="bank__address">
                        <?= implode(', ',
                            array_filter([$bank->street, $bank->town, $bank->province ?: null, $bank->postal_code])) ?>
                    </div>
                </div>
                <div class="cheque__memo">
                    <div class="memo__description">
                        Memo
                    </div>
                    <div class="memo__value hand-written">
                        <?= $cheque->memo ?>
                    </div>
                    <div class="memo__signature hand-written">
                        <?= $user->full_name ?>
                        <span>MP</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cheque__footer">
        <div class="cheque__container">
                <span class="cheque__id">
                    <?= $cheque->generatedId ?>
                </span>
        </div>
    </div>
</div>

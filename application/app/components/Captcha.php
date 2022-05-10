<?php

namespace App\Components;

use Gregwar\Captcha\PhraseBuilder;
use Gregwar\Captcha\CaptchaBuilder;

class Captcha {

    public $captcha;

    public static function getCaptcha(): CaptchaBuilder
    {
        // Настройка каптчи
        $phraseBuilder = new PhraseBuilder(5, '0123456789');
        $captcha = new CaptchaBuilder(null, $phraseBuilder);
        $captcha->setBackgroundColor(255, 255, 255);
        $captcha->setIgnoreAllEffects(true);
        $captcha->build(150, 40);

        return $captcha;
    }
}

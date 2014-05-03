<?php

namespace Coduo\ProfanityFilter\Sanitizer;

class VowelsSanitizer implements Sanitizer
{
    public function sanitizeWord($word)
    {
        return preg_replace('/[aeiou]/i', '*', $word);
    }
}

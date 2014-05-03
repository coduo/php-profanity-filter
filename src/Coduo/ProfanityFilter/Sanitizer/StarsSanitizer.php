<?php

namespace Coduo\ProfanityFilter\Sanitizer;

class StarsSanitizer implements Sanitizer
{
    public function sanitizeWord($word)
    {
        return str_repeat('*', strlen($word));
    }
}

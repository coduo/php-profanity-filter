<?php

namespace Coduo\ProfanityFilter\Sanitizer;

interface Sanitizer
{
    public function sanitizeWord($word);
}

<?php

namespace Coduo\ProfanityFilter;

use Coduo\ProfanityFilter\Sanitizer\Sanitizer;

class ProfanityFilter
{
    /**
     */
    private $sanitizer;

    /**
     * @var array
     */
    private $badWords;

    public function __construct(Sanitizer $sanitizer, array $badWords)
    {
        $this->sanitizer = $sanitizer;
        $this->badWords = $badWords;
    }

    public function sanitize($text)
    {
        foreach ($this->badWords as $badWord) {
            $r = '/\b'.$badWord.'\b/i';
            $text =  preg_replace($r, $this->sanitizer->sanitizeWord($badWord), $text);
        }

        return $text;
    }
}

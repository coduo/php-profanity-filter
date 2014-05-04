<?php

namespace Coduo\ProfanityFilter;

use Coduo\ProfanityFilter\Sanitizer\Sanitizer;

class ProfanityFilter
{

    /**
     * @var Sanitizer\Sanitizer
     */
    private $sanitizer;

    /**
     * @var array
     */
    private $badWords;

    /**
     * @param Sanitizer $sanitizer
     * @param array     $badWords
     */
    public function __construct(Sanitizer $sanitizer, array $badWords)
    {
        $this->sanitizer = $sanitizer;
        $this->badWords = $badWords;
    }

    /**
     * @param  string $text
     * @return string
     */
    public function sanitize($text)
    {
        foreach ($this->badWords as $badWord) {
            $pattern = '/\b'.$badWord.'\b/i';
            $text =  preg_replace($pattern, $this->sanitizer->sanitizeWord($badWord), $text);
        }

        return $text;
    }

    /**
     * @param $text
     * @return bool
     */
    public function isProfane($text)
    {
        foreach ($this->badWords as $badWord) {
            $pattern = '/\b'.$badWord.'\b/i';
            if (preg_match($pattern, $text) > 0) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param $text
     * @return array
     */
    public function getViolations($text)
    {
        $violations = array();

        foreach ($this->badWords as $badWord) {
            $pattern = '/\b'.$badWord.'\b/i';
            if (preg_match($pattern, $text) > 0) {
                $violations[] = $badWord;
            }
        }

        return array_unique($violations);
    }
}

<?php

namespace spec\Coduo\ProfanityFilter\Replacement;

use PhpSpec\ObjectBehavior;

class VowelsSanitizerSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Coduo\ProfanityFilter\Sanitizer\VowelsSanitizer');
    }

    public function it_replaces_vowels_with_stars()
    {
        $this->sanitizeWord("fuck")->shouldReturn("f*ck");
        $this->sanitizeWord("anal")->shouldReturn("*n*l");
        $this->sanitizeWord("asshole")->shouldReturn("*ssh*l*");
    }
}

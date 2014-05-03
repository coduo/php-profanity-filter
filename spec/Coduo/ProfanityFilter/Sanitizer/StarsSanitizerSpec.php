<?php

namespace spec\Coduo\ProfanityFilter\Sanitizer;

use PhpSpec\ObjectBehavior;

class StarsSanitizerSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Coduo\ProfanityFilter\Sanitizer\StarsSanitizer');
    }

    public function it_replaces_word_with_stars()
    {
        $this->sanitizeWord('foo')->shouldReturn('***');
        $this->sanitizeWord('foobar')->shouldReturn('******');
    }
}

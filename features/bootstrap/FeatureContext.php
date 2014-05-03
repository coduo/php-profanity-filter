<?php
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Coduo\ProfanityFilter\ProfanityFilter;
use Coduo\ProfanityFilter\Sanitizer;

/**
 * Features context.
 */
class FeatureContext implements Context
{

    private $text = '';
    private $filteredWords = array();
    private $filter;

    /**
    * @Given /^I have following text:$/
    */
    public function iHaveFollowingText(PyStringNode $text)
    {
        $this->text = (string) $text;
    }

    /**
     * @Given /^I filter following words:$/
     */
    public function iFilterFollowingWords(TableNode $table)
    {
        $words = array();
        foreach ($table->getHash() as $row) {
            $words[] = $row['Word'];
        }
        $this->filteredWords = $words;
    }

    /**
     * @When /^I filter the word with stars replacement$/
     */
    public function iFilterTheWordWithReplacement()
    {
        $this->filter = new ProfanityFilter(new Sanitizer\StarsSanitizer(), $this->filteredWords);
    }

    /**
     * @When /^I filter the word with vowels replacement$/
     */
    public function iFilterTheWordWithVowelsReplacement()
    {
        $this->filter = new ProfanityFilter(new Sanitizer\VowelsSanitizer(), $this->filteredWords);
    }

    /**
     * @Then /^the result should be:$/
     */
    public function theResultShouldBe(PyStringNode $string)
    {
        expect($this->filter->sanitize($this->text))->toBe((string) $string);
    }

}

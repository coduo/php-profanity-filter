Feature: Filtering bad words
  In order to have a clean text
  I want to filter bad words

  Background:
    Given I have following text:
    """
    Motherfucker auctor sagittis scelerisque. Morbi asshole lorem et odio sagittis fuck euismod sed augue.
    """
    And I filter following words:
      | Word         |
      | motherfucker |
      | asshole      |
      | fuck         |

  Scenario: Filtering words with stars
    When I filter the word with stars replacement
    Then the result should be:
    """
    ************ auctor sagittis scelerisque. Morbi ******* lorem et odio sagittis **** euismod sed augue.
    """

  Scenario: Filtering words with stars
    When I filter the word with vowels replacement
    Then the result should be:
    """
    m*th*rf*ck*r auctor sagittis scelerisque. Morbi *ssh*l* lorem et odio sagittis f*ck euismod sed augue.
    """
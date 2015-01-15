Feature: Files
  In order to use the files in Box.com
  As a developer
  I need to be able to perform operations on the files

  Scenario: Getting information about a file
    Given I have a remote file named "File.txt" with the content "test content" in the base directory
    When I get information about the file
    Then I should receive information about a file named "File.txt" in the base directory

  Scenario: Updating a file
    Given I have a remote file named "File.txt" with the content "test content" in the base directory
    When I set the file's name to "Updated file.txt"
    And I get information about the file
    Then I should receive information about a file named "Updated file.txt" in the base directory

  Scenario: Locking a file
    Given I have a remote file named "File To Lock.txt" with the content "test content" in the base directory
    When I lock the file
    Then the file should be locked

  Scenario: Unlocking a file
    Given I have a remote file named "File To Unlock.txt" with the content "test content" in the base directory
    And the file is locked
    When I unlock the file
    Then the file should be unlocked

  Scenario: Uploading a file
    Given I have a local file named "Local File.txt" with the content "test content" in the base directory
    When I upload the file named "Local File.txt"
    Then the file should be uploaded

  Scenario: Downloading a file
    Given I have a remote file named "File To Download.txt" with the content "test content" in the base directory
    When I download that file to "Local Downloaded File.txt"
    Then I should have a local file named "Local Downloaded File.txt" with the content "test content"
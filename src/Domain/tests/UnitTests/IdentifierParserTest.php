<?php

use PHPUnit\Framework\TestCase;
use App\Domain\Helpers\Identifier;
use App\Domain\Helpers\IdentifierParser;
use function PHPUnit\Framework\assertNull;
use function PHPUnit\Framework\assertEquals;


class IdentifierParserTest extends TestCase
{
    /** @test */
    public function test_parse_email_with_valid_email()
    {
        assertEquals(IdentifierParser::parse("sita@gmail.com")->getValue(), Identifier::EMAIL);
    }
    
    public function test_parse_email_with_invalid_email()
    {
        assertNull(IdentifierParser::parse("sita-gmail.com"));
    }

    public function test_parse_number_with_valid_phone_number()
    {
        assertEquals(IdentifierParser::parse("634435363")->getValue(), Identifier::PHONE_NUMBER);
    }
    
    public function test_parse_number_with_phone_number_that_length_is_smaller_than_required()
    {
        assertNull(IdentifierParser::parse("3535463"));
    }

    public function test_parse_number_with_phone_number_that_contain_letter()
    {
        assertNull(IdentifierParser::parse("353sf5463"));
    }
}